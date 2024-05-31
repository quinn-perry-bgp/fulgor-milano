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
    define('AUTH_KEY',         'pL=-AQJ*-eTouz  o_j8TtV0$<j lrR_9Tmct++l>:2~lZ73*!4p22cr#GWuBUTX');
    define('SECURE_AUTH_KEY',  '6rr]K]+G%D48?s1q1a3R`HBz((V,#-}CvLO(Uz)$&$z,r9s/C#o4F!,v1CgW:AiO');
    define('LOGGED_IN_KEY',    '#&(gdy,X$%:PV)6hk.S)w-&ZM^x+FMRQ*Q|Ji`c;(MYEM>a)jhJ:?hd-Y~Esbb4i');
    define('NONCE_KEY',        'Phh362W_TgQQW{J-`PK#YVNfEvaWUeKL#;{&q4>J#u%9+eJ[*S8DDQJ6|x5b(^A-');
    define('AUTH_SALT',        '.>NrL1B(q f85xY^=pKDB<S)DBaM#&Mh-o-8GpNK{Tbo`J-$b%U0grlMd^F2|(~]');
    define('SECURE_AUTH_SALT', 'cfgI(+T=[|0iz!pi@L>l-9N7=4NNG@BG zye~RU9i!4vS:El;L:%|P+3yfjLyB%`');
    define('LOGGED_IN_SALT',   '0*hW:Z~6dwNe-#-t2rxf+~q>?Q}lqo1pj>|-yo9D1oK_Bf{`AC;0KosCzq07jKUu');
    define('NONCE_SALT',       '+%H_Qsx^R2{L76sj[ql+eBYD1H->-2-H}OTFSs-mp__NK+tDZg<T9v7HFr>5;d(p');
        

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
