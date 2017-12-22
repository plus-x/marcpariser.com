define('WP_HOME','http://marcpariser.com/blog/');
define('WP_SITEURL','http://marcpariser.com/blog/');
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'i1440415_yk611');

/** MySQL database username */
define('DB_USER', 'i1440415_yk611');

/** MySQL database password */
define('DB_PASSWORD', 'M@fFlHnJjH49]&4');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'C0WhOgvookpzAX5iTXvzHhroqNKOQRQacUawIwkVPUaYRDp0YYS9OeU1qtvmaKBY');

define('SECURE_AUTH_KEY',  'xay5wFycJsF7G5z32kndiFfy4IkGJVKjymjJEgCwhJXqhmsS0YBFar83YbwuANMy');

define('LOGGED_IN_KEY',    '6KWGs6yVRKkcupGFPmdWLxlIFGJcKfSrVRekhGeqeNcJX8gYBDy1vhbwHThEHsyI');

define('NONCE_KEY',        'ghFCP3YuoGbYBzDxbwKDlcCDnkrKDhk13Yz5JFEsBqAjZhtU4mDJF4GtFKOiD5lv');

define('AUTH_SALT',        'rlShRI8K6eeIZkjjE7XrR67Jm2cE04BYbPRoaZ66GU3Q7Q6RTbE1oCwzt9wywci2');

define('SECURE_AUTH_SALT', 'fvjMdEnQxpMg1KXrxrQPKDdRyGBGApfbvtEEkYdxy15OBio4Oe3fZJt0EUVZsCPa');

define('LOGGED_IN_SALT',   'rB63Vb6jmnnVz6UvmId7lp3vsAQRzJ4HlA7uiw9Jx2D0Hr3KO0iOWjr8v7YNYwVB');

define('NONCE_SALT',       '17Wn48w9jxkcWND55379n8Jl2f0ROD1pYeidawube3w1M0dwgzc8fECAD98kr64k');



/**

 * Other customizations.

 */

define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');



/**

 * Turn off automatic updates since these are managed upstream.

 */

define('AUTOMATIC_UPDATER_DISABLED', true);



/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'yk61_';

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
