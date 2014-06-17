<?php
/** Environment Settings */
define('WP_HOME', 'http://wordpress.dev');
define('WP_SITEURL', WP_HOME . '/site/');

define('WP_CONTENT_DIR', APP_ROOT . '/public/content');
define('WP_CONTENT_URL', WP_HOME . '/content');

define('WP_DEBUG', true);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bu_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '>n$!o`(nM%KEi-BUX,5._LUlXRdD!ir.JxP*Q2,Bxg{9_gRmZ8+0Iqm-(QkZ GC+');
define('SECURE_AUTH_KEY',  'eWk|O5@=|!Q B[}gp%//qw|D0E?nh+4[a@B!=^dXzG6FChk>}?F-QFgZoYgs)]50');
define('LOGGED_IN_KEY',    '^zil&(e {,efDfc,Va=Ws@=iW3n8JmHZkq_^:6R4E J?;o}snz@4`IpVX30)!w%C');
define('NONCE_KEY',        'd@~lqUIyYT_d.GZ6+V3JGxq{?|~|xIB;Vpjmms7fa@&=83>z-5[SgkXT%vchesEz');
define('AUTH_SALT',        'G`GC[Oqy O-^Mj@KUfofS@i~eT}#|LbN2:n(QSx+P,w,Xd;v^j)a$TxV/~MSk;e.');
define('SECURE_AUTH_SALT', 'MOUpAdRfWSw3=yw-O})lX5Z25.]&tf @KJfb+T@uq0S[UWvB[@l`Sue$LT3Crjgi');
define('LOGGED_IN_SALT',   'Afw8m%dj9#;35uM)+RUoNQiFG]mm}FOhot>b_-*$^rHof7By !Kvq &q|/-#w{9T');
define('NONCE_SALT',       '~(:&y$<,AUBcbqz^Nek{s4c8aReRM=3-wyg!-E!}Mau)qst~s~X+w1`sX?_Px&L:');
