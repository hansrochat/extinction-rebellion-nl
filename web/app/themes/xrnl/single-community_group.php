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

  <h1 class="display-4 text-center mt-5 mb-3"><?php the_title(); ?></h1>

  <div class="hero-container">
    <img class="group-cover-image mx-auto" src="<?php the_field('group_cover_image_url'); ?>" alt="<?php the_title(); ?>">
    <div class="hero-caption">
      <?php the_field('group_image_caption'); ?>
    </div>
  </div>

  <div class="container pt-5 text-center">
    <div class="row">
      <div class="col-12 col-lg-8 mx-auto">
        <div class="text-justify"><?php the_content(); ?></div>
      </div>
      <div class="col-12 col-lg-8 mx-auto">
        <?php $buttons = get_field('group_link_buttons'); ?>
        <?php if (!empty($buttons)) : ?>
          <?php foreach ($buttons as $button) : ?>
            <div class="mt-3">
              <a href="<?php echo $button['target_url'] ?>" class="btn btn-<?php echo $button['colour']; ?>"><?php echo $button['label']; ?></a>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="container py-5 mt-3 text-center">
    <div class="row">
      <div class="col-12 col-lg-8 mx-auto picture-gallery">
        <?php $gallery = get_field('group_picture_gallery'); ?>
        <?php if (!empty($gallery)) : ?>
          <?php if(!empty($gallery['heading'])): ?>
            <h2><?php echo $gallery['heading']; ?></h2>
          <?php endif; ?>
          <?php if(!empty($gallery['description'])): ?>
            <p><?php echo $gallery['description']; ?><p>
          <?php endif; ?>

          <?php if(is_array($gallery['pictures'])): ?>
            <div id="cg-carousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators my-4">
                <?php for ($i = 0; $i <= count($gallery['pictures'])-1; $i++) : ?>
                  <li data-target="#cg-carousel" data-slide-to="<?php echo $i ?>"></li>
                <?php endfor; ?>
              </ol>

              <div class="carousel-inner">
                <?php foreach ($gallery['pictures'] as $picture) : ?>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo $picture['picture'] ?>" alt="<?php the_field('title'); ?>">
                    <?php if(!empty($picture['caption'])): ?>
                      <div class="carousel-caption bg-xr-black mb-4">
                        <?php echo $picture['caption']; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>

              <a class="carousel-control-prev d-none d-md-flex" href="#cg-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"><?php _e('Previous', 'theme-xrnl'); ?></span>
              </a>
              <a class="carousel-control-next d-none d-md-flex" href="#cg-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"><?php _e('Next', 'theme-xrnl'); ?></span>
              </a>
            </div>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="container pt-3 pb-5 text-center">
    <div class="row">
      <div class="col-12 col-lg-8 mx-auto">
        <h2 class="group-slogan"><?php the_field('group_slogan'); ?></h2>
        <div class="group-social-icons">
          <span>
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
            <div class="col-12 col-lg-8 mx-auto">
              <?php if(get_field('group_contact_email')): ?>
                <a href="mailto:<?php the_field('group_contact_email'); ?>"  target="_blank" rel="noreferrer noopener" class="btn email" aria-label="email"><?php the_field('group_contact_email'); ?></a>
              <?php endif; ?>
            </div>
        </div>
      </div>
    </div>
  </div>

  <a href="<?php echo $communityPageURL ?>" class="btn btn-blue my-4"><i class="fas fa-arrow-left"></i> <?php _e('View all community groups', 'theme-xrnl'); ?></a>
</div>

<script type="text/javascript">
  // Initiate the carousel
  jQuery(document).ready(function($){
    if ($('.picture-gallery').length) {
      $('.carousel-item:first').addClass('active');
      $('.carousel-indicators > li:first').addClass('active');
    };
  });
</script>

<?php get_footer(); ?>
