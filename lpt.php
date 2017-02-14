<?php	
	#require phpQuery
	require('phpQuery/phpQuery.php');
	
	#get yesterdays count and state
	$yesterdayfile = file_get_contents('yesterday');
	$yesterdayarray = explode(' # ',$yesterdayfile);
	$yesterdaycount = (int) $yesterdayarray[0];
	$yesterdaystate = (boolean) $yesterdayarray[1];
	#$yesterdaydate = (string) $yesterdayarray[2];
	#echo $yesterdaycount.' # '.$yesterdaystate.' # '.$yesterdaydate.'<br>';
	
	#get todays count and state
	$todaycount = (int) file_get_contents('today');
	$todaystate = $todaycount > $yesterdaycount;
	#echo $todaycount.' # '.$todaystate.'<br>';
	
	#print correspoding output
	$htmloutput = '';
	if($yesterdaystate == 1 && $todaystate == 1){
		$htmloutput = '<html><head><title>Progress Tracker</title></head><body><div id="box1">'.$yesterdaycount.'</div><div id="box2">'.$todaycount.'</div><style>#box1{height: 50%;text-align: center;border: black;font-size: 44vh;color: white;background-color: #2ecc71;}#box2{height: 50%;text-align: center;border: black;font-size: 44vh;color: white;background-color:#2ecc71;}</style></body></html>';
	}else if($yesterdaystate == 0 && $todaystate == 1 ){
		$htmloutput = '<html><head><title>Progress Tracker</title></head><body><div id="box1">'.$yesterdaycount.'</div><div id="box2">'.$todaycount.'</div><style>#box1{height: 50%;text-align: center;border: black;font-size: 44vh;color: white;background-color: #e74c3c;}#box2{height: 50%;text-align: center;border: black;font-size: 44vh;color: white;background-color:#2ecc71;}</style></body></html>';
	}else if($yesterdaystate == 1 && $todaystate == 0 ){
		$htmloutput = '<html><head><title>Progress Tracker</title></head><body><div id="box1">'.$yesterdaycount.'</div><div id="box2">'.$todaycount.'</div><style>#box1{height: 50%;text-align: center;border: black;font-size: 44vh;color: white;background-color: #2ecc71;}#box2{height: 50%;text-align: center;border: black;font-size: 44vh;color: white;background-color:#e74c3c;}</style></body></html>';
	}else /*0 & 0*/{
		$htmloutput = '<html><head><title>Progress Tracker</title></head><body><div id="box1">'.$yesterdaycount.'</div><div id="box2">'.$todaycount.'</div><style>#box1{height: 50%;text-align: center;border: black;font-size: 44vh;color: white;background-color: #e74c3c;}#box2{height: 50%;text-align: center;border: black;font-size: 44vh;color: white;background-color:#e74c3c;}</style></body></html>';
	}
	echo $htmloutput;
?>