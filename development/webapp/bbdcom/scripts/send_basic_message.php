<?php
session_start();
include("upload_image.php");

$department = $_POST["department_list"];
if(empty($department))
{
    $_SESSION['message_error']='<div class="alert alert-dismissable alert-danger">'
                                   .'<button id="test" type="button" class="close" data-dismiss="alert">&times;</button>'
                                   .'<strong>Sending message failed. Please try again.</strong>'
                                   .'</div>';  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$subject = $_POST["subject"];
if(empty($subject))
{
    $_SESSION['message_error']='<div class="alert alert-dismissable alert-danger">'
                                   .'<button id="test" type="button" class="close" data-dismiss="alert">&times;</button>'
                                   .'<strong>Sending message failed. Please try again.</strong>'
                                   .'</div>';  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$message = $_POST["message"];
if(empty($message))
{
    $message = null;    
}

$image = $_FILES["image"];

if(!empty($image["errors"]))
{   
    $_SESSION['message_error']='<div class="alert alert-dismissable alert-danger">'
                                    .'<button id="test" type="button" class="close" data-dismiss="alert">&times;</button>'
                                    .'<strong>Sending message failed. Please try again.</strong>'
                                    .'</div>';  
    header('Location: ' . $_SERVER['HTTP_REFERER']); 
    exit;
}
 
else
{   
    if ($image["size"] == 0)
    {
    	$image_path = null;
    }
        
    else
    {
        $image_path = uploadImage($image);

        if(is_null($image_path))
        {        
            $_SESSION['message_error']='<div class="alert alert-dismissable alert-danger">'
                                        .'<button id="test" type="button" class="close" data-dismiss="alert">&times;</button>'
                                        .'<strong>Sending message failed. Please try again.</strong>'
                                        .'</div>';  
            header('Location: ' . $_SERVER['HTTP_REFERER']);        
            exit;
        } 
    }
}

$_SESSION['message_success']='<div class="alert alert-dismissable alert-success">'
                                .'<button id="test" type="button" class="close" data-dismiss="alert">&times;</button>'
                                .'<strong>Message sent.</strong>'
                                .'</div>';  

//echo $department."<br>";
//echo $subject."<br>";
//echo $message."<br>";
//echo $image_path."<br>";

//add to database

//header('Location: /bbdcom/dashboard.php');
//exit;
?>