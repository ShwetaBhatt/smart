<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package smart
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
    <header class="page-header">
<!--        <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>-->
    </header><!-- .entry-header -->
    
                <div class="entry-content" itemprop="text">
                    <?php the_content(); ?>
                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'smart'),
                        'after' => '</div>',
                    ));
                    ?>
                </div><!-- .entry-content -->

  
    <?php edit_post_link(__('Edit', 'smart'), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>'); ?>
</article><!-- #post-## -->
