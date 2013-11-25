<?php

	if(isset($_POST["a"]))
	{
		$a = (float)$_POST["a"];
	}
	
	if(isset($_POST["c"]))
	{
		$c = $_POST["c"];
	}
	
		
	if($a != 0 && $a > 0)
	{
	
		switch($c){
			case "USD";
				$sym = "&#36;";
			break;
			case "GBP";
				$sym = "&#163;";
			break;
			case "EUR";
				$sym = "&#8364;";
			break;
			
		}
		
		$url = 'http://btcrate.com/convert?from=btc&to='. $c .'&exch=mtgox&conv=xe&amount='.$a;
		
		try {
			
			$curl = curl_init($url);
		
			if (is_resource($curl) === true)
			{
				curl_setopt($curl, CURLOPT_FAILONERROR, true);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		
				$c = curl_exec($curl);
				curl_close($curl);
			}
			
			$c = json_decode($c);
		
			$c = round($c->converted);
								 
			echo  $a . "BTC = " . $sym.$c;
				
			
		} catch (Exception $e) {
			
		    echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	
	}
	else
	{
		echo "Invalid Input";
	}
	
	
?>