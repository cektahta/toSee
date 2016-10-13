<?php
class ArrReader
{
    public static function getFromArray($array, $key, $default = "")
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }
}