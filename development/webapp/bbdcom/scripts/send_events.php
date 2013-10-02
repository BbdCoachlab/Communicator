<?php

if(isset($_POST["department"]))
{
    $department = $_POST["department"];
}

if(isset($_POST["subject"]))
{
    $subject = $_POST["subject"];
}

if(isset($_POST["message"]))
{
    $message = $_POST["message"];
}
else
{
    $message = null;
}

echo $department;
echo $subject;   
echo $message;
//image

?>