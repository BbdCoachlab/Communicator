<?php 
 if(isset($_POST['subject'])){
		$subjectA = $_POST['subject'];
		//echo 'The Subject:'."<br>";
		echo $subjectA."<br>" ;
    }
	if(isset($_POST['message'])){
		$messageA = $_POST['message'];
		//echo 'The message:'."<br>";
		echo $messageA ;
		
		
    }
?>