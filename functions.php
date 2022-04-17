<?php

defined('ABSPATH') or die;
    
add_action('init', function() {

    //Scripts
    add_action('wp_enqueue_scripts', function() {

        wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        //wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
        wp_enqueue_style('style', get_stylesheet_uri());
        wp_enqueue_script('script', get_template_directory_uri() . '/script.js', array(), '1.0.0', true);

        $themeMod = get_theme_mod('coders_theme_color','red');

        if(strlen($themeMod)){
            wp_enqueue_style('style-' . $themeMod , sprintf('%s/override/%s.css',
                    get_stylesheet_directory_uri(),
                    $themeMod) );
        }
        
    });

    //Menus
    register_nav_menus(
            array(
                'top-menu' => __('Top Menu'),
                'main-menu' => __('Main Menu'),
                'bottom-menu' => __('Bottom Menu'),
            )
    );

    add_theme_support('custom-logo', array(
        'width' => 200,
        'height' => 100,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    ));

    add_theme_support('post-thumbnails', array('post'));
});

add_action('widgets_init', function() {

    register_sidebar(array(
        'name' => __('Top Bar'),
        'id' => 'top-bar',
        'before_widget' => '<div class="widget container left">',
        'after_widget' => '</div>',
        'before_title' => '', //no title here
        'after_title' => '',
    ));

    register_sidebar(array(
        'name' => __('Blog Sidebar'),
        'id' => 'sidebar',
        'before_widget' => '<div class="widget container">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer Widgets Left'),
        'id' => 'footer-widget-left',
        'before_widget' => '<div class="widget container bot-md">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Footer Widgets Right'),
        'id' => 'footer-widget-right',
        'before_widget' => '<div class="widget container">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Bottom Bar'),
        'id' => 'bottom-bar',
        'before_widget' => '<div class="widget container col-6">',
        'after_widget' => '</div>',
        'before_title' => '', //no title here
        'after_title' => '',
    ));
});


add_action('customize_register', function(WP_Customize_Manager $wp_customize) {

    $settings = array(
        'red' => __('Sakura','coders_themes'),
        'sunset' => __('Sunset','coders_themes'),
        'nature' => __('Nature','coders_themes'),
        'ocean' => __('Ocean','coders_themes'),
        'organic' => __('Organic','coders_themes'),
        'golden' => __('Cornfield','coders_themes'),
        //'glass' => __('Glass','coders_themes'),
    );

    //global $wp_customize;
    $wp_customize->add_setting('coders_theme_color', $settings );
    $wp_customize->add_section('coders_theme_setup', array(
        'title' => __('Coders Theme Setup', 'coders_themes'),
        'priority' => 30,
    ));
    $wp_customize->add_control(new WP_Customize_Control(
                    $wp_customize, //Pass the $wp_customize object (required)
                    'coders_theme_color_select', //Set a unique ID for the control
                    array(
                'label' => __('Color Selection', 'coders_themes'), //Admin-visible name of the control
                'description' => __('Make your choice ;D'),
                'settings' => 'coders_theme_color', //Which setting to load and manipulate (serialized is okay)
                'priority' => 10, //Determines the order this control appears in for the specified section
                'section' => 'coders_theme_setup', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
                'type' => 'select',
                'choices' => $settings ) ) );
});



