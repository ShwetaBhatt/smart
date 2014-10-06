<?php
/**
 * The Template for displaying all single posts.
 *
 * @package smart
 */
get_header();
?>

<div class="headsection">
    <div class="container">
        <div class="row">

            <h1 class="page-title" itemprop="headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>


        </div>
    </div>
</div>

<div class=" main-content clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content', 'single'); ?>

                    <?php smart_content_nav('nav-below'); ?>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if (comments_open() || '0' != get_comments_number())
                        comments_template();
                    ?>

                <?php endwhile; // end of the loop. ?>

            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 clearfix">

                <?php get_sidebar(); ?>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>