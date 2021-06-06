<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'movie' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Z`Fh0OzN]Tb03#xsH#brT2;/7^:a{:49UJ[18ZTsXzJy_SbDKnDtw%f>WAQJ3_N=' );
define( 'SECURE_AUTH_KEY',  'Tj,&j{2hIi/.[D`s#~:j`3&?+6f}zRes:_TXWqPt4F$$^B-0B=W9#eJD+x$/3`M}' );
define( 'LOGGED_IN_KEY',    'km~<W#EZ(=/k+zK%e3ka((W8e$GxQZ7]|+bb5ET9#K#?<iTjUbHD!A%.eKXD2ieN' );
define( 'NONCE_KEY',        ';|)K{Y~&s)th5Bff[Qy13G3fPW;JFa{i7_U9-1C&3&LC9d;3 {])[Qw39],zg .o' );
define( 'AUTH_SALT',        '1VU:ME).it$&SI_<i ;j`<8@u(+K8riFF>:zk[yo`v!oAOvEqgCc%W,4O3CRSYHu' );
define( 'SECURE_AUTH_SALT', 'abr=A@s`^Yr+Emd)CE1TKr#@j,@`zXfsgC{~=g,BJTe&BZ_.*2wogs~X5KK?= 8s' );
define( 'LOGGED_IN_SALT',   'UPeMZdCPLk,id6K6><nX_75,?gF.gmry(/T#v%;c?NxLz)5p{jgOT9 {0^XJb14}' );
define( 'NONCE_SALT',       'pG$<7CKm[$R?8`.e-F<dL6][PZ6tr]7|u HhesiA41V#ro5TFhE86O~d}gluOwAr' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
