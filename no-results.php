<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package smart
 */
?>

<section class="no-results not-found">
    <div class="headsection">
        <div class="container">
            <div class="row">
                <header class="page-header">
                    <h1 class="page-title"><?php _e('Nothing Found', 'smart'); ?></h1>
                </header><!-- .page-header -->
            </div>
        </div>
    </div>

    <div class=" main-content clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="page-content">
                        <?php if (is_home() && current_user_can('publish_posts')) : ?>

                            <p><?php printf(__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'smart'), esc_url(admin_url('post-new.php'))); ?></p>

                        <?php elseif (is_search()) : ?>

                            <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'smart'); ?></p>
                            <?php get_search_form(); ?>

                        <?php else : ?>

                            <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'smart'); ?></p>
                            <?php get_search_form(); ?>

                        <?php endif; ?>
                    </div><!-- .page-content -->
                </div>
                 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 clearfix">

                <?php get_sidebar(); ?>
            </div>
            </div>
        </div>
    </div>
</section><!-- .no-results -->
