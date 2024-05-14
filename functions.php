<?php

// カテゴリーごとの記事一覧を表示
function category_list($category_name) {
    $args = array(
        'category_name' => $category_name,
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        echo '<ul>';
        while ($query->have_posts()) {
            $query->the_post();
            echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
        }
        echo '</ul>';
        wp_reset_postdata();
    } else {
        echo '<p>No posts found</p>';
    }
}

// フロントページで全てのカテゴリーの記事一覧を表示
function category_list_all() {
    $categories = get_categories();
    foreach ($categories as $category) {
        echo '<h3>' . $category->name . '</h3>';
        category_list($category->name);
    }
}

// ウィジェットの登録
function register_custom_widgets() {
    register_sidebar(array(
        'name' => 'Header Widget',
        'id' => 'header-widget',
        'description' => 'Widget area in the site header',
        'before_widget' => '<div id="%1$s" class="widget">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));

    register_sidebar(array(
        'name' => 'Footer Widget',
        'id' => 'footer-widget',
        'description' => 'Widget area in the site footer',
        'before_widget' => '<div id="%1$s" class="widget">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));

    register_sidebar(array(
        'name' => 'Ad Widget',
        'id' => 'ad-widget',
        'description' => 'Widget area for advertisements',
        'before_widget' => '<div id="%1$s" class="widget">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));
}

add_action('widgets_init', 'register_custom_widgets');
