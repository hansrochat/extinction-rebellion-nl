<?php

// city query
$query_city = array();
// Events Query
$args = array(
  'posts_per_page' => 5,
  'paged' => 1,
  'post_type' => 'meetup_events',
  'orderby' => 'meta_value',
  'meta_key' => 'event_start_date',
  'order' => 'ASC',
  'meta_query' => array(
    array(
      'key' => 'event_start_date', // Check the start date field
      'value' => date("Y-m-d"), // Set today's date (note the similar format)
      'compare' => '>=', // Return the ones greater than today's date
      'type' => 'DATE' // Let WordPress know we're working with date
    ),
    // adds city filter
    $query_city
  )
);
$events = new WP_Query($args);

get_header(); ?>

<div class="home">

  <?php $section = getSection('event_highlight_section'); ?>
  <?php if ($section->enabled) : ?>
    <div class="bg-black text-white event-highlight" role="button" onclick="<?= register_button_click('highlighted event'); ?> location.href='<?php echo ($section->link); ?>';">
      <div class="border border-10 border-fuchsia p-2">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center flex-wrap">
          <h1 class="font-xr text-fuchsia m-0">
            <?php echo ($section->title); ?>
          </h1>
          <h1 class="font-xr m-0">
              <i class="fa fa-circle blink"></i><?php echo ($section->date_location); ?>
          </h1>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div class="text-white cover-image" style="background: linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url('<?php the_field('cover_image'); ?>') no-repeat; background-position: 50%;">
    <div class="container" style="padding: 5rem 2rem">
      <?php the_content(); ?>
    </div>
  </div>

  <div class="my-sm-5 my-4">
    <div class="container py-5 text-center">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <?php the_field('about'); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="py-sm-5 py-4 text-white cover-image" style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.55)), url('<?php the_field('join_cover_image'); ?>') no-repeat; background-position: 50% 0%;">
    <div class="container">
      <div class="row py-5 text-center">
        <div class="col-12 col-lg-8 mx-auto">
          <?php the_field('join_description'); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="text-center">
    <?php
    $image = get_field('image');
    $image_mobile = get_field('image_mobile');
    ?>
    <img class="image-desktop img-fluid my-2" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
    <img class="image-mobile my-2" src="<?php echo esc_url($image_mobile['url']); ?>" alt="<?php echo esc_attr($image_mobile['alt']); ?>">
  </div>

  <?php if ($events->have_posts()) : ?>
    <div class="py-sm-5 py-4 bg-yellow">
      <div class="container my-5">
        <h1 class="text-center"><?php _e('EVENTS') ?></h1>
        <?php while ($events->have_posts()) : $events->the_post(); ?>
          <div class="row border-bottom border-black pt-3 pb-3">
            <?php
            $event_date = get_post_meta(get_the_ID(), 'event_start_date', true);
            if ($event_date != '') {
              $event_date = strtotime($event_date);
            }
            $event_address = get_post_meta(get_the_ID(), 'venue_city', true);
            $venue_address = get_post_meta(get_the_ID(), 'venue_address', true);
            ?>
            <div class="col-lg-2 col-sm-12">
              <div class="text-uppercase font-xr small pt-1">
                <?php echo date_i18n('M', $event_date); ?>
                <?php echo date_i18n('d', $event_date); ?>
              </div>
              <small>
                <strong><em><?php echo $event_address; ?></em></strong>
                <br>
                <em><?php echo $venue_address; ?></em>
              </small>
            </div>
            <div class="col-lg-8 col-sm-12">
              <a href="<?php echo esc_url(get_permalink()) ?>" class="text-reset text-uppercase font-xr text-decoration-none small">
                <?php the_title(); ?>
              </a>
              <div class="small pt-2"><em><?php echo excerpt(30); ?></em></div>
            </div>
            <div class="col-lg-2 col-sm-12 text-lg-right">
              <a class="btn btn-black" href="<?php echo esc_url(get_permalink()) ?>">
                <?php _e('VIEW') ?>
              </a>
            </div>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
        <br>
        <div class="text-center">
          <a class="btn btn-lg btn-black" href="/events" onclick="<?= register_button_click('view all events') ?>">
            <?php _e('VIEW ALL EVENTS') ?>
          </a>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div class="embed-responsive embed-responsive-16by9">
    <?php the_field('video') ?>
  </div>
</div>

<?php get_footer(); ?>
