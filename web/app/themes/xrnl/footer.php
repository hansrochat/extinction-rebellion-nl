
<?php
  // Optional arguments for get_footer()
  $args = wp_parse_args($args, array(
    'hidden'        => false // hides the footer if true
  ));
?>

  </main>
  <?php if (!$args['hidden']): ?>
  <footer class="bg-black pt-5">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <p>Extinction Rebellion Nederland is een grassroots beweging geïnspireerd op <a href="https://extinctionrebellion.uk" target="_blank" onclick="<?= register_button_click('XR UK link', 'footer') ?>">Extinction Rebellion UK</a>.</p>
              </div>

              <div class="col-md-4 my-4">
                  <?php wp_nav_menu( [
                  'theme_location'         => 'footer-1',
                  'menu_class'             => 'list-unstyled',
                  'clicks_page_identifier' => 'footer',
                  'fallback_cb'            => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'                 => new WP_Bootstrap_Navwalker(),
                  ] ); ?>
              </div>

              <div class="col-md-4 my-4">
                  <?php wp_nav_menu( [
                  'theme_location'         => 'footer-2',
                  'menu_class'             => 'list-unstyled',
                  'clicks_page_identifier' => 'footer',
                  'fallback_cb'            => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'                 => new WP_Bootstrap_Navwalker(),
                  ] ); ?>
              </div>

              <div class="col-md-4 my-4 text-right">

                  <?php wp_nav_menu( [
                  'theme_location' => 'language',
                  'menu_class'      => 'list-unstyled',
                  'container_id'    => 'language-selector',
                  'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'          => new WP_Bootstrap_Navwalker(),
                  ] ); ?>

                  <div class="donate donate--footer">
                      <a href="<?php echo get_locale() === 'en_US' ? '/en/donate' : '/donate' ?>" class="btn btn-primary" target="_blank" onclick="<?= register_button_click('donate', 'footer') ?>"><?php _e('donate'); ?></a>
                  </div>

                  <br />

                  <ul class="list-inline">
                      <li class="list-inline-item">
                          <a href="https://www.facebook.com/ExtinctionRebellionNL/" target="_blank" aria-label="facebook" onclick="<?= register_button_click('Facebook icon', 'footer') ?>">
                              <span class="fa-stack fa-1x text-center">
                              <i class="fab fa-facebook-f"></i>
                              <i class="far fa-circle fa-stack-2x"></i>
                              </span>
                          </a>
                      </li>
                      <li class="list-inline-item">
                          <a href="https://twitter.com/nlrebellion" target="_blank" aria-label="twitter" onclick="<?= register_button_click('Twitter icon', 'footer') ?>">
                              <span class="fa-stack fa-1x text-center">
                              <i class="fab fa-twitter"></i>
                              <i class="far fa-circle fa-stack-2x"></i>
                              </span>
                          </a>
                      </li>
                      <li class="list-inline-item">
                          <a href="https://www.instagram.com/extinctionrebellionnl/?hl=nl" target="_blank" aria-label="instagram" onclick="<?= register_button_click('Instagram icon', 'footer') ?>">
                              <span class="fa-stack fa-1x text-center">
                              <i class="fab fa-instagram"></i>
                              <i class="far fa-circle fa-stack-2x"></i>
                              </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </footer>
  <?php endif; ?>


<?PHP wp_footer(); ?>
</body>

</html>
