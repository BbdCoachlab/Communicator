<?php

// Checks if a message is given and submits

if(isset($_POST['subject'])){
	$subjectB = $_POST['subject'];
	echo $subjectB."<br>" ;
	}
	if(isset($_POST['message'])){
	   $messageB = $_POST['message'];
	   echo $messageB;
	}
?>