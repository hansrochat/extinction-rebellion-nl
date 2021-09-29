<?php
/**
 * Template name: Why rebel
 */


get_header(); ?>

<main class="why-rebel">

  <?php $section = getSection('hero_section'); ?>
  <section class="hero" style="background: url('<?php echo $section->image; ?>') no-repeat center center / cover;">
      <div class="container-fluid">
        <div class="row">
          <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
            <p class="reading-time"><?php echo $section->reading_time ? $section->reading_time : '' ?></p>
            <h1 class="display-2 text-uppercase font-xr"><?php echo $section->title; ?></h1>
            <p><?php echo $section->content ?></p>
          </div>
        </div>
      </div>
  </section>

  <?php $section = getSection('quote_1'); $picture = $section->picture; ?>
  <section id="quote-1" class="quote-section container-fluid">
    <div class="row">
      <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <div class="quote-container top">
          <div class="quote-content">
            <div class="text-blocks">
              <p class="quote"><?php echo $section->quote ?></p>
              <div class="person-details">
                <div class="person-name"><?php echo $section->name ?></div>
                <div class="person-description"><?php echo $section->description ?></div>
              </div>
            </div>
            <img class="person-portrait" src="<?php echo $picture['url'] ?>" alt="<?php echo $picture['alt'] ?>">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="the-problem" class="text-section container-fluid">
    <div class="row">
      <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <?php the_field('problem_section'); ?>
      </div>
    </div>
  </section>

  <?php $section = getSection('quote_2'); $picture = $section->picture; ?>
  <section id="quote-2" class="quote-section container-fluid">
    <div class="row">
      <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <div class="quote-container">
          <div class="quote-content quote-right">
            <div class="text-blocks">
              <p class="quote quote-right"><?php echo $section->quote ?></p>
              <div class="person-details">
                <div class="person-name"><?php echo $section->name ?></div>
                <div class="person-description"><?php echo $section->description ?></div>
              </div>
            </div>
            <img class="person-portrait" src="<?php echo $picture['url'] ?>" alt="<?php echo $picture['alt'] ?>">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="change-is-possible" class="text-section container-fluid">
    <div class="row">
      <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <?php the_field('change_section'); ?>
      </div>
    </div>
  </section>

  <section id="why-rebel" class="text-section container-fluid">
    <div class="row">
      <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <?php the_field('why_rebel_section'); ?>
      </div>
    </div>
  </section>

  <?php $section = getSection('ctas'); ?>
  <section id="calls-to-action" class="container-fluid">
    <div class="row">
      <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <div class="ctas">
        <a class="cta btn btn-lg btn-green" href="<?php echo $section->button_cta['url'] ?>" 
onclick="<?= register_button_click($section->button_cta['label']); ?>">
            <?php echo $section->button_cta['label'] ?>
          </a>
          <a class="cta link" href="<?php echo $section->link_cta['url'] ?>" 
onclick="<?= register_button_click($section->link_cta['label']); ?>">
            <?php echo $section->link_cta['label'] ?>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

<script type="text/javascript">
   jQuery(document).ready(function() {
     jQuery('.demands-toggle').click(function(e) {
       jQuery('.demands-toggle').toggle();
       jQuery('#demands-list').slideToggle(300);
       e.preventDefault();
     });
   });
</script>

<?php get_footer(); ?>
