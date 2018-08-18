<?php if (have_posts()): $i = 0; ?>
  <div class="row blog-items">
    <?php while (have_posts()) :
      the_post();
      if ( has_post_thumbnail()) {
        $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
      } else {
        $image = catchFirstImage();
      }
      $itemClass = 'col-lg-4';
      $contentClass = 'col-12';
      if ( $i == 0) {
        $itemClass = 'col-lg-12 first-item';
        $contentClass = 'col-lg-6';
      }
      $trimTitle = get_the_title();
      $maxchar = 45;
      if ( mb_strlen( $trimTitle ) > $maxchar ){
        $trimTitle = mb_substr( $trimTitle, 0, $maxchar ) .'...';
      }

      ?>
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
    endwhile; ?>
  </div>
<?php endif; ?>
