<?php
include "connectionScript.php";
include "UserScript.php";
include "NotificationScript.php";
include "DepartmentScript.php";
/*Testing user
addUser("12345678","Tom", "Hanks",null,null,null,null);
$output = isUser("1234");
echo $output;*/

/*Texting Notification
$output = addNotification(3,"Testing","http://res.cloudinary.com/ddgnvmjdr/image/upload/v1374820373/eventsequence_yczehu.png","this is a message",0,"12/12/2013",null);
echo $output;*/

//testing department
//$output1 = addDepartment("test");
$output2 = increaseDepartmentSize("Coachlab");
echo $output1." ".$output2;

?>