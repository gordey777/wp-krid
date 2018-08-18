  </div><!-- /wrapper -->
  <?php $front__id = (int)(get_option( 'page_on_front' )); ?>
  <footer role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-12 footer-logo-wrap order-0">
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
            <?php pll_e('Юридична фірма “Kirda&Partners”'); ?>. 2010-<?php echo date("Y"); ?>. <?php pll_e('ВСІ ПРАВА ЗАХИЩЕНІ'); ?>.
          </p><!-- /copyright -->
        </div>
        <nav class="col-lg-4 col-sm-6 footer-nav-wrap order-lg-1 order-2">
          <?php wpeFootNav(); ?>
        </nav>
        <div class="col-lg-4 footer-social-wrap order-lg-3 offset-lg-0 col-sm-8 offset-sm-2 order-4">
          <div class="soc-title"><?php pll_e('Приєднуйтесь та слідкуйте за нашими новинами'); ?></div>
            <a href="<?php the_field('facebook_link', $front__id); ?>" class="footer-social"><i class="fa fa-facebook"></i><?php the_field('facebook_title', $front__id); ?></a>
        </div>
        <div class="col-lg-4 footer-contacts order-lg-4 col-sm-6 order-3">

            <div class="contacts-item contact-address"><?php the_field('contact_address', $front__id);?></div>
            <div class="contacts-item worktime"><?php the_field('worktime', $front__id);?></div>
            <?php if( have_rows('contacts_phones', $front__id) ): ?>
              <div class="contacts-item contact-phones">
                <?php $i = 0;
                while( have_rows('contacts_phones', $front__id) ):
                  the_row();
                  if( $i < 2){ ?>
                    <a href="tel:+<?php echo preg_replace("/[^0-9]/", '', get_sub_field('phone')); ?>" class="contact-phone"><?php the_sub_field('phone');?></a>
                  <?php }
                  $i++;
                endwhile; ?>
              </div>
            <?php endif; ?>

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
