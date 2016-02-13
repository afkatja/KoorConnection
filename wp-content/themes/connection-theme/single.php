<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/single.php
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content" class="grid fit round-box col-940">

	<?php get_template_part( 'loop-header' ); ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<?php responsive_entry_before(); ?>
			<div id="post<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>

        <?php //get_template_part( 'post-meta' ); 
        ?>

        <div class="post-entry">
            <?php the_content(__('Read more &#8250;', 'responsive')); ?>

            <?php if ( get_the_author_meta('description') != '' ) : ?>

            <div id="author-meta">
            <?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); }?>
                <div class="about-author"><?php _e('About','responsive'); ?> <?php the_author_posts_link(); ?></div>
                <p><?php the_author_meta('description') ?></p>
            </div><!-- end of #author-meta -->

            <?php endif; // no description, no author's meta ?>

            <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
        </div><!-- end of .post-entry -->

        <div class="navigation rel box">
	      <?php
	      	$prev_post = get_previous_post();
	      	if (!empty( $prev_post )): ?>
	      		<div class="prev"><?php previous_post_link( '%link' ); ?></div>
      	<?php endif; ?>
      	<?php
	      	$next_post = get_next_post();
	      	if (!empty( $next_post )): ?>
	      	<div class="next"><?php next_post_link( '%link' ); ?></div>
      	<?php endif; ?>
	    </div><!-- end of .navigation -->

		<?php responsive_entry_bottom(); ?>
		</div><!-- end of #post-<?php the_ID(); ?> -->
		<?php responsive_entry_after(); ?>

		<?php responsive_comments_before(); ?>
		<?php comments_template( '', true ); ?>
		<?php responsive_comments_after(); ?>

    <?php
		endwhile;

		//get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

</div><!-- end of #content -->

<?php get_footer(); ?>
