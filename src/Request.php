<?php
namespace App;

class Request {
    public static function get($key, $default=null) {
        return isset($_GET[$key])? $_GET[$key] : $default;
    }

    public static function post($key, $default=null) {
        return isset($_POST[$key])? $_POST[$key] : $default;
    }
}