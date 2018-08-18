<?php  get_header();
$front__id = (int)(get_option( 'page_on_front' ));
$page__id = (int)(get_the_ID());?>

<?php if (have_posts()): while (have_posts()) : the_post();
  $imageBG = '';
  if ( has_post_thumbnail()) {
    $imageBG =  'style="background-image: url(' . get_the_post_thumbnail_url($partner__id, 'large') . ');"' ;
  } ?>

  <div class="page-title-wrapp text-page-title blure-bg">
    <div class="page-title-border">
      <div class="page-title-bg ">
        <div class="page-title-img" <?php echo $imageBG; ?>></div>
        <div class="container page-title-content head-padd">
          <div class="row">
            <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
            <h1 class="col-lg-8 offset-lg-2 page-title"><?php the_title(); ?></h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="page-body container">
    <div class="row">
      <div class="page-content col-lg-8 order-lg-1">
        <div class="row">
          <div class="col-12 page-content"><?php the_content(); ?></div>
        </div>
        <?php $servPartner = get_field('page_partner');
        if( $servPartner ): ?>
          <?php
          $partner__id = $servPartner->ID;
          if ( has_post_thumbnail($partner__id)) {
            $image = get_the_post_thumbnail_url($partner__id, 'medium');
          } else {
            $image = catchFirstImage();
          }?>
          <div class="row partner-item text-page-partner">
            <div class="col-md-5 offset-md-0 col-8 offset-2 img-wrap">
              <div class="img-shadow">
                <div class="shadow"></div>
              </div>
              <div class="img-border">
                <div class="partner-img" style="background-image: url(<?php echo $image; ?>);"></div>
              </div>
            </div>
            <div class="partner-content col-md-7">
              <div class="partner-name"><?php the_field('partner_name', $partner__id); ?></div>
              <div class="partner-sename"><?php the_field('partner_sename', $partner__id); ?></div>
              <div class="partner-pos"><?php the_field('partner_position', $partner__id); ?></div>
              <div class="partner-educ"><?php the_field('partner_education', $partner__id); ?></div>
              <div class="partner-spec"><?php the_field('partner_speciality', $partner__id); ?></div>
              <div class="row">
                <?php if( have_rows('parner_rates', $partner__id) ): ?>
                  <div class="partner-rates col-8">
                      <?php $i = 0;
                      while( have_rows('parner_rates', $partner__id) ): the_row();
                        // vars
                        $i++;
                        $image = get_sub_field('icon');
                        ?>
                        <div class="rate rate-<?php echo $i; ?>">
                          <div class="rate-val"><?php the_sub_field('val'); ?></div>
                          <div class="rate-label"><?php the_sub_field('label'); ?></div>
                        </div>
                      <?php endwhile; ?>
                  </div>
                <?php endif; ?>
                <div class="partner-contacts col-4">
                  <?php if (get_field('partner_phone', $partner__id)){ ?>
                    <a href="tel:+<?php echo preg_replace("/[^0-9]/", '', get_field('partner_phone', $partner__id)); ?>" class="part-phone"><?php echo mb_substr( get_field('partner_phone', $partner__id), 4); ?></a>
                  <?php } ?>
                  <?php if (get_field('partner_mail', $partner__id)){ ?>
                    <a href="mailto:<?php the_field('partner_mail', $partner__id); ?>" class="part-mail"><?php pll_e('НАДІСЛАТИ МЕЙЛ'); ?></a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>

      <?php if( get_field('page_quote') ): ?>
        <div class="row">
          <div class="col-8 offset-2 quote-wrap">
            <blockquote><?php the_field('page_quote');?></blockquote>
            <div class="by-line"><?php the_field('pageq_by_line');?></div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <?php endwhile; endif; ?>
  <section class="section-callback bot-shadow">
    <?php if(get_field('feedback_form', $front__id)):?>
      <?php $contform = get_field('feedback_form', $front__id);?>
      <div class="feedback-form">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 offset-lg-2 col-md-6 offset-md-1 col-sm-8 offset-sm-2 col-10 offset-1 contact-form-wrap">
              <div class="cont-form-decor"></div>
              <?php echo do_shortcode($contform);?>
            </div>
            <div class="col-6"><div class="contact-form-bg"></div></div>
          </div>
        </div>
      </div>
    <?php endif;?>
  </section>

  <section class="section-contacts bot-shadow">
    <?php $location = get_field('location', $front__id);
    if( !empty($location) ): ?>
      <div class="acf-map">
        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
      </div>
    <?php endif; ?>
    <div class="container">
      <div class="row">
        <div class="col-md-6 map-contacts-wrap">
          <div class="map-contacts">
            <div class="contacts-title"><?php the_field('contacts_title', $front__id);?></div>

            <div class="contacts-item contact-address"><?php the_field('contact_address', $front__id);?></div>
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
            <a href="mailto:<?php the_field('contact_mail');?>" class="contacts-item contact-mail"><?php the_field('contact_mail', $front__id);?></a>
            <div class="contacts-rout">
              <a href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>"><?php pll_e('ПРОКЛАСТИ МАРШРУТ'); ?></a></div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
