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
