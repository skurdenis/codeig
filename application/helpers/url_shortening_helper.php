<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('encode_url')) {

    function encode_url($n) {
        return base_convert($n + 25600, 10, 36);
    }

}

if (!function_exists('decode_url')) {

    function decode_url($input) {
        return base_convert($input, 36, 10) - 25600;
    }

}