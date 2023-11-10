<?php

abstract class AbstractModel
{
    public static function fetchAllData()
    {
        return static::$data;
    }
}