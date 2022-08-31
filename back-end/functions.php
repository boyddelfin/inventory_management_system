<?php

function assets_img_url($img) {
    echo APP_ASSETS.'/img/'.$img;
}

function _url($page) {
    return APP_DOMAIN."/".strtolower($page).'/';
}

function unslugify($str) {
    $remove_uscore = str_replace('_', ' ', $str);
    $title = preg_replace('/[^A-Za-z0-9\-_]/', ' ', $remove_uscore);

    return $title;
}