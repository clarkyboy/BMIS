<?php

$s1 = '2019-04-17';
$e1 = '2019-05-01';
$s2 = '2019-05-09';
$e2 = '2019-05-30';

function getDatesFromRange($s2, $e2){
    $dates = array($s2);
    while(end($dates) < $e2){
        $dates[] = date('Y-m-d', strtotime(end($dates).' +1 day'));
    }
    return $dates;
}//function getting the dates in between the range


$count = 0;
$period = getDatesFromRange($s2, $e2);

//checks if s1 and e1 is in conflict with the period dates
for($i=0; $i<count($period); $i++){
    if($s1 == $period[$i] OR $e1 == $period[$i] ){
        $count++;
    }
}
if($count > 0){
    echo "Conflict Schedules";
}else{
    echo "Go Ahead!";
}
//print_r($period);

?>