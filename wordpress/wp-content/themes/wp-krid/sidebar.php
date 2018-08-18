<?php $front__id = (int)(get_option( 'page_on_front' ));
$page__id = (int)(get_the_ID()); ?>

    <div class="sidebar col-lg-4 order-lg-0">
<?php if (is_page_template( 'page-service.php' )):

$ancestors = get_ancestors( $page__id, 'page' );
$parent__id = $ancestors[0]; ?>


        <div class="sidebar-form servises">
          <div class="img-shadow"><div class="shadow"></div></div>
            <?php $feedform = get_field('sidebar_order_form', $front__id);?>
            <?php echo do_shortcode($feedform);?>
        </div>

        <div class="sidebar-nav-list">
          <div class="sidebar-title"><?php echo get_the_title($parent__id); ?></div>
          <?php $args = array(
            'depth'        => 2,
            'date_format'  => get_option('date_format'),
            'child_of'     => $parent__id,
            'title_li'     => '',
            'echo'         => 1,
            'sort_column'  => 'menu_order, post_title',
            'sort_order'   => 'ASC',
            'link_before'  => '',
            'link_after'   => '',
            'meta_key'     => '',
            'meta_value'   => '',
            'walker'       => '',
            'post_type'    => 'page',
          );?>
          <ul class="sidebar-list">
            <?php wp_list_pages( $args );?>
          </ul>
        </div>
  <?php elseif (is_page_template( 'page-services.php' )): ?>

      <div class="sidebar-form servises">
        <div class="img-shadow"><div class="shadow"></div></div>
          <?php $feedform = get_field('sidebar_order_form', $front__id);?>
          <?php echo do_shortcode($feedform);?>
      </div>

      <div class="sidebar-nav-list">
        <div class="sidebar-title"><?php the_title(); ?></div>
        <?php $args = array(
          'depth'        => 2,
          'date_format'  => get_option('date_format'),
          'child_of'     => $page__id,
          'title_li'     => '',
          'echo'         => 1,
          'sort_column'  => 'menu_order, post_title',
          'sort_order'   => 'ASC',
          'link_before'  => '',
          'link_after'   => '',
          'meta_key'     => '',
          'meta_value'   => '',
          'walker'       => '',
          'post_type'    => 'page',
        );?>
        <ul class="sidebar-list">
          <?php wp_list_pages( $args );?>
        </ul>
      </div>



  <?php else:
    $argsIDS = array(
      'post_type'      => 'page',
      'posts_per_page'      => -1,
      'meta_query' => array(
                         array(
                              'key' => '_wp_page_template',
                              'value' => array('page-services.php', 'page-service.php' ),
                              'compare' => 'IN'
                            )
                          ),
    );
    $servQuery = new WP_Query;
    $servList = $servQuery->query($argsIDS);

    foreach( $servList as $key=>$pst):
      $postIds[$key] = $pst->ID;
    endforeach;

    $postIdsList = implode(",", $postIds);
    $args = array(
              'depth'        => 2,
              //'child_of'     => $postIdsList,
              'include'     => $postIdsList,
              'title_li'     => '',
              'echo'         => 1,
              'sort_column'  => 'menu_order, post_title',
              'sort_order'   => 'ASC',
              'walker'       => '',
              'post_type'    => 'page',
            ); ?>


      <div class="sidebar-form servises">
        <div class="img-shadow"><div class="shadow"></div></div>
          <?php $feedform = get_field('sidebar_contact_form', $front__id);?>
          <?php echo do_shortcode($feedform);?>
      </div>

      <div class="sidebar-nav-list">
        <div class="sidebar-title"><?php pll_e('ПОСЛУГИ'); ?></div>
        <ul class="serv-list sidebar-list drobdawn">
          <?php wp_list_pages( $args );?>
        </ul>
      </div>
<?php endif;?>

      <div class="sidebar-soc">
        <div class="sidebar-title"><?php pll_e('ПІДПИСУЙТЕСЬ'); ?></div>
        <a href="<?php the_field('facebook_link', $front__id); ?>" class="sidebar-social"><i class="fa fa-facebook"></i><?php the_field('facebook_title', $front__id); ?></a>
      </div>
      <?php $blogID = get_field('blog_cat', $front__id);
      if( $blogID ):
        $blogArgs = array(
            'post_type'     => 'post',
            'posts_per_page'  => 3,
            'cat'       => $blogID,
            'post_status'       => 'publish',
            'orderby'     => 'date',
            'order'       => 'DESC'
        );
        $blog_query = new WP_Query( $blogArgs ); ?>
        <div class="sidebar-blog">
          <div class="sidebar-title"><?php pll_e('ОСТАННІ ПУБЛІКАЦІЇ'); ?></div>
          <ul class="sidebar-blog-list">
            <?php while ( $blog_query->have_posts() ) :
              $blog_query->the_post();
              if ( has_post_thumbnail()) {
                $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
              } else {
                $image = catchFirstImage();
              }
              $trimTitle = get_the_title();
              $maxchar = 45;
              if ( mb_strlen( $trimTitle ) > $maxchar ){
                $trimTitle = mb_substr( $trimTitle, 0, $maxchar ) .'...';
              }

              ?>
              <li class="sidebar-blog-item">
                <a href="<?php the_permalink(); ?>" class="sidebar-looper" title="<?php the_title(); ?>">
                  <div class="item-thumb-wrap">
                    <div class="item-thumb" style="background-image: url(<?php echo $image; ?>)"></div>
                  </div>
                  <div class="item-title"><?php echo $trimTitle; ?><div class="title-decor"></div></div>
                </a>
              </li>
              <?php
              $i++;
            endwhile;
            wp_reset_query();
            ?>
          </ul>
          <div class="blog-link-wrap">
            <a href="<?php echo get_category_link(get_field('blog_cat', $front__id)); ?>" class="blog-link" title="<?php pll_e('ЧИТАТИ ВСІ'); ?>"><?php pll_e('ЧИТАТИ ВСІ'); ?></a>
          </div>
        </div>

      <?php endif; ?>


    </div>
