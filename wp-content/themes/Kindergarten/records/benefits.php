<?php

add_action( 'init', 'reg_benefits' ); // register post type

function reg_benefits()
{
    $labels = array
    (
        'name' 					=> 'Преимущества',
        'singular_name'			=> 'Преимущества',
        'add_new' 				=> 'Добавить',
        'add_new_item' 			=> 'Добавить',
        'edit_item' 			=> 'Редактировать',
        'new_item' 				=> 'Новая',
        'all_items' 			=> 'Преимущества',
        'view_item' 			=> 'Просмотреть',
        'search_items' 			=> 'Поиск',
        'not_found' 			=> 'Решение не найдено',
        'not_found_in_trash' 	=> 'В корзине не найдено',
        'menu_name' 			=> 'Преимущества'
    );
    $args = array
    (
        'labels' 				=> $labels,
        'public' 				=> false,
        'show_ui' 				=> true,
        'has_archive' 			=> false,
        'menu_icon' 			=> 'dashicons-saved',
        'menu_position' 		=> 10,
        'publicly_queryable'	=> true,
        'supports' 				=> array( 'title', 'custom-fields',),
    );
    register_post_type('our_benefits', $args);
}
