<?php
namespace App;

class Form {
    public static function input ($type, $name, $value='', $class='', $placeholder='') {
        return "<input type='$type' name='$name' value='$value' class='$class' placeholder='$placeholder'>";
    }

    public static function submit($value='Submit') {
        return "<input type='submit' value='$value'>";
    }

    public static function textarea($name, $value='', $class='', $placeholder='') {
        return "<textarea name='$name' class='$class' placeholder='$placeholder'>$value</textarea>";
    }
}