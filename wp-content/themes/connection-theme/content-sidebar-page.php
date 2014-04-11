<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Content/Sidebar Template
 *
   Template Name:  Content/Sidebar
 *
 * @file           content-sidebar-page.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2011 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/content-right-page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content" class="content-side-page grid <?php if(is_user_logged_in() ) { echo "col-700"; } else echo "col-780 fit"; ?> round-box">
        
	<?php get_template_part( 'loop-header' ); ?>
        
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
			<?php responsive_entry_before(); ?>
			<div id="post<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php responsive_entry_top(); ?>

          <?php get_template_part( 'post-meta-page' ); ?>
          
          <div class="post-entry">
              <?php the_content(__('Read more &#8250;', 'responsive')); ?>
              <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
          </div><!-- end of .post-entry -->
				               
				<?php responsive_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php responsive_entry_after(); ?>
            
			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content -->

  <!--  User area-->
<aside class="<?php if(! is_user_logged_in() ) { ?>col-140 <?php } else { ?>col-220<?php } ?> grid-right contain fit">
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
  ); 
  if(! is_user_logged_in() ) { ?>
  	<a href="#" class="right pulldown icon-expand strong icon-login">Login leden</a>
  	<div class="contain login-form flydown round-box secondary abs col-140 fit hidden">
   		<?php wp_login_form( $args ); ?>
  	</div>
  <?php } else { // If logged in: ?>
  	<a href="<?php echo wp_logout_url(home_url()) ?>" class="right logout icon-logout">Uitloggen</a> 
	<?php  
  	if (has_nav_menu('sub-header-menu', 'responsive')) { 
    	wp_nav_menu(array(
  	    'container'       => 'nav',
  	    'container_class' => 'sub-header-nav',
  			'menu_class'      => 'members-nav',
  			'theme_location'  => 'sub-header-menu')
  		); 
   	} 
	} ?>
</aside>
<?php get_footer(); ?>
