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
define( 'AUTH_KEY',          'kbv*Dt~%YA~EnwCH-cj=8yZ Hoh02O:Ubro(DSatn2qVl0AEjA>BmK5Y1Zg_8m%<' );
define( 'SECURE_AUTH_KEY',   '/IHM@$qC%rE7]YWTiy8P_i^{vy&obd6a)xY+V_)AMh8T;eFzr[CAyR]$R7JoYU:A' );
define( 'LOGGED_IN_KEY',     'PQA_1g:m|ejwBh>V7=v%Xo9P-84Ic3x<XA}}lTJ+#zGP-)Z$8LYL1]=NRWcy0SN|' );
define( 'NONCE_KEY',         'yIrH?,47Nquv[?Gkv.tt4]}Z/.BD#|i)]lqcec.?vMNkLt7^r5zqXm8V`>Ej<jcw' );
define( 'AUTH_SALT',         'o$jMVHNJ:8ZF9t!#=tDKa[Y7v`F5JDv%TkG0wO02o3PPRl<[%M*VA;mNrwgFnhaZ' );
define( 'SECURE_AUTH_SALT',  ' Hzv ~CzS%<TomEOR-v8rExY)Gz.Ny[tMyqOKZ%]^q(@s@$XZfUXDdh%nUI/&O6y' );
define( 'LOGGED_IN_SALT',    'K9h6.p4)y 2nP]V7;j)~?J)Y$aia*Q G1fRFrYuvPaIu_n+rg>IevJh>vN}$8E#I' );
define( 'NONCE_SALT',        '(q[d# s&lJJuW7Pl=+KuY],$y;]7|%Kq(m86xDR(7Ws CkP5v30*4;md^NSwsEHW' );
define( 'WP_CACHE_KEY_SALT', '>Val$ks!WE3&g1|rKPxv%[7l</$CQ-,=?pLVrb&,U/Xn@#XwAE62(6VU^3N*AJ7<' );


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
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
