<?php

/**
 * The template part for displaying the list of demands
 */
?>

<div class="page-section bg-cj-dark-gray text-white">
  <h4 class="section-pre-title">
    Dit is wat wij eisen van de Nederlandse Overheid
  </h4>
  <h1 class="section-title">
    Onze eisen
  </h1>

  <div class="p-3 text-cj-light-gray">
    <span class="font-xr">
      0. KLIMAATRECHTVAARDIGHEID VOOR IEDEREEN*:
    </span>
    <span>
      We eisen een rechtvaardige transitie die de behoeften en stemmen van
      degenen die het meest getroffen worden door de klimaatcrisis centraal stelt
      en degenen die het meest verantwoordelijk zijn voor ecologische verwoesting
      ter verantwoording roept.
    </span>
  </div>

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
</div>
