<?php
//parsingas is www.ibusmedia.com/career.htm puslapio
header ('Content-type:text/html;charset=utf-8');
require 'phpQuery.php';
$url="http://www.ibusmedia.com/career.htm";
$file=file_get_contents($url);
$doc=phpQuery::newDocument($file);
$job_title=$doc->find('.media-heading')->text();
echo $job_title;
echo '<br><br>';

$office_location=$doc->find('.location')->text();
echo $office_location;
echo '<br><br>';

$date=$doc->find('.date')->text();
echo $date;
echo '<br><br>';

$job_decription=$doc->find('#career166')->text();
echo $job_decription;
echo '<br><br>';

$apply_link=$doc->find('.text-center ');
echo $apply_link;
echo '<br><br>';
//Masyvu gavimas is eiluciu
echo '<pre>';
$result1 = array_filter(array_map('trim', explode("\n", $job_title)), 'strlen');
print_r($result1);
echo '</pre>';

echo '<pre>';
$result2 = array_filter(array_map('trim', explode("\n", $office_location)), 'strlen');
print_r($result2);
echo '</pre>';

echo '<pre>';
$result3 = array_filter(array_map('trim', explode("\n", $date)), 'strlen');
print_r($result3);
echo '</pre>';

echo '<pre>';
$result4 = array_filter(array_map('trim', explode("\n", $job_decription)), 'strlen');
print_r($result4);
echo '</pre>';

echo '<pre>';
$result5 = array_filter(array_map('trim', explode("\n", $apply_link)), 'strlen');
print_r($result5);
echo '</pre>';

//json failo dekoduotas masyvas
$data = array (
  '$schema' => 'http://json-schema.org/draft-06/schema#',
  'title' => 'iBus jobs',
  'description' => 'List of currently available jobs @ iBus Media',
  'type' => 'object',
  'properties' => 
  array (
    'title' => 
    array (
      'description' => 'job title',
      'type' => 'string',
    ),
    'location' => 
    array (
      'description' => 'office location',
      'type' => 'string',
    ),
    'date' => 
    array (
      'description' => 'date',
      'type' => 'string',
    ),
    'content' => 
    array (
      'description' => 'job decription',
      'type' => 'string',
    ),
    'apply_link' => 
    array (
      'description' => 'link to apply for job',
      'type' => 'string',
    ),
  ),
  'required' => 
  array (
    0 => 'title',
    1 => 'location',
    2 => 'apply_link',
  ),
);
/*Meginimas ieskoti sprendimu
$keitimas=str_replace($data[1]['description'],$result1[0]['job title'],$data);
echo '<pre>';
print_r($keitimas,);
echo '</pre>';



$data = array_combine(array_map(function($el) use ($result2) {
    return $result2[$el];
}, array_keys($data)), array_values($data));

echo '<pre>';
print_r($data);
echo '</pre>';

$a = array_fill_keys($result1 , 'banana');
echo '<pre>';
print_r($a);
echo '</pre>';

$k = array_keys($data);
$v = array_values($data);
sort($k);
sort($v);
$data = array_combine($k, $v);
echo '<pre>';
print_r($data);
echo '</pre>';*/


?>