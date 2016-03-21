<?php

// ** MySQL settings - You can get this info from your web host ** //
define('DB_NAME', 'user_main');
define('DB_USER', 'user_main');
define('DB_PASSWORD', '1234567');
define('DB_HOST', 'localhost');

/**
 * Waardes uit options table overrulen
 */
define( 'WP_HOME', 'http://acceptatie.onli.nl/domein.nl/www');
define( 'WP_SITEURL', WP_HOME);

/**
 * Debug en cache
 */
define( 'WP_DEBUG', false );
define( 'WP_CACHE', true );

define('FTP_USER', 'onli'); // Your FTP username
define('FTP_PASS', 'BBAHcF3d'); // Your FTP password
define('FTP_HOST', 'ftp.onli.nl:21'); // Your FTP URL:Your FTP port
