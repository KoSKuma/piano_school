<?php




$date = explode(' - ', '10/14/2015 - 10/20/2015');
$start_date = new DateTime($date[0]);
//print $start_date->format('l d F Y');
$end_date = new DateTime($date[1]);
print $end_date->diff($start_date)->format('%a');

$day_count = $end_date->diff($start_date)->format('%a');
print "\n".$start_date->format('l d F Y');
$dateArray = array();
for ($i=0; $i < $day_count ; $i++) { 
	$start_date->add(new DateInterval('P1D'));
	$dateArray[] = $start_date->format('l d F Y');

}
print_r($dateArray);
