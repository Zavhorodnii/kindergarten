<?php
get_header();
?>
<?php
$intro = get_field('intro', get_the_ID());
?>
<section class="section_banner section" style="background-image: url('<?php echo $intro['image']['url'] ?>');background-size: 0;">

    <div class="anchor" id="link-"></div>
    <div class="container row">
        <div class="text_block" >
            <div class="h1 title"><?php echo $intro['title'] ?></div>
            <div class="text"><?php the_content(); ?></div>
            <a href="#form-popup" data-effect="mfp-zoom-in" class="button form-popup">Записаться</a>
        </div>
        <div class="video-btn_wrap">
            <a class="video_btn"
               href="<?php echo $intro['video_link'] ?>">
            </a>
        </div>
    </div>
</section>
<svg class="banner_mask mask_1">
    <clipPath id="mask1" clipPathUnits="objectBoundingBox">
        <path d="M0.804,0.927 C0.918,1,0.982,0.932,1,0.869 L1,0.0 L0,0.000 L0,0.869 C0.024,1,0.254,0.994,0.366,0.927 C0.465,0.883,0.69,0.822,0.804,0.927"></path>
    </clipPath>
</svg>
<svg class="banner_mask mask_2">
    <clipPath id="mask2" clipPathUnits="objectBoundingBox">
        <path d="M1,0.002 H0.002 V1 C0.002,1,0.135,1,0.415,0.939 C0.695,0.862,1,1,1,1 V0.002"></path>
    </clipPath>
</svg>
<section class="section_benefits section">
    <div class="anchor" id="link-0"></div>
    <?php
    $benefits = get_field('benefits');
    ?>
    <div class="container">
        <div class="h2"><?php echo $benefits['title'] ?></div>
        <div class="wrap" id="inline-popups-yac">
            <?php
//            var_export($benefits['benefit']);
            $index = 1;
            foreach ($benefits['benefit'] as $benefit) {
                ?>
                <div class="item item_<?php echo $index ?>">
                    <div class="text"><?php echo get_post_meta($benefit->ID, 'title', true); ?>
                        <?php
                        $icon_colour = get_post_meta($benefit->ID, 'icon_colour', true);
                        if(get_field('show_popup', $benefit->ID)){
                            ?>
                            <a href="#popups-benefit-<?php echo $index ?>" data-effect="mfp-zoom-in" class="iconInfo"
                               style="color: <?php echo $icon_colour ?>;
                                      border-color: <?php echo $icon_colour ?>;
                                      fill: <?php echo $icon_colour ?>;">
                                <svg class="icon">
                                    <use xlink:href="<?php echo get_template_directory_uri() ?>/img/svg/sprite.svg#iconInfo"></use>
                                </svg>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                if(get_field('show_popup', $benefit->ID)){
                    ?>
                    <div id="popups-benefit-<?php echo $index ?>" class="white-popup-1 mfp-with-anim mfp-hide">
                        <?php
                        $popup = get_field('popup', $benefit->ID)
                        ?>
                        <div class="title">
                            <?php echo $popup['title'] ?>
                        </div>
                        <div class="description">
                            <?php echo $popup['description_text'] ?>
                        </div>
                        <?php echo $popup['description'] ;

                        if(is_array($popup['images'])){
                            ?>
                            <div class="slide-one">
                                <div class="slide-one__title">
                                    <?php echo $popup['photo_title'] ?>
                                </div>
                                <div class="slide-wrap">
                                    <div class="swiper Swipers">
                                        <div class="swiper-wrapper">
                                            <?php
                                            foreach ($popup['images'] as $image){
                                                ?>
                                                <div class="swiper-slide">
                                                    <a data-fancybox="gallery" href="<?php echo $image['url'] ?>" class="img-btn-open">
                                                        <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="swiper-button-next-its"></div>
                                        <div class="swiper-button-prev-its"></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                $index++;
            }
            ?>
        </div>
    </div>
</section>
<section class="section_time section">
    <div class="anchor" id="link-1"></div>
    <div class="container">
        <?php
        $text_block = get_field('text_block');
        ?>
        <div class="h2"><?php echo $text_block['title'] ?></div>
        <div class="section_time-description">
            <?php echo $text_block['description'] ?>
        </div>
        <div class="circle_time">
            <?php
            $index = 1;
            $steering_wheel = get_field('steering_wheel');
            foreach($steering_wheel['items'] as $item){
                ?>
                <div class="time_wrap time_wrap-<?php echo $index ?>">
                    <div class="item item-<?php echo $index ?> "
                         style="
                                 color: <?php echo $item['colour']; ?>;
                                 border-color:  <?php echo $item['colour']; ?>;
                                 fill:  <?php echo $item['colour'] ?>;">
                        <span class="text"><?php echo $item['title'] ?>
                            <span class="iconInfo"
                                  style="
                                    color: <?php echo $item['colour']; ?>;
                                    border-color:  <?php echo $item['colour']; ?>;
                                    fill:  <?php echo $item['colour'] ?>;">
                              <svg class="icon">
                                <use xlink:href="<?php echo get_template_directory_uri() ?>/img/svg/sprite.svg#iconInfo"></use>
                              </svg>
                              <div class="blockInfo BR"><?php echo $item['hover'] ?></div>
                            </span>
                        </span>
                        <span class="time"><?php echo $item['time'] ?></span>
                    </div>
                </div>
                <?php
                $index++;
            }
            ?>

        </div>
    </div>
</section>
<section class="section_form section">
    <div class="anchor" id="link-"></div>
    <div class="container">
        <?php
        $recording = get_field('recording')
        ?>

        <?php
        date_default_timezone_set("Europe/Kiev");
        $date = new DateTime();
        $site_time = $recording['date'];

        $origin = new DateTime($site_time);
        $target = new DateTime(date('d-m-Y g:i:s', $date->getTimestamp()));
        $seconds = 1;
        if( $origin > $target ) {
            $interval = $origin->diff($target);
            $seconds = $interval->s + ($interval->i * 60) + ($interval->h * 3600) + ($interval->d * 86400) + ($interval->m * 2592000);
        }
        ?>
        <div class="row">
            <div class="form_inner">
                <div class="h2 title"><span><?php echo $recording['title'] ?></span></div>
                <p class="subtitle"><?php echo $recording['subtitle'] ?></p>
                <form class="form js_get_form_info">
                    <div class="inputs_wrap">
                        <input class="js_get_name" type="text" required placeholder="ПIБ"/>
                        <input class="js_get_phone"type="phone" id="phonee" required placeholder="Телефон"/>
                    </div>
                    <label class="check">
                        <span class="js_get_title" style="display: none"><?php echo $recording['title'] ?></span>
                        <input type="checkbox" class="js_get_check"/>
                        <span class="personal_date">Згода на обработку персональных данных.<br>
                            <a target="_blank" href="<?php echo get_field('privacy_policy', 'options') ?>">Політика конфіденційності
                                <svg class="icon">
                                  <use xlink:href="img/svg/sprite.svg#link"></use>
                                </svg>
                            </a>
                        </span>
                    </label>
                    <input class="button js_form_visit" type="submit" value="Вiдправити"/>
                </form>
            </div>
            <div class="timer_inner ">
                <div class="timer" id="countdown" data-time="<?php echo $seconds?>">
                    <div class="column">
                        <div class="number days">00</div>
                        <div class="text">Дней</div>
                    </div>
                    <div class="column">
                        <div class="number hours">00</div>
                        <div class="text">Часов</div>
                    </div>
                    <div class="column">
                        <div class="number minutes">00</div>
                        <div class="text">Минут</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section_mug section">
    <?php
    $mugs = get_field('mugs');
    ?>
    <div class="anchor" id="link-2"></div>
    <div class="container">
        <div class="h2"><span><?php echo $mugs['title'] ?></span></div>
    </div>
    <div class="bg-cov mug_wrap">
        <div class="container">
            <div class="row">
                <div class="column left" id="inline-popups-leg">
                    <?php
                    $index = 1;
                    foreach ($mugs['circle'] as $mug){
                        ?>
<!--                        <a href="#popups-leg---><?php //echo $index ?><!--" data-effect="mfp-zoom-in" class="block block_--><?php //echo $index ?><!--">-->
<!--                        <span class="iconInfo color_1">-->
<!--                            <svg class="icon">-->
<!--                                <use xlink:href="--><?php //echo get_template_directory_uri() ?><!--/img/svg/sprite.svg#iconInfo"></use>-->
<!--                            </svg>-->
<!--                        </span>-->
<!--                            <span class="text">--><?php //echo get_post_meta($mug->ID, 'title', true); ?><!--</span>-->
<!--                        </a>-->
                        <div class="block block_<?php echo $index ?>">

                        <a href="#popups-leg-<?php echo $index ?>" data-effect="mfp-zoom-in" style="margin-bottom: 65px">
                        <span class="iconInfo color_1">
                            <svg class="icon">
                                <use xlink:href="<?php echo get_template_directory_uri() ?>/img/svg/sprite.svg#iconInfo"></use>
                            </svg>
                        </span>
                            <span class="text"><?php echo get_post_meta($mug->ID, 'title', true); ?></span>
                        </a>
                        </div>

                        <div id="popups-leg-<?php echo $index ?>" class="white-popup-3 mfp-with-anim mfp-hide">
                        <?php
                            $popup = get_field('popup', $mug->ID);
                        ?>
                        <div class="title">
                            <?php echo $popup['title'] ?>
                        </div>
                        <?php echo $popup['description'] ?>
                        <div class="prise-popups-title">
                            Цiна
                        </div>
                        <div class="prise-popups">
                            <?php echo $popup['price'] ?>
                        </div>

                        <?php
                        if( is_array($popup['images'])){
                            ?>
                            <div class="slide-one">
                                <div class="slide-one__title">
                                    <?php echo $popup['gallery_title'] ?>
                                </div>
                                <div class="slide-wrap">
                                    <div class="swiper Swipers">
                                        <div class="swiper-wrapper">

                                            <?php
                                            foreach ($popup['images'] as $image){
                                                ?>
                                                <div class="swiper-slide">
                                                    <a data-fancybox="gallery" href="<?php echo $image['url'] ?>" class="img-btn-open">
                                                        <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="swiper-button-next-its"></div>
                                        <div class="swiper-button-prev-its"></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>

                        <?php
                        $index++;
                    }
                    ?>
                    <style>
                        .block_3{
                            margin-left: -20px;
                        }
                    </style>
                </div>
                <div class="column right">
                    <div class="main">
                        <img class="logo" src="<?php echo $mugs['separet_boat_img']['url'] ?>"
                                           alt="<?php echo $mugs['separet_boat_img']['alt'] ?>" />
                    </div>
                </div>
                <div class="ship_wrapper"></div>
                <div class="wrap swiper shipSwiper">
                    <div class="slider swiper-wrapper" id="inline-popups-leg-2">
                        <?php
                        $index = 1;
                        foreach ($mugs['circle'] as $mug){
                            ?>
<!--                            <div class="swiper-slide item">-->
<!--                                <div class="block">-->
<!--                                    <a href="#popups-leg---><?php //echo $index ?><!--" data-effect="mfp-zoom-in" class="iconInfo color_1">-->
<!--                                        <svg class="icon">-->
<!--                                            <use xlink:href="--><?php //echo get_template_directory_uri() ?><!--/img/svg/sprite.svg#iconInfo"></use>-->
<!--                                        </svg>-->
<!---->
<!--                                    </a><span class="text">--><?php //echo get_post_meta($mug->ID, 'title', true); ?><!--</span></div>-->
<!--                            </div>-->
                            <div class="swiper-slide item">
                                <div class="block">
                                    <a href="#popups-leg-<?php echo $index ?>" data-effect="mfp-zoom-in" class="iconInfo color_1">
                                        <svg class="icon">
                                            <use xlink:href="<?php echo get_template_directory_uri() ?>/img/svg/sprite.svg#iconInfo"></use>
                                        </svg>

                                    </a><span class="text"><?php echo get_post_meta($mug->ID, 'title', true); ?></span></div>
                            </div>

                            <?php
                            $index++;
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$room = get_field('room');
?>

<style>
    <?php
    $index = 1;
    foreach ( $room['room'] as $room_item){
        ?>
        .section_video.btn-<?php echo $index ?> {
            background-image: url("<?php echo $room_item['image']['url'] ?>");
        }
        <?php
        $index++;
    }
    ?>
</style>
<section class="section_video section btn-1">
    <div class="anchor" id="link-2"></div>
    <div class="container row">
        <div class="tabs">
            <?php
            $index = 1;
            foreach ( $room['room'] as $room_item){
                ?>
                <div class="btn-<?php echo $index ?> button <?php echo $index==1 ? 'on' : '' ?>"><?php echo $room_item['title'] ?></div>
                <?php
                $index++;
            }
            ?>
        </div>
        <div class="video-btn_wrap">
            <?php
            $index = 1;
            foreach ( $room['room'] as $room_item){
                ?>
                <a class="btn-<?php echo $index ?> video_btn <?php echo $index==1 ? 'on' : '' ?>" href="<?php echo $room_item['link'] ?>"></a>
                <?php
                $index++;
            }
            ?>
        </div>
    </div>
    <svg class="banner_mask">
        <clipPath id="banner-clip-path" clipPathUnits="objectBoundingBox">
            <path d="M0.804,0.927 C0.918,1,0.982,0.932,1,0.869 L1,0.012 L0,0.001 L0,0.869 C0.024,1,0.254,0.994,0.366,0.927 C0.465,0.883,0.69,0.822,0.804,0.927"></path>
        </clipPath>
    </svg>
</section>
<section class="section_price section">
    <div class="anchor" id="link-3"></div>
    <div class="container">
        <?php
        $price = get_field('price');
        ?>
        <div class="h2"> <span><?php echo $price['title'] ?></span></div>
        <div class="row">
            <?php
            foreach ($price['prices'] as $price_item){
                $item_id = $price_item->ID;
                ?>
                <div class="card_price" style="border: 4px solid <?php echo get_field('colour', $item_id) ?>;">
                    <div class="title"><?php echo get_field('subtitle_1', $item_id) ?></div>
                    <div class="list_icon">
                        <ul>
                            <?php
                            $style_list_1 = get_field('style_list_1', $item_id);
                            foreach ($style_list_1 as $item){
                                ?>
                                <li class="item"><p><?php echo $item['part_1'] ?></p><span><?php echo $item['part_2'] ?></span></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="subtitle"><?php echo get_field('subtitle_2', $item_id) ?></div>
                    <div class="list_dote">
                        <ul>
                            <?php
                            $style_list_1 = get_field('list', $item_id);
                            foreach ($style_list_1 as $item){
                                ?>
                                <li><span><?php echo $item['list_item'] ?></span></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="list_icon">
                        <ul>
                            <?php
                            $style_list_1 = get_field('style_list_2', $item_id);
                            foreach ($style_list_1 as $item){
                                ?>
                                <li><p><?php echo $item['part_1'] ?></p><span><?php echo $item['part_2'] ?></span></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="title"><?php echo get_field('price', $item_id) ?></div>
                    <div class="stock"><?php echo get_field('important', $item_id) ?></div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="button_wrap">
            <a href="#form-popup-price" data-effect="mfp-zoom-in" class="button form-popup">Замовити</a>
<!--            <div class="button">Замовити</div>-->
        </div>
    </div>
</section>

<section class="section_memo section">
    <div class="anchor" id="link-6"></div>
    <?php
    $reminder = get_field('reminder');
    ?>
    <div class="container">
        <div class="title_block">
            <div class="h2 title"><?php echo $reminder['title'] ?></div>
            <a href="#popup-pm" data-effect="mfp-zoom-in" class="button popup-pm-class">Подивитись пам'ятку</a>
        </div>
    </div>
</section>
<section class="section_team section">
    <div class="anchor" id="link-4"></div>
    <?php
    $team = get_field('team');
    ?>
    <div class="container">
        <div class="h2"><span><?php echo $team['title'] ?></span></div>
        <div class="team_wrapper">
            <div class="wrap swiper teamSwiper">
                <div class="slider swiper-wrapper">
                    <?php
                    $index = 1;
                    foreach ($team['team'] as $person){
                        ?>
                        <div class="swiper-slide item">
                            <a href="#form-popup-team-<?php echo $index ?>" data-effect="mfp-zoom-in" class="form-popup-teams">
                                <img src="<?php echo get_field('photo', $person->ID)['url'] ?>"
                                     alt="<?php echo get_field('photo', $person->ID)['alt'] ?>"/>
                            </a>
                        </div>


                        <div id="form-popup-team-<?php echo $index ?>" class="white-popup-teams mfp-with-anim mfp-hide">
                            <div class="photo" style="background-image: url(<?php echo get_field('photo', $person->ID)['url'] ?>);"></div>
                            <div class="title">
                                <p><?php echo get_field('fio', $person->ID) ?></p>
                                <span><?php echo get_field('position', $person->ID) ?></span>
                            </div>
                            <div class="biografi">
                                <div class="biografi-title">
                                    Біографія
                                </div>
                                <div class="biografi-description">
                                    <?php echo get_field('biography', $person->ID) ?>
                                </div>
                            </div>
                            <?php
                            $certificates = get_field('certificates', $person->ID);
                            if(is_array($certificates)){
                                ?>
                                <div class="slide-one">
                                    <div class="slide-one__title">
                                        <?php echo get_field('gallery_title', $person->ID) ?>
                                    </div>
                                    <div class="slide-wrap">
                                        <div class="swiper Swipers">
                                            <div class="swiper-wrapper">
                                                <?php

                                                foreach ($certificates as $certificate){
                                                    ?>
                                                    <div class="swiper-slide">
                                                        <a data-fancybox="gallery" href="<?php echo $certificate['url'] ?>" class="img-btn-open">
                                                            <img src="<?php echo $certificate['url'] ?>" alt="<?php echo $certificate['alt'] ?>">
                                                        </a>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="swiper-button-next-its"></div>
                                            <div class="swiper-button-prev-its"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                        $index++;
                    }
                    ?>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>
<section class="section_fqa section">
    <?php
    $questions = get_field('questions');
    ?>
    <div class="container">
        <div class="h2"><?php echo $questions['title'] ?></div>
        <div class="row">
            <?php
            $open = false;
            $index = 0;
            $count = ceil(count($questions['questions']) / 2 );
            foreach ($questions['questions'] as $question){
                if(!$open){
                    ?>
                    <div class="column">
                    <?php
                    $open = true;
                }
                ?>
                <div class="item">
                    <div class="title fqa_js"><?php echo $question['question'] ?></div>
                    <div class="text"> <span><?php echo $question['Answer'] ?></span></div>
                </div>
                <?php
                $index++;
                if( $index == $count ){
                    ?>
                    </div>
                    <?php
                    $open = false;
                }
            }
            ?>
        </div>
    </div>
</section>
<section class="section_contact section">
    <div class="anchor" id="link-5"></div>
    <?php
    $contacts = get_field('contacts')
    ?>
    <div class="container">
        <div class="wrapper">
            <div class="map_wrap">
                <?php echo get_field('map', 'options') ?>
            </div>
            <div class="info_wrap">
                <div class="info_inner">
                    <h2><?php echo $contacts['title'] ?> <br><span><?php echo $contacts['subtitle'] ?><span></h2>
                    <div class="address info">Адреса: <?php echo get_field('address', 'options') ?></div>
                    <div class="phones info">
                        <?php
                        $phone_numbers = get_field('phone_numbers', 'options');
                        foreach ($phone_numbers as $phone_number){
                            ?>
                            <a class="info" href="tel:<?php echo $phone_number['phone_number'] ?>"><?php echo $phone_number['phone_number'] ?></a>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="social_media">
                        <?php
                        if( wp_is_mobile() ) {
                            $link = get_field('viber', 'options');
                        }
                        else{
                            $link = get_field('viber_pc', 'options');
                        }
                        if(isset($link)){
                            ?>
                            <a target="_blank" class="social" href="<?php echo $link ?>">
                                <svg class="icon">
                                    <use xlink:href="<?php echo get_template_directory_uri() ?>/img/svg/sprite.svg#viber"></use>
                                </svg>
                            </a>
                            <?php
                        }
                        $link = get_field('facebook', 'options');
                        if(isset($link)){
                            ?>
                            <a target="_blank" class="social" href="<?php echo $link ?>">
                                <svg class="icon">
                                    <use xlink:href="<?php echo get_template_directory_uri() ?>/img/svg/sprite.svg#facebook"></use>
                                </svg>
                            </a>
                            <?php
                        }
                        $link = get_field('whatsapp', 'options');
                        if(isset($link)){
                            ?>
                            <a target="_blank" class="social" href="<?php echo $link ?>">
                                <svg class="icon">
                                    <use xlink:href="<?php echo get_template_directory_uri() ?>/img/svg/sprite.svg#whatsapp"></use>
                                </svg>
                            </a>
                            <?php
                        }
                        $link = get_field('instagram', 'options');
                        if(isset($link)){
                            ?>
                            <a target="_blank" class="social" href="<?php echo $link ?>">
                                <svg class="icon">
                                    <use xlink:href="<?php echo get_template_directory_uri() ?>/img/svg/sprite.svg#inst"></use>
                                </svg>
                            </a>
                            <?php
                        }
                        $link = get_field('telegram', 'options');
                        if(isset($link)){
                            ?>
                            <a target="_blank" class="social" href="<?php echo $link ?>">
                                <svg class="icon">
                                    <use xlink:href="<?php echo get_template_directory_uri() ?>/img/svg/sprite.svg#telegram"></use>
                                </svg>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="school">
                        <a href="<?php echo get_home_url() ?>" class="logo-sol">
                            <img src="<?php echo get_field('school_image', 'options')['url'] ?>"
                                 alt="<?php echo get_field('school_image', 'options')['alt'] ?>"/></a>
                        <div class="text_section">
                            <div class="title">Завітайте до нашої школи:</div>
                            <div class="text">Адреса: <?php echo get_field('school_address', 'options') ?>
                                <span>сайт:
                                    <?php
                                    $site = get_field('site', 'options')
                                    ?>
                                    <a target="_blank" href="<?php echo $site ?>"><?php echo $site ?></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div id="form-popup" class="white-popup-form mfp-with-anim mfp-hide">
    <div class="title">
        <?php echo $intro['popup']['title'] ?>
    </div>
    <div class="description">
        <?php echo $intro['popup']['description'] ?>
    </div>
    <form class="contact-form form-callback js_get_form_info">
        <div class="title js_get_title" style="display: none">
            <?php echo $intro['popup']['title'] ?>
        </div>
        <!-- Hidden Required Fields -->
        <input name="project_name" value="WSS заявка" type="hidden">
        <input name="admin_email" value="web.solar.sistem@yandex.ru" type="hidden">
        <input name="form_subject" value="Form Subject" type="hidden">
        <!-- END Hidden Required Fields -->
        <div class="contact-form-head">
            <label>
                <input name="Имя" class="js_get_name" placeholder="ПIБ" type="text">
            </label>
            <label>
                <input name="phone" class="js_get_phone" placeholder="Телефон" id="phone" type="phone">
            </label>
            <label>
                <select size="1" name="group" class="select js_get_selected">
                    <?php
                    $group = get_field('group', 'options');
                    foreach ($group as $item){
                        ?>
                        <option><?php echo $item['group_title'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </label>
            <div class="text-center">
                <button class="button js_form_order">Вiдправити</button>
            </div>
        </div>
    </form>
</div>
<div id="form-popup-price" class="white-popup-form mfp-with-anim mfp-hide">
    <div class="title">
        <?php echo $price['popup']['title'] ?>
    </div>
    <div class="description">
        <?php echo $price['popup']['description'] ?>
    </div>
    <form class="contact-form form-callback js_get_form_info">
        <div class="title js_get_title" style="display: none">
            <?php echo $price['popup']['title'] ?>
        </div>
        <!-- Hidden Required Fields -->
        <input name="project_name" value="WSS заявка" type="hidden">
        <input name="admin_email" value="web.solar.sistem@yandex.ru" type="hidden">
        <input name="form_subject" value="Form Subject" type="hidden">
        <!-- END Hidden Required Fields -->
        <div class="contact-form-head">
            <label>
                <input name="Имя" class="js_get_name" placeholder="ПIБ" type="text">
            </label>
            <label>
                <input name="phone" class="js_get_phone" placeholder="Телефон"  id="phone2" type="phone">
            </label>
            <label>
                <select size="1" name="group" class="select js_get_selected">
                    <?php
                    foreach ($price['prices'] as $price){
                        ?>
                        <option><?php echo $price->post_title ?></option>
                        <?php
                    }
                    ?>
                </select>
            </label>
            <div class="text-center">
                <button class="button js_form_order_price">Вiдправити</button>
            </div>
        </div>
    </form>
</div>
<div id="popup-pm" class="white-popup-2 mfp-with-anim mfp-hide">
    <?php
    foreach ($reminder['popup'] as $item){
        ?>
        <div class="items-p">
            <div class="items-p__title">
                <?php echo $item['title'] ?>
            </div>
            <div class="items-p__image">
                <img src="<?php echo $item['image']['url'] ?>" alt="<?php echo $item['image']['alt'] ?>">
            </div>
            <div class="items-p__text">
                <?php echo $item['list'] ?>
            </div>
        </div>
        <?php
    }
    ?>
    <a target="_blank" href="<?php echo $reminder['file']['url'] ?>" class="button-popups">Зберегти на свій пристрій</a>
</div>

<?php
get_footer();
?>
