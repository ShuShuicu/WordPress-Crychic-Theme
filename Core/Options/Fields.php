<?php
if (!defined('ABSPATH')) exit;

/**
 * text验证函数
 */
function Crychic_ValidateText($input) {
    // 验证逻辑
    return sanitize_text_field($input);
}

/**
 * textarea验证函数
 */
function Crychic_ValidateTextarea($input) {
    // 验证逻辑
    return sanitize_textarea_field($input);
}

/**
 * 验证多选框选项
 */
function Crychic_ValidateOptimize($input) {
    if (!is_array($input)) {
        return [];
    }
    $valid_options = ['1', '2', '3', '4' , '5'];
    return array_intersect($input, $valid_options); // 只保留有效的选项
}

/**
 * 注册字段
 * 设置组
 * 保存字段
 * 验证函数
 */
function Crychic_register_fields_settings() {
    // Logo
    register_setting(
        'CrychicOptions', 
        'Crychic_Logo',
        'Crychic_ValidateText' 
    );
    // SEO 设置
    register_setting(
        'CrychicOptions', 
        'Crychic_SEO_Key',
        'Crychic_ValidateText' 
    );
    register_setting(
        'CrychicOptions', 
        'Crychic_SEO_Des',
        'Crychic_ValidateTextarea' 
    );

    // ICP备案号
    register_setting(
        'CrychicOptions', 
        'Crychic_ICP',
        'Crychic_ValidateText' 
    );

    // 单选框 Gravatar头像源
    register_setting(
        'CrychicOptions', 
        'Crychic_GrAvatar',
        'Crychic_ValidateText' 
    );
    add_option('Crychic_GrAvatar', '4'); // 默认GrAvatar

    // 多选框 优化功能
    register_setting(
        'CrychicOptions',
        'Crychic_Optimize',
        'Crychic_ValidateOptimize'
    );    
    // 初始化Crychic_Optimize为数组
    $code_load = get_option('Crychic_Optimize');
    if (!is_array($code_load)) {
        update_option('Crychic_Optimize', []);
    }
}

add_action('admin_init', 'Crychic_register_fields_settings');