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
define( 'DB_NAME', 'architecture-website' );

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
define( 'AUTH_KEY',         '(4>41G-,R%jz<TIzcl9<pI`TADNTYyO]E,RPV6<:r,xm&w:Z%X1!-o|]=Q>BHw$B' );
define( 'SECURE_AUTH_KEY',  '~{?-EOYdp>PLf*q;gg>Nu0KK5yHb3&Ml{QP}7f#!E(lo%Qfe1CTuu5%{`@F&UlZH' );
define( 'LOGGED_IN_KEY',    '(RQ3xcT{$!$y{C&?xZ7qx349#FCaz$Vm^wE+WX~q>K~8i$fJfi/4-cBwL2hL}gg=' );
define( 'NONCE_KEY',        'Q8KC`*s+@JfFnp0,2rcse`[C8tL!oA;c~cg3$+,^5I7w{d%BfT3>Xq/eQ# s*CC2' );
define( 'AUTH_SALT',        '~~1{$QgGN~`{aljdM4cb}HZ6m:1.3]W}u_+5&W(Q2AB+ &Ir.nPPj!fl9S*@(_I.' );
define( 'SECURE_AUTH_SALT', 'O;jwM0wpFIJ<wA-zyB[aGvrC0ad8:..hYSfUgzS@EEC5]59ZitSQ`2LT<|vh[x]f' );
define( 'LOGGED_IN_SALT',   '}{7j/SDDMo^DYTn&9 6!$wx!W-tLhNbywsZ,J=+R|w8^>o=?a8g[2@|tf-@QE_`k' );
define( 'NONCE_SALT',       'Y(9~Z7W0&da(A^5tPG%pO<>>P#Z/E^c91^g/>u&cTN|OrR1aRVBb61OyDLvimmGr' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */

define('WP_DEBUG', true); //true - wordpress prints mistakes, errors.
define('WP_DEBUG_DISPLAY', false); //false - doesn't print errors publicly .
define('WP_DEBUG_LOG', true); //true - creates log file that only me can access.

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
