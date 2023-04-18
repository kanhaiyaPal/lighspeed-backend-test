<?php

$inputString = ["569815571556", "4938532894754", "1234567", "472844278465445"];

/**
 * Expected output:
 * 4938532894754 -> 49 38 53 28 9 47 54
 * 1234567 -> 1 2 3 4 5 6 7
 */


function getLotteryNumber($inputString){
	foreach($inputString as $singleString){
    $sampleString = str_split($singleString);
    $outputString = array();
    $skipNext = false;
    foreach($sampleString as $index=>$number){
    	if($skipNext){ $skipNext = false; continue; }
    	$nextTwoNums = implode('',array($number,$sampleString[$index+1]));
    	var_dump($nextTwoNums);
	    if(($nextTwoNums<59) and ($nextTwoNums>1)){
	    	$outputString[] = $nextTwoNums;
	    	$skipNext = true;
	    }else{
	    	$outputString[] = $number;
	    }
	    print_r($outputString);
	    if((count($outputString)==7) and (!isset($sampleString[$index+1]))){ 
	      	//we found the number
	      	return array($sampleString,$outputString);
	    }
    }  
    return false; 
 }
}

$output = getLotteryNumber($inputString);
if(!$output){ echo "No valid numbers found"; }

print $output[0];
echo "=>";
print_r($output[1]);

?>