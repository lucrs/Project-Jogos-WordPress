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
define('DB_NAME', 'project');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

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
define('AUTH_KEY',         '^GT6j%gG3N.dSRv3m7.xja]Xk)6]Sg=Ll[Uj=|@cB)<d6I#U7>I!>,>HP:LgG+vo');
define('SECURE_AUTH_KEY',  ':!hEFYBa{PUS}vydc6{F[i3`ms}fe%CXtB|sQJ_oV p2#_NL r*FUIOUxu <Z8;[');
define('LOGGED_IN_KEY',    '.b_*4MmeB(l5epD,zu>z~Ywc1d5!t&(G<AhoXfQj.J=aN pVn#v$;b7~y%+_!^J,');
define('NONCE_KEY',        'VVtO,VHN9W}ir.F8YRiIz=J?nu<pjT>8OT|bfFea80e5UqmW##hK9<S?[prA=o^|');
define('AUTH_SALT',        'h0#xa$j*P/4if3<>HG!vyPE`WxB<<Nf3}rIETCbUvR E 8r*K[5>.-mTG*LagKP`');
define('SECURE_AUTH_SALT', 'MQOpYNjUr#Fw:$qT/ezLyTX!,PmJk]r;]4E(Mf=mNz8jwsy3j#QZAKIUwNx$usm7');
define('LOGGED_IN_SALT',   't:]V $.<>qXh:Lpns>v>9J!N@=2Pqq0tH?!0L~e ~a+-_QY+xbxS1#jAd3 _+F:(');
define('NONCE_SALT',       '2C cHL6x4-{e;cLQ<?JzsG;5x<XWB{qhn#Efa8.).K|u)~.D)T%(QK1N5_*Z]9qV');

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

update_option('siteurl','localhost:8080');
update_option('home','localhost:8080');
