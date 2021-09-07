<?php
/**
 * Template name: Donations
 */

get_header(null, array(
  'navbar-logo' => 'xrnl-stacked-logo.svg'
));

// $fields = get_fields();
$show_content = true;

?>

<div id="donations">

  <?php if (true): ?>
  <!-- <section class="hero text-white py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.95)), url('https://extinctionrebellion.nl/app/uploads/2021/08/XR-09042021-ZeldaBonnet-27@0.5x.png') no-repeat center center / cover;"> -->
  <section class="hero text-white bg-xr-black py-5">
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
          <h1 class="display-3 text-uppercase font-xr">Steun Extinction Rebellion Nederland</h1>
          <!-- <p>De klimaatcrisis en de massale uitsterving van soorten vereist radicale actie. Jouw bijdrage is nú nodig, harder dan ooit. Alleen met jouw steun kunnen wij de straat op om systeemverandering en sociale rechtvaardigheid te eisen. Doe jij ook mee?</p> -->
          <p class="hero-text">Text text. Je kan een periodieke of eenmalige <a href="#donations-form" class="donations-accent yellow">bijdrage geven</a>, een bedrag op onze rekening <a href="#account-transfer" class="donations-accent red">overmaken</a>, of een <a href="#periodiek-schenken" class="donations-accent purple">periodieke schenking</a> regelen.</p>
        </div>
      </div>
    </div>
    <div class="hero-symbol right hero-symbol-yellow">
      <?php
        $symbol_svg = file_get_contents(get_template_directory_uri() . '/assets/images/turtle.svg', false, getContext(WP_ENV));
        echo $symbol_svg;
      ?>
    </div>    
  </section>
  <?php endif ?>

  <?php if ($show_content): ?>
  <section id="donations-form" class="xrnl-donations-form main-section yellow">
    <div class="container-fluid">
        <div class="row">
          <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
            <?php the_content(); ?>
          </div>
        </div>
    </div>
  </section>
  <?php endif ?>

  <?php if (true): ?>
  <section id="donate-via-whydonate" class="main-section yellow">
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
          <h2>Een structurele of eenmalige bijdrage op Whydonate</h2>
          <p>Je kunt een losse, of maandelijkse gift maken op het crowdfund platform van Whydonate. Houd de pagina ook in de gaten voor specifieke campagnes, zoals tijdens een rebellie, of voor het dekken van juridische kosten na een actie. </p>
          <div class="row pt-3">
            <div class="mx-auto">
              <a class="btn btn-lg btn-black" href="https://www.whydonate.nl/fundraising/help-extinction-rebellion-nederland">Doneer via crowdfunding</a>
            </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif ?>

  <section id="account-transfer" class="main-section red">
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
          <h2>Een direct gift op het rekeningnummer van Extinction Rebellion NL</h2>
          <p>Je kunt natuurlijk ook direct een bedrag overboeken op het rekeningnummer van Extinction Rebellion Nederland. Wij zijn ontzettend dankbaar voor alle bijdragen vanuit onze rebelse achterban. Houd wel in gedachten dat structurele en periodieke donaties voor ons inzichtelijker zijn en daarmee efficiënter te besteden aan onze doelstellingen. Toch liever een eenmalige bijdrage direct op het rekening nummer? Je kunt een bedrag overmaken op</p>
          <p class="text-center font-weight-bold">NL86SNSB0783148674 <em>t.n.v.</em> Stichting Vrienden van XR</p>
          <div class="pl-3 mt-4">
            <div class="ps-more-info">
                <span id="reveal-ps-why" class="ps-info-toggle reveal-ps-info">Scan QR code</span>
                <span id="hide-ps-why" class="ps-info-toggle hide-ps-info" style="display: none;">Verberg QR code</span>
            </div>
              <div class="ps-info-text" style="display: none;">
                <div class=row>
                <div class="col-10 col-md-8 col-lg-5 col-xl-4 mx-auto pt-4">
                  <img src="https://extinctionrebellion.nl/app/uploads/2021/08/qr-code.png" alt="Stichting Vrienden van XR SEPA link">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="periodiek-schenken" class="main-section purple">
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
          <h2>Periodiek Schenken met belastingvoordeel</h2>
          <p>Denk je er aan om Extinction Rebellion Nederland voor een langere tijd te ondersteunen? Overweeg dan om een periodieke schenking te maken. Met periodiek schenken leg je met belastingvoordeel voor 5 jaar een bedrag naar eigen keuze vast. Hierdoor ontvangen wij achter de eindstreep een hogere donatie, terwijl voor jou het bedrag hetzelfde blijft. Zo kunnen wij dus in jou naam nog vaker de straat op!</p>
          <!-- <p>Je kunt een periodieke schenking eenvoudig regelen via <a href="https://www.periodiekschenken.nl/extinction-rebellion">
            <img src="https://extinctionrebellion.nl/app/uploads/2021/07/periodiekschenken_logo.png" alt="periodiek schenken logo" style="height: 1.2rem; display: inline; margin-left: .2rem;"></a>
          </p> -->
          <p>Je kunt een periodieke schenking eenvoudig regelen via <a href="https://www.periodiekschenken.nl/extinction-rebellion">periodiekschenken.nl</a>
          </p>

          <div class="pl-3 mt-4">
            <div class="ps-more-info">
              <span id="reveal-ps-info" class="ps-info-toggle reveal-ps-info">Waarom periodiek schenken?</span>
              <span id="hide-ps-info" class="ps-info-toggle hide-ps-info" style="display: none;">Waarom periodiek schenken?</span>
            </div>
            <div class="ps-info-text" style="display: none;">
              <ul>
                <li>Je geeft meer, zonder dat het jou extra geld kost. En meer inkomsten betekent meer actie!</li>
                <li>Dankzij jou periodieke schenking hebben wij een stabiele basis van inkomsten en de mogelijkheid om voorruit te plannen.</li>
                <li>We betalen geen schenkbelasting, dus jou gift kan volledig worden ingezet voor een duurzame en rechtvaardige wereld.</li>
                <li>Je kunt zelf een bedrag bepalen.</li>
              </ul>
            </div>
            <div class="ps-more-info">
              <span id="reveal-ps-info" class="ps-info-toggle reveal-ps-info">Praktische zaken</span>
              <span id="hide-ps-info" class="ps-info-toggle hide-ps-info" style="display: none;">Praktische zaken</span>
            </div>
            <div class="ps-info-text" style="display: none;">
              <ul>
                <li>De periodieke gift moet worden vastgelegd in een overeenkomst. Deze kan makkelijk geregeld worden via www.periodiekschenken.nl/extinction-rebellion.</li>
                <li>Er dient minimaal 5 jaar achtereen, ten minste eenmaal per jaar een vast bedrag geschonken te worden.</li>
                <li>Door tijdsverloop of voortijdig overlijden van de schenker eindigt de verplichting tot betaling.</li>
                <li>De jaarlijkse schenking is in beginsel geheel aftrekbaar in het jaar dat de betaling wordt gedaan.</li>
              </ul>
            </div>
            <div class="ps-more-info">
              <span id="reveal-ps-why" class="ps-info-toggle reveal-ps-info">Meer weten?</span>
              <span id="hide-ps-why" class="ps-info-toggle hide-ps-info" style="display: none;">Meer weten?</span>
            </div>
            <div class="ps-info-text" style="display: none;">
              <ul>
                <li>Lees de <a href="https://extinctionrebellion.nl/app/uploads/2021/01/schenken-informatie-over-periodiek-schenken.pdf">aanvullende informatie over periodiek schenken (PDF)</a></li>
                <li>Of neem contact op via <a href="mailto:fondsenwerving@extinctionrebellion.nl">fondsenwerving@extinctionrebellion.nl</a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <?php  
    $cdata = array(
      array(
        'label' => 'Actiekosten',
        'short_label' => 'Acties',
        'value' => 42
      ),
      array(
        'label' => 'Promotiekosten',
        'short_label' => 'Promotie',
        'value' => 15
      ),
      array(
        'label' => 'Juridische kosten',
        'short_label' => 'Juridisch',
        'note' => '(geen boetes)',
        'value' => 12
      ),
      array(
        'label' => 'Trainingskosten',
        'short_label' => 'Training',
        'note' => '(NVDA & Talks)',
        'value' => 8
      ),
      array(
        'label' => 'Global support',
        'note' => '(Steun voor XR groepen wereldwijd)',
        'value' => 8
      ),
      array(
        'label' => 'Wervingskosten',
        'short_label' => 'Werving',
        'note' => '',
        'value' => 6
      ),
      array(
        'label' => 'Huurkosten actieruimten',
        'short_label' => 'Actieruimten',
        'note' => '',
        'value' => 5
      ),
      array(
        'label' => 'Automatiseringskosten',
        'short_label' => 'Automatisering',
        'note' => 'en div.',
        'value' => 3
      ),
      array(
        'label' => 'Administratiekosten',
        'short_label' => 'Administratie',
        'note' => '',
        'value' => 1
      )

    );
    // Get the largest value of all data points
    function xrnl_get_max_dp($arr) {
      $max=0;
      foreach ($arr as $dp) {
        if ($dp['value'] > $max) {
          $max = $dp['value'];
        }
      }
      return $max;
    }
    $max_dp = xrnl_get_max_dp($cdata);
  ?>
  <section>
    <div class="container-fluid bg-xr-yellow pt-4">
      <div class="expenses-chart row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-7 col-xl-7 mx-auto">
          <h2 class="mb-2 mb-md-1">Waar je steun aan bijdraagt:</h2>
          <div class="selected-dp-info row">
            <div class="col-10">
              <span class="dp-info-item dp-info-label"></span>
              <span class="dp-info-item dp-info-note pr-4"></span>
            </div>
            <span class="dp-info-item dp-info-value text-right font-xr col-2"></span>
          </div>
            <?php
              $elcount = 0;
              foreach($cdata as $datapoint) :
                $elcount++;
            ?>
            <div class="chart-line row"
              data-label  = "<?php echo $datapoint['label']; ?>"
              data-note   = "<?php echo $datapoint['note'] ?: ''; ?>"
              data-value  = "<?php echo $datapoint['value']; ?>"
            >
              <div class="dp-label line-segment col-6 col-sm-5 col-md-5 col-lg-4 text-right">
                  <?php echo $datapoint['short_label'] ?: $datapoint['label'] ?>
              </div>
              <div class="line-segment col-4 col-sm-5 col-md-6 col-lg-7">
                <div class="dp-bar" style="width: <?php echo ($datapoint['value'] / $max_dp) * 100 ?>%">
                </div>
              </div>
              <div class="dp-value line-segment col-1 text-right">
                <?php echo $datapoint['value']; ?>%
              </div>
            </div>
          <?php endforeach; ?>

          <p class="text-center mt-5">
            Meer weten over inkomsten en uitgaven van Extinction Rebellion NL?<br><a href="https://extinctionrebellion.nl/stichting-vrienden-van-xr/#financiele-verantwoording">Kijk hier</a>
          </p>
        </div>
      </div>
    </div>
  </section>

</div>

<script type="text/javascript">
   jQuery(document).ready(function($) {

    // Expanding section toggles
      $('.ps-info-toggle').click(function(e) {
        $(this).toggle();
        $(this).siblings('.ps-info-toggle').toggle();
        $(this).parent().next('.ps-info-text').slideToggle(300);
        e.preventDefault();
      });

    // Show additional expense info on hover
      $('.chart-line').hover(function() {
        $('.dp-info-label').text($(this).attr('data-label'));
        $('.dp-info-note').text($(this).attr('data-note'));
        $('.dp-info-value').text($(this).attr('data-value')+'%');
        $('.selected-dp-info').addClass('active');
      }, function() {
        $('.dp-info-item').text('');
        $('.selected-dp-info').removeClass('active');
      });

    // Tweaking the styling of the payment form
      $('.xrnl-donations-form').find('form').addClass('payment-form');
      $('.payment-form').children().addClass('form-child');
      $('[id^="rfmp_open_amount"].form-child').addClass('payment-amount show');
      $('.payment-amount').find('input').addClass('amount-input show');
      $('.amount-input').attr('value',5);
      $('[label^="Betaalmethode"].form-child').addClass('payment-method show');
      $('ul[id^="form"].form-child').addClass('options-list');
      $('.options-list').first().addClass('payment-options show');
      $('[id^="rfmp_checkbox"].form-child').addClass('payment-consent');
      $('.form-child').has('button').addClass('payment-button show');
      $('.form-child').has('input[type=text]').addClass('payment-name-input show');
      $('.form-child').has('input[type=email]').addClass('payment-email-input show');

      // Only show selected form elements & hide everything else
      $('.form-child').not('.show').addClass('d-none');

      // Remove info in brackets from labels
      $('.options-list > li > label').each(function() {
        var html = $(this).html();
        $(this).html(html.replace(/\(.*\)/g,""));
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