<?php
/*
 * will get caugth in infintite loop if $strEnd + $strBegin = $numberLength,
 * and number does not pass check
 */

//user input
$strEnd = '0001231245';//ending digits
$strBegin = '4234';//begining digits
$numberLength = 15;//lenght of cc

$flag = false;
$count = 0;
while(! $flag)
{
	$numRand = $numberLength - strlen($strEnd)- strlen($strBegin);// number of places need to calculate
	$rand = (string)rand(pow(10,$numRand),9*pow(10,$numRand));//randomize that many digits
	$str = $strBegin . $rand. $strEnd;
	$odd = !strlen($str)%2;
	$sum = 0;
	$count++;
	for($i=0;$i<strlen($str);++$i) {
		$n=0+$str[$i];
		$odd=!$odd;
		if(!$odd) {
			$sum+=$n;
		} else {
			$x=2*$n;
			$sum+=$x>9?$x-9:$x;
		}
	}
 	if (($sum%10)==0){
 		$flag = true;
 		echo $str;
 		echo "Count" . $count;
 	}
 	else{
 		//echo "fail Luhn Check";
 	}
}