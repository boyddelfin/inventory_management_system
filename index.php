<?php 
define('APP_DIR', __DIR__);
require APP_DIR."/back-end/loader.php";
include APP_DIR."/front-end/template/header.php";
// Page Template Start
if($sessions->is_set()) {
    include APP_DIR.'/front-end/dashboard.php';
} else {
    include APP_DIR.'/front-end/login.php';
}
// Page Template End
include APP_DIR."/front-end/template/footer.php";