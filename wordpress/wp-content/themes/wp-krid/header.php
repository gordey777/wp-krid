<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>

  <link href="http://www.google-analytics.com/" rel="dns-prefetch"><!-- dns prefetch -->

  <!-- icons -->
  <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">

  <!--[if lt IE 9]>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- css + javascript -->
  <?php wp_head(); ?>
</head>
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>
<body <?php body_class(); ?>>
<!-- wrapper -->
<div class="wrapper">
  <header>
    <div class="top-line">
      <div class="container">
        <div class="row d-flex flex-row align-items-center">
          <div class="logo col-lg-3">
            <?php if ( !is_front_page() && !is_home() ){ ?>
              <a href="<?php echo home_url(); ?>">
            <?php } ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>" class="logo-img">
            <?php if ( !is_front_page() && !is_home() ){ ?>
              </a>
            <?php } ?>
          </div><!-- /logo -->
          <div class="head-phones col-lg-4">
            <?php if( have_rows('contacts_phones', $front__id) ): ?>
              <div class="phones-list-wrap">
                <ul class="phones-list">
                  <?php while( have_rows('contacts_phones', $front__id) ):
                    the_row(); ?>
                    <li><a href="tel:+<?php echo preg_replace("/[^0-9]/", '', get_sub_field('phone')); ?>"><?php the_sub_field('phone');?></a></li>
                  <?php endwhile; ?>
                </ul>
                </div>
            <?php endif; ?>
          </div>
          <div class="header-address col-lg-4">
            <div class="addres-wrap">
              <p class="address"><?php the_field('contact_address', $front__id);?></p>
              <p class="worktime"><?php the_field('worktime', $front__id);?></p>
            </div>
            <?php $location = get_field('location', $front__id);?>
            <a rel="nofollow" href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>" class="header-rout"><?php pll_e('ПРОКЛАСТИ МАРШРУТ'); ?></a>
          </div>
          <div class="col-md-1">
            <?php wpeLangNav(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="nav-line">
      <div class="container">
        <div class="row">
          <nav class="col-lg-9">
            <?php wpeHeadNav(); ?>
          </nav>
          <div class="callback-wrapp col-lg-3">
            <a href="#callbackModal" class="callback" data-toggle="modal" title="<?php pll_e('ЗАМОВИТИ ДЗВІНОК'); ?>"><span class="icon-cb"></span><?php pll_e('ЗАМОВИТИ ДЗВІНОК'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </header>

