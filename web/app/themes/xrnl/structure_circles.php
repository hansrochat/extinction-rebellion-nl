<?php
/**
 * Template name: Structure - Circles
 */

get_header(); ?>

<?php
  function formatElementID($str) {
    return strtolower(str_replace(array(' ', ' & '), '-', $str));
  }
?>

<main class="structure-circles">
  <div class="container py-5">
    <div class="col-lg-12 mb-5 text-justify">
      <?php the_content(); ?>
    </div>

    <?php if( have_rows('circles') ): ?>
        <div class="col-lg-12 mb-5 text-justify">
            <?php the_field('introduction') ?>
        </div>
        <div class="row">
          <?php while ( have_rows('circles') ){ the_row();
          $groupId = "circle-" . get_row_index();
        ?>
          <div class="col-12 py-2">
            <div id="<?php echo formatElementID(get_sub_field('title')); ?>" class="mx-auto">
              <a class="btn btn-yellow btn-lg btn-block text-left" data-toggle="collapse" href="#<?php echo $groupId; ?>"
                role="button" aria-expanded="false" aria-controls="<?php echo $groupId; ?>">
                <?php the_sub_field('title') ?>
                <i class="fas fa-chevron-down float-right pt-1"></i>
              </a>
              <div class="text-left collapse pt-2" id="<?php echo $groupId; ?>">
                <div class="pt-3 text-justify">
                    <?php the_sub_field('description'); ?>
                </div>
                <div class="pt-3 text-justify">
                    <a class="btn btn-lg btn-blue" href="<?php the_sub_field('link'); ?>">Wiki: <?php the_sub_field('title') ?></a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>