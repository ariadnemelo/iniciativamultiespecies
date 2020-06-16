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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '.PtUuOVf1vqS$~(Rhi4c++b> {7&$DF-B+S.,?JWmHh*sOU)[_y`3TZ6pAf.TcxQ' );
define( 'SECURE_AUTH_KEY',  'Y/sty4F&AoG6lt0LXS#>sT>[#TtLLY8d5Jbi,fo1:vZ!>GS.[P%]dN]320<n?$$0' );
define( 'LOGGED_IN_KEY',    '*X]4ybU.#.DC,wdZ;rIYuviU1qK<D7,kd7~&6pQd+-0=O]VnI>8}+EF{,mfi tm+' );
define( 'NONCE_KEY',        'vyaDS5CxYBiU])Ass80W[@+=fO`HksSJd(0diM/@K)>-Q-jze=ny{`bV;EnU7nCm' );
define( 'AUTH_SALT',        'OLJEJV-)3,1h*`9ECeW;iKh9lAU&t6~jt%:a;;3qTo>2V`:6= M4NXk2y<9xVDi,' );
define( 'SECURE_AUTH_SALT', '[qyK!;ze  N,::#m0IwvlImeFpJxCEfPifdQZA^WTdCgfXfSIL,Ia4*l~8G#=!_`' );
define( 'LOGGED_IN_SALT',   '7:rFX[UeiJwk>BxSoyemrE _,K#3Ku,7Y8h}wzxVN8~*<=MG~==pEEqT.x(s/>/H' );
define( 'NONCE_SALT',       '2e*_CA`9nx]T&$M_e;5 #:i/{<dK5a,/wD=VUX:?)3/+/O![!mOC 9C/#O3|2?g[' );

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
