<?php

header("content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Oringin: *");
require_once('api.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$query = parse_url($_SERVER['REQUEST_URI'])['query'];
parse_str($query, $bk);

$number = $bk['number'];

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    header("ALLOW: GET");
    die();


} 

if ($uri === "/api/classify-number") {

    $int_number = intval($number);
    $num_length = strlen($number);
    $digit_sum = 0;
    $sum_of_powers = 0;
    $is_perfect = false;
    $is_prime = false;
    $properties = [];

    if ($int_number <= 0) {
        http_response_code(400);
        echo json_encode([
            "number" => $number,
            "error" => true
        ]);
        die();
    }

    for ($i=0; $i < $num_length; $i++) {
        $sum_of_powers += pow($number[$i], $num_length);
        $digit_sum += $number[$i];
    }

    for ($i=2; $i < $int_number; $i++) {
        if ($int_number === 1) {
            $is_prime = false;
            break;
        }
        if ($int_number % $i === 0) {
            $is_prime = false;
            break;
        }
        $is_prime = true;

    }

    $perferct_sum = 0;
    for ($i=1; $i < $int_number; $i++) {
        if ($int_number % $i === 0) {
            $perferct_sum += $i;
        }
        $is_perfect = ($perferct_sum === $int_number);

    }
    
    if ($int_number === $sum_of_powers) {
        $properties[] = 'armstrong';
    }
    
    if ($int_number % 2 !== 0) {
        $properties[] = 'odd';
    }

    $fun_fact = num_api_call($int_number);

    echo json_encode([
            "number" => $int_number,
            "is_prime" => $is_prime,
            "is_perfect" => $is_perfect,
            "properties" => $properties,
            "digit_sum" => $digit_sum,
            "fun_fact" => $fun_fact 
        ]);
        die();
} else {
    http_response_code(404);
}