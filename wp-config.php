<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'demo' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');
/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '2| TzY%O/RjB3s`/VPu-sy1%khZ*QH+7(rEL%N9aq&_(otEG#pA4GsI57o`[Mi+D' );
define( 'SECURE_AUTH_KEY',  '2{0wvQ-Swq L9]m4c;;2zJK,YjiPOy-ZpXeJdr9[V/~/N,|fyZLlen>/n>$W$cnt' );
define( 'LOGGED_IN_KEY',    '&7R3/Ap6|6TJ(?L]#!.cxv_b$ogu>CFs,B-;T-Ni0j(2yNR-Wk9*^~($F;0OP0oJ' );
define( 'NONCE_KEY',        'BqfP[(`[Bn_3d +PzeWZ;7p{o9(;ChwTc Mz[PIyUrLfCrZjib<*;v@Gh)1[dZI&' );
define( 'AUTH_SALT',        'jGhfqK/P4JdQ-qkB.VmU3we}.V]{aHrqbXVPD|C>xP#`gR[C!h*4)GO$I8g=2n2;' );
define( 'SECURE_AUTH_SALT', 'F{h-iPSeX/>e0f_y:Qlfs>#k|Ij^>62j,b&,-q453JrZHoZg;C}X?Fre1;fC?*GT' );
define( 'LOGGED_IN_SALT',   '+zL1}s a2|K#NH7f8=:C6y*m_a9:nNw?4+).+:tt h23?+KN@B1@Ug2jMm3-itJf' );
define( 'NONCE_SALT',       'XiRyNoev%RoVl.`?@%:t%aNXc{HqgpHRdAT>h7]KyXsm1yx2<6|227|_y<>pB+.b' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
