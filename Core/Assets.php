<?php 
if (!defined('ABSPATH')) exit;
function Crychic_CSS() {
    $CssFiles = [
        'style', 
        'code/BlackMac',
        'element-plus/index',
        'vuetify/vuetify.min',
        'tdesign/tdesign.min',
    ];
    foreach ($CssFiles as $css) {
        ?>
            <link rel="stylesheet" href="<?php Crychic::Assets($css . '.css',true) ?>?Ver=<?php Crychic::ThemeVersion(true) ?>">
        <?php
    }
}

function Crychic_HeadJS() {
    $JsFiles = [
        'jquery/jquery.min',
        'jquery/theia-sticky-sidebar.min',
        'view-image.min',
    ];
    foreach ($JsFiles as $js) {
        ?>
            <script src="<?php Crychic::Assets($js . '.js',true) ?>?Ver=<?php Crychic::ThemeVersion(true) ?>"></script>
        <?php
    }
}

function Crychic_JavaScript() {
    $JsFiles = [
        'vue/vue.global', 
        'axios.min',
        'vue/vue-router.global.min', 
        'vuetify/vuetify.min',
        'element-plus/index.full.min',
        'tdesign/tdesign.min',
        'code/prism.full',
        'app',
    ];
    foreach ($JsFiles as $js) {
        ?>
            <script src="<?php Crychic::Assets($js . '.js',true) ?>?Ver=<?php Crychic::ThemeVersion(true) ?>"></script>
        <?php
    }
}
