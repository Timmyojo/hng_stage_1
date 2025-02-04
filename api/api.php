<?php

function num_api_call($number) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://numbersapi.com/{$number}/trivia");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}