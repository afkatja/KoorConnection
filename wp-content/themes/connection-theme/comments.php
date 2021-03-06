<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Comments Template
 *
 *
 * @file           comments.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2010 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/comments.php
 * @link           http://codex.wordpress.org/Theme_Development#Comments_.28comments.php.29
 * @since          available since Release 1.0
 */
?>

<div class="comments">
	<?php if (post_password_required()) { ?>
	    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view any comments.', 'responsive'); ?></p>
	    
		<?php return; } ?>
	
	<?php if (have_comments()) : ?>
	    <h6 id="comments">
				<?php
					printf( _n('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'responsive'),
						number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>');
				?>
	    </h6>
	
	    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	    <div class="navigation rel box">
	        <div class="prev"><?php previous_comments_link(__( '&#8249; Older comments','responsive' )); ?></div><!-- end of .previous -->
	        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;','responsive', 0 )); ?></div><!-- end of .next -->
	    </div><!-- end of.navigation -->
	    <?php endif; ?>
	
	    <ol class="commentlist">
    		<?php $comment_args = array(
    			'walker'            => null,
    			'max_depth'         => '',
    			'style'             => 'ul',
    			'avatar_size'       => 32,
    			'reverse_top_level' => null,
    			'reverse_children'  => '',
    			'format'            => 'html5' //or xhtml if no HTML5 theme support
    		); ?>
        <?php wp_list_comments($comment_args); ?>
	    </ol>
	    
	    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	    <div class="navigation rel box">
	        <div class="prev"><?php previous_comments_link(__( '&#8249; Older comments','responsive' )); ?></div><!-- end of .previous -->
	        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;','responsive', 0 )); ?></div><!-- end of .next -->
	    </div><!-- end of.navigation -->
	    <?php endif; ?>
	
	<?php else : ?>
	
	<?php endif; ?>
	
	<?php if (!empty($comments_by_type['pings'])) : // let's seperate pings/trackbacks from comments
	    $count = count($comments_by_type['pings']);
	    ($count !== 1) ? $txt = __('Pings&#47;Trackbacks','responsive') : $txt = __('Pings&#47;Trackbacks','responsive');
	?>
	
	    <h6 id="pings"><?php printf( __( '%1$d %2$s for "%3$s"', 'responsive' ), $count, $txt, get_the_title() )?></h6>
	
	    <ol class="commentlist">
	        <?php wp_list_comments('type=pings&max_depth=<em>'); ?>
	    </ol>
	
	
	<?php endif; ?>
	
	<?php if (comments_open()) : ?>

  <?php
  $fields = array(
      'author' => '<p class="comment-form-author grid col-300">' . '<label for="author">' . ( $req ? '<span class="required">*</span>' : '' ) . __('Name','responsive') . '</label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" /></p>',
      
      'email' => '<p class="comment-form-email grid col-300"><label for="email">' . ( $req ? '<span class="required">*</span>' : '' ) . __('E-mail','responsive') . '</label><input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" /></p>',
      
      'url' => '<p class="comment-form-url grid col-300 fit"><label for="url">' . __('Website','responsive') . '</label><input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>',
  );

  $defaults = array('fields' => apply_filters('comment_form_default_fields', $fields));

  comment_form($defaults);
  ?>


  <?php endif; ?>
</div>
