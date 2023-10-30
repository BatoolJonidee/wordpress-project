<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Classic Kids Store
 */

get_header(); ?>
  
<div id="content">
  <?php if( get_theme_mod('classic_kids_store_slidercat') != ''){ ?>
    <section id="slider-cat">
        <div class="owl-carousel">
          <?php 
          $kindergarten_school_catData = get_theme_mod('classic_kids_store_slidercat');
          if($kindergarten_school_catData){
          $page_query = new WP_Query(
              array( 
                'cat' => esc_attr(get_theme_mod('classic_kids_store_slidercat',true)),
                'posts_per_page' => esc_attr(get_theme_mod('kindergarten_school_slider_count',true))
              )
            );
          while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="row sliderbox">
              <div class="imagebox">
                <?php
                  if (has_post_thumbnail()) {
                      the_post_thumbnail('full');
                  } else {
                      echo '<div class="slider-img-color"></div>';
                  }
                ?>
              </div>
              <div class="text-content">
                <h3><a href="<?php the_permalink(); ?>"><?php esc_html(the_title()); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
                <div class="slider-pagemore">
                  <a href="<?php the_permalink(); ?>">
                    <?php esc_html_e('Read More','classic-kids-store'); ?>
                  </a>
                </div>
              </div>
            </div>
            <?php endwhile; 
            wp_reset_postdata();
          }
          ?>
        </div>
      </div>
    </section>
  <?php } ?>

  <section id="product_cat_slider my-5">
  <div class="container">
    <div class="product-head-box">
      <?php if ( get_theme_mod('classic_kids_store_product_title') != "") { ?>
        <h2><?php echo esc_html(get_theme_mod('classic_kids_store_product_title','')); ?></h2>
      <?php }?>
      <?php if ( get_theme_mod('classic_kids_store_product_text') != "") { ?>
        <p class="mb-0"><?php echo esc_html(get_theme_mod('classic_kids_store_product_text','')); ?></p>
      <?php }?>
    </div>
    <div class="row">
      <?php if(class_exists('woocommerce')){
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => 50,
          'product_cat' => get_theme_mod('classic_kids_store_hot_products_cat'),
          'order' => 'ASC'
        );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
          <div class="page4box col-lg-3 col-md-3 mb-5">
            <div class="product-image">
              <?php
                if (has_post_thumbnail( $loop->post->ID )) {
                  echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
                } else {
                  echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" alt="" />';
                }
              ?>
              <div class="box-content">
                <h3 class="product-text my-2">
                  <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>">
                    <?php the_title(); ?>
                  </a>
                </h3>
                <span class="price"><?php echo $product->get_price_html(); ?></span>
                <?php
                  if( $product->is_type( 'simple' ) ){
                    woocommerce_template_loop_add_to_cart( $loop->post, $product );
                  }
                ?>
              </div>
            </div>
          </div>
        <?php endwhile; 
        wp_reset_query();
      }?>
    </div>
  </div>
</section>

</div>

<?php get_footer(); ?>