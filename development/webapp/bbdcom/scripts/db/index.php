<?php
include "UserScript.php";
include "NotificationScript.php";
/*Testing user*/
addUser("12345678","Tom", "Hanks",null,null,null,null);
$output = isUser("1234");
echo $output;

/*Texting Notification
$output = addNotification(2,"Testing","http://res.cloudinary.com/ddgnvmjdr/image/upload/v1374820373/eventsequence_yczehu.png","this is a message",0,"12/12/2013");
echo $output;*/

//testing department

echo "asf";
?>