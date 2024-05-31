<?php
//TODO: FIX PHP.INI !!!!!!
ini_set('memory_limit',-1);
ini_set('php_memory_limit',-1);
/** DEVELOPMENT CONFIGURATION **/
if(file_exists(__DIR__.'/wp-config-dev.php')){

    require_once 'wp-config-dev.php';

} else {
    /**
     * The base configuration for WordPress
     *
     * The wp-config.php creation script uses this file during the installation.
     * You don't have to use the web site, you can copy this file to "wp-config.php"
     * and fill in the values.
     *
     * This file contains the following configurations:
     *
     * * Database settings
     * * Secret keys
     * * Database table prefix
     * * ABSPATH
     *
     * @link https://wordpress.org/support/article/editing-wp-config-php/
     *
     * @package WordPress
     */

    // ** Database settings - You can get this info from your web host ** //
    /** The name of the database for WordPress */
    define( 'DB_NAME', getenv('DB_NAME') );

    /** Database username */
    define( 'DB_USER', getenv('DB_USER') );

    /** Database password */
    define( 'DB_PASSWORD', getenv('DB_PASSWORD') );

    /** Database hostname */
    define( 'DB_HOST', getenv('DB_HOST') );

    /** Database charset to use in creating database tables. */
    define('DB_CHARSET', 'utf8mb4');

    /** The database collate type. Don't change this if in doubt. */
    define('DB_COLLATE', '');

    /** Load balancer support */
    if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
        $_SERVER['HTTPS'] = 'on';

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
    define('AUTH_KEY',         '/<x?ICYy-]hr1T]80W&sIEIiJX!k94m?%^<y-}JxXVVcoFEsGp[2+7h%BH0F.Pf#');
    define('SECURE_AUTH_KEY',  '#]+[De&0}j9i<TjI)E%<+!g3#Kn&D%0OQ}>@Lj3aW^E5+N{Y9`_A6yyiR9|Cio|S');
    define('LOGGED_IN_KEY',    'lm1Qok6@a@B*.yd2&@O>-,@3)5G|lcF^G{I8nN.-U7OZN|z1txhRUE.qA-[UK*~?');
    define('NONCE_KEY',        'jgBzn||UM:WkpJ6)j*$iZ@jp6D+8/G.K E4uFD(A>qb`(|sl-ilXk]vRN&gEx`DR');
    define('AUTH_SALT',        '%2Q8-?x181xiC#[*V#E:m<7Jj2x14 {==$6eKpN;isWY;g8#h[U|`@=M>9G_=.w.');
    define('SECURE_AUTH_SALT', ' C9B%R!S/.:f*q FxdnY5A2t=m:Wtt{]1BO/B+:<auw<<vv`,&Wb%/d(KmqhI3)+');
    define('LOGGED_IN_SALT',   '|*>rC=#CA9*I@iMBe(j;549ZCbc|z6L^N%z^=WeJY,K4*-nVda&,+{,hB6 [sw)W');
    define('NONCE_SALT',       'WkayT-.~s@*W_6Z@. )oe@c8ZzI,kCJtk,X^tU4Mb7Mwa_7*ePMm!1@MdlX=>$T-');
        

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
     * @link https://wordpress.org/support/article/debugging-in-wordpress/
     */
    define('WP_DEBUG', false);

    /* Add any custom values between this line and the "stop editing" line. */
}


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
