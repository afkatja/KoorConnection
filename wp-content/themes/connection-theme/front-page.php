<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Site Front Page
 *
 * Note: You can overwrite front-page.php as well as any other Template in Child Theme.
 * Create the same file (name) include in /responsive-child-theme/ and you're all set to go!
 * @see            http://codex.wordpress.org/Child_Themes and
 *                 http://themeid.com/forum/topic/505/child-theme-example/
 *
 * @file           front-page.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/front-page.php
 * @link           http://codex.wordpress.org/Template_Hierarchy
 * @since          available since Release 1.0
 */

/**
 * Globalize Theme Options
 */
$responsive_options = responsive_get_options();
/**
 * If front page is set to display the
 * blog posts index, include home.php;
 * otherwise, display static front page
 * content
 */
if ( 'posts' == get_option( 'show_on_front' ) && $responsive_options['front_page'] != 1 ) {
	get_template_part( 'home' );
} elseif ( 'page' == get_option( 'show_on_front' ) && $responsive_options['front_page'] != 1 ) {
	$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );
	$template = ( $template == 'default' ) ? 'index.php' : $template;
	locate_template( $template, true );
} else { 

	get_header();
	
	//test for first install no database
	$db = get_option( 'responsive_theme_options' );
    //test if all options are empty so we can display default text if they are
    $empty = ( empty( $responsive_options['home_headline'] ) && empty( $responsive_options['home_subheadline'] ) && empty( $responsive_options['home_content_area'] ) ) ? false : true;
	?>

	<div id="featured" class="grid col-700 main-pane round-box">
		<div class="clear default box">
			<h1 class="featured-title">
				<?php
				if ( isset( $responsive_options['home_headline'] ) && $db && $empty )
					echo $responsive_options['home_headline'];
				else
					_e( 'Hello, World!', 'responsive' );
				?>
			</h1>
			
			<h2 class="featured-subtitle">
				<?php
				if ( isset( $responsive_options['home_subheadline'] ) && $db && $empty )
					echo $responsive_options['home_subheadline'];
				else
					_e( 'Your H2 subheadline here', 'responsive' );
				?>
			</h2>
			<div id="featured-image" class="full fit">								
				<?php echo do_shortcode( $featured_content ); ?>
			</div>
			<p>
				<?php
				if ( isset( $responsive_options['home_content_area'] ) && $db && $empty )
					echo do_shortcode( $responsive_options['home_content_area'] );
				else
					_e( 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.','responsive' );
				?>
			</p>
			
			<?php if ($responsive_options['cta_button'] == 0): ?>  
   
				<p class="call-to-action">

					<a href="<?php echo $responsive_options['cta_url']; ?>" class="purple button ib">
						<?php 
						if( isset( $responsive_options['cta_text'] ) && $db && $empty )
							echo $responsive_options['cta_text']; 
						else
							_e('Call to Action','responsive');
						?>
					</a>
				
				</p><!-- end of .call-to-action -->

			<?php endif; ?>         
			
		</div><!-- end of .col-460 -->
	
	</div><!-- end of #featured -->
	
	
  <aside class="col-220 grid-right contain fit">
  <!--  User area-->
  <?php if(! is_user_logged_in() ) { ?>
  	<a href="#" class="grid-right pulldown icon-expand strong icon-login">Login leden</a>
  	<div class="contain login-form flydown round-box secondary abs col-220 fit hidden">
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
  <?php } else { // If logged in: ?>
  	<a href="<?php echo wp_logout_url(home_url()) ?>" class="grid-right strong logout icon-logout">Uitloggen</a> 
	<?php  
  	if (has_nav_menu('sub-header-menu', 'responsive')) { 
    	wp_nav_menu(array(
  	    'container'       => 'nav',
  	    'container_class' => 'sub-header-nav',
  			'menu_class'      => 'members-nav',
  			'theme_location'  => 'sub-header-menu')
  		); 
	   	} 
		} 
	}?>
</aside>

<?php get_sidebar('home'); ?>
<?php get_footer(); ?>