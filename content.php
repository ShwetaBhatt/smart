<?php
/**
 * @package smart
 */
?>


<?php // Styling Tip!

// Want to wrap for example the post content in blog listings with a thin outline in Bootstrap style?
// Just add the class "panel" to the article tag here that starts below.
// Simply replace post_class() with post_class('panel') and check your site!
// Remember to do this for all content templates you want to have this,
// for example content-single.php for the post single view. ?>

<header class="page-header">
		<h2 class="page-title" itemprop="headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php smart_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<?php if ('' != get_the_post_thumbnail() && !is_search() ) { ?>
                        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( the_title_attribute( 'echo=0' ) ) ); ?>">
                                <?php the_post_thumbnail( 'post_feature_full_width', array(
                                    'itemprop'=>'image'
                                    ) ); ?>
                        </a>
                <?php } ?>
	

	<?php if ( is_home() || is_search() || is_archive() ) : // Only display Excerpts for Search and Archive Pages ?>
	<div class="entry-summary" itemprop="text">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content" itemprop="text">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'smart' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'smart' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'smart' ) );
				if ( $categories_list && smart_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'smart' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'smart' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'smart' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'smart' ), __( '1 Comment', 'smart' ), __( '% Comments', 'smart' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'smart' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
