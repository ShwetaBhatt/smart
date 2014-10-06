<?php
/**
 * smart Theme Customizer
 *
 * @package smart
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function smart_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
        
        
        /* this class is added to create text area */

    class smart_Customize_Textarea_Control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>
            <?php
        }

    }
    
    // Displays a list of categories in dropdown
    class WP_Customize_Dropdown_Categories_Control extends WP_Customize_Control {

        public $type = 'dropdown-categories';

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                    array(
                        'name' => '_customize-dropdown-categories-' . $this->id,
                        'echo' => 0,
                        'hide_empty' => false,
                        'show_option_none' => '&mdash; ' . __('Select', 'smart') . ' &mdash;',
                        'hide_if_empty' => false,
                        'selected' => $this->value(),
                    )
            );

            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown);

            printf(
                    '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>', $this->label, $dropdown
            );
        }

    }


    /* text area class end */

    /*Slider Area */

    $wp_customize->add_section(
            'slider_area', array(
        'title' => 'Slider Area',
        'description' => 'This is a Slider Area.',
        'priority' => 34,
            )
    );

    $wp_customize->add_setting(
        'business-tagline_title', array(
        'default' => 'Title',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'business-tagline_title', array(
        'label' => 'Title',
        'section' => 'slider_area',
        'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'business-tagline_description', array(
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new smart_Customize_Textarea_Control(
            $wp_customize, 'business-tagline_description', array(
        'label' => 'Description',
        'section' => 'slider_area',
        'settings' => 'business-tagline_description'
            )
            )
    );
    
    $wp_customize->add_setting('home_featured_left');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'home_featured_left', array(
        'label' => 'Featured Image One',
        'section' => 'slider_area',
        'settings' => 'home_featured_left'
            )
            )
    );
    
    $wp_customize->add_setting('home_featured_right');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'home_featured_right', array(
        'label' => 'Featured Image Two',
        'section' => 'slider_area',
        'settings' => 'home_featured_right'
            )
            )
    );
    
    
    /*home-featured-area */

    $wp_customize->add_section(
            'home_featured_area', array(
        'title' => 'Home Featured Area',
        'description' => 'This is Home Featured Area.',
        'priority' => 35,
            )
    );

    $wp_customize->add_setting(
        'featured_title', array(
        'default' => 'Title',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'featured_title', array(
        'label' => 'Title',
        'section' => 'home_featured_area',
        'type' => 'text',
        'priority' => 1,
            )
    );
    
    
    $wp_customize->add_setting(
        'featured_image_one', array(
        'default' => 'Image One Code',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'featured_image_one', array(
        'label' => 'Image One Code',
        'section' => 'home_featured_area',
        'type' => 'text',
        'priority' => 2,
            )
    );
    
    $wp_customize->add_setting(
        'featured_image_title_one', array(
        'default' => 'Image One Title',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'featured_image_title_one', array(
        'label' => 'Image One Title',
        'section' => 'home_featured_area',
        'type' => 'text',
        'priority' => 3,
            )
    );
    
     $wp_customize->add_setting(
            'featured_image_description_one', array(
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new smart_Customize_Textarea_Control(
            $wp_customize, 'featured_image_description_one', array(
        'label' => 'Image One Description',
        'section' => 'home_featured_area',
        'settings' => 'featured_image_description_one',
         'priority' => 4,
            )
            )
    );
    
    $wp_customize->add_setting(
        'read_more_one', array(
        'default' => 'Read More',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'read_more_one', array(
        'label' => 'Read More',
        'section' => 'home_featured_area',
        'type' => 'text',
        'priority' => 5,
            )
    );
    
     $wp_customize->add_setting(
        'featured_image_two', array(
        'default' => 'Image Two Code',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    
    $wp_customize->add_control(
            'featured_image_two', array(
        'label' => 'Image Two Code',
        'section' => 'home_featured_area',
        'type' => 'text',
        'priority' => 6,
            )
    );
    
    $wp_customize->add_setting(
        'featured_image_title_two', array(
        'default' => 'Image Two Title',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'featured_image_title_two', array(
        'label' => 'Image Two Title',
        'section' => 'home_featured_area',
        'type' => 'text',
        'priority' => 7,
            )
    );
    
     $wp_customize->add_setting(
            'featured_image_description_two', array(
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new smart_Customize_Textarea_Control(
            $wp_customize, 'featured_image_description_two', array(
        'label' => 'Image Two Description',
        'section' => 'home_featured_area',
        'settings' => 'featured_image_description_two',
         'priority' => 8,
            )
            )
    );
    
    $wp_customize->add_setting(
        'read_more_two', array(
        'default' => 'Read More',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'read_more_two', array(
        'label' => 'Read More',
        'section' => 'home_featured_area',
        'type' => 'text',
        'priority' => 9,
            )
    );
    
     $wp_customize->add_setting(
        'featured_image_three', array(
        'default' => 'Image Three Code',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    
    $wp_customize->add_control(
            'featured_image_three', array(
        'label' => 'Image Three Code',
        'section' => 'home_featured_area',
        'type' => 'text',
        'priority' => 10,
            )
    );
    
    $wp_customize->add_setting(
        'featured_image_title_three', array(
        'default' => 'Image Three Title',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'featured_image_title_three', array(
        'label' => 'Image Three Title',
        'section' => 'home_featured_area',
        'type' => 'text',
        'priority' => 11,
            )
    );
    
     $wp_customize->add_setting(
            'featured_image_description_three', array(
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new smart_Customize_Textarea_Control(
            $wp_customize, 'featured_image_description_three', array(
        'label' => 'Image Three Description',
        'section' => 'home_featured_area',
        'settings' => 'featured_image_description_three',
         'priority' => 12,
            )
            )
    );
    
    $wp_customize->add_setting(
        'read_more_three', array(
        'default' => 'Read More',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'read_more_three', array(
        'label' => 'Read More',
        'section' => 'home_featured_area',
        'type' => 'text',
        'priority' => 13,
            )
    );
    
      
     $wp_customize->add_section(
            'home_featured_middle_area', array(
        'title' => 'Home Featured Middle Area',
        'description' => 'This is Home Featured  Middle Area.',
        'priority' => 36,
            )
    );
     
     $wp_customize->add_setting(
        'featured_middle_title', array(
        'default' => 'Middle Title',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'featured_middle_title', array(
        'label' => 'Middle Title',
        'section' => 'home_featured_middle_area',
        'type' => 'text',
        'priority' => 1,
            )
    );
    
    $wp_customize->add_setting(
            'featured_middle_description', array(
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new smart_Customize_Textarea_Control(
            $wp_customize, 'featured_middle_description', array(
        'label' => 'Middle Area Description',
        'section' => 'home_featured_middle_area',
        'settings' => 'featured_middle_description',
         'priority' => 2,
            )
            )
    );
    
    $wp_customize->add_setting(
        'featured_list_one', array(
        'default' => 'List One',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'featured_list_one', array(
        'label' => 'List One',
        'section' => 'home_featured_middle_area',
        'type' => 'text',
        'priority' => 3,
            )
    );
    
    $wp_customize->add_setting(
        'featured_list_two', array(
        'default' => 'List Two',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'featured_list_two', array(
        'label' => 'List Two',
        'section' => 'home_featured_middle_area',
        'type' => 'text',
        'priority' => 4,
            )
    );
    
    $wp_customize->add_setting(
        'featured_list_three', array(
        'default' => 'List Three',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'featured_list_three', array(
        'label' => 'List Three',
        'section' => 'home_featured_middle_area',
        'type' => 'text',
        'priority' => 5,
            )
    );
    
    $wp_customize->add_setting(
        'featured_list_four', array(
        'default' => 'List Four',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'featured_list_four', array(
        'label' => 'List Four',
        'section' => 'home_featured_middle_area',
        'type' => 'text',
        'priority' => 6,
            )
    );
    
    $wp_customize->add_setting(
        'featured_list_five', array(
        'default' => 'List Five',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'featured_list_five', array(
        'label' => 'List Five',
        'section' => 'home_featured_middle_area',
        'type' => 'text',
        'priority' => 7,
            )
    );
    
    $wp_customize->add_setting('middle_slider_image');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'middle_slider_image', array(
        'label' => 'Middle Slider Image',
        'section' => 'home_featured_middle_area',
        'settings' => 'middle_slider_image',
         'priority' => 8,
            )
            )
    );
    
     $wp_customize->add_section(
            'testimonial_slider', array(
        'title' => 'Testimonial Slider Area',
        'description' => 'Testimonial Slider Area.',
        'priority' => 37,
            )
    );
     $wp_customize->add_setting(
        'testimonial_title', array(
        'default' => 'Testimonial Title',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'testimonial_title', array(
        'label' => 'Testimonial Title',
        'section' => 'testimonial_slider',
        'type' => 'text',
        'priority' => 1,
            )
    );
    
     $wp_customize->add_setting('testimonial_image_one');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'testimonial_image_one', array(
        'label' => 'Testimonial Image One',
        'section' => 'testimonial_slider',
        'settings' => 'testimonial_image_one',
         'priority' => 2,
            )
            )
    );
    
    $wp_customize->add_setting(
        'client_one_name', array(
        'default' => 'Client Name',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'client_one_name', array(
        'label' => 'Client One Name',
        'section' => 'testimonial_slider',
        'type' => 'text',
        'priority' => 3,
            )
    );
    
    
     $wp_customize->add_setting(
            'flex_caption_one', array(
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new smart_Customize_Textarea_Control(
            $wp_customize, 'flex_caption_one', array(
        'label' => 'Flex Caption Description',
        'section' => 'testimonial_slider',
        'settings' => 'flex_caption_one',
         'priority' => 4,
            )
            )
    );
    
   $wp_customize->add_setting('testimonial_image_two');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'testimonial_image_two', array(
        'label' => 'Testimonial Image Two',
        'section' => 'testimonial_slider',
        'settings' => 'testimonial_image_two',
         'priority' => 5,
            )
            )
    );
       
    $wp_customize->add_setting(
        'client_two_name', array(
        'default' => 'Client Name',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'client_two_name', array(
        'label' => 'Client Two Name',
        'section' => 'testimonial_slider',
        'type' => 'text',
        'priority' => 6,
            )
    );
    
    $wp_customize->add_setting(
            'flex_caption_two', array(
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new smart_Customize_Textarea_Control(
            $wp_customize, 'flex_caption_two', array(
        'label' => 'Flex Caption Description',
        'section' => 'testimonial_slider',
        'settings' => 'flex_caption_two',
         'priority' => 7,
            )
            )
    );
    
    $wp_customize->add_setting('testimonial_image_three');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'testimonial_image_three', array(
        'label' => 'Testimonial Image Three',
        'section' => 'testimonial_slider',
        'settings' => 'testimonial_image_three',
         'priority' => 8,
            )
            )
    );
    
    $wp_customize->add_setting(
        'client_three_name', array(
        'default' => 'Client Name',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'client_three_name', array(
        'label' => 'Client Three Name',
        'section' => 'testimonial_slider',
        'type' => 'text',
        'priority' => 9,
            )
    );
    
    $wp_customize->add_setting(
            'flex_caption_three', array(
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new smart_Customize_Textarea_Control(
            $wp_customize, 'flex_caption_three', array(
        'label' => 'Flex Caption Description',
        'section' => 'testimonial_slider',
        'settings' => 'flex_caption_three',
         'priority' => 10,
            )
            )
    );
    
     $wp_customize->add_section(
            'cta_area', array(
        'title' => 'Cta Area',
        'description' => 'Cta Area.',
        'priority' => 38,
            )
    );
     
     $wp_customize->add_setting(
        'cta_title', array(
        'default' => 'Cta Title',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'cta_title', array(
        'label' => 'Cta Title',
        'section' => 'cta_area',
        'type' => 'text',
        'priority' => 1,
            )
    );
    
    $wp_customize->add_setting(
        'cta_button', array(
        'default' => 'Cta Button',
        'sanitize_callback' => 'smart_sanitize_text',
        'trasnport' => 'postMessage',
            )
    );
    $wp_customize->add_control(
            'cta_button', array(
        'label' => 'Cta Button',
        'section' => 'cta_area',
        'type' => 'text',
        'priority' => 2,
            )
    );
    
    
      
}
add_action( 'customize_register', 'smart_customize_register' );


/* sanitize function for Text Field start */

function smart_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}

/* sanitize function for Text end */

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function smart_customize_preview_js() {
	wp_enqueue_script( 'smart_customizer', get_template_directory_uri() . '/includes/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'smart_customize_preview_js' );
