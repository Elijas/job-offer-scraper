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
    $jobs_json = json_encode($jobs);

    if ($success = file_put_contents(CONFIG['jobs_data_filepath'], $jobs_json)) {
        echo "Success: Saved jobs data to " . CONFIG['jobs_data_filepath'];
    } else {
        echo "Error saving jobs data to " . CONFIG['jobs_data_filepath'];
    }
}
