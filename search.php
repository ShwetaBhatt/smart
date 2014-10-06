<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package smart
 */
get_header();
?>

<?php if (have_posts()) : ?>
    <div class="headsection">
        <div class="container">
            <div class="row">
                <header class="page-header">
                    <h2 class="page-title"><?php printf(__('Search Results for: %s', 'smart'), '<span>' . get_search_query() . '</span>'); ?></h2>
                </header><!-- .page-header -->
            </div>
        </div>
    </div>


    <?php // start the loop. ?>
    <div class=" main-content clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('content', 'search'); ?>

                    <?php endwhile; ?>

                    <?php smart_content_nav('nav-below'); ?>

                <?php else : ?>

                    <?php get_template_part('no-results', 'search'); ?>

                <?php endif; // end of loop. ?>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 clearfix">

                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>