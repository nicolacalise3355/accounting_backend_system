
<?php 

require_once '../config/connection.php';
require_once '../utils/jwt_utils.php';
require_once '../queries/workday_queries.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

$bearer_token = get_bearer_token();
$is_jwt_valid = is_jwt_valid($bearer_token);

if(!$is_jwt_valid){
    http_response_code(401);
    echo json_encode(array('error' => 'Invalid Token'));
    die();
}

?>