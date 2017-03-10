<?php
/*

This script finds all the .txt files in directory and finds every line which has variable end_date and changes 
the date to something a modder has chosen for. This was important because i wanted to play Victoria 2 longer 
than to the original end date of 1936 so i needed to change the end date for parties to new end date or otherwise 
they would disappear in 1936

*/

if(isset($_GET['end']) && !empty($_GET['end'])) {
	$end_date = $_GET['end'];
} else {
	$end_date = "6000.1.1";
}

foreach (glob("*.txt") AS $file) {
	$raw= file_get_contents($file);
	$raw= preg_replace("/end_date = [0-9]{4}\\.[0-9]{1,2}\\.[0-9]{1,2}/", "end_date = {$end_date}", $raw);
	file_put_contents($file, $raw);
}
?>
