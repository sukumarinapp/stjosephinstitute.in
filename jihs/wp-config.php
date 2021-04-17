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
define( 'DB_NAME', 'jihs' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'vCoL^t-6LNhd}c9B?(>J/$8Qp;gE,3)s+=+_G(@NN,aE.:Tyr2pe@m A@K5]mI$+' );
define( 'SECURE_AUTH_KEY',  'Adf%Y3G8N0q/,o0dLteiH0{Xp$r&-jmU3nW3?  o?/q+#2R.*W?I;1l0a36-s2Ou' );
define( 'LOGGED_IN_KEY',    '7:6h,1.AR3t|1{v_,Z(Ets?jQ2Xgx<p048fnn:&IbtOU2%X6E]b:h<fI{h_,v(d.' );
define( 'NONCE_KEY',        'n7yZo6t;<He<7x:zqUo3ntxI;wR&rAN~_pKMn-OH<hn;1=oM,w@053Nj54n8r;NI' );
define( 'AUTH_SALT',        '~2Xl]O?J>?q):nv}%u $rr&.$%]iz#t1 *0Js!Eg^&0nysX)}_o;q<}VL&,C5l^c' );
define( 'SECURE_AUTH_SALT', 'Ys[@xY7>s1M6iOSgr.7aK&_~,I}.lTb.9KJ~A#|]F>A5_@q5q);_T5QwhId#4@jZ' );
define( 'LOGGED_IN_SALT',   '4M@ueb&*E;uAeV!YFxuksABpaHvZI1)olq=]oFDc!`6*gf(4x;_V#L.(RkZ(`Ti)' );
define( 'NONCE_SALT',       '`]9um1|Oi`8<ADkvnM tO;OTblZ/:d-2pms_0xrEuTg2KfdW)/Psa*-u19 +&.jr' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'jihs_';

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
