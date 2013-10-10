<?php
require "connectionScript.php";
require "UserScript.php";
require "NotificationScript.php";
require "DepartmentScript.php";
require "NomineeScript.php";
require "Note_DepartmentScript.php";
require "Department_UserScript.php";
require "Department_Note_UserScript.php";

//$output = addNotification("Subject1","http://res.cloudinary.com/ddgnvmjdr/image/upload/v1374820373/eventsequence_yczehu.png","this is a message",0,"12/12/2013","department1", "birthday");
echo "please work";
//echo $output;
/*Testing user*/

//$output1 = addUser("7","William","Brander","beer_ninja@gmail.com","http7","06/01/1941","department1");
//echo $output1;

//$output3 = addUser("8","Andre","3000","doctor_dre@gmail.com","http8","06/01/2000","department5");
//echo $output3;

//$output2 = isUser("7");
//echo $output2;



/*Testing Notification*/

//$output = addNotification(10,"Subject1","http://res.cloudinary.com/ddgnvmjdr/image/upload/v1374820373/eventsequence_yczehu.png","this is a message",0,"12/12/2013","department1", "birthday");
//echo $output;

//testing department
//$output1 = addDepartment("test");
//$output2 = increaseDepartmentSize("Coachlab; UPDATE [User] SET name = Injected WHERE id_user = 1234;");
//echo $output1." ".$output2;

?>