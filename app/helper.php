<?php

if(!function_exists("format_array"))
{
    function format_array($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
        die;
    }
}