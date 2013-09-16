<?php
session_start();

$department = $_POST["department_list"];
if(empty($department))
{
    $_SESSION['message_error']='<div class="alert alert-dismissable alert-danger">'
                                   .'<button id="test" type="button" class="close" data-dismiss="alert">&times;</button>'
                                   .'<strong>Sending message failed. Please try again.</strong>'
                                   .'</div>';  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}


$subject = $_POST["subject"];
if(empty($subject))
{
    $_SESSION['message_error']='<div class="alert alert-dismissable alert-danger">'
                                   .'<button id="test" type="button" class="close" data-dismiss="alert">&times;</button>'
                                   .'<strong>Sending message failed. Please try again.</strong>'
                                   .'</div>';  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
$message = $_POST["message"];
if(empty($message))
{
    $message = null;    
}

$image = $_FILES["image"];
if(empty($image))
{    
    echo "aedsf";
    $image_path = null;
}
else
{    
    $upload_folder = "/bbdcom/uploads";
    $max_file_size = 30000;
    $uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . '\uploaded_files'; 
    echo $uploadsDirectory;
}    

//echo $department."<br>";
//echo $subject."<br>";   
//echo $message."<br>";
?>