<?php
// The code checks if the entered information has been set for posting.
// The department, subject and message are to be tested if they are set or not.
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