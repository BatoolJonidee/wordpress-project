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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'comfort_zone' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'gx_Rn }?tv8b!s|e!,d4wub#uv0xv@ @?_J}t={LD&W b|6I1:mdWyNI8^,Up|=+' );
define( 'SECURE_AUTH_KEY',  ';g[n]_GCQ HaibCiFO;aj),O6OQc!KXouSrdG?hDF<M3IbtTmQ?SK?f|Kx6_v(j#' );
define( 'LOGGED_IN_KEY',    '+4i#tqau_&hzj4CoYC~kcL.G-~8,K.=XN.K-Tv(GXF;e#2S})i$.0}y^&;&!;,N1' );
define( 'NONCE_KEY',        'wV0U v%CO-k|PHre!tWK(R[l?Pi;}(F!w%^#yA`.!PRLQ`cI^?S=TaH70`%g5>>O' );
define( 'AUTH_SALT',        '%_?_1]{Y|ytBzH[O!ZAd%c`wmd]770cu6v4ta>81<AgyplSrkzk8qJTJq5XTcFn^' );
define( 'SECURE_AUTH_SALT', 'YCf=v!-%c3uf9gjPDzG-)yLP^hoTC<ES~9:I>zVH2/!j$_2~2-a$o&z*5AXMK7u*' );
define( 'LOGGED_IN_SALT',   'mX8N:LK6TZ%k|_m(X[NU@rd]=YqzU1Uul1Ot$&t@+)5(~ECJw{NwU>v~Xh0]}M8E' );
define( 'NONCE_SALT',       'lBBRhH@laA-W0Q}&PpQO.c+A}H^Ih_)pR#^K64$(p}._3mm2Q@DXr5:>)k<=rY>m' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
