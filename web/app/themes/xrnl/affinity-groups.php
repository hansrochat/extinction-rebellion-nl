<?php
/*
Template name: Affinity groups
*/
$ag_data = get_affinity_group_data();

get_header(null, array(
  'bg-color' => "deep-sea-green",
  'accent-color' => "white"
));
?>

<?php the_post(); ?>
<div class="row p-5 m-2 background-icon-container bg-deep-sea-green">
  <img src="<?php the_field('background_icon'); ?>" class="background-icon" style="opacity: 0.2;">
  <div class="col-12 col-xl-8 p-0">
  <h1 class="text-neon-green"><?php the_title(); ?></h1>
    <div class="text-white"><?php the_content(); ?></div>
  </div>
</div>

<!-- Display all affintiy groups's.  -->
<div class="d-flex flex-wrap m-1">
  <?php
  foreach ($ag_data as $ag) {
  ?>
    <div class="role-card d-flex flex-column col-12 col-sm-6 col-lg-4 col-xl-3 p-1">
      <div class="role-header">
        <h5 class="m-0 font-xr"><?php echo $ag["local_group"] ?></h5>
      </div>
      <div class="role-body d-flex flex-column justify-content-between flex-grow-1">
        <div>
          <h5 class="role-title">
            <?php echo $ag["AG_name"] ?>
          </h5>
        </div>
        <div class="d-flex justify-content-between align-items-end">
          <span class="d-flex flex-column justify-content-center">
            <span class="flex-grow-0" style="line-height: 1rem; font-size: 1.25rem;">
              <?php echo $ag["AG_size"] ?>
              <?php echo $ag["AG_risk"] ?>
            </span>
            <span class="font-size: 0.625rem">
              <?php _e('hours / week', 'theme-xrnl'); ?>
            </span>
          </span>
          <?php // TODO: open modal with email form when button is clicked 
          ?>
          <a href="" class="btn btn-black"><?php _e('Join', 'theme-xrnl'); ?></a>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>


<?php get_footer();
