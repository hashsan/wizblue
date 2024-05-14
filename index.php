<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <!-- サイトのヘッダーウィジェット -->
    <?php dynamic_sidebar('header-widget'); ?>
</header>

<main class="site-main">
    <article>
        <header class="article-header">
            <!-- 記事のヘッダーコンテンツ -->
            <p><?php the_category(', '); ?></p>
            <h2><?php the_title(); ?></h2>
            <p><?php echo get_the_author(); ?></p>
        </header>
        <div class="article-content">
            <!-- 記事のメインコンテンツ -->
            <?php
            if (is_front_page()) {
                category_list_all();
            } else {
                the_content();
            }
            ?>
        </div>
        <footer class="article-footer">
            <!-- 記事のフッターコンテンツ -->
            <?php if (!is_front_page()) category_list(get_the_category()[0]->name); ?>
            <?php dynamic_sidebar('ad-widget'); ?>
        </footer>
    </article>
</main>

<footer class="site-footer">
    <!-- サイトのフッターウィジェット -->
    <?php dynamic_sidebar('footer-widget'); ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>
