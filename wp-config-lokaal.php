<?php

// ** MySQL settings - You can get this info from your web host ** //
define('DB_NAME', 'wordpress-startup');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');

/**
 * Waardes uit options table overrulen
 */
define( 'WP_HOME', 'http://wordpress.dev');
define( 'WP_SITEURL', WP_HOME);

/**
 * Debug en cache
 */
define( 'WP_DEBUG', true );
define( 'WP_CACHE', false );