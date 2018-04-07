<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sofiascoutkar');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'A@m*($ack,Twov9QRua?Ryj-N(yc~>@igKMXJZ{MlbR!g9 U/hyrwk.[VQ!rPad#');
define('SECURE_AUTH_KEY',  '6sFA4?M;z_FWpH:o0#F8Cmy$U?C*!Cfi7l<^#b?nL` L3f,k|O.2%M+<_i%r#oT/');
define('LOGGED_IN_KEY',    '<lu-ZO6WlscP]wju~E9wOEWZOkJ9>ZWC/C:_GyUb%^g2/Z)ICFVkF#/CJKL@V?4p');
define('NONCE_KEY',        'B@K0o}[kLK?l%#5U.TG{3Rtmwv6u-/tXet_j`Ub>q:BHvPWyW(Agm6s)/HIE?7|T');
define('AUTH_SALT',        'j7ZkA8tp_~_n{*gj,Pj5lW3/JY6{&Bz`xoPqkdOo,)25C~Po+8A9|rgoBy2F*qh%');
define('SECURE_AUTH_SALT', 'iLF^@GnH>1S_RIeEh @X}4PQ8Ve9IfhfTOp_>_*UTF9Ai_Lv&B`ZGB72{qX^rn7-');
define('LOGGED_IN_SALT',   'KJf0}vi!G3GKgL^U%A_D#]RE/b dwsOD1.HEbJ&u3GK6N=!GE@;J|Ek:5@`:TiU.');
define('NONCE_SALT',       'R~#*^#dgPr2<SS{tDU{bSI0H</Jb`/h]q0>$%` &:LbOKd-f(+M[v*gR}iwpqev.');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
