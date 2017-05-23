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
	$todaystate = $todaycount > $yesterdaycount+0;
	#echo $todaycount.' # '.$todaystate.'<br>';
	
	#print correspoding output
	$htmloutput = '';
	if($yesterdaystate == 1 && $todaystate == 1){
		$htmloutput = '<html><head><title>Keep Going Siva!!!</title></head><body><div class="boxes" id="box1" style="width: 40%"> <iframe src="https://anotepad.com/" style="border: 0" width="100%" height="100%" ></iframe> </div> <div class="boxes" id="box2" style="width: 33%"> <div class="innerboxes" id="innerbox1">'.$yesterdaycount.'</div> <div class="innerboxes" id="innerbox2">'.$todaycount.'</div> </div> <div class="boxes" id="box3" style="width: 26%"> <iframe src="https://en.todoist.com/app" style="border: 0" width="100%" height="100%" ></iframe> </div> <style> .boxes{border: 1px solid black; text-align: center; height: 98%; float: left;} .innerboxes{height: 50%;font-size: 21vw; color: white;} #innerbox1{background-color: #2ECC71;} #innerbox2{background-color: #2ECC71;} </style></body></html>';
	}else if($yesterdaystate == 0 && $todaystate == 1 ){
		$htmloutput = '<html><head><title>Catch up Today!!!</title></head><body><div class="boxes" id="box1" style="width: 40%"> <iframe src="https://anotepad.com/" style="border: 0" width="100%" height="100%" ></iframe> </div> <div class="boxes" id="box2" style="width: 33%"> <div class="innerboxes" id="innerbox1">'.$yesterdaycount.'</div> <div class="innerboxes" id="innerbox2">'.$todaycount.'</div> </div> <div class="boxes" id="box3" style="width: 26%"> <iframe src="https://en.todoist.com/app" style="border: 0" width="100%" height="100%" ></iframe> </div> <style> .boxes{border: 1px solid black; text-align: center; height: 98%; float: left;} .innerboxes{height: 50%;font-size: 21vw;color: white;} #innerbox1{background-color: #DB4C3F;} #innerbox2{background-color: #2ECC71;} </style></body></html>';
	}else if($yesterdaystate == 1 && $todaystate == 0 ){
		$htmloutput = '<html><head><title>1.01^365 = 37.78</title></head><body><div class="boxes" id="box1" style="width: 40%"> <iframe src="https://anotepad.com/" style="border: 0" width="100%" height="100%" ></iframe> </div> <div class="boxes" id="box2" style="width: 33%"> <div class="innerboxes" id="innerbox1">'.$yesterdaycount.'</div> <div class="innerboxes" id="innerbox2">'.$todaycount.'</div> </div> <div class="boxes" id="box3" style="width: 26%"> <iframe src="https://en.todoist.com/app" style="border: 0" width="100%" height="100%" ></iframe> </div> <style> .boxes{border: 1px solid black; text-align: center; height: 98%; float: left;} .innerboxes{height: 50%;font-size: 21vw;color: white;} #innerbox1{background-color: #2ECC71;} #innerbox2{background-color: #DB4C3F;} </style></body></html>';
	}else /*0 & 0*/{
		$htmloutput = '<html><head><title>WTF is Wrong ???</title></head><body><div class="boxes" id="box1" style="width: 40%"> <iframe src="https://anotepad.com/" style="border: 0" width="100%" height="100%" ></iframe> </div> <div class="boxes" id="box2" style="width: 33%"> <div class="innerboxes" id="innerbox1">'.$yesterdaycount.'</div> <div class="innerboxes" id="innerbox2">'.$todaycount.'</div> </div> <div class="boxes" id="box3" style="width: 26%"> <iframe src="https://en.todoist.com/app" style="border: 0" width="100%" height="100%" ></iframe> </div> <style> .boxes{border: 1px solid black; text-align: center; height: 98%; float: left;} .innerboxes{height: 50%;font-size: 21vw;color: white;} #innerbox1{background-color: #DB4C3F;} #innerbox2{background-color: #DB4C3F;} </style></body></html>';
	}
	echo $htmloutput;
?>
