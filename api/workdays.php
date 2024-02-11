
<?php 

require_once '../config/connection.php';
require_once '../utils/jwt_utils.php';
require_once '../utils/utility.php';
require_once '../queries/workday_queries.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, OPTIONS, PATCH");
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
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $sql = get_all_workdays();
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $list_workdays = [];
        while($row = $result->fetch_assoc()) {
            $list_workdays[] = $row;
        }
        echo json_encode(array(
            'response' => true,
            'workdays' => $list_workdays
        ));
    } else {
        echo json_encode(array(
            'response' => true,
            'workdays' => []
        ));
    }
}else{
    http_response_code(400);
    echo json_encode(array('error' => 'Method not allowed'));
}

?>