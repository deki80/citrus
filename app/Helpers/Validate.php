<?php

namespace Citrus\Helpers;

class Validate
{
    public static function sanitaze($data)
    {
        $data = strip_tags($data);
        return $data;
    }
}
