<?php
/**
 * Template name: Join page overview
 *
 * Join page overview
 */

get_header(); ?>

<div class="join">
    <div class="bg-xr-white">
        <div class="bg-xr-warning mx-2 my-2 join-top">
            <div class="join-top__image">
                <img src="<?php the_field('top_image'); ?>" alt="image">
            </div>
            <div class="join-top__text">
                <svg viewBox="0 0 50 100" preserveAspectRatio="none" class="join-top__text__svg">
                    <polygon fill="" points="0,0 50,0 50,100" class="join-top__text__triangle"></polygon>
                    <polygon fill="" points="0,0 5,0 50,100 45,100" class="join-top__text__line"></polygon>
                </svg>
                <div class="py-5 px-5">
                    <div class="font-weight-bold text-uppercase font-xr"><?php the_field('top_subtitle'); ?></div>
                    <h1 class="text-light join-title"><?php the_field('top_title'); ?></h1>
                    <p><?php the_field('top_text'); ?></p>
                </div>
            </div>
        </div>
        <div class="bg-xr-info mx-2 my-2 py-5 px-5">
            <div class="font-weight-bold text-uppercase font-xr"><?php the_field('content_subtitle'); ?></div>
            <h2 class="text-light join-subtitle"><?php the_title(); ?></h2>

            <div class="join-first-row">
	            <?php $section1 = getSection('sign_up'); ?>
                <div class="px-4 py-4 mx-2 my-2 join-row-element">
                    <h3 class="text-uppercase text-info font-xr"><?php echo ($section1->title); ?></h3>
                    <p><?php echo ($section1->text); ?></p>
                    <a class="join-row-element__cta btn btn-black btn-lg" href="<?php echo ($section1->cta_link); ?>"><?php echo ($section1->cta_text); ?></a>
                </div>

	            <?php $section2 = getSection('meet_up'); ?>
                <div class="px-4 py-4 mx-2 my-2 join-row-element">
                    <h3 class="text-uppercase text-info font-xr"><?php echo ($section2->title); ?></h3>
                    <p><?php echo ($section2->text); ?></p>
                    <a class="join-row-element__cta btn btn-black btn-lg" href="<?php echo ($section2->cta_link); ?>"><?php echo ($section1->cta_text); ?></a>
                </div>
            </div>

            <div class="join-second-row">
	            <?php $section3 = getSection('train_up'); ?>
                <div class="px-4 py-4 mx-2 my-2 join-row-element">
                    <h3 class="text-uppercase text-info font-xr"><?php echo ($section3->title); ?></h3>
                    <p><?php echo ($section3->text); ?></p>
                    <a class="join-row-element__cta btn btn-black btn-lg" href="<?php echo ($section3->cta_link); ?>"><?php echo ($section1->cta_text); ?></a>

                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
