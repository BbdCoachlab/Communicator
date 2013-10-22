<?php
    require('db/connectionScript.php');
    require('db/UserScript.php');
    require('db/NotificationScript.php');
    require('db/DepartmentScript.php');
    require('db/NomineeScript.php');
    require('db/Note_DepartmentScript.php');
    require('db/Department_UserScript.php');
    require('db/Department_Note_UserScript.php');
    require('db/RegistrationID_Script.php');
    
    $json_registration_details = $_POST["TO BE IMPLEMENTED"];
    $registration_details = json_decode($json_user_details);
    
    $id_user = $registration_details["user_id"];
    $registrationID = $registration_details["registration_id"];
    
    ////add device registration id if it does not already exist for this user
        if(!existingRegistration($id_user, $registrationID)){
            addRegistrationID($id_user, $registrationID);
        }
?>