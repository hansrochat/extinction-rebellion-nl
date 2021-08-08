<?php

/**
 * Template name: Rebellion
 */

get_header(null, array(
  'bg-color' => 'fuchsia',
  'accent-color' => 'white'
));

?>

<div>
  <div class="bg-black text-white p-3 p-sm-5 full-screen-height">
    <div class="border border-10 border-fuchsia py-5 px-3 px-md-4">
      <div>
        <h1 class="font-xr">
          <?php the_field('subtitle') ?>
        </h1>
      </div>
      <div>
        <h1 class="font-xr text-fuchsia text-giant">
          <?php the_title(); ?>
        </h1>
      </div>
      <div class="row pt-3">
        <div class="col-12 col-md-4 d-flex justify-content-center">
          <div class="svg-size-250 hero-symbol-white">
            <?php
              $symbol_svg = file_get_contents(get_template_directory_uri() . '/assets/images/hourglass.svg', false, getContext(WP_ENV));
              echo $symbol_svg;
            ?>
          </div>
        </div>
        <div class="col-12 col-md-8 col-lg-6 pt-3 pt-md-0">
          <div class="font-xr-if-bold font-fuchsia-if-bold">
            <?php the_content(); ?>
          </div>
          <div>
            <?php if (have_rows('buttons')) : ?>
              <?php while (have_rows('buttons')) {
                the_row(); ?>
                <a class="btn btn-lg btn-fuchsia text-black ml-2 mt-3" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('label'); ?></a>
              <?php } ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
