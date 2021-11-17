<?php
/**
 * Template name: Shop
 */

  get_header(null, array(
    'navbar-logo' => 'xrnl-stacked-logo.svg',
    'bg-color' => 'blue',
    'accent-color' => 'white'
  ));

?>

<div class="container my-5">

<h1><?php the_title(); ?></h1>

<?php the_content(); ?>

</div>

<?php get_footer(); ?>
