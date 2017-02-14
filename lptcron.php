<?php	
	#require phpQuery
	require('/var/www/html/phpquery/phpQuery/phpQuery.php');
	date_default_timezone_set('America/New_York');
	
	#get yesterdays count and state
	$yesterdayfile = file_get_contents('/var/www/html/phpquery/yesterday');
	$yesterdayarray = explode(' # ',$yesterdayfile);
	$yesterdaycount = (int) $yesterdayarray[0];
	$yesterdaystate = (boolean) $yesterdayarray[1];
	$yesterdaydate = new DateTime($yesterdayarray[2]);
	echo ' yesterday: '.$yesterdaycount.' # '.$yesterdaystate.' # '.$yesterdayarray[2].'<br>';

	#Crawl leetcode and create phpQuery element from html
	$html = file_get_contents('https://leetcode.com/mrsiva26/');
	$doc = phpQuery::newDocument($html);
	$currenttext = trim($doc['li.list-group-item:contains("Solved Question")']->text());
	
	#get current count and state
	$currentcount = (int) explode(' / ',$currenttext)[0];
	echo ' current: '.$currentcount.'<br>';
	
	#if date_diff is 2, make today as yesterday & current as today
	if(date_diff($yesterdaydate, new DateTime() )->d == 2){
		$todaycount = (int) file_get_contents('/var/www/html/phpquery/today');
		$todaystate = $todaycount > $yesterdaycount;
		$today = $yesterdaydate->add(new DateInterval('P1D'))->format('Y-m-d');
		file_put_contents ( '/var/www/html/phpquery/yesterday' , $todaycount.' # '.$todaystate.' # '.$today );
	}

	#update today file with current count
	file_put_contents ( '/var/www/html/phpquery/today'  , $currentcount );
?>