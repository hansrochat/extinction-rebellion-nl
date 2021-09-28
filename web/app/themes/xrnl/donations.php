<?php
/**
 * Template name: Donations
 */

get_header(null, array(
  'navbar-logo' => 'xrnl-stacked-logo.svg',
  'bg-color' => 'blue',
  'accent-color' => 'white'
));

// $fields = get_fields();

?>
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

<div id="donations">

  <?php if (true): ?>
  <section class="hero">
    <div class="bg-symbol right large d-none d-md-block">
      <?php
        $symbol_svg_right = file_get_contents(get_template_directory_uri() . '/dist/images/turtle.svg', false, xrnl_get_context(WP_ENV));
        echo $symbol_svg_right;
      ?>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
          <h1 class="display-3 text-uppercase font-xr">Steun de rebellie</h1>
          <p class="hero-text">De klimaatcrisis en de massale uitsterving van soorten vereist radicale actie. Extinction Rebellion Nederland komt in opstand voor al het leven op aarde en eist systeemverandering. Alleen met jou bijdrage kunnen wij de straat op.</p> 
          <a class="btn btn-black btn-lg my-2" href="https://www.whydonate.nl/fundraising/xr-nederland-najaarsrebellie-2021/nl">Doneer nu</a>
        </div>
      </div>
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto mt-5">
          <h3 class="font-xr">Direct naar</h3>
          <ol class="direct-links">
            <li><a href="#structurele-bijdrage">Structurele bijdrage</a></li>
            <li><a href="#periodieke-schenking">Periodieke schenking met belastingvoordeel</a></li>
            <li><a href="#losse-giften">Losse giften</a></li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <?php endif ?>

  <?php if (false): ?>
  <section id="donations-successes">
    <div class="row">
      <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <h2 class="font-xr">Onze successen</h2>
        coming soon
      </div>
    </div>
  </section>
  <?php endif ?>

  <?php if (true): ?>
  <section id="expenses-chart">
    <div class="container-fluid">
      <div class="expenses-chart row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-7 col-xl-7 mx-auto">
          <h2 class="mb-2 mb-md-1">Waar je steun aan bijdraagt:</h2>
          <div class="selected-dp-info row">
            <div class="col-10">
              <span class="dp-info-item dp-info-label"></span>
              <span class="dp-info-item dp-info-note pr-4"></span>
            </div>
            <span class="dp-info-item dp-info-value text-right font-xr col-2 d-none d-sm-block"></span>
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
        </div>
      </div>
    </div>
  </section>
  <?php endif ?>

  <section id="structurele-bijdrage">
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
          <h2>1. Structurele bijdrage</h2>
          <p>Je kunt een structurele gift maken aan Extinction Rebellion. Maandelijkse, of jaarlijkse donaties vormen de basis van onze inkomsten en zorgen ervoor dat wij constante druk op onze regering kunnen uitoefenen.</p>
          <a class="btn btn-lg my-2 btn-black" href="https://doneren.extinctionrebellion.nl/steun-xrnl">Doneer</a>
        </div>
      </div>
    </div>
  </section>

  <section id="periodieke-schenking">
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
          <h2>2. Periodieke Schenking met belastingvoordeel</h2>
          <p>Zit je er aan te denken om Extinction Rebellion Nederland voor een langere tijd te ondersteunen? Met een periodieke schenking krijg je belastingvoordeel op je gift. Je kiest voor een periode van 5 jaar een vast bedrag. Dit bedrag is aftrekbaar bij de belasting. Hierdoor ontvangen wij achter de eindstreep een hogere donatie, terwijl voor jou het bedrag hetzelfde blijft. Zo kunnen wij in jou naam nog vaker de straat op!</p>
          <p>Je kunt een periodieke schenking eenvoudig regelen via <a href="https://www.periodiekschenken.nl/extinction-rebellion">periodiekschenken.nl</a>.</p>
          <a class="btn btn-black btn-lg my-2" href="https://www.periodiekschenken.nl/extinction-rebellion">Naar periodiek schenken</a>
          <div class="pl-3 mt-4">
            <div class="more-info-item">
              <span id="reveal-more-info" class="more-info-toggle reveal-more-info">Waarom periodiek schenken?</span>
              <span id="hide-more-info" class="more-info-toggle hide-more-info" style="display: none;">Waarom periodiek schenken?</span>
              <div class="more-info-text" style="display: none;">
              <ul>
                <li>Je geeft meer, zonder dat het jou extra geld kost. En meer inkomsten betekent meer actie!</li>
                <li>Dankzij jou periodieke schenking hebben wij een stabiele basis van inkomsten en de mogelijkheid om voorruit te plannen.</li>
                <li>We betalen geen schenkbelasting, dus jouw gift kan volledig worden ingezet voor een duurzame en rechtvaardige wereld.</li>
                <li>Je kunt zelf een bedrag bepalen.</li>
              </ul>
              </div>
            </div>
            <div class="more-info-item">
              <span id="reveal-more-info" class="more-info-toggle reveal-more-info">Praktische zaken</span>
              <span id="hide-more-info" class="more-info-toggle hide-more-info" style="display: none;">Praktische zaken</span>
              <div class="more-info-text" style="display: none;">
                <ul>
                  <li>De periodieke gift moet worden vastgelegd in een overeenkomst. Deze kan makkelijk geregeld worden via <a href="http://www.periodiekschenken.nl/extinction-rebellion">www.periodiekschenken.nl/extinction-rebellion</a>.</li>
                  <li>Er dient minimaal 5 jaar achtereen, ten minste eenmaal per jaar een vast bedrag geschonken te worden.</li>
                  <li>Door tijdsverloop of voortijdig overlijden van de schenker eindigt de verplichting tot betaling.</li>
                  <li>De jaarlijkse schenking is in beginsel geheel aftrekbaar in het jaar dat de betaling wordt gedaan.</li>
                </ul>
              </div>
            </div>
            <div class="more-info-item">
              <span id="reveal-ps-why" class="more-info-toggle reveal-more-info">Meer weten?</span>
              <span id="hide-ps-why" class="more-info-toggle hide-more-info" style="display: none;">Meer weten?</span>
              <div class="more-info-text" style="display: none;">
                <ul>
                  <li>Lees de <a href="https://extinctionrebellion.nl/app/uploads/2021/01/schenken-informatie-over-periodiek-schenken.pdf">aanvullende informatie over periodiek schenken (PDF)</a></li>
                  <li>Of neem contact op via <a href="mailto:fondsenwerving@extinctionrebellion.nl">fondsenwerving@extinctionrebellion.nl</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="losse-giften">
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
          <h2>3. Losse giften</h2>
          <p>Alle losse giften zijn ontzettend welkom en kunnen direct ingezet worden voor radicale klimaat acties. Je kunt hier een eenmalige bijdrage leveren:</p>
          <a class="btn btn-black btn-lg my-2" href="https://www.whydonate.nl/fundraising/xr-nederland-najaarsrebellie-2021/nl">Doneer</a>
          <p class="mt-4">Je kunt natuurlijk ook direct een bedrag overboeken op het rekeningnummer van Extinction Rebellion Nederland. Je maakt een bedrag over op:</p>
          <p class="font-weight-bold">NL86SNSB0783148674 t.n.v. Stichting Vrienden van XR</p>
          <div class="pl-3 mt-4">
            <div class="more-info-item">
              <span id="reveal-ps-why" class="more-info-toggle reveal-more-info">Of scan de QR code</span>
              <span id="hide-ps-why" class="more-info-toggle hide-more-info" style="display: none;">Verberg QR code</span>
              <div class="more-info-text" style="display: none;">
                <div class=row>
                  <div class="col-10 col-md-8 col-lg-5 col-xl-4 mx-auto pt-4">
                    <img src="https://extinctionrebellion.nl/app/uploads/2021/09/qr-code.png" alt="Stichting Vrienden van XR SEPA link">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="stichting">
    <div class="bg-symbol left d-none d-md-block">
      <?php
        $symbol_svg_left = file_get_contents(get_template_directory_uri() . '/dist/images/xr-lisca.svg', false, xrnl_get_context(WP_ENV));
        echo $symbol_svg_left;
      ?>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
          <h2>Meer weten over Stichting Vrienden van XR?</h2>
          <p>De gelden van Extinction Rebellion Nederland worden beheerd door Stichting Vrienden van XR. Jou donaties komen daarom eerst terecht bij de stichting. <a href="https://extinctionrebellion.nl/stichting-vrienden-van-xr/">Meer weten?</a></p>
          <div class="text-right mb-3">
            <a href="#">
              <img id="anbi-logo" class="d-inline-block" src="https://extinctionrebellion.nl/app/uploads/2021/09/anbi-logo.png" alt="ANBI logo">
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