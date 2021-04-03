<?php
/**
 * Template name: Citizen Assembly - Home
 */

get_header(); ?>


<main class="citizen-assembly">
  <div class="join">
    <div class="bg-yellow text-center py-5">
      <h1 class="display-3 text-uppercase font-xr"><?php the_title(); ?></h1>
    </div>
  </div>

  <div class="container text-center py-5">
    <div class="col-lg-12 mb-5 text-justify">
      <?php the_content(); ?>
    </div>

    <div class="row tiles">
      <div class="display-4 text-uppercase font-xr text-center col-12 before-text">
        <?php the_field("tiles_before_text") ?></div>
      <div class=" d-flex flew-row flex-wrap justify-content-around w-100">
        <?php while ( have_rows('tiles') ){ the_row(); ?>
        <div id="<?php echo formatElementID(get_sub_field('tile_text')); ?>" class="bg-yellow mx-1 my-2 p-2 tile-text">
          <?php $tile_text = get_sub_field('tile_text'); ?>
          <a href="<?php the_sub_field('tile_url'); ?>" onclick="<?php register_button_click($tile_text . ' (image)'); ?>"><img class="img-fluid p-4"
              src="<?php the_sub_field('tile_pictogram'); ?>" /></a>
              <a href="<?php the_sub_field('tile_url'); ?>" onclick="<?php register_button_click($tile_text . ' (link)'); ?>">
            <div class="display-5 text-uppercase font-xr"><?php the_sub_field('tile_text') ?></div>
          </a>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <div class="join">
    <div class="text-center py-5 px-3 flag">
      <div class="text-uppercase font-xr"><?php the_field('flag_title'); ?></div>
      <div><a data-toggle="collapse" href="#flag-dropdown" role="button" aria-expanded="false"
          aria-controls="flag-dropdown" onclick="<?php register_button_click('toggle foldout new assembly'); ?>"><?php the_field('flag_text'); ?></a>
      </div>
      <div class="text-left collapse justify-content-center row" id="flag-dropdown">
        <div class="col-xl-5 col-10 align-self-center pt-3">
          <?php the_field('flag_dropdown'); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container py-5">
    <div class="row">
      <div class="col-11 col-md-12 mx-auto border border-dark pt-3">
        <?php the_field('end_note'); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
