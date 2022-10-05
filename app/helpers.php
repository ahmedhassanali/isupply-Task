<?php


if (!function_exists('responseJson')) {
    function responseJson($status, $message, $data = null)
    {
        return [
            "status" => $status,
            "message" => $message,
            "data" => $data,
        ];
    }
}