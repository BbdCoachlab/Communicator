<?php

/**
 * RSVP short summary.
  
 * From the mobile application the users must be able to RSVP to the events , meetings and also specify their dietary.
 * This script will insert all the responses to the databases a
 *
 * @version 1.0
 * @author bbdnet1176
 */
   require 'ConDb.php';
   //pull form fields into php variables
   $comingN = $_Post['No'] ; // if the peroson is not attending the event
   $email = $_Post['email'] ; //
   $numOfPeople = $_Post['numOfPeople'] ;
   $comingY = $_Post['Diet'] ;
//calling the method to add the data to the database. 
 
class RSVP
{
   public function repsonse($comingN , $email , $numOfPeople , $comingY)
   {
         // connecting to the database
          $db = new conectDB();
          $con =  $db->Opencon();
     
   if(strcmp ( $comingN, 'No') == 0 ) // the strings are equal so it's a "NO" / not attending 
   {
          $notificationQuery = "Insert into table Values(..);"; // new database tables have not yet been updated
          $result = sqlsrv_query($con,$notificationQuery);
   
   }else  // strings are equal so it is a "Yes" / they are attending 
   {
   
          $notificationQuery = "Insert into table Values(..);"; // new database tables have not yet been updated
          $result = sqlsrv_query($con,$notificationQuery);
   }
    sqlsrv_close($con); // terminating the connection to the database
   }
}
