<?php

/**
 * The template part for displaying the list of demands
 */
?>

<div class="page-section bg-cj-dark-gray text-white">
  <?php if (get_field('xrnl_demands_pre_title', 'option')) : ?>
    <h4 class="section-pre-title">
      <?php the_field('xrnl_demands_pre_title', 'option'); ?>
    </h4>
  <?php endif; ?>
  <h1 class="section-title">
    <?php the_field('xrnl_demands_title', 'option'); ?>
  </h1>


  <?php $demand_0 = (object) get_field('xrnl_demand_0', 'option');
  if ($demand_0->enabled) :
  ?>
    <div class="p-3 text-cj-light-gray">
      <span class="font-xr">
        <?php echo $demand_0->bold_text; ?>
      </span>
      <span>
        <?php echo $demand_0->regular_text; ?>
      </span>
    </div>
  <?php endif; ?>

  <div class="d-flex flex-column flex-md-row">
    <?php if (have_rows('xrnl_demands_list', 'option')) : ?>
      <?php while (have_rows('xrnl_demands_list', 'option')) : the_row(); ?>
        <?php $demand = get_sub_field('demand'); ?>
        <div class="bg-white text-black p-3 my-2 my-md-0 mx-0 mx-md-2">
          <span class="text-green font-xr">
            <?php echo $demand['bold_text']; ?>
          </span>
          <span>
            <?php echo $demand['regular_text']; ?>
          </span>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>

  <?php if (get_field('xrnl_demands_txt_below', 'option')) : ?>
    <div class="pt-3 px-3 text-cj-light-gray" style="font-size: 1.2rem;">
      <?php the_field('xrnl_demands_txt_below', 'option'); ?>
    </div>
  <?php endif; ?>

  <?php if (get_field('xrnl_demands_link_target', 'option')) : ?>
    <div class="pt-3 text-center">
      <a class="btn btn-green" href="<?php the_field('xrnl_demands_link_target', 'option'); ?>">
        <?php the_field('xrnl_demands_link_label', 'option'); ?>
      </a>
    </div>
  <?php endif; ?>


</div>
