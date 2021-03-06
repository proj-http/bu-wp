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

define('APP_ROOT', dirname(__DIR__));
define('APP_ENV', getenv('APPLICATION_ENV'));

if (file_exists(APP_ROOT . '/config/env/local.php')) {
  require_once APP_ROOT . '/config/env/local.php';
}
else {
  require_once APP_ROOT . '/config/env/' . APP_ENV . '.php';
}

/** Require Composer autoload file */
require APP_ROOT . '/vendor/autoload.php';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', WP_PUBLIC_DIR . '/site/');

/** Sets up WordPress vars and included files. */
if (!class_exists('WP_CLI\Runner')) {
  require_once(WP_PUBLIC_DIR . '/site/wp-settings.php');
}
