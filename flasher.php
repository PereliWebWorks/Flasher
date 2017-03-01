<?php

class Flasher
{
    private static $MESSAGE_PREFIX = 'drewpereli_flash_messages';
    private static $types = array("success", "info", "warning", "danger");

    //Returns true if type is in self::types.
    static function has($type)
    {
        return isset($_SESSION[self::$MESSAGE_PREFIX][$type]);
    }

    //Returns true only if at least one flash message is set
    static function hasMessage()
    {
        foreach (self::$types as $type)
        {
            if (self::has($type)) return true;
        }
        return false;
    }

    //Echos flash message of "type" and unsets it.
    static function flash($type){
        echo self::get($type);
    }

    //Returns flash message of "type" and unsets it. 
    static function get($type)
    {
        if (!self::has($type)) {
            return null;
        }
        $value = $_SESSION[self::$MESSAGE_PREFIX][$type];
        unset($_SESSION[self::$MESSAGE_PREFIX][$type]);
        return $value;
    }

    //Returns flash message of "type" and doesn't unset it.
    static function peek($type)
    {
        if (!self::has($type)) {
            return null;
        }
        return $_SESSION[self::$MESSAGE_PREFIX][$type];
    }

    //Sets the flash message of "type" to "value"
    static function set($type, $value)
    {
        if (!self::has($type)) {
            return null;
        }
        $_SESSION[self::$MESSAGE_PREFIX][$type] = $value;
    }

    function __construct($extra_types){
        self::$types = array_merge(self::$types, $extra_types);
    }
}



