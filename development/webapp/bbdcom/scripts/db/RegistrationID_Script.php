<?php
    function addRegistrationID($id_user, $registration_id){
        //connecting to the server and database
        $conn = connectToDB();
        
        //Inserting a user into the database
        $insertQuery = "INSERT INTO [Registration_ID] (User_id_user, registration_id) 
                        VALUES (?,?);";
        $insertStatement = mysqli_prepare($conn, $insertQuery);
        if($insertStatement===false){
            echo "error RegistrationID_Script.php : Registration insertion failed -> ";
            die(print_r(mysqli_error(), true));
        }
		//bind parameters and execute queries
		mysqli_stmt_bind_param($insertStatement,"ss",$id_user,$registration_id);
		mysqli_stmt_execute($insertStatement);
		//close statement and connection
		mysqli_stmt_close($insertStatement);
		mysqli_close($conn);
        return "adding registration successful";
    }
    
    function existingRegistration($id_user, $registration_id){
         //connect to the server
        $conn = connectToDB();
        //check if registration is in database
        $selectQuery = "SELECT * FROM Registration_ID 
                        WHERE User_id_user = ? AND registration_id = ?;";
        $selectStatement = mysqli_prepare($conn,$selectQuery);
        if($selectStatement === false){
            echo "error RegistrationID_Script.php : checking if registration exists has failed -> ";
            die(print_r(mysqli_error(), true));
        } else {
		
			mysqli_stmt_bind_param($selectStatement,"ss",$id_user, $registration_id);
			mysqli_stmt_execute($selectStatement);
			//fetch results
			mysqli_stmt_bind_result($selectStatement, $res_id_User, $res_registration_id);
			mysqli_stmt_fetch($selectStatement);
			
			if($res_id_User == null){
				mysqli_stmt_close($selectStatement);
				mysqli_close($conn);
				return false;
			}
			
			//return true if registration query is not null
			mysqli_stmt_close($selectStatement);
			mysqli_close($conn);
			return true;
        }
    }
?>