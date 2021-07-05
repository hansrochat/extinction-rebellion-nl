<?php
/*
Template name: Volunteer positions
*/

$vacancies = new WP_Query([
  'post_type' => 'volunteer_vacancy',
  'posts_per_page' => -1
]);

get_header();
$fields = get_fields();
?>

<?php the_post(); ?>
<div class="bg-xr-white">
  <div class="row background-icon-container bg-navy text-light px-1 px-md-5 py-5 mx-2 my-2">
    <img src="<?php the_field('background_icon'); ?>" class="background-icon">
    <div class="col-12 col-md-10 col-lg-9 col-xl-8 p-0">
    <h1 class="display-3"><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </div>
  </div>  
  <div class="row py-5 bg-navy text-light mx-2 mt-2">
    <div class="row px-3 px-md-5">
      <div class="col-12 col-lg-5">
        <h3><?php echo $fields['local_group_roles']['heading']; ?></h3>
        <?php echo $fields['local_group_roles']['text']; ?>
      </div>
      <div class="col-12 col-lg-5 mx-auto px-md-5 px-lg-0 mt-4 mt-lg-0 d-flex flex-column justify-content-center">
        <a href="<?php echo get_permalink(apply_filters('wpml_object_id', 12040, 'page', true)); ?>" class="btn btn-black btn-lg"><?php echo $fields['local_group_roles']['button_label']; ?></a>
      </div>
    </div>
    <div class="row px-3 px-md-5">
      <div class="col-12 col-lg-5 mt-4">
        <h3><?php echo $fields['national_roles']['heading']; ?></h3>
        <?php echo $fields['national_roles']['text']; ?>
      </div>
      <div class="col-12 col-lg-5 mx-auto px-md-5 px-lg-0 mt-4 mt-lg-0 d-flex flex-column justify-content-center">
        <form class="d-flex" method="get">
          <label for="working_group" class="mr-3 my-auto font-xr text-light text-nowrap"><?php _e('Working group') ?></label>
          <select name="working_group" class="custom-select font-xr" id="working_group">
            <option value=""><?php _e('Choose one...') ?></option>
          </select>
        </form>
      </div>
    </div>
  </div>
  <div class="d-flex flex-wrap bg-xr-white mr-2">
    <?php
      while($vacancies->have_posts()){
        $vacancies->the_post();
        $role = json_decode(get_the_content());
        if (!preg_match('/XR NL/', $role->localGroup)) {
          continue;
        }
    ?>
    <div class="role-card d-flex flex-column col-12 col-xs-12 col-sm-6 col-lg-4 col-xl-4 p-0 pl-2 pt-2" data-wg="<?php echo $role->workingGroup; ?>">
      <div class="role-header">
        <h5 class="m-0 font-xr"><?php echo $role->workingGroup ?></h5>
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
            <span style="font-size: 0.625rem">
            <?php _e('hours / week', 'theme-xrnl'); ?>
            </span>
          </span>
          <a href="<?php the_permalink(); ?>"class="btn btn-black"><?php _e('Learn more', 'theme-xrnl'); ?></a>
        </div>
      </div>
    </div>
    <?php
      } wp_reset_query();
    ?>
  </div>
  <div class="row background-icon-container bg-navy text-light py-5 mx-2 my-2">
    <img src="<?php echo get_theme_file_uri('dist/images/XR-symbol.svg'); ?>" class="background-icon d-none d-lg-block">
    <div class="row px-3 px-md-5">
      <div class="col-12 col-lg-9">
        <h3><?php echo $fields['questions']['heading']; ?></h3>
        <?php echo $fields['questions']['text']; ?>
      </div>
      <div class="col-12 col-lg-9 mt-4">
        <h3><?php echo $fields['new_role']['heading']; ?></h3>
        <?php echo $fields['new_role']['text']; ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  jQuery(document).ready(function($){
    $('.role-card').removeClass('d-flex').addClass('d-none');

    var workingGroups = [];
    $('.role-card').each(function() {
      var wg = $(this).data('wg');
      if ($.inArray(wg, workingGroups) < 0) {
        workingGroups.push(wg);
      }
    });

    workingGroups.forEach(function(group) {
      $('select').append($("<option>").attr('value', group).text(group));
    });

    $('select').change(function() {
      $('.role-card').removeClass('d-flex').addClass('d-none');
      $('[data-wg="'+$(this).val()+'"]').removeClass('d-none').addClass('d-flex');
    });
  });
</script>


<?php get_footer();
