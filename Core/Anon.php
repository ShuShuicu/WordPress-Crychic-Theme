<?php
if (!defined('ABSPATH')) exit;

// 定义常量以减少重复字符串
define('CRYCHIC_TEXTDOMAIN', 'Crychic');
define('CRYCHIC_MENU_SLUG', 'Crychic_admin');

/**
 * 注册主菜单页面
 */
function crychic_register_main_menu() {
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
function crychic_register_submenus() {
    add_submenu_page(
        CRYCHIC_MENU_SLUG, 
        __('Crychic 设置', CRYCHIC_TEXTDOMAIN), 
        __('设置', CRYCHIC_TEXTDOMAIN), 
        'manage_options', 
        'Crychic_Options', 
        'crychic_display_options_page'
    );
}

/**
 * 移除不必要的子菜单项
 */
function crychic_remove_unnecessary_submenu() {
    remove_submenu_page(CRYCHIC_MENU_SLUG, CRYCHIC_MENU_SLUG);
}

/**
 * 显示主菜单页面内容
 */
function crychic_display_main_page() {
    echo '<h1>' . esc_html__('Crychic 主题', CRYCHIC_TEXTDOMAIN) . '</h1>';
}

/**
 * 显示设置页面内容
 */
function crychic_display_options_page() {
    wp_enqueue_style('Crychic_admin_preview');
    require_once 'Options/MyGO.php';
}


// 钩子注册
add_action('admin_menu', 'crychic_register_main_menu');
add_action('admin_menu', 'crychic_register_submenus');
add_action('admin_menu', 'crychic_remove_unnecessary_submenu');

require_once 'Options/Fields.php';
