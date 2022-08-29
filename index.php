<?php 

define('APP_DIR', __DIR__);
require APP_DIR."/back-end/loader.php";
require APP_DIR."/front-end/template/header.php";
// Page Template Start
if(!isset($_SESSION['id'])) {
    $sessions->destroy();
    require_once APP_DIR.'/front-end/login.php';
} else {
    require_once APP_DIR.'/front-end/dashboard.php';
}
// Page Template End
require APP_DIR."/front-end/template/footer.php";