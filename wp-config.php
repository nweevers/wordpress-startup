<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

if( eregi("acceptatie\.onli\.nl", $_SERVER['SERVER_NAME']) ) {

	require_once(dirname(__FILE__) . '/wp-config-test.php');

} elseif( eregi("wordpress.dev", $_SERVER['SERVER_NAME']) ) {

	require_once(dirname(__FILE__) . '/wp-config-lokaal.php');

} else {

	require_once(dirname(__FILE__) . '/wp-config-live.php');

}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define( 'DISALLOW_FILE_EDIT', true);


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'VPH-5q=#jAc3g[1;z<C$^ZeuR%&aF!P7tQ[Wp1yb;]+3$U;75L7[Exa1.}RNdS+4');
define('SECURE_AUTH_KEY',  'p-6BWE r,v/1_%K#C;gK-p]eVIC!%Y+<EMad1eRKJ.)_49@fr{6FIF?W$J71A]N@');
define('LOGGED_IN_KEY',    '|V{3[ww:uR}6^+RtRK^[gqnM|r<4!~@2t/Z$SSw8[iCW$_I(2mbu6--p60ar-|`$');
define('NONCE_KEY',        'F^!D.7%AD{G}F*m![0k)NF!OPK(_SYIY2?Y:8W>39T4I-TR#b%ku.}xOs?TTu= q');
define('AUTH_SALT',        ']692x3,%VNmR{:9t]^X8)I>z(Y400 0<}XsizhiRY`=W L%yr7[+q,)jxRlpoVhS');
define('SECURE_AUTH_SALT', 'eiK]d5u :|z+K!ooM:lqU&+Fik%eWP-[E61KfQiFU_Ar(O3d6I8sU+x|wv]>R=V-');
define('LOGGED_IN_SALT',   '-G4r)81+&~dKA@ItrDqOA2zE?XK0$es<m?4.;!?OL!fZZb>1*|]AKb8%mI]XQ;Un');
define('NONCE_SALT',       'Z8fQ+SRish#E[_k@J+*@MGgPnaP0aWa&B%ig5 xkpF,M6Jy|-i3S,9?J8xMFp=mj');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'nl_NL');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
