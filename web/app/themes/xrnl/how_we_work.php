<?php

/**
 * Template name: How we work
 */

get_header(); ?>

<main>
  <div class="container py-5">
    <div class="row">
      <div class="col-12 mb-5 text-justify">
        <header class="entry-header">
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        <?php the_content(); ?>
      </div>
    </div>

        <div class="row">
    <?php if (have_rows('sections')) : ?>
      <div class="col-12 mb-5 text-justify">
          <?php while (have_rows('sections')) {
            the_row();
            $groupId = formatElementID(get_sub_field('title'));
          ?>
            <div class="col-12 py-2">
              <div id="<?php echo "section-" . formatElementID(get_sub_field('title')); ?>" class="mx-auto">
                <a class="btn btn-yellow btn-lg btn-block text-left" data-toggle="collapse" href="#<?php echo $groupId; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $groupId; ?>">
                  <?php the_sub_field('title') ?>
                  <i class="fas fa-chevron-down float-right pt-1"></i>
                </a>
                <div class="text-left collapse pt-2" id="<?php echo $groupId; ?>">
                  <div class="pt-3 text-justify">
                    <?php the_sub_field('text'); ?>
                  </div>
                  <div class="pt-3 text-justify">
                    <?php if (have_rows('links')) : ?>
                      <?php while (have_rows('links')) {
                        the_row(); ?>
                        <a class="btn btn-lg btn-black" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('label'); ?></a>
                      <?php } ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
    <?php endif; ?>
      </div>
  </div>
</main>

<?php get_footer(); ?>
