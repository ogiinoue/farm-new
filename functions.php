<?php
// テーマバージョンを定義
if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/**
 * Enqueue scripts and styles.
 */
function farm_theme_scripts() {
    // WordPress テーマヘッダー情報（必要）
    wp_enqueue_style('farm-theme-info', get_template_directory_uri() . '/style.css', array(), _S_VERSION);
    
    // メインCSS（実際のスタイル）
    wp_enqueue_style('farm-theme-main', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION);
    
    // Webフォント
    wp_enqueue_style('farm-theme-fonts', 'https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@400;500;600;700&display=swap', array(), null);
    
    // Owl Carousel CSS（distフォルダの正式版を使用）
    wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css', array(), '2.3.4');
    wp_enqueue_style('owl-theme-css', get_template_directory_uri() . '/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css', array(), '2.3.4');
    
    // jQuery（CDN版を使用）
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), null, true);
    
    // Swiper CSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
    
    // Swiper JS
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
    
    // テーマのメインスクリプト
    wp_enqueue_script('farm-new-script', get_template_directory_uri() . '/js/script.js', array('jquery'), _S_VERSION, true);

    

    // コメント返信機能（必要な場合のみ）
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'farm_theme_scripts');

//デフォルト投稿関係
function post_has_archive($args, $post_type)
{
  if ('post' == $post_type) {
    $args['rewrite'] = array(
      'slug' => 'news',
      'feeds' => true
    );
    $args['has_archive'] = 'news';
    $args['label'] = 'お知らせ';
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// 投稿一覧ページを強制的に有効化
function farm_enable_post_archive() {
    global $wp_post_types;
    $wp_post_types['post']->has_archive = 'news';
    $wp_post_types['post']->rewrite = array(
        'slug' => 'news',
        'feeds' => true
    );
}
add_action('init', 'farm_enable_post_archive');

// パーマリンクをフラッシュ（テーマ有効化時）
function farm_theme_flush_rewrite_rules() {
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'farm_theme_flush_rewrite_rules');

add_theme_support('post-thumbnails');

//SCFとACFのプラグインによるコンフリクトを防ぐためのコード
add_filter('acf/settings/remove_wp_meta_box','__return_false');