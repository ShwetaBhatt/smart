<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
?>

<section class="slider-wrapper">
    <div class="container slider-block">
        <div class="row">
            <div class="business-tagline col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <?php if (get_theme_mod('business-tagline_title')) { ?>
                    <h3><?php echo get_theme_mod('business-tagline_title'); ?></h3>
                <?php } else { ?>
                    <h3><?php _e('Business Tagline Title', 'smart'); ?> </h3>
                <?php } ?>

                <?php if (get_theme_mod('business-tagline_description')) { ?>
                    <p class="tagline-description"><?php echo get_theme_mod('business-tagline_description'); ?></p>
                <?php } else { ?>
                    <p class="tagline-description"><?php _e('Business Tagline Description', 'smart'); ?> </p>
                <?php } ?>

            </div>

            <div class="col-lg-12">

                <div class="home-featured-left col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <?php if (get_theme_mod('home_featured_left')) { ?>
                        <p><?php echo get_theme_mod('home_featured_left'); ?></p>
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/slider-left.jpg" />
                    <?php } ?>
                </div>

                <div class="home-featured-right col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <?php if (get_theme_mod('home_featured_right')) { ?>
                        <p><?php echo get_theme_mod('home_featured_right'); ?></p>
                    <?php } else { ?>
                        <p><?php _e('Home Featured Form', 'smart'); ?> </p>
                    <?php } ?>
                </div>

            </div>

        </div>
    </div>
</section>

<section class="home-featured-area">
    <div class="container">
        <div class="row">

            <div class="home-featured clearfix">

                <?php if (get_theme_mod('featured_title')) { ?>
                    <h3 class="featured-title"><span><?php echo get_theme_mod('featured_title'); ?></span></h3>
                <?php } else { ?>
                    <h3 class="featured-title"><span><?php _e('Featured Title', 'smart'); ?></span></h3>
                <?php } ?>

                <div class="home-featured-one col-lg-4 col-md-4 col-sm-12 col-xs-12">

                    <div class="featured">
                        <div class="featured-image">

                            <?php if (get_theme_mod('featured_image_one')) { ?>
                                <p><?php echo get_theme_mod('featured_image_one'); ?></p>
                            <?php } else { ?>
                                <p><?php _e('<i class="fa fa-pencil"></i>', 'smart'); ?> </p>
                            <?php } ?>

                        </div>

                        <?php if (get_theme_mod('featured_image_title_one')) { ?>
                            <h3><?php echo get_theme_mod('featured_image_title_one'); ?></h3>
                        <?php } else { ?>
                            <h3><?php _e('Featured Image Title One', 'smart'); ?> </h3>
                        <?php } ?>

                        <?php if (get_theme_mod('featured_image_description_one')) { ?>
                            <p><?php echo get_theme_mod('featured_image_description_one'); ?></p>
                        <?php } else { ?>
                            <p><?php _e('Featured Image Description One', 'smart'); ?> </p>
                        <?php } ?>


                        <div class="read-more-wrapper">

                            <?php if (get_theme_mod('read_more_one')) { ?>
                                <a href="#" class="read-more"><span><?php echo get_theme_mod('read_more_one'); ?></span></a>
                            <?php } else { ?>
                                <a  href="#" class="read-more"><span><?php _e('Read More', 'smart'); ?></span></a>
                            <?php } ?>

                        </div>

                    </div>

                </div>

                <div class="home-featured-two col-lg-4 col-md-4 col-sm-12 col-xs-12 clearfix">

                    <div class="featured">
                        <div class="featured-image">

                            <?php if (get_theme_mod('featured_image_two')) { ?>
                                <p><?php echo get_theme_mod('featured_image_two'); ?></p>
                            <?php } else { ?>
                                <p><?php _e('<i class="fa fa-envelope"></i>', 'smart'); ?> </p>
                            <?php } ?>

                        </div>

                        <?php if (get_theme_mod('featured_image_title_two')) { ?>
                            <h3><?php echo get_theme_mod('featured_image_title_two'); ?></h3>
                        <?php } else { ?>
                            <h3><?php _e('Featured Image Title Two', 'smart'); ?> </h3>
                        <?php } ?>

                        <?php if (get_theme_mod('featured_image_description_two')) { ?>
                            <p><?php echo get_theme_mod('featured_image_description_two'); ?></p>
                        <?php } else { ?>
                            <p><?php _e('Featured Image Description Two', 'smart'); ?> </p>
                        <?php } ?>

                        <div class="read-more-wrapper">

                            <?php if (get_theme_mod('read_more_two')) { ?>
                                <a href="#" class="read-more"><span><?php echo get_theme_mod('read_more_two'); ?></span></a>
                            <?php } else { ?>
                                <a  href="#" class="read-more"><span><?php _e('Read More', 'smart'); ?></span></a>
                            <?php } ?>

                        </div>

                    </div>

                </div>

                <div class="home-featured-three col-lg-4 col-md-4 col-sm-12 col-xs-12" >

                    <div class="featured">
                        <div class="featured-image">

                            <?php if (get_theme_mod('featured_image_three')) { ?>
                                <p><?php echo get_theme_mod('featured_image_three'); ?></p>
                            <?php } else { ?>
                                <p><?php _e('<i class="fa fa-cloud-download"></i>', 'smart'); ?> </p>
                            <?php } ?>

                        </div>

                        <?php if (get_theme_mod('featured_image_title_three')) { ?>
                            <h3><?php echo get_theme_mod('featured_image_title_three'); ?></h3>
                        <?php } else { ?>
                            <h3><?php _e('Featured Image Title Three', 'smart'); ?> </h3>
                        <?php } ?>

                        <?php if (get_theme_mod('featured_image_description_three')) { ?>
                            <p><?php echo get_theme_mod('featured_image_description_three'); ?></p>
                        <?php } else { ?>
                            <p><?php _e('Featured Image Description Three', 'smart'); ?> </p>
                        <?php } ?>

                        <div class="read-more-wrapper">

                            <?php if (get_theme_mod('read_more_three')) { ?>
                                <a href="#" class="read-more"><span><?php echo get_theme_mod('read_more_three'); ?></span></a>
                            <?php } else { ?>
                                <a  href="#" class="read-more"><span><?php _e('Read More', 'smart'); ?></span></a>
                            <?php } ?>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section class="home-featured-middle-area">
    <div class="container featured-middle">
        <div class="row">
            <div class="featured-list-item col-lg-6 col-md-6 col-sm-6 col-xs-12">

                <?php if (get_theme_mod('featured_middle_title')) { ?>
                    <h3><?php echo get_theme_mod('featured_middle_title'); ?></h3>
                <?php } else { ?>
                    <h3><?php _e('Featured Middle Title', 'smart'); ?> </h3>
                <?php } ?>

                <?php if (get_theme_mod('featured_middle_description')) { ?>
                    <p><?php echo get_theme_mod('featured_middle_description'); ?></p>
                <?php } else { ?>
                    <p><?php _e('Featured Middle Description', 'smart'); ?> </p>
                <?php } ?>

                <ul class="featured-list-items">

                    <?php if (get_theme_mod('featured_list_one')) { ?>
                        <li><?php echo get_theme_mod('featured_list_one'); ?></li>
                    <?php } else { ?>
                        <li><?php _e('Featured List One', 'smart'); ?> </li>
                    <?php } ?>

                    <?php if (get_theme_mod('featured_list_two')) { ?>
                        <li><?php echo get_theme_mod('featured_list_two'); ?></li>
                    <?php } else { ?>
                        <li><?php _e('Featured List Two', 'smart'); ?> </li>
                    <?php } ?>

                    <?php if (get_theme_mod('featured_list_three')) { ?>
                        <li><?php echo get_theme_mod('featured_list_three'); ?></li>
                    <?php } else { ?>
                        <li><?php _e('Featured List Three', 'smart'); ?> </li>
                    <?php } ?>

                    <?php if (get_theme_mod('featured_list_four')) { ?>
                        <li><?php echo get_theme_mod('featured_list_four'); ?></li>
                    <?php } else { ?>
                        <li><?php _e('Featured List Four', 'smart'); ?> </li>
                    <?php } ?>

                    <?php if (get_theme_mod('featured_list_five')) { ?>
                        <li><?php echo get_theme_mod('featured_list_five'); ?></li>
                    <?php } else { ?>
                        <li><?php _e('Featured List Five', 'smart'); ?></li>
                    <?php } ?>

                </ul>

            </div>

            <div class="featured-middle-right col-lg-6 col-md-6 col-sm-6 col-xs-12">

                <?php if (get_theme_mod('middle_slider_image')) { ?>
                    <p><?php echo get_theme_mod('middle_slider_image'); ?></p>
                <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/middle-slider.jpg" />
                <?php } ?>

            </div>
        </div>
    </div>
</section>

<section class="testimonial-slider">
    <div class="container testimonial-wrap">
        <div class="row">


            <?php if (get_theme_mod('testimonial_title')) { ?>
                <h3 class="testimonial-title"><span><?php echo get_theme_mod('testimonial_title'); ?></span></h3>
            <?php } else { ?>
                <h3 class="testimonial-title"><span><?php _e('Testimonial Title', 'smart'); ?></span></h3>
            <?php } ?>

            <div id="reviewslider">

                <div class="tslider1 col-lg-4 col-md-4 col-sm-12 col-xs-12">

                    <div class="client-block">
                        <div class="testimonial-image">

                            <?php if (get_theme_mod('testimonial_image_one')) { ?>
                                <img src="<?php echo get_theme_mod('testimonial_image_one'); ?> " />
                            <?php } else { ?>
                                <p><?php _e('Testimonial Image One', 'smart'); ?></p>
                            <?php } ?>

                        </div>
                        <div class="client-name">

                            <?php if (get_theme_mod('client_one_name')) { ?>
                                <a href="#"><?php echo get_theme_mod('client_one_name'); ?></a>
                            <?php } else { ?>
                                <p><?php _e('Client One Name', 'smart'); ?></p>
                            <?php } ?>

                        </div>

                        <div class="flex-caption">
                            <div class="client-testimonial">

                                <?php if (get_theme_mod('flex_caption_one')) { ?>
                                    <p><?php echo get_theme_mod('flex_caption_one'); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('Flex Caption One', 'smart'); ?></p>
                                <?php } ?>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="tslider2 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="client-block">
                        <div class="testimonial-image">

                            <?php if (get_theme_mod('testimonial_image_two')) { ?>
                                <img src="<?php echo get_theme_mod('testimonial_image_two'); ?> " />
                            <?php } else { ?>
                                <p><?php _e('Testimonial Image Two', 'smart'); ?></p>
                            <?php } ?>

                        </div>
                        <div class="client-name">

                            <?php if (get_theme_mod('client_two_name')) { ?>
                                <a href="#"><?php echo get_theme_mod('client_two_name'); ?></a>
                            <?php } else { ?>
                                <p><?php _e('Client Two Name', 'smart'); ?></p>
                            <?php } ?>

                        </div>

                        <div class="flex-caption">
                            <div class="client-testimonial">

                                <?php if (get_theme_mod('flex_caption_two')) { ?>
                                    <p><?php echo get_theme_mod('flex_caption_two'); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('Flex Caption Two', 'smart'); ?></p>
                                <?php } ?>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="tslider3 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="client-block">
                        <div class="testimonial-image">

                            <?php if (get_theme_mod('testimonial_image_three')) { ?>
                                <img src="<?php echo get_theme_mod('testimonial_image_three'); ?> " />
                            <?php } else { ?>
                                <p><?php _e('Testimonial Image Three', 'smart'); ?></p>
                            <?php } ?>

                        </div>
                        <div class="client-name">

                            <?php if (get_theme_mod('client_three_name')) { ?>
                                <a href="#"><?php echo get_theme_mod('client_three_name'); ?></a>
                            <?php } else { ?>
                                <p><?php _e('Client Three Name', 'smart'); ?></p>
                            <?php } ?>

                        </div>

                        <div class="flex-caption">
                            <div class="client-testimonial">

                                <?php if (get_theme_mod('flex_caption_three')) { ?>
                                    <p><?php echo get_theme_mod('flex_caption_three'); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('Flex Caption Three', 'smart'); ?></p>
                                <?php } ?>

                            </div>
                        </div>

                    </div>
                </div>


            </div>        

        </div>
</section>




<?php get_footer(); ?>

