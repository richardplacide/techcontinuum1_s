<?php
/**
 * @package techcontinuum1_s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a class="entry-title-permalink" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'techcontinuum1_s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		
		
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ' ', 'techcontinuum1_s' ) );
				if ( $categories_list && techcontinuum1_s_categorized_blog() ) :
			?>
			<span class="cat-links frontpage-categories">
				<?php printf( __( '%s', 'techcontinuum1_s' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php techcontinuum1_s_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
	    <?php edit_post_link( __( 'Edit', 'techcontinuum1_s' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	    <?php the_excerpt(); ?>
		<!-- <?php the_content( __( '[Learn More...]', 'techcontinuum1_s' ) ); ?> -->
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'techcontinuum1_s' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'techcontinuum1_s' ) );
				if ( $tags_list ) :
			?>
			<span class="sep"> | </span>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'techcontinuum1_s' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<!--
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="sep"> | </span>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'techcontinuum1_s' ), __( '1 Comment', 'techcontinuum1_s' ), __( '% Comments', 'techcontinuum1_s' ) ); ?></span>
		<?php endif; ?>
		-->

		
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
