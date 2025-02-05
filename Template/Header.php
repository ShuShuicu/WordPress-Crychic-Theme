<?php
if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="<?php Crychic::Info('charset', true) ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <?php
    Crychic_SEO();
    wp_head();
    ?>
    <link rel="stylesheet" href="<?php Crychic::AssetsUrl() ?>/main.css?ver=<?php Crychic::ThemeVersion(); ?>">
    <link rel="stylesheet" href="<?php Crychic::AssetsUrl() ?>/arco/arco.min.css?ver=<?php Crychic::ThemeVersion(); ?>">
    <link rel="stylesheet" href="<?php Crychic::AssetsUrl() ?>/vuetify/vuetify.min.css?ver=<?php Crychic::ThemeVersion(); ?>">
    <link rel="stylesheet" href="<?php Crychic::AssetsUrl() ?>/vuetify/icons.min.css?ver=<?php Crychic::ThemeVersion(); ?>">
    <script src="<?php Crychic::AssetsUrl() ?>/vue.global.js?ver=<?php Crychic::ThemeVersion(); ?>"></script>
    <script src="<?php Crychic::AssetsUrl() ?>/axios.min.js?ver=<?php Crychic::ThemeVersion(); ?>"></script>
    <script src="<?php Crychic::AssetsUrl() ?>/jauery.min.js?ver=<?php Crychic::ThemeVersion(); ?>"></script>
    <script src="<?php Crychic::AssetsUrl() ?>/main.js?ver=<?php Crychic::ThemeVersion(); ?>"></script>
</head>
<body>
    <main id="app">
    <v-container class="Nijika-container">
    