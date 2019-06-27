<?php
    session_start();
$method = $_SERVER['REQUEST_METHOD'];
function getFormData($method) {
    if ($method === 'GET') return $_GET;
    if ($method === 'POST') return $_POST;
}

$formData = getFormData($method);
if(count($formData) > 0){
    require "api/SDK.php";
    $api = new SDK();
    $api->run($formData);
}
