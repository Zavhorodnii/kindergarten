<html lang="ru">
<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.2.0/swiper-bundle.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>

<!--    <link rel="stylesheet" href="--><?php //echo get_template_directory_uri() ?><!--/libs/Magnific-Popup-master/dist/magnific-popup.css"/>-->
<!--    <link rel="stylesheet" href="--><?php //echo get_template_directory_uri() ?><!--/css/style.css"/>-->
<!--    <link rel="stylesheet" href="--><?php //echo get_template_directory_uri() ?><!--/css/main.css"/>-->

    <?php wp_head(); ?>
    <link rel="shortcut icon" href="<?php echo get_field('shortcut', 'options')['url'] ?>"/>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="header_row">
                <a class="logo" href="<?php echo get_home_url() ?>">
                    <img src="<?php echo get_field('header_logo', 'options')['url'] ?>"
                         alt="<?php echo get_field('header_logo', 'options')['alt'] ?>"/></a>
                <ul class="menu_list">
                    <li class="menu_item"><a class="menu_link" href="#link-0">Про нас</a></li>
                    <li class="menu_item"><a class="menu_link" href="#link-1">Розклад дня</a></li>
                    <li class="menu_item"><a class="menu_link" href="#link-2">Гуртки</a></li>
                    <li class="menu_item"><a class="menu_link" href="#link-3">Ціни</a></li>
                    <li class="menu_item"><a class="menu_link" href="#link-4">Наша команда</a></li>
                    <li class="menu_item"><a class="menu_link" href="#link-5">Контакти</a></li>
                    <span class="close_menu"></span>
                </ul>
                <div class="phone_wrap">
                    <div class="column">
                        <?php
                        $phone_numbers = get_field('phone_numbers', 'options');
                        ?>
                        <a class="icon_link" href="tel:<?php echo $phone_numbers[0]['phone_number'] ?>">
                            <svg class="icon">
                                <use xlink:href="<?php echo get_template_directory_uri() ?>/img/svg/sprite.svg#phone"></use>
                            </svg>
                        </a>
                        <?php
                        foreach ($phone_numbers as $phone_number){
                            ?>
                            <a class="phone_link" href="tel:<?php echo $phone_number['phone_number'] ?>"><?php echo $phone_number['phone_number'] ?></a>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="button_wrap">
                        <a class="button-link form-popup " href="#form-popup-mob" data-effect="mfp-zoom-in">Замовити дзвінок</a>
                    </div>
                </div>
                <div class="menu_btn">
                    <svg class="icon">
                        <use xlink:href="<?php echo get_template_directory_uri() ?>/img/svg/sprite.svg#btnMenu"></use>
                    </svg>
                </div>
            </div>
        </div>
    </header>