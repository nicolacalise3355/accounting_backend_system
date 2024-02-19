
<?php 

function get_insert_workday_query(){
    return "INSERT INTO `workdays` (`date`, `revenue`, `costs`) VALUES (?,?,?)";
}

function get_modify_workday_query($date, $revenue, $costs){
    return "UPDATE `workdays` SET `date` = '$date',`revenue` = $revenue,`costs` = $costs WHERE `date` = '$date'";
}

function get_all_workdays(){
    return "SELECT * FROM `workdays` WHERE 1 ORDER BY `date` DESC";
}

function get_delete_workday_query(){
    return "DELETE FROM `workdays` WHERE `date` = (?)";
}