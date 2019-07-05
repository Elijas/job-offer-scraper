<?php
require 'lib/phpQuery.php';
$config = require '../config.php';

# Open URL
$url_contents = file_get_contents($config['scrape_target_url']);
$url_document = phpQuery::newDocument($url_contents);

# Read data
$job_titles = $url_document->find('.media-heading')->elements;
$office_locations = $url_document->find('.location')->elements;
$dates = $url_document->find('.date')->elements;

# Structure data
$jobs_2d_array = array_map(null, $job_titles, $office_locations, $dates);
$jobs_obj_array = array_map(function($job_row){
    return(array(
        'title' => $job_row[0]->textContent,
        'location' => $job_row[1]->textContent,
        'date' => $job_row[2]->textContent
    ));
}, $jobs_2d_array);

# Save data
$jobs_json = json_encode($jobs_obj_array);

if ($success = file_put_contents($config['jobs_data_filepath'], $jobs_json)) {
    echo "Success: Saved jobs data to " . $config['jobs_data_filepath'];
}
else {
    echo "Error saving jobs data to " . $config['jobs_data_filepath'];
}

