<?php
/**
 * smart functions and definitions
 *
 * @package smart
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( 'smart_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function smart_setup() {
	global $cap, $content_width;

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	if ( function_exists( 'add_theme_support' ) ) {

		/**
		 * Add default posts and comments RSS feed links to head
		*/
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for Post Thumbnails on posts and pages
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support( 'post-thumbnails' );

		/**
		 * Enable support for Post Formats
		*/
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

		/**
		 * Setup the WordPress core custom background feature.
		*/
		add_theme_support( 'custom-background', apply_filters( 'smart_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

	}

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on smart, use a find and replace
	 * to change 'smart' to the name of your theme in all the template files
	*/
	load_theme_textdomain( 'smart', get_template_directory() . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menus( array(
		'primary'  => __( 'Header bottom menu', 'smart' ),
	) );

}
endif; // smart_setup
add_action( 'after_setup_theme', 'smart_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function smart_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'smart' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
        
         register_sidebar(array(
        'name' => __('Footer #1', 'smart'),
        'id' => 'footer-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer #2', 'smart'),
        'id' => 'footer-2',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer #3', 'smart'),
        'id' => 'footer-3',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action( 'widgets_init', 'smart_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function smart_scripts() {

	// load bootstrap css
	wp_enqueue_style( 'smart-bootstrap', get_template_directory_uri() . '/includes/css/bootstrap.min.css' );
        
         wp_enqueue_style( 'smart-fontawesome', get_template_directory_uri() . '/includes/css/font-awesome.min.css' , array(), '4.0.3', 'all' );

	// load smart styles
	wp_enqueue_style( 'smart-style', get_stylesheet_uri() );

	// load bootstrap js
	wp_enqueue_script('smart-bootstrapjs', get_template_directory_uri().'/includes/js/bootstrap.js', array('jquery') );

	// load bootstrap wp js
	wp_enqueue_script( 'smart-bootstrapwp', get_template_directory_uri() . '/includes/js/bootstrap-wp.js', array('jquery') );

	wp_enqueue_script( 'smart-skip-link-focus-fix', get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'smart-keyboard-image-navigation', get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

}
add_action( 'wp_enqueue_scripts', 'smart_scripts' );


/* Add font Family Convergence*/

function heaven_load_google_fonts() {
	
            wp_register_style('googleFonts','http://fonts.googleapis.com/css?family=Lato:300,400,700|Titillium+Web:400,300,700|sans+serif:400,300,700');
            wp_enqueue_style( 'googleFonts');

}
add_action('wp_print_styles', 'heaven_load_google_fonts');
/* Font Family Convergence end*/




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/includes/bootstrap-wp-navwalker.php';



/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since smart 1.0
 *
 * @return string The 'Continue reading' link
 */
function smart_continue_reading_link() {
	return '&hellip;<p><a class="more-link" href="'. esc_url( get_permalink() ) . '" title="' . esc_html__( 'Read More', 'smart' ) . ' &lsquo;' . esc_html(get_the_title()) . '&rsquo;">' . wp_kses( __( 'Read More', 'smart' ), array( 'span' => array( 
			'class' => array() ) ) ) . '</a></p>';
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with the smart_continue_reading_link().
 *
 * @since Twenty Twelve 1.0
 *
 * @param string Auto generated excerpt
 * @return string The filtered excerpt
 */
function smart_auto_excerpt_more( $more ) {
	return smart_continue_reading_link();
}
add_filter( 'excerpt_more', 'smart_auto_excerpt_more' );


/**
 * Prints HTML with meta information for current post: author and date
 *
 * @since Superb 1.0
 *
 * @return void
 */

if ( ! function_exists( 'smart_posted_on' ) ) {
	function smart_posted_on() {
		$post_icon = '';
		switch ( get_post_format() ) {
			case 'aside':
				$post_icon = 'fa-file-o';
				break;
			case 'audio':
				$post_icon = 'fa-volume-up';
				break;
			case 'chat':
				$post_icon = 'fa-comment';
				break;
			case 'gallery':
				$post_icon = 'fa-camera';
				break;
			case 'image':
				$post_icon = 'fa-picture-o';
				break;
			case 'link':
				$post_icon = 'fa-link';
				break;
			case 'quote':
				$post_icon = 'fa-quote-left';
				break;
			case 'status':
				$post_icon = 'fa-user';
				break;
			case 'video':
				$post_icon = 'fa-video-camera';
				break;
			default:
				$post_icon = 'fa-calendar';
				break;
		}

		// Translators: 1: Icon 2: Permalink 3: Post date and time 4: Publish date in ISO format 5: Post date
		$date = sprintf( '<i class="fa fa-calendar-o"></i> <a href="%2$s" title="Posted %3$s" rel="bookmark"><time class="entry-date" datetime="%4$s" itemprop="datePublished">%5$s</time></a>',
			$post_icon,
			esc_url( get_permalink() ),
			sprintf( esc_html__( '%1$s @ %2$s', 'smart' ), esc_html( get_the_date() ), esc_attr( get_the_time() ) ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		// Translators: 1: Date link 2: Author link 3: Categories 4: No. of Comments
		$author = sprintf( '<i class="fa fa-user"></i> <address class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></address>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( esc_html__( 'View all posts by %s', 'smart' ), get_the_author() ) ),
			get_the_author()
		);

		// Return the Categories as a list
                
		$categories_list = '<i class="fa fa-folder-o"></i>'.get_the_category_list( esc_html__( ', ', 'smart' ) );

		// Translators: 1: Permalink 2: Title 3: No. of Comments
		$comments = sprintf( '<span class="comments-link"><i class="fa fa-comment"></i> <a href="%1$s" title="%2$s">%3$s</a></span>',
			esc_url( get_comments_link() ),
			esc_attr( esc_html__( 'Comment on ' . the_title_attribute( 'echo=0' ) ) ),
			( get_comments_number() > 0 ? sprintf( _n( '%1$s Comment', '%1$s Comments', get_comments_number() ), get_comments_number() ) : esc_html__( 'No Comments', 'smart' ) )
		);

		// Translators: 1: Date 2: Author 3: Categories 4: Comments
		printf( wp_kses( __( '<div class="header-meta">%1$s%2$s<span class="post-categories">%3$s</span>%4$s</div>', 'smart' ), array( 
			'div' => array ( 
				'class' => array() ), 
			'span' => array( 
				'class' => array() ) ) ),
                        $author,
			$date,
			$categories_list,
			( is_search() ? '' : $comments )
		);
	}
}
