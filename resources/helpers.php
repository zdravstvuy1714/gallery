<?php

if (! function_exists('navbar_active_link')) {
    /**
     * Sets the menu item class for an active route.
     *
     * @param $routes
     * @param bool $condition
     * @return string
     */
    function navbar_active_link($routes, bool $condition = true): string
    {
        return call_user_func_array([app('router'), 'is'], (array) $routes) && $condition ? 'is-active' : '';
    }
}

if (! function_exists('is_navbar_active_link')) {
    /**
     * Sets the menu item class for an active route.
     *
     * @param $routes
     * @param bool $condition
     * @return string
     */
    function is_navbar_active_link($routes, bool $condition = true): string
    {
        return call_user_func_array([app('router'), 'is'], (array) $routes) && $condition ? true : false;
    }
}

if (! function_exists('limit_str')) {
    /**
     * Sets the menu item class for an active route.
     *
     * @param $string
     * @param $count
     * @return string
     */
    function limit_str($string, $count): string
    {
        return \Illuminate\Support\Str::limit($string, $count, '...');
    }
}

if (! function_exists('current_user')) {
    /**
     * Sets the menu item class for an active route.
     *
     * @param $attribute
     * @return string
     */
    function current_user($attribute=null)
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        return $attribute ? $user->$attribute : $user;
    }
}

if (! function_exists('getImageResolution')) {
    /**
     * Sets the menu item class for an active route.
     *
     * @param $image
     * @return string
     */
    function getImageResolution($image)
    {
        $sizes = getimagesize($image);

        return $sizes[0] . 'x' . $sizes[1];
    }
}

if (! function_exists('uploadImage')) {
    /**
     * Sets the menu item class for an active route.
     *
     * @param $image
     * @param $storage
     * @return string
     */
    function uploadImage($image, $storage)
    {
        return $image->store($storage);
    }
}
