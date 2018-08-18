
<?php /* Template Name: Page About */ get_header(); ?>
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>
<?php $page__id = (int)(get_the_ID()); ?>
  <?php if (have_posts()): while (have_posts()) : the_post();


      $imageBG = '';
      if ( has_post_thumbnail()) {
        $imageBG =  'style="background-image: url(' . get_the_post_thumbnail_url($page__id, 'full') . ');"' ;
      } ?>




  <div class="page-title-wrapp">
    <div class="page-title-border">
      <div class="page-title-bg ">
        <div class="page-title-img" <?php echo $imageBG; ?>></div>
        <div class="container page-title-content head-padd">
          <div class="row">
            <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
            <h1 class="col-12 page-title"><?php the_title(); ?></h1>
          </div>
        </div>


      </div>
    </div>
  </div>



  <?php $partnersList = get_field('partners_list');
  if( $partnersList ): ?>
    <section class="about-partners">
      <div class="container">
        <div class="about-partners-list row">
          <?php foreach( $partnersList as $post):
            setup_postdata($post);
            $post__id = get_the_ID();
            if ( has_post_thumbnail()) {
              $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            } else {
              $image = catchFirstImage();
            }
            ?>
            <div class="partner-item about-partner-item col-md-4">
              <div class="row">
                <div class="col-12">
                  <div class="img-shadow"><div class="shadow"></div></div>
                  <div class="img-border"><div class="partner-img" style="background-image: url(<?php echo $image; ?>);"></div></div>
                </div>
                <div class="partner-content col-12">
                  <div class="partner-name"><?php the_field('partner_name'); ?></div>
                  <div class="partner-sename"><?php the_field('partner_sename'); ?></div>
                  <div class="partner-pos"><?php the_field('partner_position'); ?></div>
                  <div class="partner-educ"><?php the_field('partner_education'); ?></div>
                  <div class="partner-spec"><?php the_field('partner_speciality'); ?></div>
                  <?php if( have_rows('parner_rates') ): ?>
                    <div class="partner-rates">
                        <?php $i = 0;
                        while( have_rows('parner_rates') ): the_row();
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
                </div>
              </div>

            </div>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="page-quote quote-about bot-shadow">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1 quote-wrap">
          <blockquote><?php the_field('about_quote');?></blockquote>
          <div class="by-line"><?php the_field('aq_by_line');?></div>
        </div>
      </div>
    </div>
  </section>

  <section class="about-advantages bot-shadow">
    <?php if( have_rows('about_advs') ): ?>
      <div class="container">
        <div class="row">
          <div class="section-title col-12"><?php the_field('about_adv_title');?></div>
        </div>
        <div class="advantages-list row">
            <?php $i = 0;
            while( have_rows('about_advs') ): the_row();
              // vars
              $i++;
              ?>
              <div class="adv-item adv-<?php echo $i; ?> col-md-6 d-flex align-items-center"  style="background-image: url(<?php the_sub_field('icon'); ?>);">
                <div class="adv-title"><?php the_sub_field('text'); ?></div>
              </div>
            <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if( have_rows('about_activity') ): ?>
      <div class="about-activity">
        <div class="container">
          <div class="row">
            <div class="activity-title col-md-8 offset-md-2"><?php the_field('about_activity_title');?></div>
          </div>
        </div>
        <div class="activity-list">
            <?php $i = 0;
            while( have_rows('about_activity') ): the_row();
            $i++;
            ?>
            <div class="activity-item activ-<?php echo $i; ?>">
              <div class="img-shadow"><div class="shadow"></div></div>
              <div class="activity-img" style="background-image: url(<?php the_sub_field('bg_image'); ?>);"></div>
              <div class="container">
                <div class="row align-items-center justify-content-between">
                  <div class="col-md-5 act-title-wrap"><div class="act-title"><?php the_sub_field('title'); ?></div></div>
                  <div class="col-md-6 act-desc-wrap"><div class="act-desc"><?php the_sub_field('desc'); ?></div></div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
        <div class="container">
          <div class="row">
            <div class="activity-slogan col-md-6 offset-md-3"><?php the_field('about_slogan');?></div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </section>

  <?php endwhile; endif; ?>
  <section class="about-feedback bot-shadow">
    <div class="shared-socials"></div>
    <?php $contform = get_field('about_form');?>



    <div class="contact-form-wrap dark green-right">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-form-wrap">
            <div class="img-shadow"><div class="shadow"></div></div>
            <div class="cont-form-bg"></div>
            <div class="row">
              <div class="col-md-8 offset-md-2 cont-page-form">
                <?php echo do_shortcode($contform);?>
              </div>
            </div>
          </div>
          <div class="col-6"><div class="contact-form-bg about-form-bg"></div></div>
        </div>
      </div>
    </div>


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

