
<?php 

require_once '../config/connection.php';
require_once '../utils/jwt_utils.php';
require_once '../utils/utility.php';
require_once '../queries/workday_queries.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, PUT, OPTIONS, PATCH");
header("Access-Control-Allow-Headers: Origin, X-Api-Key, X-Requested-With, Content-Type, Accept, Authorization");

check_header();

$bearer_token = get_bearer_token();
if(!$bearer_token) {
    http_response_code(401);
    echo json_encode(array('error' => 'No Authorization'));
    die();
}
$is_jwt_valid = is_jwt_valid($bearer_token);

if(!$is_jwt_valid){
    http_response_code(401);
    echo json_encode(array('error' => 'Invalid Token'));
    die();
}

$data = json_decode(file_get_contents("php://input", true));

if(
    !isset($data->date) ||  
    !isset($data->revenue) ||
    !isset($data->costs)
  ){
    http_response_code(400);
    echo json_encode(array('error' => 'Missing Data'));
    die();
  }
	
$date = $data->date;
$revenue = $data->revenue;
$costs = $data->costs;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$sql = get_insert_workday_query($date, $revenue, $costs);
    $result = $conn->query($sql);

    if ($result) {
        echo json_encode(array('response' => true));
    } else {
        http_response_code(400);
        echo json_encode(array('error' => 'Invalid Data'));
    }
}else if ($_SERVER['REQUEST_METHOD'] === 'PUT'){
	$sql = get_modify_workday_query($date, $revenue, $costs);
    $result = $conn->query($sql);

    if ($result) {
        echo json_encode(array('response' => true));
    } else {
        http_response_code(400);
        echo json_encode(array('error' => 'Invalid Data'));
    }
}else{
    http_response_code(400);
    echo json_encode(array('error' => 'Method not allowed'));
}

?>