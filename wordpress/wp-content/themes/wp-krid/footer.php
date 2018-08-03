  </div><!-- /wrapper -->
  <?php $front__id = (int)(get_option( 'page_on_front' )); ?>
  <footer role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-12 footer-logo-wrap">
          <div class="logo">
            <?php if ( !is_front_page() && !is_home() ){ ?>
              <a href="<?php echo home_url(); ?>">
            <?php } ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>" class="logo-img">
            <?php if ( !is_front_page() && !is_home() ){ ?>
              </a>
            <?php } ?>
          </div><!-- /logo -->
          <p class="copyright">
            2010-<?php echo date("Y"); ?>.
          </p><!-- /copyright -->
        </div>
        <nav class="col-lg-4 footer-nav-wrap">
          <?php wpeFootNav(); ?>
        </nav>
        <div class="col-lg-4 footer-social">

        </div>
        <div class="col-lg-4 footer-contacts">

        </div>

      </div>
    </div>
  </footer><!-- /footer -->
  <div class="modal fade" id="callbackModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div id="modal_form_body" class="modal-content modal-form">
            <?php $feedform = get_field('callback_modal_form', $front__id);?>
            <?php echo do_shortcode($feedform);?>
      </div>
    </div>
  </div>

    <?php wp_footer(); ?>
  <script defer="defer" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZF31krTQH_5QnEpdIsEgmsBV-Iy884rE"></script>
</body>
</html>
