<?php
if(isset($_GET['end']) && !empty($_GET['date'])) {
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