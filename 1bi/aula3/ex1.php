<?php
	
	$arr = array();
	for ($i=0; $i < 500; $i++) { 
		if ($i == 0 || $i == 1) $arr[$i] = false;
		$arr[$i] = true;		 
	}



	for ($i = 2; $i < 500; $i++) { 
		if ($arr[$i] == true) {
			for ($j = $i+1; $j < 500; $j++) { 
				if ($j % $i == 0) {
					
					$arr[$j] = false;
				}
			}
		}
	}

	for ($k=0; $k < 500; $k++) { 
		if ($arr[$k]) echo $k . '<br>';
	}


?>