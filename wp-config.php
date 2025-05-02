<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'Membership-' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'y96xLSDlyI365yw314zopxr8nQip2Cu5qIMP4PczUpOYIAV4uxfABBXn23URogpz' );
define( 'SECURE_AUTH_KEY',  '6NZFdRXA6fS9A64LzG5YgdyWLYCUkL2jKLbcBkHpzAum4CfEwzEOBefKMEqN7Uvs' );
define( 'LOGGED_IN_KEY',    'S7CmR32v42RWgnstKzYuhSoCtdc3gxTlnHeHjlKegDkjKLzc4pePTL4XuIT4ikHn' );
define( 'NONCE_KEY',        'Fpf4vd7q2NQLWERcVtT2ixdicrM0ciMo1Cgc2mM3WGagqVUKAfOQchRadMmjvLTi' );
define( 'AUTH_SALT',        'xdTXmjHZ9xZnVAXMsAsFLPNxq5H2vGEBS1UfVbpdDNzVlmRFWClheUKrF0GWLmf7' );
define( 'SECURE_AUTH_SALT', 'PNZMnQfhXOgIWn6tPZe88t3UPuLpHGdf7Hd1YexXmzK2HKd9t3jT7ezji95PWmD5' );
define( 'LOGGED_IN_SALT',   'pQaeZbosfZ4qS9kNh3YTNZAZI8R1YwMq4LlpzJpN8xCfN2sGr88NcPAn012QjRtH' );
define( 'NONCE_SALT',       'RkLlJL6pNVIWKQ7BvgpN1GetRvO55ciqwPGo2froMWTZPaLEM7HJQQAJ1LMkPmMr' );

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
