<?php defined('ABSPATH') or die; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header id="site-header" class="header-group">
            <div class="top-bar">
                <?php dynamic_sidebar('top-bar') ?>
                <?php wp_nav_menu( array(
                    'theme_location' => 'top-menu',
                    'menu_class' => 'top-bar',
                    'container' => FALSE)); ?>
            </div>
            <div class="header-inner section-inner">
                <div class="header-titles-wrapper">
                    <div class="header-titles">
                        <!-- LOGO -->
                        <?php print the_custom_logo() ?>
                        <!-- TITLE -->
                    </div>
                </div>
                <?php wp_nav_menu( array(
                    'theme_location' => 'main-menu',
                    'menu_class' => 'header-main' )); ?>
            </div>
        </header>        
        <main id="site-content">
        <?php $post_type = array( get_post_type() , is_single() ? 'single' : 'loop' ); ?>            
        <?php if( $post_type[0] === FALSE || is_404() ) : ?> 
            <div class="content error-404">
            <?php get_template_part( 'html/404' ); ?>
            </div>
        <?php elseif( $post_type[0] === 'page' ) : ?>
        <div class="content page">
            <?php get_template_part( 'html/page' ); ?>
        </div>
        <?php else: ?>
        <div class="content <?php print implode(' ', $post_type);  ?>">
            <?php get_template_part( 'html/' . implode('-', $post_type) ); ?>
        </div>
        <?php endif; ?>

        </main><!-- #site-content -->
        
        <?php if( is_active_sidebar('footer-widget-left') || is_active_sidebar('footer-widget-right') ) : ?>
        <div class="footer-widgets">
            <!-- footer widgets -->
            <?php dynamic_sidebar('footer-widget-left') ?>
            <?php dynamic_sidebar('footer-widget-right') ?>
        </div>
        <?php endif; ?>

        <footer id="site-footer" class="header-footer">
            <div class="section-inner">
                <!-- bottom bar -->
                <?php dynamic_sidebar('bottom-bar') ?>
                <?php wp_nav_menu(array(
                    'theme_location' => 'bottom-menu',
                    'menu_class' => 'bottom-bar right',
                    'container' => FALSE )); ?>
            </div><!-- .section-inner -->
        </footer><!-- #site-footer -->	
        <?php wp_footer(); ?>
    </body>
</html>
