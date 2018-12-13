<?php

if (!function_exists('snake_name')) {
    /**
     * Get snake name
     *
     * @param $name
     * @return string
     */
    function snake_name($name)
    {
        if (!ctype_lower($name)) {
            $name = preg_replace('/\s+/u', '', $name);
            $name = preg_replace('/(.)(?=[A-Z])/u', '$1' . '_', $name);
            $name = mb_strtolower($name, 'UTF-8');
        }
        return $name;
    }
}

if (!function_exists('studly_name')) {
    /**
     * Get studly name
     *
     * @param $name
     * @return string
     */
    function studly_name($name)
    {
        $name = ucwords(str_replace(['-', '_'], ' ', $name));
        $name = str_replace(' ', '', $name);
        return $name;
    }
}