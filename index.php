<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package smart
 */
get_header();
?>


<div class="headsection">
    <div class="container">
        <div class="row">
            
            <h1 class="title"><?php _e('Blog', 'smart'); ?></h1>
            <p class="description"><?php _e('Best tips for your online business', 'smart'); ?></p>
            
        </div>
    </div>
</div>
<div class=" main-content clearfix">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <?php if (have_posts()) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to overload this in a child theme then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part('content', get_post_format());
                        ?>

                    <?php endwhile; ?>

                    <?php smart_content_nav('nav-below'); ?>

                <?php else : ?>

                    <?php get_template_part('no-results', 'index'); ?>

                <?php endif; ?>

                
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 clearfix">

                    <?php get_sidebar(); ?>
                </div>
        </div>

    </div>
    </div>
    <?php get_footer(); ?>