<?php
require '../config.php';

try {
    response(200, "OK", get_jobs());
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

function get_jobs()
{
    $jobs = array_map(function ($filepath) {
        if (!$job_json = file_get_contents($filepath)) {
            throw new Exception('Could not read JSON file');
        }
        if (!$job = json_decode($job_json)) {
            throw new Exception('Could not parse JSON file');
        }
        return $job;
    }, glob(CONFIG['jobs_data_folder'] . '/*.json'));
    return ($jobs);
}
