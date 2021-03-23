<?php
/**
 * The template for a community group page
 */

get_header(); ?>

<?php
  $communityPage = apply_filters('wpml_object_id', 6832, 'page', true); // Page ID: 6832 NL, 6853 EN
  $communityPageURL = get_permalink($communityPage);
?>

<div class="community-group">

  <div class="hero-container">
    <img class="group-cover-image mx-auto" src="<?php the_field('group_cover_image_url'); ?>" alt="<?php the_title(); ?>">
    <div class="hero-caption">
      <?php the_field('group_image_caption'); ?>
    </div>
  </div>

  <div class="my-sm-5 my-4">
    <div class="container pt-3 pb-5 text-center">
      <div class="row">
        <div class="col-12 col-lg-8 mx-auto">
            <h1 class="display-4"><?php the_title(); ?></h1>
            <p class="text-justify"><?php the_content(); ?></p>
            <h2 class="group-slogan"><?php the_field('group_slogan'); ?></h2>
            <span class="group-social-icons">
            <?php if(get_field('group_twitter_url')): ?>
              <a href="<?php the_field('group_twitter_url'); ?>"  target="_blank" rel="noreferrer noopener" class="btn twitter" aria-label="twitter"><i class="fab  fa-2x fa-twitter"></i></a>
            <?php endif; ?>

            <?php if(get_field('group_facebook_url')): ?>
              <a href="<?php the_field('group_facebook_url'); ?>"  target="_blank" rel="noreferrer noopener" class="btn facebook" aria-label="facebook"><i class="fab  fa-2x fa-facebook-f"></i></a>
            <?php endif; ?>

            <?php if(get_field('group_instagram_url')): ?>
              <a href="<?php the_field('group_instagram_url'); ?>"  target="_blank" rel="noreferrer noopener" class="btn instagram" aria-label="instagram"><i class="fab fa-2x fa-instagram"></i></a>
            <?php endif; ?>

            <?php if(get_field('group_youtube_url')): ?>
              <a href="<?php the_field('group_youtube_url'); ?>"  target="_blank" rel="noreferrer noopener" class="btn youtube" aria-label="youtube"><i class="fab fa-2x fa-youtube"></i></a>
            <?php endif; ?>
            </span>
        </div>
        <div class="col-12 col-lg-8 mx-auto">
          <?php if(get_field('group_contact_email')): ?>
            <a href="mailto:<?php the_field('group_contact_email'); ?>"  target="_blank" rel="noreferrer noopener" class="btn email" aria-label="email"><?php the_field('group_contact_email'); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <a href="<?php echo $communityPageURL ?>" class="btn btn-blue my-4"><i class="fas fa-arrow-left"></i> <?php _e('View all community groups', 'theme-xrnl'); ?></a>
</div>

<?php get_footer(); ?>
