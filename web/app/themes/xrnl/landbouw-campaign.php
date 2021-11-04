<?php
/**
 * Template name: Landbouw campaign
 */

  get_header(null, array(
    'hidden'  => true
  ));

  function roundUpToNearest($n, $x=500) {
    return ceil( $n / $x ) * $x;
  }

  $actionnetwork_api_key = get_field('actionnetwork_api_key', 'option');

  $fields = get_fields();
  extract($fields['action_network']);
  $hero = $fields['hero'];
  $main_section = $fields['main_section'];
  $sign_section = $fields['sign_section'];
  $support_orgs = $fields['support_orgs'];
  $step2 = $fields['step2'];

  try {
    $response_en = wp_remote_get($api_endpoint_english_form, [
      'headers' => [
        'OSDI-API-Token'=> $actionnetwork_api_key
      ]
    ]);
    $data_en = json_decode($response_en['body'], true);
    $total_submissions_en = $data_en['total_submissions'];
  } catch (\Throwable $th) {
    $total_submissions_en = 0;
  }
  try {
    $response_nl = wp_remote_get($api_endpoint_dutch_form, [
      'headers' => [
        'OSDI-API-Token'=> $actionnetwork_api_key
      ]
    ]);
    $data_nl = json_decode($response_nl['body'], true);
    $total_submissions_nl = $data_nl['total_submissions'];
  } catch (\Throwable $th) {
    $total_submissions_nl = 0;
  }

  $total_submissions = $total_submissions_en + $total_submissions_nl;
  $max_submissions = roundUpToNearest($total_submissions+500, 1000);
  $percent = $total_submissions/$max_submissions*100;

?>


<div class="landbouw-campaign">

  <noscript>
    <div class="vw-100 vh-100 text-center bg-xr-yellow py-5">
      <i class="fas fa-exclamation-triangle"></i> Please enable javascript in your browser to view this page.
    </div>
  </noscript>

  <div class="container-fluid bg-xr-<?= $hero['background_color'] ?> hero" style="display: none;">
  
    <div class="hero-symbol-container">
      <div class="hero-symbol text-right">
          <?php if (filter_var($hero['image_url'], FILTER_VALIDATE_URL)) {
              echo file_get_contents($hero['image_url'], false, getContext(WP_ENV));
            }
          ?>
      </div>
    </div>

    <div class="container-xl">
      <div class="row flex-sm-row-reverse">
        <div class="col col-12 col-sm-4 y-spacer">
        </div>
        <div class="col col-12 col-sm-8 py-2 py-sm-5">
          <h1 class="display-3 title text-<?= $hero['title_color'] ?>"><?= $hero['title'] ?></h1>
          <h2 class="display-4 subtitle text-<?= $hero['subtitle_color'] ?>"><?= $hero['subtitle'] ?></h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container-xl">
    <section id="step-1" class="row flex-md-row-reverse bg-xr-<?= $secondary_color ?>" style="display: none;">
      <div class="col col-12 col-md-4 px-3 mt-0 mt-md-5 form-container">
        <div class="d-md-none text-center pt-2">
          <p>
            <a href="#main-text"><i class="fas fa-arrow-alt-circle-down"></i><br><?= $main_section['mobile_link_down']?></a>
          </p>
        </div>
        <div id="signature-counter" class="pt-3 pt-md-5">
          <?php if ($sign_section['custom_counter']['show']) : ?>
          <h4 class="font-xr">
            <span class="text-80"><?= $sign_section['custom_counter']['text_before'] ?></span> <span id="total-submissions"><?= $total_submissions ?></span> <span class="text-80"><?= $sign_section['custom_counter']['text_after'] ?></span>
          </h4>
          <?php else : ?>
          <h4 class="font-xr">
            <span id="total-submissions"><?= $total_submissions ?></span> <?php _e('of', 'theme-xrnl'); ?> <span id="max-submissions"><?= $max_submissions ?></span> <?php _e('signatures', 'theme-xrnl'); ?>
          </h4>
          <?php endif ?>
          <div class="progress mb-5">
            <div class="progress-bar" role="progressbar" style="width: <?= $percent ?>%;" aria-valuenow="<?= $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <h2 id="sign-petition"><?= $sign_section['form_heading'] ?></h2>
        <div id="an-form">
          <?= do_shortcode($actionnetwork_shortcode) ?>
        </div>
      </div>
      <div id="main-text" class="col col-12 col-md-8 px-3">
        <div class="pt-5">
          <h2><?= $main_section['heading'] ?></h2>
          <div>
            <?= $main_section['top'] ?>
          </div>
          <div class="demands pb-3 pr-0 pr-md-3 pr-lg-5">
            <?php if (is_array($main_section['demands'])) : ?>
              <?php foreach ($main_section['demands'] as $demand) : ?>
                <div class="more-info-item">
                  <div class="more-info-toggle reveal-more-info pr-4 pr-md-5">
                    <?= $demand['condensed'] ?>
                  </div>
                  <div class="more-info-text pl-2 pt-2" style="display: none;">
                    <?= $demand['extended'] ?>
                  </div>
                </div>
              <?php endforeach ?>
            <?php endif ?>
          </div>
          <p class="font-xr h3 mt-4 d-none d-md-block"><?= $main_section['cta'] ?></p>
          <div class="d-md-none text-center pt-2">
            <p>
              <a href="#sign-petition"><i class="fas fa-arrow-alt-circle-up"></i><br><?= $main_section['mobile_link_up']?></a>
            </p>
          </div>
        </div>
      </div>
      <div class="col col-12 my-5 pt-5 text-center">
        <h2><?= $support_orgs['heading'] ?></h2>
        <div>
          <p><?= $support_orgs['text'] ?></p>
        </div>
        <div class="logos pt-4 d-flex flex-wrap justify-content-center">
          <?php if (is_array($support_orgs['list'])) : ?>
            <?php foreach ($support_orgs['list'] as $org) : ?>
              <div class="logo-item px-2 py-3">
                <?php if (!empty($org['logo_url'])) : ?>
                  <img src="<?= $org['logo_url'] ?>" alt="Co-initiator logo">
                <?php else : ?>
                  <div class="placeholder"></div>
                <?php endif ?>
                <div class="logo-label">
                  <?= $org['org_name'] ?>
                </div>
              </div>
            <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </section>
  </div>

  <div class="container-fluid">
    <section id="step-2" style="display: none;">
      <div class="thanks row">
        <div class="col col-12 col-md-6 background-pic" style="background: url(<?= $step2['thanks']['picture_url'] ?>) no-repeat center center / cover;">
        </div>
        <div class="col col-12 col-md-6 bg-xr-pink text-center py-5">
          <h2 class="font-xr"><?= $step2['thanks']['heading'] ?></h2>
          <div class="px-2 px-md-4">
            <?= $step2['thanks']['text'] ?>
          </div>
          <div class="pt-5">
            <?php if (is_array($step2['thanks']['share_buttons'])) : ?>
              <?php foreach ($step2['thanks']['share_buttons'] as $btn) : ?>
                <a href="<?= $btn['link'] ?>" class="mr-3"><i class="<?= $btn['icon'] ?>"></i></a>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
      </div>
      <?php if ($step2['divest']['show_section']) : ?>
      <div class="divest row">
        <div class="col col-12 col-md-8 px-2 px-md-5 text-center text-md-left">
          <h2 class="font-xr"><?= $step2['divest']['heading'] ?></h2>
          <div>
            <?= $step2['divest']['text'] ?>
          </div>
          <div class="py-5">
            <?php if (is_array($step2['divest']['ctas'])) : ?>
              <?php foreach ($step2['divest']['ctas'] as $cta) : ?>
                <a href="<?= $cta['btn_url'] ?>" class="btn btn-black"><?= $cta['btn_label'] ?></a>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
        <div class="col col-12 col-md-4 background-pic" style="background: url(<?= $step2['divest']['picture_url'] ?>) no-repeat center center / contain;">
        </div>
      </div>
      <?php endif ?>
      <div class="donate row bg-xr-blue">
        <div class="col col-12 col-md-8 px-2 px-md-5 text-center text-md-left">
          <h2 class="font-xr"><?= $step2['donate']['heading'] ?></h2>
          <div>
            <?= $step2['donate']['text'] ?>
          </div>
        </div>
        <div class="col col-12 col-md-4 text-center px-2 px-md-0">
          <div class="donate-buttons mx-auto">
            <div class="py-3 d-flex justify-content-between">
              <?php if (is_array($step2['donate']['amounts'])) : ?>
                <?php foreach ($step2['donate']['amounts'] as $amount) : ?>
                  <a href="<?= $amount['btn_url'] ?>" class="btn btn-white btn-amount"><?= $amount['btn_label'] ?></a>
                <?php endforeach ?>
              <?php endif ?>
            </div>
            <div class="pb-3">
              <?php if (is_array($step2['donate']['ctas'])) : ?>
                <?php foreach ($step2['donate']['ctas'] as $cta) : ?>
                  <a href="<?= $cta['btn_url'] ?>" class="btn btn-block btn-black"><?= $cta['btn_label'] ?></a>
                <?php endforeach ?>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
      <div class="about row text-white" style="--bg-image: url('<?= $step2['about']['picture_url'] ?>');">
        <div class="col col-12 col-md-8 px-2 px-md-5 text-center text-sm-left">
          <h2 class="font-xr"><?= $step2['about']['heading'] ?></h2>
          <div>
            <?= $step2['about']['text'] ?>
          </div>
          <div class="py-3">
            <?php if (is_array($step2['about']['ctas'])) : ?>
              <?php foreach ($step2['about']['ctas'] as $cta) : ?>
                <a href="<?= $cta['btn_url'] ?>" class="btn btn-white mr-2"><?= $cta['btn_label'] ?></a>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<div class="landbouw-campaign-footer container-fluid">
  <div class="row align-items-center flex-md-row-reverse bg-xr-black text-xr-white">
    <div class="col col-12 col-md-5 text-right font-xr">
      <div class="language-switcher">
        <?php wp_nav_menu([
            'theme_location' => 'language',
            'container'       => '',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'menu_class'      => 'ml-auto',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ]); ?>
      </div>
    </div>
    <div class="col col-12 landbouw-logo text-center">
      <a href="https://extinctionrebellion.nl/community/xrlandbouw/">
        <img src="https://extinctionrebellion.nl/app/uploads/2020/07/XR-Landbouw_Wit.png" alt="Extinction Rebellion Landbouw">
      </a>
    </div>
  </div>
</div>

<script type="text/javascript">
  jQuery(document).ready(function($) {

    // Without javascript enabled this page only shows the noscript message
     $('.hero').show();
     $('#step-1').show();

     // When the form is submitted
    $(document).on('can_embed_submitted', function() {
      $('#step-1').fadeOut(300, function() {
        $('.hero').hide();
        $('#step-2').fadeIn(300);
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#step-2").offset().top
        }, 1000);
      });
    });

    // Expanding section toggles
    $('.more-info-toggle').click(function(e) {
      $(this).siblings('.more-info-text').slideToggle(300, function() {
         $(this).parent().toggleClass('active');
      });
      $(this).parent().siblings('.more-info-item').each(function () {
        $(this).removeClass('active');
        $(this).children('.more-info-text').slideUp(300);
      });
      e.preventDefault();
    });
  });
</script>


<?php
  wp_enqueue_script('smooth-scrolling');

  get_footer(null, array(
    'hidden'  => true
  ));
?>
