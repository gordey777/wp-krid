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
            <a href="tel:+" class="main-phone">+38 <span class="span">096</span> 123 96 69</a>
            <ul class="phones-list">
              <li><a href="tel:+">+38 <span>096</span> 123 96 69</a></li>
            </ul>
          </div>
          <div class="header-address col-lg-4">
            <div class="addres">
              <p>м. Львів, вул. Здоров’я, 8 <br><span>(бічна Київської)</span></p>
              <p>Понедельник - Пятница<br>8:00 - 20:00</p>
            </div>
            <a href="" class="header-rout">Прокласти маршрут</a>
          </div>
          <div class="col-lg-1">
            <ul class="lang-nav">
              <li><a href="">en</a></li>
              <li><a href="">ua</a></li>
            </ul>
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
            <a href="#" class="callback"><span class="icon-cb"></span>Замовити дзвінок</a>
          </div>
        </div>
      </div>
    </div>
  </header>

