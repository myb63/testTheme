<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    
    <?php
    // ページ固有のCSSファイルを読み込む
    if (function_exists('test_theme_enqueue_page_css')) {
        // 例：現在のページに応じてCSSファイルを読み込む
        if (is_front_page()) {
            test_theme_enqueue_page_css('home.css');
        } elseif (is_single()) {
            test_theme_enqueue_page_css('single.css');
        } elseif (is_page()) {
            test_theme_enqueue_page_css('page.css');
        } elseif (is_archive()) {
            test_theme_enqueue_page_css('archive.css');
        }
    }
    ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
            <?php endif; ?>
        </div>

        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
            ));
            ?>
        </nav>
    </div>
</header> 