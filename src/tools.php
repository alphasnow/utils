<?php

if(! function_exists('dd')){
    function dd($name)
    {
        var_dump($name);
        die;
    }
}