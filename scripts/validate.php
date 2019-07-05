<?php
require '../vendor/autoload.php';
$config = require '../config.php';

if ( $argc != 1 ) {
    echo "You must provide no arguments.\n";
    echo "Usage example: ./validate.php";
    exit(2);
}


$jobs_data = json_decode(file_get_contents($config['jobs_data_filepath']));
$jobs_data_schema_realpath = $config['jobs_data_schema_filepath'];


$validator = new JsonSchema\Validator;
$validator->validate($jobs_data, (object)['$ref' => 'file://' . $jobs_data_schema_realpath]);
if ($validator->isValid()) {
    echo "Success. Jobs JSON validates against the schema.\n";
} else {
    echo "ERROR: Jobs JSON does not validate. Violations:\n";
    foreach ($validator->getErrors() as $error) {
        echo sprintf("[%s] %s\n", $error['property'], $error['message']);
    }
    exit(1);
}
