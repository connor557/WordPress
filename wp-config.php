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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/srv/disk2/3378979/www/sunrisenet.xyz/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', '3378979_wpress567f37fd' );

/** MySQL database username */
define( 'DB_USER', '3378979_wpress567f37fd' );

/** MySQL database password */
define( 'DB_PASSWORD', 'MFJq0p1fdkTj77lMF7ywbGKmKxcUjmMY' );

/** MySQL hostname */
define( 'DB_HOST', 'pdb48.runhosting.com' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'A?`ic&-%iB]bcbK!Eyix3;)%8FjAW{EK*[j,plm)F)rs++j1t$TX]&cHn`.VQ;u4' );
define( 'SECURE_AUTH_KEY',  'F|Je)~fl9khUwoh]pkHdoUy+@R$vk>zGTsTU,{4;b^6L!i_r&8&v=tg*3~kjB> -' );
define( 'LOGGED_IN_KEY',    'WQWpQ*Kboz{6c,Axjk1u%qE~xAeaj7)|E^3Q~nql.<]CR^b>.cEwhFs}H7_U#MYb' );
define( 'NONCE_KEY',        '7ake^`Y naojEMz&/ue,@DRP7kp7FdTn@ne(z=]-Ikr-gJ_M+x;H-Vm8jm6_CFIt' );
define( 'AUTH_SALT',        '^3fj]lc/5s`Z5s:O^1_,<Q>n}}e[shH4!*E,EVI+u?gF@^6^DFc*Gc86rEZK]oGT' );
define( 'SECURE_AUTH_SALT', 'OWwP@mX!PiWpC<@C4;lVGnzdVaie]>H!]jZ18/*ur/}ghOC}}CnY:3s!r:uN/G?/' );
define( 'LOGGED_IN_SALT',   '],]QEf950xVEmYL/R3zpJ=Y<Ogp+v)yf+z^lYVn(Ktd:lzO)+HSy *54!zQ;m@|x' );
define( 'NONCE_SALT',       ' $|?-|T4nz.(xahXb0:)6B.2[&;74Ro/`zaX-v)$L=Rxs4HU2TH+tT;Y;Hqd4Axk' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
