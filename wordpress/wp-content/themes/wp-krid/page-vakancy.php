<?php /* Template Name: Vacancy Page */ get_header();

$front__id = (int)(get_option( 'page_on_front' ));
$page__id = (int)(get_the_ID());?>

<?php if (have_posts()): while (have_posts()) : the_post();
  $imageBG = '';
  if ( has_post_thumbnail()) {
    $imageBG =  'style="background-image: url(' . get_the_post_thumbnail_url($partner__id, 'large') . ');"' ;
  } ?>

  <div class="page-title-wrapp  text-page-title">
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

  <section class="page-body vacancy-cont container ">
    <div class="row">
      <div class="page-content col-lg-8 order-lg-1">
        <div class="row">
          <div class="col-12 page-content"><?php the_content(); ?></div>
        </div>
        <?php if( have_rows('offer_list') ): ?>
          <div class="offers-list">

            <h2 class="offers-title col-12"><?php the_field('offer_title'); ?></h2>

            <div class="col-12">
              <div class="offer-items row">
                <?php $i = 0;

                while( have_rows('offer_list') ): the_row();
                  // vars
                  $i++;
                  ?>
                  <div class="offer-item col-sm-4">
                    <div class="offer-icon-wrap">
                      <div class="offer-icon-border">
                        <div class="icon" style="background-image: url(<?php the_sub_field('ico'); ?>)"></div>
                      </div>
                      <div class="img-shadow">
                        <div class="shadow"></div>
                      </div>
                    </div>
                    <div class="offer-item-desc"><?php the_sub_field('decs'); ?></div>
                  </div>
                <?php endwhile; ?>

              </div>
            </div>
          </div>
        <?php endif; ?>

      <?php if( have_rows('internship') ):
        $k = 0;?>
        <div class="intern-list row">
          <?php while( have_rows('internship') ):
            the_row();
            $img = get_sub_field('img');
            $k++;
            $btnClass = 'btn-green';
            if($k % 2 == 0){
              $btnClass = 'btn-red';
            }
            ?>
            <div class="col-12 intern-item-wrap">
              <div class="intern-item row ">
                <div class="col-sm-6 img-wrap">
                  <div class="img">
                    <div class="img-shadow"><div class="shadow"></div></div>
                    <div class="intern-img" style="background-image: url(<?php echo $img['sizes']['medium']; ?>);"></div>
                  </div>
                </div>
                <div class="intern-content col-sm-6 d-flex flex-column align-items-center justify-content-around">
                  <div class="intern-title"><?php the_sub_field('title'); ?></div>
                  <div class="intern-desc"><?php the_sub_field('desc'); ?></div>
                  <div class="btn-wrap"><a href="mailto:<?php the_field('contact_mail', $front__id);?>?subject=<?php echo rawurlencode(get_sub_field('title')); ?>" class="btn <?php echo $btnClass; ?>"><?php pll_e('ВІДПРАВИТИ ЗАЯКУ'); ?></a></div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

        <div class="row more-contacts-wrap">
          <div class="img-shadow">
            <div class="shadow"></div>
          </div>
          <div class="more-contacts col-12">
            <div class="row">
              <div class="col-sm-5 more-cont-text order-sm-1 align-items-center justify-content-center">
                <?php the_field('more_contacts_text', $front__id); ?>
              </div>
              <div class="col-sm-6 more-cont-list d-flex order-sm-0 align-items-center justify-content-center">
                <a href="mailto:<?php the_field('partner_mail', $par__id); ?>" class="mail more-cont-item"></a>
                <a href="skype:<?php the_field('partner_skype', $par__id); ?>?call" class="skype more-cont-item"></a>
                <a href="viber://chat/?number=%2B<?php the_field('partner_vbier', $par__id); ?>" class="viber more-cont-item"></a>
              </div>
            </div>
          </div>
        </div>



      </div>
      <?php get_sidebar(); ?>
    </div>


  </section>

  <section class="page-quote quote-about bot-shadow">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1 quote-wrap">
          <blockquote><?php the_field('vacancy_quote');?></blockquote>
          <div class="by-line"><?php the_field('vacancy_by_line');?></div>
        </div>
      </div>
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

