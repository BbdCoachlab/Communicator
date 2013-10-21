<?php
require 'ConDb.php';
$ev = new BirthDays();
$ev ->bday();
class BirthDays
{
<<<<<<< HEAD

// Get birthday messages from the database
=======
>>>>>>> 76ce60b8e214748d964158fb8f40795d3afe9915
public function bday()
{
      $db = new conectDB();
      $con =  $db->Opencon();
      // Birthday table is still to be added to the database.
           $BirthDayQuery = "SELECT * FROM dbo.birthdays;";
           $result = sqlsrv_query($con, $BirthDayQuery);
           if(!$result)
            {
         echo("Query failed");
            }
            else
            {
                while($note = sqlsrv_fetch_array($result))
                {                
                    $json = json_encode($note);
                                              
                }
            }
          sqlsrv_close($con);
}

}

?>