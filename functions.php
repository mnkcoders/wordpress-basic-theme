<?php

defined('ABSPATH') or die;

add_action('init', function() {

    //Scripts
    add_action('wp_enqueue_scripts', function() {
        wp_enqueue_style('style', get_stylesheet_uri());
        wp_enqueue_script('script', get_template_directory_uri() . '/script.js', array(), '1.0.0', true);
    });

    //Menus
    register_nav_menus(
            array(
                'top-menu' => __('Top Menu'),
                'main-menu' => __('Main Menu'),
                'legal-menu' => __('Legal Menu'),
            )
    );
    
    add_theme_support('custom-logo',array(
                        'width' => 200,
                        'height' => 100,
                        'flex-height' => true,
                        'flex-width' => true,
                        'header-text' => array('site-title','site-description'),
                    ));
    
    add_theme_support('post-thumbnails',array('post'));
});

add_action('widgets_init', function() {

        register_sidebar(array(
            'name' => __('Top Bar'),
            'id' => 'top-bar',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="rounded">',
            'after_title' => '</h2>',
        ));
    
        register_sidebar(array(
            'name' => __('Blog Sidebar'),
            'id' => 'sidebar',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="rounded">',
            'after_title' => '</h2>',
        ));
    
        register_sidebar(array(
            'name' => __('Footer Widgets Left'),
            'id' => 'footer-widget-left',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="rounded">',
            'after_title' => '</h2>',
        ));
        register_sidebar(array(
            'name' => __('Footer Widgets Right'),
            'id' => 'footer-widget-right',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="rounded">',
            'after_title' => '</h2>',
        ));
        register_sidebar(array(
            'name' => __('Bottom Bar'),
            'id' => 'bottom-bar',
            'before_widget' => '<div class="left">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => '',
        ));

});



