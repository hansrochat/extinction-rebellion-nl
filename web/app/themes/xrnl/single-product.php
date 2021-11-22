<?php
// NOTE: this empty template overrides the default woocommerce product template
// this template is empty because we only sell one product and don't need individual product pages
// if we want to sell more than one product, we can customize and use this template

// show stacked logo because we can't use the extinction symbol for commercial purposes
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
