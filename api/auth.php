<?php

require_once '../config/connection.php';
require_once '../utils/jwt_utils.php';
require_once '../queries/auth_queries.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$data = json_decode(file_get_contents("php://input", true));
	
    $username = $data->username;
    $psw = $data->password;

	$sql = get_login_query($username);

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $psw_get = $row['password'];
            if($psw == $psw_get){
                $headers = array('alg'=>'HS256','typ'=>'JWT');
                $payload = array('username'=>$username, 'exp'=>(time() + 500));
        
                $jwt = generate_jwt($headers, $payload);
                
                echo json_encode(array('token' => $jwt));
            }else{
                http_response_code(400);
                echo json_encode(array('error' => 'Invalid Password'));
            }
        }
    } else {
        http_response_code(400);
        echo json_encode(array('error' => 'Invalid User'));
    }
}else{
    http_response_code(400);
    echo json_encode(array('error' => 'Method not allowed'));
}