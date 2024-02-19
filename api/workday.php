
<?php 

require_once '../config/connection.php';
require_once '../utils/jwt_utils.php';
require_once '../utils/utility.php';
require_once '../utils/http_req.php';
require_once '../utils/http_resp.php';
require_once '../queries/workday_queries.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, PUT, OPTIONS, PATCH, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Api-Key, X-Requested-With, Content-Type, Accept, Authorization");

check_header();

$bearer_token = get_bearer_token();
if(!$bearer_token) {
    HTTP_RESPONSE::missing_authorization();
    die();
}
$is_jwt_valid = is_jwt_valid($bearer_token);

if(!$is_jwt_valid){
    HTTP_RESPONSE::invalid_token();
    die();
}

$data = json_decode(file_get_contents("php://input", true));

if(
    !isset($data->date)
  ){
    HTTP_RESPONSE::missing_data();
    die();
  }
	
$date = $data->date;
$revenue = $data->revenue ?? 0;
$costs = $data->costs ?? 0;

if ($_SERVER['REQUEST_METHOD'] === HTTP_REQ::POST) {
    $stmt = $conn->prepare(get_insert_workday_query());
    $result = $stmt->execute([$date, $revenue, $costs]);

    if ($result) {
        HTTP_RESPONSE::response_ok();
    } else {
        HTTP_RESPONSE::invalid_data();
    }
}
else if ($_SERVER['REQUEST_METHOD'] === HTTP_REQ::PUT){
    //TO IMPLEMENT
    $result = true;

    if ($result) {
        HTTP_RESPONSE::response_ok();
    } else {
        HTTP_RESPONSE::invalid_data();
    }
}else if($_SERVER['REQUEST_METHOD'] === HTTP_REQ::DELETE){

    $stmt = $conn->prepare(get_delete_workday_query());
    $result = $stmt->execute([$date]);

    if ($result) {
        HTTP_RESPONSE::response_ok();
    } else {
        HTTP_RESPONSE::invalid_data();
    }
}
else{
    HTTP_RESPONSE::method_not_allowed();
}

?>