<?php

function set_active($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function escape_like($string)
{
    $search = ['%', '_', '&'];
    $replace = ['\%', '\_', '\&'];

    return str_replace($search, $replace, $string);
}

function clean($string)
{
    $string = str_replace(' ', '-', $string);

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}