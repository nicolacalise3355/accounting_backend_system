<?php 

$configs = include('../config/config.php'); //use configuration to prevent pass_header

function check_header() {
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        header('HTTP/1.1 200 OK');
        exit();
    }
}