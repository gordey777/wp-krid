<?php /* Template Name: Contacts Page */ get_header(); ?>
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

  <article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
    <div class="row">
      <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 cont-page-desc">
        <?php the_content(); ?>
      </div>
    </div>
  </article>


  <section class="cont-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 cont-page-adress">
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
            <div class="contacts-item contact-mail">
              <a href="mailto:<?php the_field('contact_mail', $front__id);?>"><?php the_field('contact_mail', $front__id);?></a>
            </div>
            <div class="contacts-item contact-fb">
              <i class="fa fa-facebook"></i>
              <a href="<?php the_field('facebook_link', $front__id); ?>"><?php the_field('facebook_title', $front__id); ?></a>
            </div>
            <div class="contacts-rout">
              <a href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>"><?php pll_e('ПРОКЛАСТИ МАРШРУТ'); ?></a>
            </div>
          </div>

          <div class="col-lg-6 cont-page-form-wrap">
            <div class="img-shadow"><div class="shadow"></div></div>
            <div class="cont-form-bg"></div>
            <div class="row">
              <div class="col-md-8 offset-md-2 cont-page-form">
                <?php $contform = get_field('contacts_cf'); ?>
                <?php echo do_shortcode($contform);?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

<section class="page-quote contacts-quote bot-shadow">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1 quote-wrap">
        <blockquote><?php the_field('contacts_quote');?></blockquote>
        <div class="by-line"><?php the_field('contq_by_line');?></div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>

<section class="section-contacts bot-shadow">
  <?php $location = get_field('location', $front__id);
  if( !empty($location) ): ?>
    <div class="acf-map">
      <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
    </div>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
