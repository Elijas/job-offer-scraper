<?php
require '../vendor/autoload.php';
require '../config.php';

if ( $argc != 1 )
{
    echo "You must provide no arguments.\n";
    echo "Usage example: ./validate.php";
    exit(1);
}

foreach(glob(CONFIG['jobs_data_folder'] . '/*.json') as $json_filepath) {
    echo "== Checking: " . $json_filepath . "\n";

    $job_data = json_decode(file_get_contents($json_filepath));
    $job_data_schema_realpath = CONFIG['job_data_schema_filepath'];

    $validator = new JsonSchema\Validator;
    $validator->validate($job_data, (object)['$ref' => 'file://' . $job_data_schema_realpath]);
    if ($validator->isValid()) {
        echo "Success. Jobs JSON validates against the schema.\n";
    } else {
        echo "ERROR: Jobs JSON does not validate. Violations:\n";
        foreach ($validator->getErrors() as $error) {
            echo sprintf("[%s] %s\n", $error['property'], $error['message']);
        }
        exit(2);
    }
}