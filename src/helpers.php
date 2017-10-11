<?php
/**
 * Date: 2017/10/11
 * Time: 1:35
 * User: weifeng
 * Mail: xcxxkj@aliyun.com
 */

if(! function_exists('snake_name')){
    function snake_name($name)
    {
        if (! ctype_lower($name)) {
            $name = preg_replace('/\s+/u', '', $name);
            $name = preg_replace('/(.)(?=[A-Z])/u', '$1'.'_', $name);
            $name = mb_strtolower($name, 'UTF-8');
        }
        return $name;
    }
}

if(! function_exists('studly_name')){
    function studly_name($name)
    {
        $name = ucwords(str_replace(['-', '_'], ' ', $name));
        $name = str_replace(' ', '', $name);
        return $name;
    }
}