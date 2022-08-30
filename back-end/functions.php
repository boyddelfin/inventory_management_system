<?php

function assets_img_url() {
    echo APP_ASSETS.'/images/';
}

function load_page() {
    $url = explode("/", $_SERVER['QUERY_STRING']);
    $sessions = new Sessions();
    if($sessions->is_set()) {

        if(has_page($url[0])) {
            include APP_DIR.'/front-end/'.$url[0].'.php';
        } elseif($url[0] == ''){
            include APP_DIR.'/front-end/dashboard.php';
        } else {
            include APP_DIR.'/front-end/404.php';
        }

    } else {

        include APP_DIR.'/front-end/login.php';

    }
}

function has_page($file_name) {
    $dir = APP_DIR."/front-end";
    $search_file = array_search(strtolower($file_name).'.php', scandir($dir));

    if(strtolower($file_name) == 'login') {
        return false;
    }
    
    return $search_file;
}
has_page('hehe');

function _url($page) {
    echo APP_DOMAIN."/".strtolower($page);
}