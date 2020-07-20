<?php
// MUTE NOTICES
error_reporting(E_ALL & ~E_NOTICE);
 
// DATABASE SETTINGS - CHANGE THESE TO YOUR OWN
define('DB_HOST', 'trgc-mysql.mysql.database.azure.com');
define('DB_NAME', 'trgcdev');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'student');
define('DB_PASSWORD', 'T0r0nt057');

// FILE PATH
define('PATH_LIB', __DIR__ . DIRECTORY_SEPARATOR);
?>