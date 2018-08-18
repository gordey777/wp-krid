<?php get_header(); ?>

  <?php $curr__ID = get_queried_object()->cat_ID; ?>
  <?php $curr_term = 'category_' . $curr__ID; ?>
  <?php $front__id = (int)(get_option( 'page_on_front' )); ?>
  <?php $curr__type = get_field('cat_type', $curr_term); ?>

  <div class="category-title head-padd  bot-shadow">
    <div class="container">
      <div class="row">
        <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>

        <div class="col-8 offset-2 quote-wrap">
          <blockquote><?php the_field('cat_quote', $curr_term);?></blockquote>
          <div class="by-line"><?php the_field('catq_by_line', $curr_term);?></div>
        </div>
      </div>
    </div>
  </div>

  <section class="category-content bot-shadow">
    <div class="container">
      <div class="row"><h1 class="section-title col-12"><?php echo get_queried_object()->name; ?></h1></div>
        <?php get_template_part('loop'); ?>
      <div class="row">
        <?php get_template_part('pagination'); ?>
      </div>
    </div>
  </section>

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
<?php get_footer(); ?>
