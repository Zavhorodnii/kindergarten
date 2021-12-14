<?php
/**
 * Template Name: Пустой шаблон
 * Template Post Type: Page
 */
get_header();
$this_page_id = get_the_ID();

$page_title = get_the_title();
?>

<section class="section_time section" style="margin-top: 116px;">
    <div class="anchor" id="link-1"></div>
    <div class="container">
        <div class="h2"><?php the_title() ?></div>
        <div class="section_time-description" style="text-align: initial;">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>
