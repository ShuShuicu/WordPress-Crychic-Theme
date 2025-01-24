<?php
if (!defined('ABSPATH')) exit;
/**
 * Crychic SEO
 */
function Crychic_SEO() {
?>
    <title><?php Crychic::Title(true) ?></title>
    <?php if (is_front_page()) : ?>
    <meta name="keywords" content="<?php echo esc_attr(Crychic::Options('Crychic_SEO_Key', '',)); ?>">
    <meta name="description" content="<?php echo esc_attr(Crychic::Options('Crychic_SEO_Des', '',)); ?>">
<?php elseif (is_single()) : ?>
    <?php
    $tags = get_the_tags();
    $categories = get_the_category();
    $keywords = array();

    if ($tags) {
        foreach ($tags as $tag) {
            $keywords[] = $tag->name;
        }
    }

    if ($categories) {
        foreach ($categories as $category) {
            $keywords[] = $category->name;
        }
    }
    ?>
    <meta name="keywords" content="<?php echo esc_attr(join(', ', $keywords)); ?>">
    <meta name="description" content="<?php echo esc_attr(get_the_excerpt()); ?>">
<?php 
    endif;
}