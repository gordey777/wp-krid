<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


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
  <header class="">
    <div class="top-line">
      <div class="container">

        <div class="row d-flex flex-row align-items-center">
          <div class="logo col-3">
            <?php if ( !is_front_page() && !is_home() ){ ?>
              <a href="<?php echo home_url(); ?>">
            <?php } ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php echo wp_get_document_title(); ?>" title="<?php echo wp_get_document_title(); ?>" class="logo-img">
            <?php if ( !is_front_page() && !is_home() ){ ?>
              </a>
            <?php } ?>
          </div><!-- /logo -->
          <div class="head-phones col-lg-4 col-sm-6 col-5">
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
          <div class="header-address col-md-4 mob-nav">
            <div class="addres-wrap">
              <p class="address"><?php the_field('contact_address', $front__id);?></p>
              <p class="worktime"><?php the_field('worktime', $front__id);?></p>
            </div>
            <?php $location = get_field('location', $front__id);?>
            <a rel="nofollow" href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>" class="header-rout"><?php pll_e('ПРОКЛАСТИ МАРШРУТ'); ?></a>
          </div>
          <div class="col-md-1 lang-nav-wrap">
            <?php wpeLangNav(); ?>
          </div>
          <div class="callback-wrapp col-md-3">
            <a href="#callbackModal" class="callback" data-toggle="modal" title="<?php pll_e('ЗАМОВИТИ ДЗВІНОК'); ?>"><span class="icon-cb"></span><?php pll_e('ЗАМОВИТИ ДЗВІНОК'); ?></a>
          </div>
        </div>
        <div id="hamburger" class="humb-toggle-switch humb-toggle-switch__htx"><span style="color:transparent;">toggle menu</span></div>
      </div>
    </div>
    <div class="nav-line">
      <div class="container">
        <div class="row">
          <nav class="head-nav-wrap col-md-9">
            <?php wpeHeadNav(); ?>
          </nav>

        </div>
      </div>
    </div>
  </header>
