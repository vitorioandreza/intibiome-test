<?php

function assetsurl () {
	return get_stylesheet_directory_uri() . '/assets/';
}

add_theme_support('post-thumbnails');
register_nav_menu('menu-header', 'Menu Header');
register_nav_menu('menu-footer', 'Menu Footer');

add_action('init', function() {

    register_post_type('produto', [
        'labels' => [
            'name' => __('Produtos'),
            'singular_name' => __('Produto'),
            'add_new' => __('Adicionar Novo'),
            'add_new_item' => __('Adicionar novo produto'),
            'edit_item' => __('Editar produto')
        ],
        'public' => true,
        'taxonomies' => ['category'],
        'supports' => ['title', 'page-attributes', 'thumbnail'],
        'hierarchical' => false,
        'menu_icon' => 'dashicons-products'
    ]);

    unregister_taxonomy_for_object_type('category', 'post');
});