<?php defined('ABSPATH') or die; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <?php wp_head(); ?>
    </head>
<?php
    $themeSetup = array(
        'top_bar' => get_theme_mod('coders_topbar_layout', '' ),
        'bottom_bar' =>get_theme_mod('coders_bottombar_layout', '' ),
        'footer_widgets' => get_theme_mod('coders_footer_widgets', 0),
    );
?>
    <body <?php body_class(); ?>>
        <header id="site-header" class="header-group">
            <?php if( strlen($themeSetup['top_bar']) ) : ?>
            <div class="top-bar container">
                <div class="wrap clearfix">
                    <?php if( is_active_sidebar('top-bar') ) : ?>
                    <div class="widget-area container col-6">
                        <?php dynamic_sidebar('top-bar') ?>
                    </div>
                    <?php endif; ?>
                    <?php wp_nav_menu( array(
                        'theme_location' => 'top-menu',
                        'menu_class'=> is_active_sidebar('top-bar') ? 'menu right text-right container col-6' : 'menu text-right container',
                        'container' => FALSE )); ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="header-main container">
                <div class="wrap clearfix">
                    <div class="header-logo-wrapper container col-3">
                        <!-- LOGO -->
                        <?php print the_custom_logo() ?>
                        <!-- TITLE -->
                    </div>
                    <?php wp_nav_menu( array(
                        'theme_location' => 'main-menu',
                        'menu_class'=>'menu right container col-9 text-right' ,
                        'container'=> FALSE)); ?>
                </div>
            </div>
        </header>        
        <main id="site-content" class="container">
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
                <div class="container content <?php print implode(' ', $post_type);  ?>">
                    <?php get_template_part( 'html/' . implode('-', $post_type) ); ?>
                </div>
                <?php endif; ?>
        </main><!-- #site-content -->
        
        <footer id="site-footer" class="footer-group">
            
            <?php if( is_active_sidebar('footer-widget-left') || is_active_sidebar('footer-widget-right') ) : ?>
                <div class="footer-widgets">
                    <div class="wrap clearfix">
                        <!-- footer widgets -->
                        <?php if (is_active_sidebar('footer-widget-left')) : ?>
                        <div class="widget-area container pad-top-md pad-bot-lg <?php echo is_active_sidebar('footer-widget-right') ? 'col-6 left' : 'col-12'; ?>">
                        <?php dynamic_sidebar('footer-widget-left') ?>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (is_active_sidebar('footer-widget-right')) : ?>
                        <div class="widget-area container pad-top-md pad-bot-lg <?php echo is_active_sidebar('footer-widget-left') ? 'col-6 right' : 'col-12'; ?>">
                        <?php dynamic_sidebar('footer-widget-right') ?>
                        </div>
                        <?php endif; ?>
                        
                    </div>
                </div>
            <?php endif; ?>
                
            <?php if( $themeSetup['bottom_bar'] !== 'none' ) : ?> 
            <div class="bottom-bar">
                <div class="wrap clearfix">
                    
                <!-- bottom bar -->
                    <?php dynamic_sidebar('bottom-bar') ?>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'bottom-menu',
                        'menu_class' => is_active_sidebar('bottom-bar') ? 'menu right container col-6 text-right' : 'menu container text-right',
                        'container' => FALSE )); ?>
                </div>
            </div><!-- .section-inner -->
            <?php endif; ?>
        </footer><!-- #site-footer -->	
        <?php wp_footer(); ?>
    </body>
</html>
