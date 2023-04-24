<?php

if (!function_exists('user')) {
    function user()
    {
        if (session()->has('active_user')) {
            return session()->get('active_user');
        } else {
            return null;
        }
    }
}
