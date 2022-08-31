<?php
// CHANGE THIS PROD | STAGE
define('DB_STATUS', 'STAGE');

// =====================================================
// ================== STAGING DATABASE =================
// =====================================================
// Staging Database Host
define('SDB_HOST', 'localhost');

// Staging Database Name
define('SDB_NAME', 'vadjr_inventory_db');

// Staging Database Username
define('SDB_USER', 'root');

// Staging Database Password
define('SDB_PASS', '');


// =====================================================
// ================ PRODUCTION DATABASE ================
// =====================================================
// Staging Database Host
define('DB_HOST', 'localhost');

// Staging Database Name
define('DB_NAME', 'kvbkzpks_ims');

// Staging Database Username
define('DB_USER', 'kvbkzpks_ims');

// Staging Database Password
define('DB_PASS', '&UUNWX??v)_e');

// =====================================================
// ================ APPLICATION DETAILS ================
// =====================================================
// Application Name
define('APP_NAME', 'Inventory System');

// Application Author
define('APP_AUTHOR', 'Virgilio A. Delfin Jr.');

// Application Domain
define('APP_DOMAIN', 'http://'.$_SERVER['SERVER_NAME'].'/inventory_management_system');

// Application Assets Directory
define('APP_ASSETS', APP_DOMAIN.'/front-end/template/assets');