<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package smart
 */

if ( ! function_exists( 'smart_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function smart_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>" itemprop="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'smart' ); ?></h1>
		<ul class="pager">

		<?php if ( is_single() ) : // navigation links for single posts ?>

			<?php previous_post_link( '<li class="nav-previous previous">%link</li>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'smart' ) . '</span> %title' ); ?>
			<?php next_post_link( '<li class="nav-next next">%link</li>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'smart' ) . '</span>' ); ?>

		<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

			<?php if ( get_next_posts_link() ) : ?>
			<li class="nav-previous previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'smart' ) ); ?></li>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<li class="nav-next next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'smart' ) ); ?></li>
			<?php endif; ?>

		<?php endif; ?>

		</ul>
	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // smart_content_nav

if ( ! function_exists( 'smart_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function smart_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'media' ); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'smart' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'smart' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body media" itemscope="itemscope" itemtype="http://schema.org/UserComments">
			<a class="pull-left" href="#" itemprop="image">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</a>

			<div class="media-body">
				<div class="media-body-wrap panel panel-default">

					<div class="panel-heading">
						<h5 class="media-heading" itemprop="name"><?php printf( __( '%s <span class="says">says:</span>', 'smart' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></h5>
						<div class="comment-meta">
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
								<time datetime="<?php comment_time( 'c' ); ?>" itemprop="commentTime">
									<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'smart' ), get_comment_date(), get_comment_time() ); ?>
								</time>
							</a>
							<?php edit_comment_link( __( '<span style="margin-left: 5px;" class="glyphicon glyphicon-edit"></span> Edit', 'smart' ), '<span class="edit-link">', '</span>' ); ?>
						</div>
					</div>

					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'smart' ); ?></p>
					<?php endif; ?>

					<div class="comment-content panel-body" itemprop="commentText">
						<?php comment_text(); ?>
					</div><!-- .comment-content -->

					<?php comment_reply_link(
						array_merge(
							$args, array(
								'add_below' => 'div-comment',
								'depth' 	=> $depth,
								'max_depth' => $args['max_depth'],
								'before' 	=> '<footer class="reply comment-reply panel-footer">',
								'after' 	=> '</footer><!-- .reply -->'
							)
						)
					); ?>

				</div>
			</div><!-- .media-body -->

		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for smart_comment()

if ( ! function_exists( 'smart_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function smart_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'smart_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;


function html_tag_schema() {
    $schema = 'http://schema.org/';
 
    // Is single post
    if(is_single()) {
        $type = "Article";
    }
    
    if(is_home()) {
        $type = "BlogPage";
    }
 
    // Is author page
    elseif( is_author() ) {
        $type = 'ProfilePage';
    }
    
    // Is search results page
    elseif( is_search() ) {
        $type = 'SearchResultsPage';
    }
 
    else {
        $type = 'WebPage';
    }
 
    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}

/**
 * Returns true if a blog has more than 1 category
 */
function smart_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so smart_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so smart_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in smart_categorized_blog
 */
function smart_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'smart_category_transient_flusher' );
add_action( 'save_post',     'smart_category_transient_flusher' );
