<?php

add_action( 'init', 'reg_price' ); // register post type

function reg_price()
{
    $labels = array
    (
        'name' 					=> 'Цены',
        'singular_name'			=> 'Цена',
        'add_new' 				=> 'Добавить',
        'add_new_item' 			=> 'Добавить',
        'edit_item' 			=> 'Редактировать',
        'new_item' 				=> 'Новая',
        'all_items' 			=> 'Цены',
        'view_item' 			=> 'Просмотреть',
        'search_items' 			=> 'Поиск',
        'not_found' 			=> 'Решение не найдено',
        'not_found_in_trash' 	=> 'В корзине не найдено',
        'menu_name' 			=> 'Цены'
    );
    $args = array
    (
        'labels' 				=> $labels,
        'public' 				=> false,
        'show_ui' 				=> true,
        'has_archive' 			=> false,
        'menu_icon' 			=> 'dashicons-cart',
        'menu_position' 		=> 10,
        'publicly_queryable'	=> true,
        'supports' 				=> array( 'title', 'custom-fields',),
    );
    register_post_type('our_price', $args);
}
