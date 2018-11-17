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
<?php include 'head.php'; ?>
<?php $theme = wp_get_theme();
	$theme = $theme->get('Name');
	$theme = str_replace(' ', '', $theme);
?>
<body <?php body_class($theme); ?>>

  <?php responsive_header(); // before header hook ?>
  <header id="header" class="masthead">
<?php include 'topMenu.php'; ?>
	<?php responsive_header_bottom(); // after header content hook ?>

</header><!-- end of #header -->
<?php responsive_header_end(); // after header container hook ?>

<?php responsive_container(); // before container hook ?>
<div id="container" class="hfeed">

<?php if(is_front_page() || is_home()) { ?>
  <?php include 'homeCarousel.php'; ?>
<?php } ?>

<?php responsive_wrapper(); // before wrapper container hook ?>
  <div id="wrapper" class="contain wrap center">
		<?php responsive_wrapper_top(); // before wrapper content hook ?>
		<?php responsive_in_wrapper(); // wrapper hook ?>
