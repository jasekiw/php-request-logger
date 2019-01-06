<?php
namespace RequestLogger;

use DateTime;

/**
 * Polyfill getallheaders for nginx backends since getallheaders is apache specific.
 */
if (!function_exists('getallheaders'))
{
    function getallheaders()
    {
        $headers = array ();
        foreach ($_SERVER as $name => $value)
        {
            if (substr($name, 0, 5) == 'HTTP_')
            {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}

/**
 * Log the current request
 * @param string $filename
 * @return bool A boolean indicating success.
 * @throws \Exception If the server cannot determine the date then an Exception will be thrown.
 */
function logRequest($filename = "") {
    if(!$filename) $filename = __DIR__ . "/request_log.log";
    $message = "";
    $date = new DateTime('America/New_York');
    $message .= sprintf('%s - - [%s] "%s %s"' . PHP_EOL,
        $_SERVER['REMOTE_ADDR'],
        $date->format("d/M/Y:H:i:s"),
        $_SERVER['REQUEST_METHOD'],
        $_SERVER['REQUEST_URI']
    );
    foreach (getallheaders() as $name => $value) {
        $message .= "Header - $name: $value\n";
    }
    return (bool)file_put_contents($filename, $message, FILE_APPEND);
}