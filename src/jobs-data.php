<?php
$config = require '../config.php';

try {
    response(200, "OK", get_jobs_obj_array());
} catch (Exception $e) {
    response(500, $e->getMessage(), NULL);
}

function response($status, $status_message, $data)
{
    header("HTTP/1.1 " . $status . " " . $status_message);
    header("Content-Type:application/json");

    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;

    $json_response = json_encode($response);
    echo $json_response;
}

function get_jobs_obj_array() {
    global $config;
    if(!$json = file_get_contents($config['jobs_data_filepath']))
    {
        throw new Exception('Data load failed');
    }
    $obj_array = json_decode($json);
    return($obj_array);
}
