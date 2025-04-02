<?php
if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/**
 * テーマのセットアップ
 */
function test_theme_setup() {
    // タイトルタグのサポート
    add_theme_support('title-tag');

    // アイキャッチ画像のサポート
    add_theme_support('post-thumbnails');

    // カスタムロゴのサポート
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // メニューの登録
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'test-theme'),
    ));

    // HTML5サポート
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
}
add_action('after_setup_theme', 'test_theme_setup');

/**
 * スタイルとスクリプトの読み込み
 */
function test_theme_scripts() {
    // メインのスタイルシート
    wp_enqueue_style('test-theme-style', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION);
}
add_action('wp_enqueue_scripts', 'test_theme_scripts');

/**
 * ページ固有のCSSファイルを読み込む
 * 
 * @param string $css_file CSSファイルのパス（assets/css/からの相対パス）
 * @param array $dependencies 依存するCSSファイル
 */
function test_theme_enqueue_page_css($css_file, $dependencies = array()) {
    $css_path = get_template_directory_uri() . '/assets/css/' . $css_file;
    $css_handle = 'test-theme-' . sanitize_title(basename($css_file, '.css'));
    
    wp_enqueue_style($css_handle, $css_path, $dependencies, _S_VERSION);
} 