<?php

/**
 * birthday_list short summary.
 *
 * birthday_list description.
 *
 * @version 1.0
 * @author Bandile
 */
    //get json encoded list of the next five upcoming birthdays
    $birthdayJsonList = firstFiveBirthdays();
    $birthdayList = json_decode($birthdayJsonList);
    //each element of the above json decoded list is also json encoded, now we loop through each element json_decode and display the results
    for($i = 0; $i < sizeof($birthdayList); $i++){
        $birthdayItem = json_decode($birthdayList[$i], true);
        $date = $birthdayItem['birthday'][1]."/".$birthdayItem['birthday'][2];
        $departments = "";
        $departList = $birthdayItem['departments'];
        for($j = 0; $j < sizeof($departList); $j++){
            $departments = " ".$departments.$departList[$j];
        }
        //var_dump($birthdayItem);
        echo "<h4>".$birthdayItem['name']." ".$birthdayItem['surname']."</h4>";
        echo "<h5>".$date[0].": Departments - ".$departments."</h5>";
        echo "<p>----------------</p>";              
        
    }
    //var_dump(json_decode($birthdayList[0], true));
?>