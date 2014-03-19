<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.2
 * @filesource     wp-content/themes/responsive/footer.php
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */

/* 
 * Globalize Theme options
 */
	global $responsive_options;
	//$responsive_options = responsive_get_options();
	?>
			<?php responsive_wrapper_bottom(); // after wrapper content hook ?>
	    </div><!-- end of #wrapper -->
	    <?php responsive_wrapper_end(); // after wrapper hook ?>
		</div><!-- end of #container -->
		<?php responsive_container_end(); // after container hook ?>
		
		<div id="footer" class="contain footer full">
			<?php responsive_footer_top(); ?>
		    <footer class="wrap center contain">
					<?php if (has_nav_menu('footer-menu', 'responsive')) { ?>
					<div class="grid col-540">
					 <?php wp_nav_menu(array(
					    'container'       => '',
							'fallback_cb'	  	=>  false,
							'menu_class'      => 'footer-menu',
							'theme_location'  => 'footer-menu')
						); ?>
	         </div><!-- end of col-540 -->
				 <?php } ?>
         <?php get_sidebar('colophon'); ?>
		                
        <div class="grid col-300 copyright">
            <?php esc_attr_e('&copy;', 'responsive'); ?> <?php _e(date('Y')); ?>
            <a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                <?php bloginfo('name'); ?></a>
						<a href="mailto:info@koorconnection.nl" class="icon-mail">Contact</a>                
        </div><!-- end of .copyright -->
		        
        <div class="grid col-300 scroll-top text-center"><a href="#scroll-top" title="<?php esc_attr_e( 'scroll to top', 'responsive' ); ?>"><?php _e( '&uarr;', 'responsive' ); ?></a></div>
			</footer>
			<?php responsive_footer_bottom(); ?>
		</div><!-- end #footer -->
		<?php responsive_footer_after(); ?>
		
		<?php wp_footer(); ?>
		<div class="social abs">
			<ul><li><a href="https://twitter.com/KoorConnection" class="ib vh rel icon-twitter">@koorconnection</a></li>
			<li><a href="https://www.facebook.com/groups/273765169424858/" class="ib vh rel icon-facebook">Connection group</a></li>
			<li><a href="http://www.youtube.com/channel/UCe-GYjf64U_fJKdyPQMIEhQ" class="ib vh rel icon-youtube">Connection channel</a></li></ul>
		</div>
	</body>
</html>