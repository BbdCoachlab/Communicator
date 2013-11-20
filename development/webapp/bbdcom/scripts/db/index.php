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
//echo "please work";
//echo $output;

/*Testing user*/

$output1 = addUser("7","William","Brander","beer_ninja@gmail.com","http7","1941-12-20","department1");
echo $output1." Epic Combo";

//$output3 = addUser("8","Andre","3000","doctor_dre@gmail.com","http8","2000-12-20","department5");
//echo $output3;

//$output2 = isUser("9");
//echo $output2;



/*Testing Notification*/

$output = addNotification("Subject1","http://res.cloudinary.com/ddgnvmjdr/image/upload/v1374820373/eventsequence_yczehu.png","this is a message","0","2013/12/12","department1", "birthday");
echo $output;

//testing department
/*echo "Testing inserting Department..................... hahdgfd\n";
$con = connectToDB();
echo "Happy.....\n";
$output1 = addDepartment($con, "test");
mysqli_close($con);
echo "Great Combo \n";
echo $output1;*/
//$output2 = increaseDepartmentSize("Coachlab; UPDATE [User] SET name = Injected WHERE id_user = 1234;");
//echo $output1." ".$output2;

?>