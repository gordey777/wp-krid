<?php /* Template Name: Services Category */ get_header(); ?>

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

  <div class="servises">
    <div class="container">
      <div class="row">
        <div class="section-title col-12">Наші послуги</div>
      </div>
    </div>
  </div>


  </section>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <h1 class="page-title inner-title"><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <?php edit_post_link(); ?>

    </article>


  <?php endwhile; endif; ?>


<?php get_footer(); ?>
