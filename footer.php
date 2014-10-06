<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package smart
 */
?>
</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->

</div><!-- close .main-content -->

<footer id="colophon" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
    
    <div class="cta-area clearfix">
    <div class="container cta-wrap">
        <div class="row">
            <div class="cta-left col-lg-7 col-md-7 col-sm-7 col-xs-12">
                <div class="cta-title">

                    <?php if (get_theme_mod('cta_title')) { ?>
                        <p><?php echo get_theme_mod('cta_title'); ?></p>
                    <?php } else { ?>
                        <p><?php _e('cta title', 'smart'); ?></p>
                    <?php } ?>

                </div>
            </div>

            <div class="cta-right col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="cta-button">

                    <?php if (get_theme_mod('cta_button')) { ?>
                        <a href="#"><?php echo get_theme_mod('cta_button'); ?></a>
                    <?php } else { ?>
                        <p><?php _e('cta Button', 'smart'); ?></p>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

    
    <div class="footer-widget">
        <div class="container">

            <div class="site-footer-inner-wrap row">

                <div id="footer-widget1" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <?php if (is_active_sidebar('footer-1')) { ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php } ?>
                </div>

                <div id="footer-widget2" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <?php if (is_active_sidebar('footer-2')) { ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php } ?>
                </div>

                <div id="footer-widget3" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <?php if (is_active_sidebar('footer-3')) { ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php } ?>
                </div>

            </div>
        </div>

        <div class="site-info">
            <div class="container">
                <div class="row">
                    <div class="footer-bottom-left col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <?php do_action('ember_credits'); ?>
                        <a href="http://wordpress.org/" title="<?php esc_attr_e('A Semantic Personal Publishing Platform', 'ember'); ?>" rel="generator"><?php printf(__('Proudly powered by %s', 'ember'), 'WordPress'); ?></a>
                        <span class="sep"> | </span>
                        <?php printf(__('Theme: %1$s by %2$s.', 'ember'), 'ember', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>'); ?>
                    </div>

                    <div class="footer-bottom-right col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-links">
                            <ul>
                                <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></i></a></li>
                                <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></i></a></li>
                                <li class="social-pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- close .site-info -->
        </div>
    </div>


    <!-- close .container -->
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>