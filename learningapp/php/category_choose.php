<?php

	$categoryId =$_POST['categoryId'];
	
	$test2 = printTest($categoryId);
	echo $test2;
	
	function printTest($categoryId)
	{
		require '../app/connect.php';
		
		$size = 0;
		
		echo '<div class ="row">
				<div class="col-sm-6" id = "test_body">';
		
		if($categoryId){
			
			//$result =  pg_query($connection, "SELECT * FROM questions.sf_question_test_size_get('$categoryId') AS size");
			//$row = pg_fetch_assoc($result);
			
		    $size = 10;
			
			if($size> 0){
				echo "<br/><br/>";	
			}
			else
			{
				echo 'There are no questions from this category. We will add them soon;)';		
			}
			pg_close($connection);
	
		}
		
		//$connection= pg_connect($connection_string);
		
		require '../php/class_test.php';
		$test = new test();
		if($size){
			$test -> returnTest($connection, $size, $categoryId);
		}else{
			echo 'Unfortunately there are no questions from this category;( We will add them soon, be patient;)';
		}echo '</div>';
		
		echo "<div class='col-sm-6 test_body' id = 'test_body_answear'>";

		$test -> generateAnswearDivs($size);
		//
		echo"		
				</div>
			";
		//pg_close($connection);
		
		
	}	
?>
