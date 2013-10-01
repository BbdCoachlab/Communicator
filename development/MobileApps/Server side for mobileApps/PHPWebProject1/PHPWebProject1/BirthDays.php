<?php
require 'ConDb.php';
$ev = new BirthDays();
$ev ->bday();
class BirthDays
{
public function bday()
{
      $db = new conectDB();
      $con =  $db->Opencon();
     // echo("one");
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
                  //  echo($json);
                             
                }
            }
          sqlsrv_close($con);
}

}

?>