
<?php 

function get_insert_workday_query($date, $revenue, $costs){
    return "INSERT INTO `workdays` (`date`, `revenue`, `costs`) VALUES ('$date',$revenue,$costs)";
}

function get_modify_workday_query($date, $revenue, $costs){
    return "UPDATE `workdays` SET `date` = '$date',`revenue` = $revenue,`costs` = $costs WHERE `date` = '$date'";
}