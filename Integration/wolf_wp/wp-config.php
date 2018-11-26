<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wolfgang');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'troiswa');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'fvdW=0Z:/M2$Wfb%.mw+1T]oR<)S!8r5U,QH3nLppBK14;|,]@Gr:dJ1zQ#/`~Pt');
define('SECURE_AUTH_KEY',  'DRCCnM{zm)#yl*Gai9mkCse~`L[FqC<Fwstx81*h`sQBEA;XX,--G.(qr[IgoYV9');
define('LOGGED_IN_KEY',    '~U>`b 6cZG%vzK?v*}ig. n2?tkL{3#oG:l<Kk$Y0D1wP&ECY4&@^Uh]Y%`}R{Wv');
define('NONCE_KEY',        '}i`^s*IX{Krc0A1>^&rFV{??/^r><-u+*#X0=B(mW,2X(?I,QlsB` v;N<3$O5Dq');
define('AUTH_SALT',        'X;1Z{xXc1#r6>eF[zQzQno9*1mqB G|S!`H,_amo6L:B+Ii+_-Fe{bi@D#f  w0*');
define('SECURE_AUTH_SALT', 'FddhEIU.Y[3o,f<UWgW5Xh(I_s^%_WhU05<2<-ZdhB&=?~Z@[F[+h)X~V7GvXYqt');
define('LOGGED_IN_SALT',   '6zd1ejC;3+&dWYh7hOTW9yA_OqfzH4K,yZRSpSot]Z6agsD!cIQ5)sBYeSZcKzR;');
define('NONCE_SALT',       'f(^R!b;TODUkxou@er3Y#v,pPD){xr.f)42u} VtL~<s~K`8lJjWkvt%L3s[a*CX');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');