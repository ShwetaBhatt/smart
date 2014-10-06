<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package smart
 */
get_header();
?>

<?php // add the class "panel" below here to wrap the content-padder in Bootstrap style ;) ?>
<section class="content-padder error-404 not-found">

    <div class="headsection">
        <div class="container">
            <div class="row">

                <header class="page-header">
                    <h2 class="page-title"><?php _e('Oops! Something went wrong here.', 'smart'); ?></h2>
                </header><!-- .page-header -->

            </div>
        </div>
    </div>

    <div class=" main-content clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="page-content">

                        <p><?php _e('Nothing could be found at this location. Maybe try a search?', 'smart'); ?></p>

                        <?php get_search_form(); ?>

                    </div><!-- .page-content -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 clearfix">

                    <?php get_sidebar(); ?>
                </div>
            </div>

        </div>
    </div>



</section><!-- .content-padder -->


<?php get_footer(); ?>