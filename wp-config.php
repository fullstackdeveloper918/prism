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
define('DB_NAME', 'prismaticplants');

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
define('AUTH_KEY', '8778581866544ac812a3f5870864e0de75ca19fc4a736bf6d4f4200e45abdd2b');
define('SECURE_AUTH_KEY', '49e53a2179f9718645a2079865e22800f47b37c96964ae971f013f85cc5fa8be');
define('LOGGED_IN_KEY', '19d59eff10371198ebefbc6e5d2d28511b6547eb17d77cb032b0e5ec7cb145cb');
define('NONCE_KEY', '699e728606e18e2e3b42d462408d20ae3d33cd33d3514a420afe82d55be8ffb7');
define('AUTH_SALT', '79e05221d44b04d75ec529234baf5685909c1ed6796f0a294a0ad5ea3ed18b01');
define('SECURE_AUTH_SALT', 'c60ece33d24b291053f1e04ea4d750782bd5169081e800db599faf10deb5e8ba');
define('LOGGED_IN_SALT', '690f733bcc8acfad49b0d5ba73106044a0e06d540a84b471cdae751d8fd7f92a');
define('NONCE_SALT', '5d5a9a22d3b68bcb4d71802eef781ef4a648fb9453767dd8705dad8b40f2940c');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '_20O_';

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
// define( 'WP_CRON_LOCK_TIMEOUT', 120   ); 
// define( 'AUTOSAVE_INTERVAL',    300   );
// define( 'WP_POST_REVISIONS',    5     );
// define( 'EMPTY_TRASH_DAYS',     7     );
// define( 'WP_AUTO_UPDATE_CORE',  true  );
