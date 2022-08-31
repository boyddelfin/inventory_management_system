<?php 
define('APP_DIR', __DIR__);
require APP_DIR."/back-end/loader.php";
include APP_DIR."/front-end/template/header.php";
// Page Template Start
$system->load();
// Page Template End
include APP_DIR."/front-end/template/footer.php";