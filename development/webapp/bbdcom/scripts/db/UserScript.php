<?php

function addUser($id_user, $name, $surname, $email, $profile_pic_url, $birthdate, $department) {
    //connecting to the server and database
    $conn = connectToDB();

    //Inserting a user into the database
    // $insertQuery = "INSERT INTO [User] (id_user, name, surname, email, profile_pic_url, birthdate) VALUES (?,?,?,?,?,?);";
    //$insertQuery = "INSERT INTO User (id_user, name, surname, email, profile_pic_url, birthdate)VALUES ('$id_user', '$name','$surname','$email','$profile_pic_url','$birthdate')";
    //prepare insert statement 
    $insertStmt = mysqli_prepare($conn, "INSERT INTO User (id_user, name, surname, email, profile_pic_url, birthdate) VALUES (?, ?, ?, ?,?,?)");
    mysqli_stmt_bind_param($insertStmt, 'ssssss', $id_user, $name, $surname, $email, $profile_pic_url, $birthdate);


    //execute prepared statement
    mysqli_stmt_execute($insertStmt);

    //close statement
    mysqli_stmt_close($insertStmt);


    //check if user's department exists if not add the department
    if (!isDepartment($conn, $department)) { //DepartmentScript.php
        addDepartment($conn, $department); //DepartmentScript.php
    }

    //get department id
    $id_department = getDepartmentID($conn, $department); //DepartmentScript.php
    //link new user and (new)department
    linkDepartmentAndUser($conn, $id_department, $id_user); //Department_UserScript.php
    //increase department size
    //increaseDepartmentSize($conn, $id_department); //DepartmentScript.php //CHANGE LATER 
	
    //close connection 
    mysqli_close($conn);
    return "adding user successful";
}

function isUser($id_user) {
    //connect to the server
    $conn = connectToDB();

    //prepare select statement
    if ($selectStmt = mysqli_prepare($conn, "SELECT name FROM User WHERE id_user=?")) {

        //bind parameters 
        mysqli_stmt_bind_param($selectStmt, "s", $id_user);

        //execute query
        mysqli_stmt_execute($selectStmt);

        //bind result variable
        mysqli_stmt_bind_result($selectStmt, $resultName);

        //fetch value
        mysqli_stmt_fetch($selectStmt);
        if ($resultName == null) {
            //free statement, close connection 
            mysqli_stmt_close($selectStmt);
            mysqli_close($conn);

            return false;
        }
        //free statement, close connection 
        mysqli_stmt_close($selectStmt);
        mysqli_close($conn);
        return true;
    }
}

//retreive first five birthdays
function firstFiveBirthdays() {
    //connect to the server
    $currentMonth = date("n");
    $currentDay = date("j");
    $conn = connectToDB();

    //select first five birthdays
    //date name surname
    //prepare select statement
    $selectStmt = mysqli_prepare($conn, "SELECT id_user, birthdate, name, surname FROM User WHERE (DAYOFMONTH(birthdate) = ? AND MONTH(birthdate) = ?)");
	
	if($selectStmt===false){
        echo "error UserScript : Fetching Birthdays failed -> ";
        die(print_r(mysqli_error(), true));
	}

        //bind parameters 
        mysqli_stmt_bind_param($selectStmt, "ss", $currentDay, $currentMonth);

        //execute query
        mysqli_stmt_execute($selectStmt);

        //bind result variables
        mysqli_stmt_bind_result($selectStmt, $id, $birthdate, $name, $surname);

        //fetch values
        $outputarray = array();

		while (mysqli_stmt_fetch($selectStmt)){
			$userDepartmentListNames = array();
			$userDepartmentListIDs = getUserDepartmentList($conn, $id);
			for ($i = 0; $i < count($userDepartmentListIDs); $i++) {
                array_push($userDepartmentListNames, getDepartmentName($conn, $userDepartmentListIDs[$i]));
            }
			$results['user_id'] = $id;
			$results['name'] = $name;
			$results['surname'] = $surname;
			$results['birthday'] = explode("-",$birthdate);
            $results['departments'] = $userDepartmentListNames;
            //array_push($results, array('departments' => $userDepartmentListNames));
            array_push($outputarray, json_encode($results));
		}

        /*while ($results = mysqli_fetch_array($selectStmt, MYSQL_ASSOC)) {
            $userDepartmentListNames = array();
            $userDepartmentListIDs = getUserDepartmentList($conn, $results['id_user']);
            for ($i = 0; $i < count($userDepartmentListIDs); $i++) {
                array_push($userDepartmentListNames, getDepartmentName($conn, $userDepartmentListIDs[$i]));
            }
            $results['departments'] = $userDepartmentListNames;
            //array_push($results, array('departments' => $userDepartmentListNames));
            array_push($outputarray, json_encode($results));
        }*/
        mysqli_stmt_close($selectStmt);
        mysqli_close($conn);
        return json_encode($outputarray);
}

//retrieve all birthdays
function getAllBirthdays() {
    //connect to the server
    $today = date("m/d/Y");
    $conn = connectToDB();
    //select first five birthdays
    //date name surname department
    $selectQuery = "SELECT id_user, birthdate, name, surname FROM User WHERE birthdate = ?";

    $selectStmt = mysqli_prepare($conn, $selectQuery);

    //bind parameters 
    mysqli_stmt_bind_param($selectStmt, "s", $today);

    //execute query
    mysqli_stmt_execute($selectStmt);

    //bind result variable
    mysqli_stmt_bind_result($selectStmt, $resultName);

    //fetch value
    mysqli_stmt_fetch($selectStmt);


    $outputarray = array();
    $userDepartmentListNames = array();
    while ($results = mysqli_fetch_array($selectStmt, MYSQLI_ASSOC)) {
        $userDepartmentListIDs = getUserDeparmentList($conn, $results['id_user']);
        for ($i = 0; $i < count($userDepartmentListIDs); $i++) {
            array_push($userDepartmentListNames, getDepartmentName($conn, $userDepartmentListIDs[$i]));
        }
		$results['departments'] = $userDepartmentListNames;
        //array_push($results, array("departments" => $userDepartmentListNames));
        array_push($outputarray, json_encode($results));
    }
    mysqli_stmt_close($selectStmt);
    mysqli_close($conn);
    return json_encode($outputarray);
}

//get user name and surname
function getUserNameAndSurname($conn, $id_user) {
    $selectQuery = "SELECT name, surname FROM User WHERE id_user = ?";
     $selectStmt = mysqli_prepare($conn, $selectQuery);
    //bind parameters 
    mysqli_stmt_bind_param($selectStmt, "s", $id_user);
  
    //execute query
    mysqli_stmt_execute($selectStmt);

    $outputarray = mysqli_fetch_array($selectStmt);
    mysqli_stmt_close($selectStmt);
    return $outputarray;
}

//remove user
//update user 
?>

