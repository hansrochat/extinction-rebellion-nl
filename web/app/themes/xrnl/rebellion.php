<?php

/**
 * Template name: Rebellion
 */

get_header(null, array(
  'bg-color' => 'fuchsia',
  'accent-color' => 'white'
));

?>

<div class="bg-black text-white p-1 font-xr-if-bold font-fuchsia-if-bold" id="rebellion">
  <div class="border border-10 border-fuchsia py-3 py-md-5 px-3 px-md-4 m-3 m-sm-5">
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
        <div>
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
  <?php $section = getSection('signup_section'); ?>
  <div class="border border-10 border-fuchsia py-3 py-md-5 px-3 px-md-4 m-3 m-sm-5" id="signup">
    <div class="row">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
        <h1 class="font-xr text-center pb-3">
          <?php echo ($section->title); ?>
        </h1>
        <div class="text-center">
          <?php echo ($section->content); ?>
        </div>
      </div>
    </div>
  </div>
  <?php $section = getSection('programme_section'); ?>
  <?php if ($section->title) : ?>
    <div class="border border-10 border-fuchsia py-3 py-md-5 px-3 px-md-4 m-3 m-sm-5" id="programme">
      <div class="row">
        <div class="col-12 col-md-10 col-xl-8 mx-auto">
          <h1 class="font-xr text-center pb-3">
            <?php echo ($section->title); ?>
          </h1>
          <div>
            <?php echo ($section->content); ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <?php $section = getSection('action_information_section'); ?>
  <div class="border border-10 border-fuchsia py-3 py-md-5 px-3 px-md-4 m-3 m-sm-5" id="info">
    <div class="row">
      <div class="col-12 col-lg-9 col-xl-7 mx-auto">
        <h1 class="font-xr text-center pb-3">
          <?php echo ($section->title); ?>
        </h1>
        <div class="text-center">
          <?php echo ($section->content); ?>
        </div>
        <?php foreach ($section->foldouts as $index => $foldout) : ?>
          <div class="py-2">
            <a class="btn btn-fuchsia text-black btn-lg btn-block text-left" data-toggle="collapse" href="#section-<?php echo ($index); ?>" role="button" aria-expanded="false" aria-controls="section-<?php echo ($index); ?>">
              <?php echo ($foldout['title']); ?>
              <i class="fas fa-chevron-down float-right pt-1"></i>
            </a>
            <div class="collapse" id="section-<?php echo ($index); ?>">
              <div class="px-2 pt-2">
                <?php echo ($foldout['content']); ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
