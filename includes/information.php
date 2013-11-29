<?php 
//generate a random number from 1 to 7
$random=rand(1,7);
//query the information table using the random number chosen
$information_sql="SELECT * FROM information WHERE id = ".$random;
$result = $pdo->query($information_sql);
	//if we get a result set display the heading and data
	if($result !== false) {
    
   		// Parse the result set
    	foreach($result as $row) {
      		echo '<h4>'.$row['heading'].'</h4>'.'<p>'. $row['text'].'</p>';
    	}	
 	}
?>
