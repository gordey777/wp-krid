<?php get_header(); ?>
  <div class="page-title-wrapp">
    <div class="page-title-border">
      <div class="page-title-bg ">
        <div class="page-title-img" <?php echo $imageBG; ?>></div>
        <div class="container page-title-content head-padd">
          <div class="row">
            <h1 class="col-12 page-title"><?php _e( 'Page not found', 'wpeasy' ); ?></h1>
          </div>
        </div>


      </div>
    </div>
  </div>
  <article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>

    <h2><a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'wpeasy' ); ?></a></h2>

  </article>

<?php get_footer(); ?>
