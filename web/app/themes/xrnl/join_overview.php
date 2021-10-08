<?php
/**
 * Template name: Join page overview
 *
 * Join page overview
 */

get_header(null, array(
	'bg-color' => 'yellow',
	'accent-color' => 'black'
)); ?>

<div class="join">
    <div class="bg-xr-white">
        <div class="bg-yellow mx-2 my-2 join-top">
            <div class="join-top__image">
                <img src="<?php the_field('top_image'); ?>" alt="XR during an action">
            </div>
            <div class="join-top__text">
                <?php get_template_part('template-parts/triangle-svg', null, [
                        'svg_class' => 'join-top__text__svg',
                        'triangle_class' => 'join-top__text__triangle',
                        'line_class' => 'join-top__text__line',
                ])?>
                <div class="page-section">
					<?php if (get_field('pre_title')): ?>
                        <h4 class="section-pre-title"><?php the_field('pre_title'); ?></h4>
					<?php endif; ?>
                    <h1 class="section-title text-white"><?php the_title(); ?></h1>
                    <p><?php the_field('top_text'); ?></p>
                </div>
            </div>
        </div>
        <div class="bg-xr-navy mx-2 my-2 page-section">
			<?php if (get_field('section_pre_title')): ?>
                <h4 class="section-pre-title"><?php the_field('section_pre_title'); ?></h4>
			<?php endif; ?>
            <h2 class="text-light section-title"><?php the_field('section_title'); ?></h2>

<!--	        --><?php //if (get_field('section_text')): ?>
<!--                --><?php //the_field('section_text'); ?>
<!--	        --><?php //endif; ?>

	        <?php if (have_rows('cta_blocks')) : ?>
            <div class="join-row">
		        <?php while (have_rows('cta_blocks')) : the_row(); ?>
                    <div class="join-row-element px-4 py-4 mx-2 my-2">
                        <h3 class="text-navy font-xr"><?php the_sub_field('title'); ?></h3>
                        <p><?php the_sub_field('text'); ?></p>
                        <a class="join-row-element__cta btn btn-black btn-lg" href="<?php the_sub_field('cta_link'); ?>"><?php the_sub_field('cta_text'); ?></a>
                    </div>
		        <?php endwhile; ?>
            </div>
	        <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
