<?php


class HTTP_RESPONSE {

    static function invalid_token() {
        http_response_code(401);
        echo json_encode(array('error' => 'Invalid Token'));
    }

    static function response_ok(){
        http_response_code(200);
        echo json_encode(array('response' => true));
    }

    static function invalid_data(){
        http_response_code(400);
        echo json_encode(array('error' => 'Invalid Data'));
    }

    static function missing_data(){
        http_response_code(400);
        echo json_encode(array('error' => 'Missing Data'));
    }

    static function missing_authorization(){
        http_response_code(401);
        echo json_encode(array('error' => 'No Authorization'));
    }

    static function method_not_allowed(){
        http_response_code(405);
        echo json_encode(array('error' => 'Method not allowed'));
    }

}