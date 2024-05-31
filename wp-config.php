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
    define('AUTH_KEY',         'A3 ESiC?n<}(2Pi{ux+FzWZ)[]12P-W4NA %+|FcNf):Kw?XX)J<H+^473qyL(@$');
    define('SECURE_AUTH_KEY',  '20axz#IcNrAk0gd9tf@-ln!XWT@J^m)E*8Pc:D+&Sf,cFyP+,+d0zz%pyIFA`CIF');
    define('LOGGED_IN_KEY',    'x>#cmTpv!-M-X|1[SwLH#?0$Q-<.|(K]e#Ln[jEU<+#5b)r~$trXP%!6>X+xo00]');
    define('NONCE_KEY',        'fC;$}+L15(s`^2:?~qf`9>B|3fe~~-Wm*2 jbLs_+l#,C|gC2C82vZovpM}TClCt');
    define('AUTH_SALT',        'eOIPG{I2A$1MaiCos6q`=/9XGFoobm{.g K3CzW|;a.YF|j0+-ei$0H-R*5tsskK');
    define('SECURE_AUTH_SALT', 'VQ+BL[.o`{GaK+(p-GliQ|Q4|u?T-nSROFp2o6,wo2&PG&[- xA!PZb+{1$b#-@e');
    define('LOGGED_IN_SALT',   '%H+s7^MX=*0YC[m+.4Sbf6|7u+2C1-3X|D~iIHOiZ5;9/Llp_7[/Xh`R}pPHlLi@');
    define('NONCE_SALT',       '^.*#aE1.=C}m6m(S`BoCQqYJ9=6-8-GpcoUsZ [/4j^|VrA)89?<8I5~cF-tWA q');
        

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
