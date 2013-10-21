<?php
if(isset($_POST['subject'])){
	$subjectB = $_POST['subject'];
	echo $subjectB."<br>" ;
	}
	if(isset($_POST['message'])){
	   $messageB = $_POST['message'];
	   echo $messageB;
	}
?>