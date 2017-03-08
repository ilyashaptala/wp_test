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
define('DB_NAME', 'test');

/** MySQL database username */
define('DB_USER', 'user');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'u|9CZG{]3057&AXV><vGz8r01U>]dvs!ajU+WvChn[SHWp quIk#[z`fV!-CU!o.');
define('SECURE_AUTH_KEY',  'xNZEp%-yMm,cnn(/Le9Mk2@SD2u:LmwS$Nkk8h|5xqO[WW,Mb_o>L13;y*O?rqn.');
define('LOGGED_IN_KEY',    ':=;^y?XKLCN!p^}518 `lICrS(@{|Y$gGuf9,$.H1d9}fdez$cUF|*w8.JF~W6Cg');
define('NONCE_KEY',        'XGU-##aS}hU-*NjG N%?vr75z5*5M 0OpQgbY1CC);v h1}f8X+,{r95MSXK!J8s');
define('AUTH_SALT',        'ltT}[;C93om{2b)17Z{ADK)?7SR8tw2i^wthuEozX,hA}W9D:k_#n3MN+.@mT_dL');
define('SECURE_AUTH_SALT', 'xrWu<YSZvWh{mov97w+WeZ@P4fiah3Jf9l}/M+1jh>!C%-_HyVd~[~7%e98xBLe_');
define('LOGGED_IN_SALT',   ' 5S>{}zimZf d8`et+4vCUlBr)Hz3hj?1O<:@e~&r}Gd7R?w9!M_4v`;v=1ck[c7');
define('NONCE_SALT',       '+G)/bgM2INRUdqYUl|i`r.NgH5,F0PTQXwR0%S0)u+^U$:o4y@rzM6$q&lQSjbY]');

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

define('FS_METHOD','direct');
