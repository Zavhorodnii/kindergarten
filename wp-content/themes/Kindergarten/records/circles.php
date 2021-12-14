<?php

add_action( 'init', 'reg_circles' ); // register post type

function reg_circles()
{
    $labels = array
    (
        'name' 					=> 'Кружки',
        'singular_name'			=> 'Кружок',
        'add_new' 				=> 'Добавить',
        'add_new_item' 			=> 'Добавить',
        'edit_item' 			=> 'Редактировать',
        'new_item' 				=> 'Новая',
        'all_items' 			=> 'Кружки',
        'view_item' 			=> 'Просмотреть',
        'search_items' 			=> 'Поиск',
        'not_found' 			=> 'Решение не найдено',
        'not_found_in_trash' 	=> 'В корзине не найдено',
        'menu_name' 			=> 'Кружки'
    );
    $args = array
    (
        'labels' 				=> $labels,
        'public' 				=> false,
        'show_ui' 				=> true,
        'has_archive' 			=> false,
        'menu_icon' 			=> 'dashicons-buddicons-activity',
        'menu_position' 		=> 10,
        'publicly_queryable'	=> true,
        'supports' 				=> array( 'title', 'custom-fields',),
    );
    register_post_type('our_circles', $args);
}
