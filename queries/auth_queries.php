
<?php 

function get_login_query($codice) {
    return "SELECT * FROM `users` WHERE `username` = '$codice' LIMIT 1";
}