<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'demo_tsisacth');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'r-n8%C|sc#}i0woZk4Q+4%0[f@~?w[7E&l:DNw,Q*#IN_M7$j}Dp;a@(C?<zI;7[');
define('SECURE_AUTH_KEY',  '#:Y;`piIvBO+A__pX&^Z7S)4=-!O=iV](K<g1Wd4kX2+}J;%o{AMGavLLvmNo-YR');
define('LOGGED_IN_KEY',    '6hePD690 iPXVCf7Tt;!OOl=U-X4ROKS/XLxJM*oqha?|GlMu.ao5%!th+u!g4-Z');
define('NONCE_KEY',        ')b|/T7JZ7*AZ;W;W-?tY|7d=n#>!}`-3YN5K~IQab2 WRU-h,F*qlA&^z8d*kXWO');
define('AUTH_SALT',        'Vq+TeqpB4I1-#DjnZi%G-bb>C.V3^nxUQw26W/;NU^}7H(-pFu?M1t],%~`w$CrV');
define('SECURE_AUTH_SALT', 'Tc=PLQFQDl9VWNgs<:YT%#vAi{HmQ18*M+`1~Z/9hHimE@^L*&l[XbF0-`m>C`-R');
define('LOGGED_IN_SALT',   '6KeyL$r?H|iyn>b_U0#TEXI(t{D^.nVVrs1:sfj{a*+:D]<|_`k-|5)N,4KGtjOx');
define('NONCE_SALT',       'TO|1ws#gg6OD*U67I-x3]-ad9p|EnDE5E,S=7[55WW:_c0U,D`=M,m,{4aQt5L`g');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
