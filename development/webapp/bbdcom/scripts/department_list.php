<?php

// This code creates a list all names and departments.
$departments = array("All","Human Resources","Nedbank", "SARS");

require('db/connectionScript.php');
require('db/DepartmentScript.php');

$departments = getAllDepartments();
//$departments = array("Happy", "sad");
$drop_list = "<select class='form-control' id= 'department_list' name= 'department_list'><option value='' selected='selected'>Select</option>";
for ($i = 0; $i < sizeof($departments); $i++)
{
    $drop_list .= "<option value='".$departments[$i]."'>".$departments[$i]."</option>";
}
$drop_list .= "</select>";
echo $drop_list;
?>