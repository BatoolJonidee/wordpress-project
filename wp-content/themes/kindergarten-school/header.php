<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Kindergarten School
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<div id="preloader">
  <div id="status">&nbsp;</div>
</div>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'kindergarten-school' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'kindergarten_school_box_layout' ) ) { echo 'class="boxlayout"'; } ?>>

  <div class="header">
    <?php if ( get_theme_mod('kindergarten_school_topbar', false) != "") { ?>
      <div class="top-header">
        <div class="container">
          <div class="inner-header">
            <?php if ( get_theme_mod('kindergarten_school_phone_number') != "") { ?>
            <a href="tel:<?php echo esc_url( get_theme_mod('kindergarten_school_phone_number','' )); ?>" class="phone"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html(get_theme_mod('kindergarten_school_phone_number',''));?></a>
            <?php }?>
            <?php if ( get_theme_mod('kindergarten_school_email_address') != "") { ?>
            <a href="mailto:<?php echo esc_attr( get_theme_mod('kindergarten_school_email_address','') ); ?>" class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo esc_html(get_theme_mod('kindergarten_school_email_address',''));?></a>
            <?php }?>
            <span class="social-media-box">
              <?php if ( get_theme_mod('kindergarten_school_social_facebook') != "") { ?>
              <a href="<?php echo esc_url(get_theme_mod('kindergarten_school_social_facebook',''));?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <?php }?>
              <?php if ( get_theme_mod('kindergarten_school_social_twitter') != "") { ?>
              <a href="<?php echo esc_url(get_theme_mod('kindergarten_school_social_twitter',''));?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <?php }?>
              <?php if ( get_theme_mod('kindergarten_school_social_youtube') != "") { ?>
              <a href="<?php echo esc_url(get_theme_mod('kindergarten_school_social_youtube',''));?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
              <?php }?>
              <?php if ( get_theme_mod('kindergarten_school_social_instagram') != "") { ?>
              <a href="<?php echo esc_url(get_theme_mod('kindergarten_school_social_instagram',''));?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <?php }?>
              <?php if ( get_theme_mod('kindergarten_school_social_linkdin') != "") { ?>
              <a href="<?php echo esc_url(get_theme_mod('kindergarten_school_social_linkdin',''));?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
              <?php }?>
            </span>
          </div>
        </div>
      </div>
    <?php }?>
    <div class="header-box">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="logo">
              <?php kindergarten_school_the_custom_logo(); ?>
              <div class="site-branding-text <?php if( get_theme_mod( 'kindergarten_school_hide_titledesc' ) ) { ?>hidetitle<?php } ?>">
                <?php if ( get_theme_mod('kindergarten_school_title_enable',true) != "") { ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <?php } ?>
                <?php $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) : ?>
                  <?php if ( get_theme_mod('kindergarten_school_tagline_enable',false) != "") { ?>
                  <span><?php echo esc_html($description); ?></span>
                  <?php } ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-md-6">
            <div class="<?php echo esc_attr(kindergarten_school_sticky_menu()); ?>">
            <div class="toggle-nav media-menu align-self-center">
              <?php if(has_nav_menu('primary')){ ?>
                <button role="tab" class="mobiletoggle"><?php esc_html_e('Menu','kindergarten-school'); ?><span class="screen-reader-text"><?php esc_html_e('Menu','kindergarten-school'); ?></span></button>
              <?php }?>
            </div>
            <div id="mySidenav" class="nav sidenav">
              <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','kindergarten-school' ); ?>">
                <ul class="mobile_nav">
                  <?php 
                    wp_nav_menu( array( 
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu' ,
                      'items_wrap' => '%3$s',
                      'fallback_cb' => 'wp_page_menu',
                    ) ); 
                   ?>
                </ul>
                <a href="javascript:void(0)" class="close-button media-menu"><?php esc_html_e('Close','kindergarten-school'); ?><span class="screen-reader-text"><?php esc_html_e('Close','kindergarten-school'); ?></span></a>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
