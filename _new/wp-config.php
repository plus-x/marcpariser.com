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
define('DB_NAME', 'wp_marcpariser_new');

/** MySQL database username */
define('DB_USER', 'wpmarcparisernew');

/** MySQL database password */
define('DB_PASSWORD', 'marcpar1ser!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define( 'WP_MEMORY_LIMIT', '256M' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '90pmwRE30bqP@]a|KY]W@)AZu$s1W45Qpius{FJkv|GOA91jS)Q-LpqEIXS$EAtU');
define('SECURE_AUTH_KEY',  '<y+_2Zw`}r,Ia%.dc7<<S3#Ya<$.L/(&3/uvM8[|y5IJ>-qv4EmFCt$_IwC O{/8');
define('LOGGED_IN_KEY',    '#wu *N*O5{sZ:~YnSeU`g#$8bf<(akbL|mOPMj;Iu_ZNth5L>#c9V#Lhfiwm*!dw');
define('NONCE_KEY',        'z2Lx=F)Nd)KT K0Lxh?0-7ECb*f[6OqU7< A[rB _ma#4zf:3]UzScE$Ledjuit#');
define('AUTH_SALT',        'BshH-WE!;7Sw`4]@?dl@dsegL3mwY`gz_*Z.]VH$i#oOm;S~sx:QoX$8bn^M/DWa');
define('SECURE_AUTH_SALT', '?7X79Ss24K6jCCl>?m{Gv$Nv@ax!u~A{<4{z/[Eb^> [!-p P>Q,*c;g`ib.Uyj$');
define('LOGGED_IN_SALT',   ')9ZO9=n2pW%caseO5?[@Id+ PwcXuOb}M &PS{6{A9J8.x)V8 [I)4g9sjLq8_mC');
define('NONCE_SALT',       ']]Z2WK_p^5y+tsuJGSP%YmY#ni|H3XgiJCkmO0PKc un2v}h|!8W&%9/0F(j+@UX');

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
