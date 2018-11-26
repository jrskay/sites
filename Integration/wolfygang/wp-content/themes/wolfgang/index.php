<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon super site</title>
  <?php wp_head(); ?>
</head>
<body class="container">
  <?php wp_footer(); ?>
  <!-- <h1><?php bloginfo( 'name' ); ?> Wolfygang</h1> -->
  <!-- <p><?php bloginfo('description'); ?> </p> -->
  <header class="header-main">
    <nav class="nav-main">
    <a href="#"><img class="logo-header" src='<?php header_image(); ?>' alt='image'></a>
      <?php wp_nav_menu(array('theme_location'=>'primary')); ?>
    </nav>
  </header>
  <main>
    <?php
    $args = array(
      'category_name'=>'moto',
      'posts_per_page'=>2
    );
    query_posts($args);
    if (have_posts()):
      while(have_posts()):
        the_post();
        the_title();
        the_content();
        the_post_thumbnail();

      endwhile;


    endif;


     ?>
  </main>
  <footer>
    <?php wp_nav_menu(array('theme_location'=>'secondary')); ?>
  </footer>
</body>
</html>
