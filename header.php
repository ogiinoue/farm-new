<?php

/**
 * The header for our theme
 *
 * @package Farm_New
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php if (is_page(array('53', '56', '58'))) : ?>
        <meta description="自然の恵み農園は、農園運営・牧場運営・オンライン販売を行なっています。お問い合わせはこちらからお願いします。">
    <?php elseif (is_page(array('6'))) : ?>
        <meta description="自然の恵み農園は、農園運営・牧場運営・オンライン販売を通じ、自然の恵みを感じて、豊かな未来を想像して頂ける取り組みを行なっています。取り組みのお知らせのページです">
    <?php else : ?>
        <meta description="<?php bloginfo('description'); ?>">
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'farm-new'); ?></a>

        <!-- ヘッダー -->
        <header class="header">
            <div class="header__inner">
                <div class="header__logo">
                    <a href="<?php echo home_url(); ?>">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/images/logo.svg" alt="' . get_bloginfo('name') . 'ロゴ">';
                        }
                        ?>
                    </a>
                </div>
                <nav class="header__nav">
                    <ul class="header__nav-list">
                        <li class="header__nav-item"><a href="#about" class="header__nav-link">私たちについて</a></li>
                        <li class="header__nav-item"><a href="#activities" class="header__nav-link">活動紹介</a></li>
                        <li class="header__nav-item"><a href="#faq" class="header__nav-link">よくあるご質問</a></li>
                        <li class="header__nav-item"><a href="<?php echo home_url('/news/'); ?>" class="header__nav-link">お知らせ</a></li>
                        <li class="header__nav-item"><a href="<?php echo home_url('/#access'); ?>" class="header__nav-link">アクセス</a></li>
                    </ul>
                </nav>
                <a href="<?php echo home_url('/contact/'); ?>" class="header__contact-btn">お問い合わせ</a>

            <!-- ======================================
             スマホで表示するハンバーガーメニュー
            ======================================= -->
                <div class="header_content_right">
                    <div class="navi_open">
                        <a href="#">
                            <img src="images/navi_open.png" alt="MENU">
                        </a>
                    </div>
                </div>
            </div>
    </div>
    </header><!-- #masthead -->