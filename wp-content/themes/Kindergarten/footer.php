    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="logo_wrap">
                    <a class="logo" href="<?php echo get_home_url() ?>">
                        <img src="<?php echo get_field('footer_logo', 'options')['url'] ?>"
                             alt="<?php echo get_field('footer_logo', 'options')['alt'] ?>"/>
                    </a>
                </div>
                <form class="form_wrap js_get_form_info">
                    <div class="title js_get_title">Підпишися на новини</div>
                    <div class="row_wrap">
                        <input type="text" class="js_get_email" required placeholder="Email"/>
                        <input class="button button js_form_sub" type="submit" value="Підписатися"/>
                    </div>
                </form>
                <div class="info_wrap">
                    <a target="_blank" class="link" href="<?php echo get_field('privacy_policy', 'options') ?>">Політика конфіденційності</a>
                    <div class="infoCopyright"><?php echo get_field('copyright', 'options') ?></div>
                </div>
            </div>
        </div>
    </footer>

    <div id="form-popup-mob" class="white-popup-form mfp-with-anim mfp-hide">
        <?php
        $popup = get_field('popup', 'options');
        ?>
        <div class="title">
            <?php echo $popup['title'] ?>
        </div>
        <div class="description">
            <?php echo $popup['description'] ?>
        </div>
        <form class="contact-form form-callback js_get_form_info">
            <div class="title js_get_title" style="display: none">
                <?php echo $popup['title'] ?>
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
                    <input name="phone" class="js_get_phone" placeholder="Телефон" id="phoneee" type="phone">
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
                    <button class="button js_form_order_mob">Вiдправити</button>
                </div>
            </div>
        </form>
    </div>
    <div id="success_send" class="white-popup-form mfp-with-anim mfp-hide">
        <?php
        $success_send_title = get_field('success_send_title', 'options');
        ?>
        <div class="title">
            <?php echo $success_send_title ?>
        </div>
    </div>
    <div id="error_send" class="white-popup-form mfp-with-anim mfp-hide">
        <div class="title">
            Помилка відправки
        </div>
    </div>

    <script>
        window.ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>

</body>
</html>

<!--<script src="--><?php //echo get_template_directory_uri() ?><!--/libs/jquery/dist/jquery.slim.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.2.0/swiper-bundle.min.js"></script>
<!--<script src="--><?php //echo get_template_directory_uri() ?><!--/libs/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>-->
<!--<script src="--><?php //echo get_template_directory_uri() ?><!--/js/script.js"></script>-->
<!--<script src="--><?php //echo get_template_directory_uri() ?><!--/js/main.js"></script>-->

    <?php wp_footer(); ?>
<!--
    var article = document.getElementById('countdown');

    // var deadline = new Date(Date.parse(new Date()) + 1000*60*2);
    var deadline = new Date(Date.parse(new Date()) + parseInt(article.dataset.time)*1000);

    console.log(deadline)
    initializeClock("countdown", deadline);

$(function(){
    $("#phoneee").mask("+38 (999) 999-9999");
});


