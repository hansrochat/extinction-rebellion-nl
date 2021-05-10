<?php
/*
Template name: Volunteer positions
*/

get_header(); ?>

<?php the_post(); ?>
<div class="row p-5 m-2 background-icon-container">
  <img src="<?php the_field('background_icon'); ?>" class="background-icon">
  <h1><?php the_title(); ?></h1>
<div class="col-12 col-xl-8 p-0">
  <?php the_content(); ?>
</div>

</div>

<?php
  $param_working_group = get_query_var('working_group');

  $vacancies = new WP_Query([
    'post_type' => 'volunteer_vacancy',
    'posts_per_page' => -1
  ]);

?>

<form class="d-flex role-filter" method="get">
  <label for="working_group"><?php _e('Working group') ?></label>
  <select name="working_group" class="custom-select" id="working_group">
    <option value=""><?php _e('All') ?></option>
    <option disabled>──────</option>
    <?php foreach($vacancy_groups['working_groups'] as $working_group) { ?>
      <option value="<?php echo $working_group ?>" <?php echo $param_working_group == $working_group ? 'selected="selected"' : '' ?>>
        <?php echo $working_group ?>
      </option>
    <?php } ?>
  </select>

  <button type="submit" class="btn btn-black mt-2 mt-md-0 ml-md-2">
    <?php _e('Apply') ?>
  </button>
</form>

<?php

?>

<div class="d-flex flex-wrap m-1">
  <?php
  	$n_vacancies_rendered = 0;

  	while($vacancies->have_posts()){
  	$vacancies->the_post();
  	$role = json_decode(get_the_content());
    if (!preg_match('/XR NL/', $role->localGroup)) {
      continue;
    }

  ?>


  <div class="role-card d-flex flex-column col-12 col-sm-6 col-lg-4 col-xl-3 p-1">
    <div class="role-header"><h5 class="m-0 font-xr"><?php echo $role->workingGroup ?>, <?php echo $role->localGroup ?></h5>
    </div>
    <div class="role-body d-flex flex-column justify-content-between flex-grow-1">
  	<div>
  	<h5 class="role-title">
  	  <?php the_title(); ?>
  	</h5>
  	</div>
  	<div class="d-flex justify-content-between align-items-end">
  	<span class="d-flex flex-column justify-content-center">
  	  <span class="flex-grow-0" style="line-height: 1rem; font-size: 1.25rem;">
  	  <?php echo $role->timeCommitment->min ?>&ndash;<?php echo $role->timeCommitment->max ?>
  	  </span>
  	  <span class="font-size: 0.625rem">
  	  <?php _e('hours / week', 'theme-xrnl'); ?>
  	  </span>

  	</span>
  	<a href="<?php the_permalink(); ?>" class="btn btn-black"><?php _e('Learn more', 'theme-xrnl'); ?></a>
  	</div>
    </div>
  </div>

  <?php

  } wp_reset_query();

  ?>

</div>


<?php get_footer();
