<?php
/**
 * @package typefocus
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<h1 class="entry-title">
			<!-- If quote, then display pullquotes -->
			<?php if ( 'quote' == get_post_format() ) : ?>
			<i class="fa fa-quote-left pull-left fa-border"></i>
			<a class="quote-post"><?php the_title(); ?></a>
			<!-- else -->
			<?php else: ?>
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			<?php endif; ?>
		</h1>
		
		<!-- if not quote, display Meta with data and categories -->
		<?php if ( 'quote' != get_post_format() ) : ?>
		<div class="entry-meta">
			<?php typefocus_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		
	</header><!-- .entry-header -->

	<?php if ( is_search() || is_home() || is_category() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	
	<!-- if homepage, then also display read-more -->
	<?php if( ( is_home() || is_category() ) && 'quote' != get_post_format()  ): ?>
	<a class="continue-reading" href="<?php echo get_permalink(); ?>"> Continue reading &rarr;</a>
	<?php endif; ?>

	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'typefocus' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'typefocus' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php /* Comment this whole section, cuz we dont need categories beneath post excerpt.
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				// translators: used between list items, there is a space after the comma 
				$categories_list = get_the_category_list( __( ', ', 'typefocus' ) );
				if ( $categories_list && typefocus_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in: %1$s', 'typefocus' ), $categories_list ); ?>
          </p> 
			</span>
			<?php endif; // End if categories ?>

			<?php
				// translators: used between list items, there is a space after the comma 
				$tags_list = get_the_tag_list( '', __( ', ', 'typefocus' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'typefocus' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>
		*/
		?>

		<?php if ( ! post_password_required() && ! is_home() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'typefocus' ), __( '1 Comment', 'typefocus' ), __( '% Comments', 'typefocus' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'typefocus' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
