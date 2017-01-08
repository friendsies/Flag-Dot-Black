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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpressuser');

/** MySQL database password */
define('DB_PASSWORD', 'ACABracadabra');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Make it so wordpress doesn't request ftp credentials */
define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'I-y;S17#Zyekg/K;EA0g!75-bLR*x#GwTea(28zLqrlo81>&2Wb=Vmv-pe%f9_0&');
define('SECURE_AUTH_KEY',  'F[_PJBqZ|):!!n@fNAq*x+R9#rB%yPZ|}~<,&JM~S.?NWrucPd%8Z1f>$b5Klb-g');
define('LOGGED_IN_KEY',    '`nN-#+rUj?kEm$d^_HM`vj1GZ%r1W!u0+jD$df58D106_=3xciM=S(7dB*ZBP~9|');
define('NONCE_KEY',        'tg+O7LPIpMuDJNNASJfb+&M`uPO.UV7xlK%DoDE$(:7!*-FuW$QF-+*e{I?;/$>W');
define('AUTH_SALT',        'akMjT+$7>oJ;VDV|q3#c-^C|!G,6-A+[?qn8cqs2sM|5FVA#lWiar~@)`~KiqnT_');
define('SECURE_AUTH_SALT', '=tO$T><J-Ss.71`G@D~F`;6:d,F!jNMbKepJ;oFu}k7.rr%C+42r=>nZdr9[S.ae');
define('LOGGED_IN_SALT',   '&qXt|6|lCI5Iy}IPdsNq/IO$-![~AuLxc$8r@d6n/,,bL*kt&H8s>Ay+0tvS|cn4');
define('NONCE_SALT',       'K|m~VoXa|3E.![~++dl3~U~b-TjJZLYb,#k!s ~YU}e|%WF|nEk+5|B$~S8+0.ze');

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
