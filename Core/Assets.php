<?php 
if (!defined('ABSPATH')) exit;
function Crychic_CSS() {
    $CssFiles = [
        'style', 
        'code/BlackMac',
        'arco/arco.min',
        'element-plus/index',
        'vuetify/vuetify.min',
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
        'vue/vue.global', 
        'vue/axios.min',
        'vue/vue-router.global.min', 
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
        'arco/arco-vue.min',
        'vuetify/vuetify.min',
        'element-plus/index.full.min',
        'code/prism.full',
    ];
    foreach ($JsFiles as $js) {
        ?>
            <script src="<?php Crychic::Assets($js . '.js',true) ?>?Ver=<?php Crychic::ThemeVersion(true) ?>"></script>
        <?php
    }
}
