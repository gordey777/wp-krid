<?php /* Template Name: Home Page */ get_header(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <?php $front__id = (int)(get_option( 'page_on_front' )); ?>
  <section class="section-services">
    <div class="page-title-wrapp">
      <div class="page-title-border">
        <div class="page-title-bg">
          <?php if( have_rows('main_slider') ): ?>
            <div  id="main_slider" class="main-slider owl-carousel">
              <?php $i = 0;
              while( have_rows('main_slider') ): the_row();
                // vars
                $i++;
                $image = get_sub_field('img');
                ?>
                <div class="slide head-padd" data-dot="<?php echo $i; ?>">
                  <div class="slide-bg" style="background-image: url(<?php echo $image['url']; ?>)"></div>
                  <div class="container">
                    <div class="row">
                      <div class="slide-content col-lg-6 offset-lg-3 col-sm-10 offset-sm-1">
                        <div class="slide-slog"><?php the_sub_field('slog'); ?></div>
                        <div class="slide-title"><?php the_sub_field('title'); ?></div>
                        <div class="slide-label"><?php the_sub_field('phone_label'); ?></div>
                        <a href="tel:+" class="slide-tel"><?php the_sub_field('phone'); ?></a>
                      </div>
                    </div>
                  </div>
                </div><?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <?php $servList = get_field('serv_list');
    if( $servList ): ?>
    <div class="services">
      <div class="container">
        <div class="row">
          <div class="section-title col-12"><?php the_field('serv_title'); ?></div>
        </div>
      <?php $i = 0; ?>
      <?php $k = 0; ?>
      <div class="row">
        <?php foreach( $servList as $post):
          setup_postdata($post);
          $k++;
          $post__id = get_the_ID();
          if ( has_post_thumbnail()) {
            $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
          } else {
            $image = catchFirstImage();
          }
          $icon = get_field('type_icon');
          if ($i > 4) {
            $i = 0;
          }
          if ($k > 10) {
            $k = 1;
          }
          if ($i == 0 || $i == 1) {?>
          <a href="<?php the_permalink(); ?>" class="service-item-wrap item-<?php echo $k; ?> col-md-6" title="<?php the_title(); ?>">
            <div class="service-item row">
              <div class="service-img col-lg-8 col-6" style="background-image: url(<?php echo $image; ?>);"></div>
              <div class="service-title col-lg-4 col-6 d-flex flex-row align-items-center justify-content-center"><?php the_title(); ?></div>
              <div class="service-rate"><?php the_field('serv_rate');?></div>
            </div>
          </a>
          <?php } else {?>
            <a href="<?php the_permalink(); ?>" class="service-item-wrap item-<?php echo $k; ?> col-lg-4 col-md-6" title="<?php the_title(); ?>">
              <div class="service-item row">
                <div class="service-img col-lg-7 col-6" style="background-image: url(<?php echo $image; ?>);"></div>
                <div class="service-title col-lg-5 col-6 d-flex flex-row align-items-center justify-content-center"><?php the_title(); ?></div>
                <div class="service-rate"><?php the_field('serv_rate');?></div>
              </div>
            </a>
          <?php }?>
          <?php $i++; ?>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
    <?php endif; ?>
  </section>

  <?php if( have_rows('advantages') ): ?>
    <section class="advantages bot-shadow">
      <div class="over-wrapper">
        <div class="container">
          <div class="row">
            <div class="section-title dark col-12"><?php the_field('adv_title'); ?></div>
          </div>
          <div class="adv-items row">
            <?php $i = 0;

            while( have_rows('advantages') ): the_row();
              // vars
              $i++;
              $image = get_sub_field('icon');
              ?>
              <div class="adv-item col-sm-4">
                <div class="adv-icon-wrap">
                <div class="adv-icon-border">
                  <div class="icon" style="background-image: url(<?php echo $image['url']; ?>)"></div>
                </div>
                </div>
                <div class="adv-item-title"><?php the_sub_field('title'); ?></div>
                <div class="adv-item-desc"><?php the_sub_field('desc'); ?></div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>


<?php $partnersList = get_field('partners_list');
  if( $partnersList ): ?>
  <section class="partners">
    <div class="container">
      <div class="row">
        <div class="section-title col-12"><?php the_field('home_partners_title'); ?></div>
      </div>
      <div class="partners-slider owl-carousel">
        <?php foreach( $partnersList as $post):
          setup_postdata($post);
          $post__id = get_the_ID();
          if ( has_post_thumbnail()) {
            $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
          } else {
            $image = catchFirstImage();
          }
          ?>
          <div class="partner-item-wrap container-fluid">
            <div class="row">
              <div class="partner-item col-lg-10 offset-lg-1">
                <div class="row">
                  <div class="col-md-6 offset-md-0 img-wrap col-8 offset-2">
                    <div class="img-shadow">
                      <div class="shadow"></div>
                    </div>
                      <div class="img-border">
                        <div class="partner-img" style="background-image: url(<?php echo $image; ?>);"></div>
                      </div>

                  </div>
                  <div class="partner-content col-md-6">
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
            </div>
          </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      </div>
      <div class="row">
        <div class="col-12 btn-wrap">
          <a href="<?php the_field('link_partners'); ?>" class="btn btn-light"><?php pll_e('ДЕТАЛЬНІШЕ ПРО КОМАНДУ'); ?></a>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php if( have_rows('why_list') ): ?>
    <section class="home-why bot-shadow">
      <div class="over-wrapper">
      <div class="container">
        <div class="row">
          <div class="section-title dark col-12"><?php the_field('why_title'); ?></div>
          <div class="subtitle"><?php the_field('why_subtitle'); ?></div>
        </div>
        <div class="why-items row">
          <?php $i = 0;
          while( have_rows('why_list') ): the_row();
            // vars
            $i++;
            $image = get_sub_field('icon');
            ?>
            <div class="why-item col-sm-4">
              <div class="why-icon-wrap">
                <div class="icon" style="background-image: url(<?php echo $image['url']; ?>)"></div>
              </div>
              <div class="why-item-title"><?php the_sub_field('title'); ?></div>
              <div class="why-item-desc"><?php the_sub_field('desc'); ?></div>
            </div>
          <?php endwhile; ?>
        </div>
        <div class="row">
          <div class="col-12 btn-wrap">
            <a href="<?php the_field('link_partners'); ?>" class="btn btn-red dark btn-decor"><?php pll_e('ОТРИМАТИ КОНСУЛЬТАЦІЮ'); ?></a>
          </div>
        </div>
      </div>
      </div>
    </section>
  <?php endif; ?>

  <section id="post-<?php the_ID(); ?>" <?php post_class('home-about bot-shadow'); ?>>
    <div class="container">
      <div class="row">
        <div class="section-title col-12"><?php the_field('about_title'); ?></div>
        <div class="col-md-5">
          <?php if ( has_post_thumbnail()) { ?>
            <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
          <?php } ?>
        </div>
        <div class="col-md-7"><?php edit_post_link(); ?><?php the_content(); ?><div class="about-slogan"><?php the_field('about_slogan'); ?></div></div>
        <div class="col-12 btn-wrap">
          <a href="<?php the_field('home_about_link'); ?>" class="btn btn-light"><?php pll_e('ДЕТАЛЬНІШЕ ПРО ФІРМУ'); ?></a>
        </div>
      </div>
    </div>
  </section>

  <?php $blogID = get_field('blog_cat');
  if( $blogID ):
    $blogArgs = array(
        'post_type'     => 'post',
        'posts_per_page'  => 4,
        'cat'       => $blogID,
        'post_status'       => 'publish',
        'orderby'     => 'date',
        'order'       => 'DESC'
    );
    $blog_query = new WP_Query( $blogArgs );
    $i = 0;
    ?>
    <section class="home-blog">
      <div class="container">
        <div class="row">
          <div class="section-title col-12"><?php the_field('blog_title'); ?></div>
        </div>
        <div class="row blog-items">
          <?php while ( $blog_query->have_posts() ) :
            $blog_query->the_post();
            if ( has_post_thumbnail()) {
              $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            } else {
              $image = catchFirstImage();
            }
            $trimTitle = get_the_title();
            $maxchar = 45;
            if ( mb_strlen( $trimTitle ) > $maxchar ){
              $trimTitle = mb_substr( $trimTitle, 0, $maxchar ) .'...';
            }

            $itemClass = 'col-lg-4';
            $contentClass = 'col-12';
            if ( $i == 0) {
              $itemClass = 'col-lg-12 first-item';
              $contentClass = 'col-lg-6';
            } ?>
              <div id="post-<?php the_ID(); ?>" class="looper <?php echo $itemClass; ?>">
                <div  <?php post_class('row d-flex align-items-stretch align-content-start flex-wrap'); ?>>
                  <a href="<?php the_permalink(); ?>" class="<?php echo $contentClass; ?> item-thumb-wrap ratio" data-hkoef=".55" title="<?php the_title(); ?>" rel="nofollow">
                    <div class="item-thumb" style="background-image: url(<?php echo $image; ?>)"></div>
                  </a>
                  <div class="item-content <?php echo $contentClass; ?>">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="nofollow" class="item-title"><?php echo $trimTitle; ?><div class="title-decor"></div></a>
                    <div class="item-text"><?php wpeExcerpt('wpeExcerpt40'); ?></div>
                    <div class="more-wrap"><a href="<?php the_permalink(); ?>" class="btn more-btn" title="<?php the_title(); ?>"><?php pll_e('ДЕТАЛЬНІШЕ'); ?></a></div>
                  </div>
                </div>
              </div>
            <?php
            $i++;
          endwhile;
          wp_reset_query();
          ?>
        </div>
        <div class="row">
          <div class="col-12 btn-wrap">
            <a href="<?php echo get_category_link(get_field('blog_cat')); ?>" class="btn btn-red"><?php pll_e('ЧИТАТИ ВСІ'); ?></a>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

 <?php if( have_rows('revs_list') ): ?>
  <section class="reviews bot-shadow">
    <div class="container">
      <div class="row">
        <div class="section-title dark col-12"><?php the_field('revs_title'); ?></div>
      </div>
      <div class="reviews-slider owl-carousel">
        <?php while( have_rows('revs_list') ):
          the_row();
          $image = get_sub_field('logo');?>
          <div class="rev-item-wrap container-fluid">
            <div class="row">
              <div class="rev-item col-lg-10 offset-lg-1">
                <div class="row">
                  <div class="col-sm-6 logo-wrap">
                    <div class="logo-border">
                      <div class="logo-shadow"></div>
                      <img src="<?php echo $image['sizes']['medium']; ?>" class="rev-logo" alt="<?php the_sub_field('title'); ?>">
                      <div class="rev-title"><?php the_sub_field('title'); ?></div>
                      <div class="rev-soc-wrap">
                        <a href="<?php the_sub_field('link'); ?>" class="rev-social"><i class="fa <?php the_sub_field('icon'); ?>"></i><?php the_sub_field('label'); ?></a>
                      </div>
                    </div>
                  </div>
                  <div class="revs-content col-sm-6">
                    <div class="content"><?php the_sub_field('content'); ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>

  <?php endif; ?>
  <section class="section-callback bot-shadow">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1 quote-wrap">
          <blockquote><?php the_field('feedback_quote', $front__id);?></blockquote>
          <div class="by-line"><?php the_field('fq_signature', $front__id);?></div>
        </div>
      </div>
    </div>
    <?php if(get_field('feedback_form', $front__id)):?>
      <?php $contform = get_field('feedback_form', $front__id);?>
      <div class="feedback-form">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 offset-lg-2 col-md-6 offset-md-1 col-sm-8 offset-sm-2 col-10 offset-1 contact-form-wrap">
              <div class="cont-form-decor"></div>
              <?php echo do_shortcode($contform);?>
            </div>
            <div class="col-6 cf-bg-wrap"><div class="contact-form-bg"></div></div>
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

<?php endwhile; endif; ?>


<?php get_footer(); ?>
