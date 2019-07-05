<?php
require '../vendor/autoload.php';
require '../config.php';

if (!CONFIG['jobs_data_folder']) {
    echo "Config variable is not set";  # If this is set to "" then script will delete files in the current directory
    exit(1);
}
if (!$html_source = file_get_contents(CONFIG['scrape_target_url'])) {
    echo "Could not get HTML";
    exit(2);
}
$jobs = scrapeJobsData($html_source);
saveJobsData($jobs);

function scrapeJobsData($html_source)
{
    $dom = phpQuery::newDocument($html_source);

    $jobs = $dom->find("div.career.panel-group > div.panel")->map(function ($panel_element) {
        $panel = pq($panel_element);
        $link = $panel->find('a:contains(Apply for this position)');

        $job = new stdClass();
        $job->title = $panel->find('.media-heading')->text();;
        $job->location = $panel->find('.location')->text();
        $job->date = $panel->find('.date')->text();
        $job->content = $link->parent()->prevAll()->reverse()->text();
        $job->apply_link = $link->attr('href');
        return $job;
    })->get();

    phpQuery::unloadDocuments(); # Clear memory

    return $jobs;
}

function saveJobsData($jobs)
{
    if ($folder = CONFIG['jobs_data_folder']) {  # Make sure we're not deleting current directory
        array_map('unlink', glob($folder . '/*'));  # Delete all files in folder#
    }

    foreach ($jobs as $key => $job) {
        $job_json = json_encode($job);

        $filename = CONFIG['jobs_data_folder'] . '/' . $key . ".json";
        if ($success = file_put_contents($filename, $job_json)) {
            echo "Success: Saved job data to " . $filename;
        } else {
            echo "Error saving job data to " . $filename;
        }
    }
}
