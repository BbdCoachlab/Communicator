<?php
    function addRegistrationID($id_user, $registration_id){
        //connecting to the server and database
        $conn = connectToDB();
        
        //Inserting a user into the database
        $insertQuery = "INSERT INTO [Registration_ID] (User_id_user, registration_id) 
                        VALUES (?,?);";
        $insertStatement = sqlsrv_query($conn, $insertQuery, array($id_user,$registration_id));
        if($insertStatement===false){
            echo "error RegistrationID_Script.php : Registration insertion failed -> ";
            die(print_r(sqlsrv_errors(), true));
        }
        //free statement
        sqlsrv_free_stmt($insertStatement);
        //close connection
        sqlsrv_close($conn);
        return "adding registration successful";
    }
    
    function existingRegistration($id_user, $registration_id){
         //connect to the server
        $conn = connectToDB();
        //check if registration is in database
        $selectQuery = "SELECT * FROM [Registration_ID] 
                        WHERE User_id_user = ? AND registration_id = ?;";
        $selectStatement = sqlsrv_query($conn,$selectQuery,array($id_user, $registration_id));
        if($selectStatement === false){
            echo "error RegistrationID_Script.php : checking if registration exists has failed -> ";
            die(print_r(sqlsrv_errors(), true));
        } else {
            $results = sqlsrv_fetch_array($selectStatement);
        
            //return false if registration query is null
            if ($results[0]==null){
        	    sqlsrv_free_stmt($selectStatement);
                sqlsrv_close($conn);
                return false;
            }
            
            //return true if registration query is not null
            sqlsrv_free_stmt($selectStatement);
            sqlsrv_close($conn);
            return true;
        }
    }
?>