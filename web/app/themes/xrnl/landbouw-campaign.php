<?php
/**
 * Template name: Landbouw campaign
 */


get_header(null, array(
  'hidden'  => true
)); ?>


<?php

  function roundUpToNearest($n, $x=500) {
    return ceil( $n / $x ) * $x;
  }

  $actionnetwork_api_key = get_field('actionnetwork_api_key', 'option');

  $api_endpoint_english_form = 'https://actionnetwork.org/api/v2/forms/1ec97eef-a2d3-4d2f-bbef-e228e01593a9/';
  // $api_endpoint_english_form = get_field('api_endpoint_english_form');

  $response_en = wp_remote_get($api_endpoint_english_form, [
    'headers' => [
        'OSDI-API-Token'=> $actionnetwork_api_key
    ]
  ]);

  $data_en = json_decode($response_en['body'], true);
  $total_submissions_en = $data_en['total_submissions'];


  $api_endpoint_dutch_form = 'https://actionnetwork.org/api/v2/forms/e274d206-30ec-4443-85c0-1ce9c64746da/';
  // $api_endpoint_dutch_form = get_field('api_endpoint_dutch_form');

  $response_nl = wp_remote_get($api_endpoint_dutch_form, [
    'headers' => [
        'OSDI-API-Token'=> $actionnetwork_api_key
    ]
  ]);

  $data_nl = json_decode($response_nl['body'], true);
  $total_submissions_nl = $data_nl['total_submissions'];

  $total_submissions = $total_submissions_en + $total_submissions_nl;
  $max_submissions = roundUpToNearest($total_submissions+500, 1000);
  $percent = $total_submissions/$max_submissions*100;

?>

<?php
  // $primary_color = 'bright-pink';
  // $secondary_color = 'pink';
  // $text_accent_color = 'white';
  $primary_color = 'green';
  $secondary_color = 'white';
  $text_accent_color = 'white';
  $hero_symbol_color = 'black';
  // actionnetwork_shortcode = get_field('actionnetwork_shortcode');
  $actionnetwork_shortcode = '[actionnetwork id=76]';
?>

<div class="landbouw-campaign">

  <div class="container-fluid hero bg-xr-<?= $primary_color ?>">
    <div class="row">
      <div class="col col-12 col-xl-11 mx-auto">
        <h1 class="display-2 pt-2 pb-3 text-xr-black">Rabobank, <span class="text-xr-<?= $text_accent_color ?>">stop het financieren van de klimaatcrisis</span>.</h1>
        <div class="hero-symbol hero-symbol-<?= $hero_symbol_color ?>">
          <?php
            $symbol_svg = file_get_contents(get_template_directory_uri() . '/dist/images/XR-symbol.svg', false, getContext(WP_ENV));
            echo $symbol_svg;
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container-xl">
    <div id="step-1" class="row flex-md-row-reverse bg-xr-<?= $secondary_color ?>">

      <div class="col col-12 col-md-6 pt-4 pb-5 px-3">
        <h2 id="cta-heading"><?php _e('SIGN THE PETITION', 'theme-xrnl'); ?></h2>
        <div id="an-form-container">
          <?= do_shortcode($actionnetwork_shortcode) ?>
        </div>
      </div>
      <div class="col col-12 col-md-6 pt-3 pb-5 px-3">
        <div class="">
          <h2 class="text-uppercase font-xr">
            <span class="display-3" id="total-submissions"><?= $total_submissions ?></span> <?php _e('of', 'theme-xrnl'); ?> <span id="max-submissions"><?= $max_submissions ?></span> <?php _e('signatures', 'theme-xrnl'); ?>
          </h2>

          <div class="progress" style="height: 20px;border-radius: 5px; margin-bottom: 20px;">
            <div class="progress-bar" role="progressbar" style="width: <?= $percent ?>%; background: black" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

        <div class="pt-4">
          <h2>Subtitle</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, esse reiciendis itaque asperiores hic, ad repudiandae porro quaerat harum possimus impedit recusandae dolore perspiciatis aliquam quas incidunt deserunt temporibus modi.</p>
          <p>Daarom eisen we van de rabobank:</p>
          <div class="mt-4">
            <div class="xrnl-info-text" style="display: none;">
              <div class="pl-3 demands-list">
                <ol class="counter">
                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                  <li>Sequi, esse reiciendis itaque asperiores hic, ad repudiandae porro quaerat harum.</li>
                  <li>Possimus impedit recusandae dolore perspiciatis aliquam quas incidunt deserunt temporibus modi.</li>
                </ol>
              </div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, esse reiciendis itaque asperiores hic, ad repudiandae porro quaerat harum possimus impedit recusandae dolore perspiciatis aliquam quas incidunt deserunt temporibus modi.</p>
            </div>
            <div class="btn">
              <span class="xrnl-info-toggle xrnl-info-reveal"><?php _e('Show more', 'theme-xrnl'); ?></span>
              <span class="xrnl-info-toggle xrnl-info-hide" style="display: none;"><?php _e('Show less', 'theme-xrnl'); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="step-2" class="row flex-md-row-reverse pt-4 bg-xr-<?= $secondary_color ?>">
      <div class="col col-12 col-md-6 pt-4 pb-5 px-3 bg-xr-lemon">
        <div class="p-5">thank you</div>
        <div class="p-5">how about switching bank</div>
      </div>
      <div class="col col-12 col-md-6 pt-4 pb-5 px-3 bg-xr-pink">
        ?
      </div>
      <div class="col col-12 p-5 bg-xr-blue">
        donate
      </div>
      <div class="col col-12 p-5 mb-5 bg-xr-yellow">
        more about rabo rebellie
      </div>
    </div>
  </div>
  <div class="campaign-footer container-fluid">
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
      <div class="col col-12 col-md-7">
        <a class="btn" href="https://extinctionrebellion.nl/community/xrlandbouw/">2021 | Extinction Rebellion Landbouw</a>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

function increaseSignatures() {
  var submissionsField = jQuery('#total-submissions');
  var nSubmissions = parseInt(submissionsField.text());
  submissionsField.text(nSubmissions + 1);
}


jQuery(document).ready(function($) {

   // Expanding section toggles
     $('.xrnl-info-toggle').click(function(e) {
       $(this).toggle();
       $(this).siblings('.xrnl-info-toggle').toggle();
       $(this).parent().prev('.xrnl-info-text').slideToggle(300);
       e.preventDefault();
     });


     $('#step-2').hide();
    // When the form is submitted
      // $(document).on('can_embed_submitted', function() {
      $('#an-form-container').click(function() {

        increaseSignatures();

        $('#step-1').fadeOut(1000, function() {
          $('#step-2').fadeIn(1000);
        });

      });
   });
</script>

<?php get_footer(null, array(
  'hidden'  => true
)); ?>
