<?php

require_once(__DIR__ . "/../src/RequestLogger.php");

// Test Values
$_SERVER['REMOTE_ADDR'] = '192.168.1.1';
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI'] = '/';
$filename = __DIR__ . "/../src/request_log.log";

unlink($filename);

try {
    RequestLogger\logRequest();
    $message = file_get_contents($filename);
    if(strpos($message, '192.168.1.1') === false) throw new Exception("IP Not found");
    if(strpos($message, 'GET') === false) throw new Exception("Request method not found");
    if(strpos($message, 'GET /') === false) throw new Exception("Request uri not found");
    echo "TEST SUCCEEDED 1/1 tests";
} catch (Exception $e) {
    echo "TEST FAILED - " . $e->getMessage();
}