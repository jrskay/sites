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
define('DB_NAME', 'wolfygang');

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
define('AUTH_KEY',         'E.lLeDx)74G/%Xq.>}xIXQ[m(1e5PAZ F#XLGO<|YrzH8c`l[Bkx{|q?3=Pj>xAO');
define('SECURE_AUTH_KEY',  'd/mUgd0qkn.[~*xZqbx^jlP9<2eB*Jcog!3Ft3B#v@hkpTT>q+`Q3`Mf{d*/Km(/');
define('LOGGED_IN_KEY',    'O pBZ(%Yx.=KOj1yOYsRp}4yYf4D}CLc3gSN4r 9moy<rB`m,Zh)d&p+!ujdUk9=');
define('NONCE_KEY',        'V*V ?t.?iGrXgBhtbEaDL4b2Fo&>m!u~{LR5Z f^R= `$uol;%F)F&]NuM-)?}^=');
define('AUTH_SALT',        'R8pE1U:]lN}iX3|q>]6]r`Tmst%YX6kA#}HGq6:./i@^: !fD5wDqKQ4/uynkq z');
define('SECURE_AUTH_SALT', '@Ra&,BQ|<C_3f<asr3aCrHc+6MOi$ovll;i7!&/Hero|x7=[p!Xl!DZ+xGr2K_cl');
define('LOGGED_IN_SALT',   '^tV8~Tf7}+o1;p}wS9Ozq,KLpVlNLKiy]+gM{OD^ylil8u+hL@8)+Udj~Q-kjm`K');
define('NONCE_SALT',       '#7sjisguHG0_KU^@Zxm[H}PPDM5&.(55Ck$E>&?5VkHm7$f,jc=Jk4xtz-}Rc[#)');
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