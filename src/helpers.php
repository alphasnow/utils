<?php

/*
 * This file is part of the alphasnow/utils.
 * (c) alphasnow <wind91@foxmail.com>
 * This source file is subject to the MIT license that is bundled.
 */

if (!function_exists('snake_name')) {
    /**
     * Get snake name.
     *
     * @param string $name
     *
     * @return string
     */
    function snake_name($name)
    {
        if (!ctype_lower($name)) {
            $name = preg_replace('/\s+/u', '', $name);
            $name = preg_replace('/(.)(?=[A-Z])/u', '$1'.'_', $name);
            $name = mb_strtolower($name, 'UTF-8');
        }

        return $name;
    }
}

if (!function_exists('studly_name')) {
    /**
     * Get studly name.
     *
     * @param string $name
     *
     * @return string
     */
    function studly_name($name)
    {
        $name = ucwords(str_replace(['-', '_'], ' ', $name));
        $name = str_replace(' ', '', $name);

        return $name;
    }
}
