<?php
if (!defined('ABSPATH')) exit;

// 定义常量以减少重复字符串
define('CRYCHIC_TEXTDOMAIN', 'Crychic');
define('CRYCHIC_MENU_SLUG', 'Crychic_admin');

function Crychic_OptionsHead()
{
?>
<link rel="stylesheet" href="<?php Crychic::AssetsUrl() ?>/arco/arco.min.css?ver=<?php Crychic::ThemeVersion(); ?>">
<link rel="stylesheet" href="<?php Crychic::AssetsUrl() ?>/vuetify/vuetify.min.css?ver=<?php Crychic::ThemeVersion(); ?>">
<link rel="stylesheet" href="<?php Crychic::AssetsUrl() ?>/vuetify/icons.min.css?ver=<?php Crychic::ThemeVersion(); ?>">
<script src="<?php Crychic::AssetsUrl() ?>/vue.global.js?ver=<?php Crychic::ThemeVersion(); ?>"></script>
<script src="<?php Crychic::AssetsUrl() ?>/main.js?ver=<?php Crychic::ThemeVersion(); ?>"></script>
<script src="<?php Crychic::AssetsUrl() ?>/arco/arco-vue.min.js?ver=<?php Crychic::ThemeVersion(); ?>"></script>
<script src="<?php Crychic::AssetsUrl() ?>/vuetify/vuetify.min.js?ver=<?php Crychic::ThemeVersion(); ?>"></script>
<style>
    #CrychicOptionsMenu {
        margin-top: 30px;
        margin-right: 20px;
    }

    #CrychicOptionsMenu .arco-tabs-nav-tab {
        margin-top: -10px;
    }

    #CrychicOptionsMenu .arco-tabs-content {
        padding-left: 10px;
        padding-right: 10px;
    }

    @media (max-width: 782px) {
        #CrychicOptionsMenu {
            margin-right: 10px;
        }
    }
</style>
<div id="app">
    <form method="post" action="options.php">
        <?php
        settings_fields('CrychicOptions');
        do_settings_sections('CrychicOptions');
        ?>
        <div id="CrychicOptionsMenu">
            <a-card title="Crychic主题 v<?php Crychic::ThemeVersion(); ?>">
                <template #extra>
                    <a-tooltip content="前往GitHub给主题点个Star以表支持罢!" position="lt" mini>
                        <a-link href="https://github.com/ShuShuicu/WordPress-Crychic-Theme" target="_blank" icon>Star</a-link>
                    </a-tooltip>
                </template>
                <?php
}
function Crychic_OptionsFoot() {
?>
            </a-card>
        </div>
</div>
<?php
}

/**
 * 注册主菜单页面
 */
function crychic_register_main_menu()
{
    add_menu_page(
        __('Crychic', CRYCHIC_TEXTDOMAIN),
        __('Crychic', CRYCHIC_TEXTDOMAIN),
        'manage_options',
        CRYCHIC_MENU_SLUG,
        'crychic_display_main_page',
        'dashicons-admin-customizer'
    );
}

/**
 * 注册子菜单页面
 */
function crychic_register_submenus()
{
    add_submenu_page(
        CRYCHIC_MENU_SLUG,
        __('Crychic 设置', CRYCHIC_TEXTDOMAIN),
        __('设置', CRYCHIC_TEXTDOMAIN),
        'manage_options',
        'Crychic_Options',
        'crychic_display_options_page'
    );
    add_submenu_page(
        CRYCHIC_MENU_SLUG,
        __('Crychic 关于', CRYCHIC_TEXTDOMAIN),
        __('关于', CRYCHIC_TEXTDOMAIN),
        'manage_options',
        'Crychic_About',
        'crychic_display_about_page'
    );
}

/**
 * 移除不必要的子菜单项
 */
function crychic_remove_unnecessary_submenu()
{
    remove_submenu_page(CRYCHIC_MENU_SLUG, CRYCHIC_MENU_SLUG);
}

/**
 * 显示主菜单页面内容
 */
function crychic_display_main_page()
{
    echo '<h1>' . esc_html__('Crychic 主题', CRYCHIC_TEXTDOMAIN) . '</h1>';
}

/**
 * 显示设置页面内容
 */
function crychic_display_options_page()
{
    wp_enqueue_style('Crychic_admin_preview');
    require_once 'Options/Menu.php';
}

function crychic_display_about_page()
{
    wp_enqueue_style('Crychic_admin_preview');
    require_once 'Options/About.php';
}


// 钩子注册
add_action('admin_menu', 'crychic_register_main_menu');
add_action('admin_menu', 'crychic_register_submenus');
add_action('admin_menu', 'crychic_remove_unnecessary_submenu');

require_once 'Options/Fields.php';