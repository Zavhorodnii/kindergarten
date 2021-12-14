<?php

add_action( 'init', 'reg_team' ); // register post type

function reg_team()
{
    $labels = array
    (
        'name' 					=> 'Наша команда',
        'singular_name'			=> 'Команда',
        'add_new' 				=> 'Добавить',
        'add_new_item' 			=> 'Добавить',
        'edit_item' 			=> 'Редактировать',
        'new_item' 				=> 'Новая',
        'all_items' 			=> 'Вся команда',
        'view_item' 			=> 'Просмотреть',
        'search_items' 			=> 'Поиск',
        'not_found' 			=> 'Решение не найдено',
        'not_found_in_trash' 	=> 'В корзине не найдено',
        'menu_name' 			=> 'Наша команда'
    );
    $args = array
    (
        'labels' 				=> $labels,
        'public' 				=> false,
        'show_ui' 				=> true,
        'has_archive' 			=> false,
        'menu_icon' 			=> 'dashicons-id',
        'menu_position' 		=> 10,
        'publicly_queryable'	=> true,
        'supports' 				=> array( 'title', 'custom-fields',),
    );
    register_post_type('our_team', $args);
}
