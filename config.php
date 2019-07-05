<?php

$root_dir = pathinfo(__FILE__, PATHINFO_DIRNAME);
return array(
    'scrape_target_url' => "http://www.ibusmedia.com/career.htm",
    'jobs_data_filepath' => $root_dir . "/jobs-data/jobs.json"
);
