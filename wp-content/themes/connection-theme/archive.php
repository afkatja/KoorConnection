<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Archive Template
 *
 *
 * @file           archive.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/archive.php
 * @link           http://codex.wordpress.org/Theme_Development#Archive_.28archive.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content-archive" class="category-content grid col-700 tabletp-col-940 round-box">

  <?php if( have_posts() ) : ?>

    <?php while( have_posts() ) : the_post();	?>

      <?php responsive_entry_before(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php responsive_entry_top(); ?>

        <div class="post-entry">
          <?php if( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
            </a>
          <?php endif; ?>
          <?php 
          	//the_excerpt(); 
          	echo '<a href="' . get_permalink() . '">' . get_the_title() . "</a>";
          ?>
          <?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
        </div>
        <!-- end of .post-entry -->

        <?php responsive_entry_bottom(); ?>
      </div><!-- end of #post-<?php the_ID(); ?> -->
      <?php responsive_entry_after(); ?>

    <?php
    endwhile;

    //get_template_part( 'loop-nav' );

  else :

    get_template_part( 'loop-no-posts' );

  endif;
  ?>

</div><!-- end of #content-archive -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
