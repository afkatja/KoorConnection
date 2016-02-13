<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.3
 * @filesource     wp-content/themes/responsive/header.php
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */
?>
<!doctype html>
<!--[if !IE]>      <html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

<title>Koor Connection</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

<?php wp_enqueue_style('responsive-style', get_stylesheet_uri(), false, '1.9.3.2');
	wp_enqueue_script ('jquery.isotope.min', get_stylesheet_directory_uri() . '/js/jquery.isotope.min.js', array( 'jquery' ), '1.5.26', true );
	wp_enqueue_script ('connection-scripts', get_stylesheet_directory_uri() . '/js/connection-scripts.js', array( 'jquery' ), '1.0', true );
?>
<?php wp_head(); ?>
</head>
<?php $theme = wp_get_theme();
	$theme = $theme->get('Name');
	$theme = str_replace(' ', '', $theme);
?>
<body <?php body_class($theme); ?>>

<?php responsive_container(); // before container hook ?>
<div id="container" class="hfeed">

  <?php responsive_header(); // before header hook ?>
  <div id="header" class="masthead contain rel wrap center">

		<?php responsive_header_top(); // before header content hook ?>

        <?php if (has_nav_menu('top-menu', 'responsive')) { ?>
	        <?php wp_nav_menu(array(
				    'container'       => '',
						'fallback_cb'	  =>  false,
						'menu_class'      => 'top-menu',
						'theme_location'  => 'top-menu')
						);
					?>
        <?php } ?>

    <?php responsive_in_header(); // header hook ?>

    <?php
        if(function_exists('get_custom_header')) {
            $img_width = get_custom_header() -> width;
        } else {
            $img_width = HEADER_IMAGE_WIDTH;
        }
        if(function_exists('get_custom_header')) {
            $img_height = get_custom_header() -> height;
        } else {
            $img_height = HEADER_IMAGE_HEIGHT;
        }
    ?>
    <?php if ( get_header_image() != '' ) : ?>
    <div class="left contain full rel">
        <a id="logo" href="<?php echo home_url('/'); ?>" class="block left main-logo col-140 tabletp-col-300 mobilep-col-460">
        	<img src="<?php header_image(); ?>" width="<?php echo $img_width; ?>" height="<?php echo $img_height; ?>" alt="<?php bloginfo('name'); ?>" />
      	</a>
        <p class="title copse strong left alpha col-540 icon-note-beamed">Koor Connection</p>
    </div>

    <?php endif; // header image was removed ?>



    <div class="left full contain rel">
        <a id="logo" href="<?php echo home_url('/'); ?>" class="block left main-logo col-140 tabletp-col-300 mobilep-col-460" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
        <?php
        	$urlSVG = get_stylesheet_directory_uri() . '/images/logo.svg';
        	$urlPNG = get_stylesheet_directory_uri() . '/images/logo.png';
        ?>
        	<object data="<?php echo $urlSVG; ?>" width="100%" height="100%" type="image/svg+xml">
        	   <img src="<?php echo $urlPNG; ?>" width="150px" height="70px">
        	</object>
        </a>
        <button type="button" class="btn-hamburger reset-btn grid-right hidden mobilel-shown" data-role="mobile-nav-expander"></button>
        <?php wp_nav_menu(array(
            'container'       => 'nav',
        		'container_class'	=> 'main-nav',
        		'menu_class' => 'contain',
        		'fallback_cb'	  =>  'responsive_fallback_menu',
        		'theme_location'  => 'header-menu')
        	);
        ?>

      <!--  User area-->
      <?php if(! is_user_logged_in() ) { ?>
      <div class="col-220 mobilel-col-940 grid-right contain fit abs members-menu">
        <a href="#" class="grid-right pulldown icon-expand strong icon-login">Login leden</a>
        <div class="contain login-form flydown round-box secondary abs full fit hidden">
            <?php $args = array(
            'echo' => true,
            'redirect' => site_url( $_SERVER['REQUEST_URI'] ),
            'form_id' => 'loginform',
            'label_username' => __( 'Username' ),
            'label_password' => __( 'Password' ),
            'label_remember' => __( 'Remember Me' ),
            'label_log_in' => __( 'Log In' ),
            'id_username' => 'username',
            'id_password' => 'pass',
            'id_remember' => 'rememberme',
            'id_submit' => 'wp-submit',
            'remember' => true,
            'value_username' => NULL,
            'value_remember' => false
              ); ?>
              <?php wp_login_form( $args ); ?>
        </div>
    </div>
    <?php } else { // If logged in: ?>
    <div class="members-menu wrap center contain rel">
        <a href="<?php echo wp_logout_url(home_url()) ?>" class="abs logout icon-logout">Uitloggen</a>
        <?php
            wp_nav_menu(array(
            'container'       => 'nav',
            'container_class' => 'sub-header-nav grid-right full',
                'menu_class'      => 'members-nav horizontal contain',
                'theme_location'  => 'sub-header-menu')
            );
        } ?>
    </div>

	<?php responsive_header_bottom(); // after header content hook ?>

	<?php
		//get_sidebar();
	?> <!--search form-->
    </div>
</div><!-- end of #header -->
<?php responsive_header_end(); // after header container hook ?>

<?php if(is_front_page() || is_home()) { ?>
  <div class="featured-slider full fit mask">
    <?php $img_url = get_stylesheet_directory_uri(); ?>
    <img src="<?php echo $img_url . '/images/mkf-cropped.jpg'?>" class="current">
    <img src="<?php echo $img_url . '/images/koorweekend2014.jpg'?>">
    <img src="<?php echo $img_url . '/images/connection.jpg'?>">
    <img src="<?php echo $img_url . '/images/kooruitje2015.jpg'?>">
    <img src="<?php echo $img_url . '/images/kerst2016.jpg'?>">
  </div>
<?php } ?>

<?php responsive_wrapper(); // before wrapper container hook ?>
  <div id="wrapper" class="contain wrap center">
		<?php responsive_wrapper_top(); // before wrapper content hook ?>
		<?php responsive_in_wrapper(); // wrapper hook ?>
