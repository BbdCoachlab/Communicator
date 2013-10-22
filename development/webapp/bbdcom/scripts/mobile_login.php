<?php
    require('db/connectionScript.php');
    require('db/UserScript.php');
    require('db/NotificationScript.php');
    require('db/DepartmentScript.php');
    require('db/NomineeScript.php');
    require('db/Note_DepartmentScript.php');
    require('db/Department_UserScript.php');
    require('db/Department_Note_UserScript.php');
    
    $json_user_details = $_POST["TO BE IMPLEMENTED"];
    $user_details = json_decode($json_user_details);
    
    $name = $user_details["first_name"];
    $surname = $user_details["last_name"];
    $dob = $user_details["birth_date"];
    $email = $user_details["email_addresses"];
    $department = $user_details["department"];
    $user_id = $user_details["user_id"];
    $image = $user_details["mugshot_url"];
    
    if(isUser($user_id)){
        //update the user
        echo "is user";
    }else{
        //add user
        $returned = addUser($user_id, $name, $surname, $email, $image, $dob, $department);
        //echo $returned;
    }
    
?>