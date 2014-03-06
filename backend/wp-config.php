<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '182898-wp2');

/** MySQL database username */
define('DB_USER', '182898_jq37898');

/** MySQL database password */
define('DB_PASSWORD', 'Sch1lNad');

/** MySQL hostname */
define('DB_HOST', 'wp2-182898.mysql.binero.se');

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
define('AUTH_KEY',         'Pc@[b,1YYI=u?MBHR?9Q{(UJm:N6Wg+W.)DXY)Z+&9`vawK.aywWSIui*[P._|qj');
define('SECURE_AUTH_KEY',  '.]y5ujBbPq{+en.{S&2]=V3En.a(!E$A998/E |>4! 4TV2(T@Iys[c{p0t}H@rn');
define('LOGGED_IN_KEY',    '4#M*9[}.mz4.:p`wDA{A/+pq{4EK6lD3^/iTI`+1S-1fMA02?Il@W,tz+[!ph^p]');
define('NONCE_KEY',        'yhnd@Khetdn#QvO|h:k]R}xl|ui/,;9.X lp `?^ve0MNsPkn*v8#Z`z~H}>r[sD');
define('AUTH_SALT',        '!7#TP<zrPl``&Q=2J!gV!HDFR.>{@U4WB51!6nLg--O8qRh%J43&lr*fOBJ`[$!o');
define('SECURE_AUTH_SALT', 'l6aAvA#x+P/P0DEK=kz6>05VG}@vF$%=+6;V}]v2P%tQ7WkJ*w-3e{(iE$#WFMf[');
define('LOGGED_IN_SALT',   'b.=u)*]l`ax1!WeRSb>vD&/M[,T(>wl7e/_:en}:>M;BjrqPMP=-+|#1X-)ONv<1');
define('NONCE_SALT',       'U H{}9uzh-<U|$,zA{uY+U7uT@Qw18GlP[Hx*+:xOrP73K1S?p1e+2]57EZh-Nu|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
