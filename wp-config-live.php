<?php

// ** MySQL settings - You can get this info from your web host ** //
define('DB_NAME', 'user_main');
define('DB_USER', 'user_main');
define('DB_PASSWORD', '1234567');
define('DB_HOST', 'localhost');

/**
 * Waardes uit options table overrulen
 */
define( 'WP_HOME', 'http://www.domein.nl');
define( 'WP_SITEURL', WP_HOME);

/**
 * Debug en cache
 */
define( 'WP_DEBUG', false );
define( 'WP_CACHE', true );

define('FTP_USER', 'user'); // Your FTP username
define('FTP_PASS', '1234567'); // Your FTP password
define('FTP_HOST', 'ftp.domein.nl:21'); // Your FTP URL:Your FTP port