<?php
/**
 * Created by PhpStorm.
 * User: Bhargav
 * Date: 3/17/2019
 * Time: 10:37 PM
 */

namespace App\traits;

trait UrlGenerator
{
    /**
     * @param $string
     * @return mixed|string|string[]|null
     */
    protected function generate($string)
    {
        $string = str_replace(' ', '-', $string);
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
        $string = strtolower($string);
        return $string;
    }
}
