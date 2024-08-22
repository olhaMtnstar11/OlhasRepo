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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',          'E$J@ktR?gg1Vj@bn(9}Hg&RqIyc#ay86S_%h-,-iFLIaGRW N;;.9#6[cZDplpwt' );
define( 'SECURE_AUTH_KEY',   '&iXFB0SOo)]$E+mZ~:vYPeS.+!XaR!Fg(4p]xt#Yn*gfC!LJS<8%)_Nr?l3q4wH5' );
define( 'LOGGED_IN_KEY',     'zMH/.GU]=)/I8N0hgN~spJ8>> H}Sdw^iJFRsXcILCM}`!wMJse5xMF^,[Z0I8Ty' );
define( 'NONCE_KEY',         'KH~6uOSOx+TBp*b,xx8~O-Xf/x7u5/M5<>N1oQ6/*OP)Eih{n5nFy.`tEcp[H`lz' );
define( 'AUTH_SALT',         'y{E.I=1EV=)X& M;.1>bM%|qVX$gKQ^xOx0|P>kpp5P^AwQ)[FOUpDp)8DqGQshX' );
define( 'SECURE_AUTH_SALT',  'PXp1tl&%*FP1l^!,g3<^KZ-rQ|Z50?D7+K9ab<>vY1yp)e#8DaU)= }ZYrKK3/q$' );
define( 'LOGGED_IN_SALT',    'h8[)pI#~1>>nz&4qCq+~_?lf}Mjy5BuCGLFQlyNY3D^*Xv@Z;a%p4r`6%N?..OE6' );
define( 'NONCE_SALT',        'FIqTN*1ni:_mE,u%GO1~Io+p)Q]Z)Nw/Ci.Jh),F{khz|(SHp.V>8%~t!E;1LB+a' );
define( 'WP_CACHE_KEY_SALT', '2u-.3q85hC_E3^rrR}UTMJ$<phV{U>2lF*@{D=_.V}qaOdhXc6ZS{4KYG~IT*0`q' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
