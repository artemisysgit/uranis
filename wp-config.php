<?php
define( 'WP_CACHE', true /* Modified by NitroPack */ );
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
define( 'DB_NAME', "u233214964_ugt_db" );
/** Database username */
define( 'DB_USER', "u233214964_ugt_us" );
/** Database password */
define( 'DB_PASSWORD', "*jR5GT*@" );
/** Database hostname */
define( 'DB_HOST', "localhost" );
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
define( 'AUTH_KEY',         'T}xR(`|T3wGxX(Tr@<Pet,:dUEG^,M`rt(*?QN,,5B..9KyfU#1G@f<A3;CE0*3O' );
define( 'SECURE_AUTH_KEY',  'o+:RmPUKqa,EClRo4K6o:w=lRM~:p7-Ca!.gK}&szu)UpEvWW/z4+v9i3F%AQ~q<' );
define( 'LOGGED_IN_KEY',    '}ubVC3GK%v-ls,K)%>/S37BZ)8jt~[e`LC<F-^+#e2:C^X9LV~;WnDs|9 xgR{y6' );
define( 'NONCE_KEY',        'x}&W^V~Z:Q4}=Hk38k0L9VStiB`D/L.pHkFs%h3&J5A-p-@KnFSY@FL*>p!ca^ U' );
define( 'AUTH_SALT',        '92vi,Tf[Zg:3e(I{2:#!p6 USTOOw1qrAEJ6hVI~rgy/Oxt3$9&b7+nD)wksKQ@D' );
define( 'SECURE_AUTH_SALT', 'l(=~we51N[tSNyQF<t%1?X9t/)n@D6YQs+3-b&OF&,mlQ?lhDtD%k_W/8<r9}mc$' );
define( 'LOGGED_IN_SALT',   'w{JH3B8*HH #8UFkXj4:WzFqyBYPGlHu=JP6mJY;H^32GjH %+H+M[+hg`.Ia+,P' );
define( 'NONCE_SALT',       '2:lES6/&9ihkIs0^{Dr+fVKazZU}U(rD`?CdnMU`>*i*I$#V;:FeG.P)zI {>BXW' );
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
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';