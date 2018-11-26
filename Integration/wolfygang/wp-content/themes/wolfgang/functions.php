<?php
// création de la fonction qui gere le css et le js
function access_css_js(){
wp_enqueue_style('moncss' , get_template_directory_uri().'/css/wolfgang.css', '', '1.5', 'all');
wp_enqueue_script('monjs', get_template_directory_uri().'/js/wolfgang.js', '', '2.2', true);
}
// appel de la fonction qui gere le css et le js
add_action('wp_enqueue_scripts', 'access_css_js');


function add_theme(){
// on demande à utiliser le menus
add_theme_support('menus');
// on crée 2 emplacements (ou plus) de menus, 2 paremètre à chaque fois
// identifiant unique (en minuscules)
// desription qu'on retrouve dabs l'adminastration des menus
register_nav_menu('primary', 'menu primaire');
register_nav_menu('secondary', 'menu secondaire');
}
// on appelle la fonction qui active les menus, au moment de l'initialisation du thème (init)
add_action('init', 'add_theme');

// image du header
add_theme_support('custom-header');

//image à la Une
add_theme_support('post-thumbnails');
