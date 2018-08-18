  <?php $front__id = (int)(get_option( 'page_on_front' ));
  $page__id = (int)(get_the_ID());
  $ancestors = get_ancestors( $page__id, 'page' );
  $parent__id = $ancestors[0]; ?>

  <?php if( have_rows('serv_tabs') ): ?>
    <div class="row service-tabs-wrap">
      <div class="col-12">
      <div class="servise-tabs-nav">
        <?php $i = 0; ?>
        <?php while( have_rows('serv_tabs') ):
          the_row();
          $i++;
          $icon = get_sub_field('type_icon');
          if($i == 1){
            $activeClass = 'active';

          }else{
            $activeClass = '';
          }
          ?>
          <a href="#tab-<?php echo $i; ?>" class="tab-nav-item <?php echo $activeClass; ?>">
            <div class="icon" style="background-image: url(<?php the_sub_field('ico'); ?>);"></div>
            <div class="title"><div class="label"><?php the_sub_field('title_label'); ?></div><?php the_sub_field('title'); ?></div>
          </a>
        <?php endwhile; ?>
      </div>
      </div>
      <div class="col-12 service-tabs">
        <?php $k = 0; ?>
        <?php while( have_rows('serv_tabs') ):
          the_row();
          $k++;
          if($k == 1){
            $activeClass = 'active';
          }else{
            $activeClass = '';
          } ?>
          <div id="tab-<?php echo $k; ?>" class="tab-item <?php echo $activeClass; ?>"><?php the_sub_field('content'); ?></div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php $servsList = get_field('services_pages', $page__id);
  if( $servsList ): ?>
    <div class="row servs-list-wrap">
      <div class="col-12 servs-list">
        <h2 class="list-title icon" <?php if (get_field('servises_title_icon')) { ?>style="background-image: url(<?php the_field('servises_title_icon'); ?>);"<?php } ?>><?php the_field('services_title'); ?></h2>
        <ul>
          <?php foreach( $servsList as $serv): ?>
            <li><a href="<?php the_permalink($serv); ?>" class="list-link" title="<?php echo get_the_title($serv); ?>"><?php echo get_the_title($serv); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  <?php endif; ?>

  <?php if( have_rows('documents_list', $page__id) ): ?>
    <div class="row servs-list-wrap">
      <div class="col-12 servs-list">
        <h3 class="list-title icon" <?php if (get_field('documents_ico')){ ?>style="background-image: url(<?php the_field('documents_ico'); ?>);"<?php } ?>><?php the_field('documents_title'); ?></h3>
        <ul>
          <?php while( have_rows('documents_list', $page__id) ):
            the_row(); ?>
            <li><?php the_sub_field('title'); ?></li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  <?php endif; ?>
  <?php
  $servPartner = get_field('serv_partner', $parent__id);
    $par__id = $servPartner->ID;
  ?>
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

  <div class="row service-content page-content">
    <div class="col-12 text-content"><?php the_content(); ?></div>
  </div>
