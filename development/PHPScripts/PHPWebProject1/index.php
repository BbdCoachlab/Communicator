<?php
include "connectionScript.php";
include "UserScript.php";
include "NotificationScript.php";
include "DepartmentScript.php";
/*Testing user
addUser("1234567890","Lucy", "Liu",null,null,null,null);
$output = isUser("1234");
echo $output;*/

//Texting Notification
//$output = addNotification(5,"Testingmore","http://res.cloudinary.com/ddgnvmjdr/image/upload/v1374820373/eventsequence_yczehu.png","this is a message",0,"12/12/2013",null);
//echo $output;

//testing department
//$output1 = addDepartment("test");
//$output2 = increaseDepartmentSize("Coachlab; UPDATE [User] SET name = Injected WHERE id_user = 1234;");
//echo $output1." ".$output2;

?>