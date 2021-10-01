<?php
/**
 * Template name: Donations
 */

  $fields = get_fields();

  // Find the largest value in the expenses list
  $expenses = $fields['expenses'];
  $show_expenses = $expenses['show'] && !empty($expenses['list']);
  $max_dp=0;
  if ($show_expenses) {
    foreach ($expenses['list'] as $expense) {
      if ($expense['value'] > $max_dp) {
        $max_dp = $expense['value'];
      }
    }
  }

  get_header(null, array(
    'navbar-logo' => 'xrnl-stacked-logo.svg',
    'bg-color' => 'blue',
    'accent-color' => 'white'
  ));

?>

<div id="donations">

  <section class="hero">
    <div class="bg-symbol right large d-none d-md-block">
      <?= file_get_contents(get_template_directory_uri() . '/dist/images/turtle.svg', false, getContext(WP_ENV)); ?>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
          <h1 class="display-3 text-uppercase font-xr"><?= $fields['hero']['title'] ?></h1>
          <p class="hero-text"><?= $fields['hero']['text'] ?></p>
          <a class="btn btn-black btn-lg my-2" href="<?= $fields['hero']['button_link'] ?>"><?= $fields['hero']['button_label'] ?></a>
        </div>
      </div>
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto mt-5">
          <h3 class="font-xr"><?= $fields['hero']['direct_links_heading'] ?></h3>
          <ol class="direct-links">
            <li><a href="#direct-link-1"><?= $fields['hero']['direct_link_1_label'] ?></a></li>
            <li><a href="#direct-link-2"><?= $fields['hero']['direct_link_2_label'] ?></a></li>
            <li><a href="#direct-link-3"><?= $fields['hero']['direct_link_3_label'] ?></a></li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <?php if ($show_expenses) : ?>
  <section id="expenses-chart">
    <div class="container-fluid">
      <div class="expenses-chart row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-7 col-xl-7 mx-auto">
          <h2 class="mb-2 mb-md-1"><?= $expenses['title'] ?></h2>
          <div class="selected-dp-info row">
            <div class="col-10">
              <span class="dp-info-item dp-info-label"></span>
              <span class="dp-info-item dp-info-note pr-4"></span>
            </div>
            <span class="dp-info-item dp-info-value text-right font-xr col-2 d-none d-sm-block"></span>
          </div>
          <?php foreach ($expenses['list'] as $datapoint) : ?>
          <div class="chart-line row"
            data-label  = "<?= $datapoint['label'] ?>"
            data-note   = "<?= $datapoint['note'] ?>"
            data-value  = "<?= $datapoint['value'] ?>"
          >
            <div class="dp-label line-segment col-6 col-sm-5 col-md-5 col-lg-4 text-right">
                <?= $datapoint['short_label'] ?: $datapoint['label'] ?>
            </div>
            <div class="line-segment col-4 col-sm-5 col-md-6 col-lg-7">
              <div class="dp-bar" style="width: <?= ($datapoint['value'] / $max_dp) * 100 ?>%">
              </div>
            </div>
            <div class="dp-value line-segment col-1 text-right">
              <?= $datapoint['value'] ?>%
            </div>
          </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </section>
  <?php endif ?>

  <?php $option_1 = $fields['option_1']; ?>
  <section id="direct-link-1">
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
          <h2><?= $option_1['title'] ?></h2>
          <p><?= $option_1['text'] ?></p>
          <a class="btn btn-black btn-lg my-2" href="<?= $option_1['button_link'] ?>"><?= $option_1['button_label'] ?></a>
          <?php if (!empty($option_1['subsections'])) : ?>
          <div class="pl-3 mt-4">
            <?php foreach ($option_1['subsections'] as $subsection) : ?>
            <div class="more-info-item">
              <span id="reveal-more-info" class="more-info-toggle reveal-more-info"><?= $subsection['text_show'] ?></span>
              <span id="hide-more-info" class="more-info-toggle hide-more-info" style="display: none;"><?= $subsection['text_hide'] ?: $subsection['text_show'] ?></span>
              <div class="more-info-text" style="display: none;">
              <?= $subsection['content'] ?>
              </div>
            </div>
            <?php endforeach ?>
          </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </section>

  <?php $option_2 = $fields['option_2']; ?>
  <section id="direct-link-2">
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
          <h2><?= $option_2['title'] ?></h2>
          <p><?= $option_2['text'] ?></p>
          <a class="btn btn-black btn-lg my-2" href="<?= $option_2['button_link'] ?>"><?= $option_2['button_label'] ?></a>
          <?php if (!empty($option_2['subsections'])) : ?>
          <div class="pl-3 mt-4">
            <?php foreach ($option_2['subsections'] as $subsection) : ?>
            <div class="more-info-item">
              <span id="reveal-more-info" class="more-info-toggle reveal-more-info"><?= $subsection['text_show'] ?></span>
              <span id="hide-more-info" class="more-info-toggle hide-more-info" style="display: none;"><?= $subsection['text_hide'] ?: $subsection['text_show'] ?></span>
              <div class="more-info-text" style="display: none;">
              <?= $subsection['content'] ?>
              </div>
            </div>
            <?php endforeach ?>
          </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </section>

  <?php $option_3 = $fields['option_3']; ?>
  <section id="direct-link-3">
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <h2><?= $option_3['title'] ?></h2>
          <p><?= $option_3['text'] ?></p>
          <a class="btn btn-black btn-lg my-2" href="<?= $option_3['button_link'] ?>"><?= $option_3['button_label'] ?></a>
          <div class="mt-4"><?= $option_3['text_2'] ?></div>
          <?php if (!empty($option_3['subsections'])) : ?>
          <div class="pl-3 mt-4">
            <?php foreach ($option_3['subsections'] as $subsection) : ?>
            <div class="more-info-item">
              <span id="reveal-more-info" class="more-info-toggle reveal-more-info"><?= $subsection['text_show'] ?></span>
              <span id="hide-more-info" class="more-info-toggle hide-more-info" style="display: none;"><?= $subsection['text_hide'] ?: $subsection['text_show'] ?></span>
              <div class="more-info-text" style="display: none;">
                <?= $subsection['content'] ?>
              </div>
            </div>
            <?php endforeach ?>
          </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </section>

  <section id="stichting">
    <div class="bg-symbol left d-none d-md-block">
      <?= file_get_contents(get_template_directory_uri() . '/dist/images/xr-lisca.svg', false, getContext(WP_ENV)); ?>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
          <h2><?= $fields['stichting']['title'] ?></h2>
          <p><?= $fields['stichting']['text'] ?></p>
          <div class="text-right mb-3">
            <a href="<?= $fields['stichting']['anbi_link'] ?>">
              <img id="anbi-logo" class="d-inline-block" src="<?= $fields['stichting']['anbi_logo'] ?>" alt="ANBI logo">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

<script type="text/javascript">
  jQuery(document).ready(function($) {

  // Expanding section toggles
    $('.more-info-toggle').click(function(e) {
      $(this).siblings('.more-info-text').slideToggle(300, function() {
        $(this).siblings('.more-info-toggle').toggle();
      });
      e.preventDefault();
    });

  // Chart: show additional info on hover
    $('.chart-line').hover(function() {
      $('.dp-info-label').text($(this).attr('data-label'));
      $('.dp-info-note').text($(this).attr('data-note'));
      $('.dp-info-value').text($(this).attr('data-value')+'%');
      $('.selected-dp-info').addClass('active');
    }, function() {
      $('.dp-info-item').text('');
      $('.selected-dp-info').removeClass('active');
    });

  // Accessible smooth scrolling. Credits: Chris Coyier
    $('a[href*="#"]').click(function(event) {
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 500, function() {
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) {
              return false;
            } else {
              $target.attr('tabindex','-1');
              $target.focus();
            };
          });
        }
      }
    });
  });
</script>

<?php get_footer(); ?>