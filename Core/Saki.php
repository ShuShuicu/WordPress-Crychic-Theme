<?php
if (!defined('ABSPATH')) exit;
// 替换Gravatar头像为指定源的头像
function replace_gravatar_url( $url, $source ) {
    $sources = array(
        'www.gravatar.com',
        '0.gravatar.com',
        '1.gravatar.com',
        '2.gravatar.com',
        'secure.gravatar.com',
        'cn.gravatar.com'
    );
    return str_replace( $sources, $source, $url );
}

// 主题自定义设置
function load_custom_code_based_on_option() {
    $avatar_source = get_option('Crychic_GrAvatar', '4'); // 默认为 Gravatar 官方源

    switch ($avatar_source) {
        case '1':
            add_filter( 'um_user_avatar_url_filter', function($url) { return replace_gravatar_url($url, 'cravatar.cn'); }, 1 );
            add_filter( 'bp_gravatar_url', function($url) { return replace_gravatar_url($url, 'cravatar.cn'); }, 1 );
            add_filter( 'get_avatar_url', function($url) { return replace_gravatar_url($url, 'cravatar.cn'); }, 1 );
            break;
        case '2':
            add_filter( 'um_user_avatar_url_filter', function($url) { return replace_gravatar_url($url, 'weavatar.com'); }, 1 );
            add_filter( 'bp_gravatar_url', function($url) { return replace_gravatar_url($url, 'weavatar.com'); }, 1 );
            add_filter( 'get_avatar_url', function($url) { return replace_gravatar_url($url, 'weavatar.com'); }, 1 );
            break;
        case '3':
            add_filter( 'um_user_avatar_url_filter', function($url) { return replace_gravatar_url($url, 'api.x-x.work/get/Avatar?WPGravatar='); }, 1 );
            add_filter( 'bp_gravatar_url', function($url) { return replace_gravatar_url($url, 'api.x-x.work/get/Avatar?WPGravatar='); }, 1 );
            add_filter( 'get_avatar_url', function($url) { return replace_gravatar_url($url, 'api.x-x.work/get/Avatar?WPGravatar='); }, 1 );
            break;
        case '4':
            // 默认Gravatar
            break;
    }
}
add_action('after_setup_theme', 'load_custom_code_based_on_option');

/**
 * 优化功能
 */
function load_selected_features() {
    $selected_features = Crychic::Options('Crychic_Optimize', []);

    // 确保 $selected_features 是一个数组
    if (!is_array($selected_features)) {
        $selected_features = [];
    }

    error_log(print_r($selected_features, true)); // 调试输出

    // 禁止缩略图
    if (in_array('1', $selected_features)) {
        add_filter('intermediate_image_sizes_advanced', function($sizes) {
            unset($sizes['thumbnail']);
            unset($sizes['medium']);
            unset($sizes['medium_large']);
            unset($sizes['large']);
            unset($sizes['full']);
            unset($sizes['1536x1536']);
            unset($sizes['2048x2048']);
            return $sizes;
        });
    }

    // 禁用文章修订和自动保存
    if (in_array('2', $selected_features)) {
        add_filter('wp_revisions_to_keep', function($num, $post) {
            return 0;
        }, 10, 2);

        add_action('wp_print_scripts', function() {
            wp_deregister_script('autosave');
        });
    }

    // 彻底关闭自动更新
    if (in_array('3', $selected_features)) {
        add_filter('automatic_updater_disabled', '__return_true');
        remove_action('init', 'wp_schedule_update_checks');
        wp_clear_scheduled_hook('wp_version_check');
        wp_clear_scheduled_hook('wp_update_plugins');
        wp_clear_scheduled_hook('wp_update_themes');
        wp_clear_scheduled_hook('wp_maybe_auto_update');
        remove_action('admin_init', '_maybe_update_core');
        remove_action('load-plugins.php', 'wp_update_plugins');
        remove_action('load-update.php', 'wp_update_plugins');
        remove_action('load-update-core.php', 'wp_update_plugins');
        remove_action('load-themes.php', 'wp_update_themes');
        remove_action('load-update.php', 'wp_update_themes');
        remove_action('load-update-core.php', 'wp_update_themes');
        remove_action('admin_init', '_maybe_update_themes');
    }

    // 净化WordPress
    if (in_array('4', $selected_features)) {
        remove_action('wp_head', 'wp_generator'); // 移除WordPress版本
        remove_filter('comment_text', 'make_clickable', 9); // 移除wordpress留言中自动链接功能
        remove_action('wp_head', 'rsd_link'); // 移除离线编辑器开放接口
        remove_action('wp_head', 'index_rel_link'); // 去除本页唯一链接信息
        remove_action('wp_head', 'wlwmanifest_link'); // 移除离线编辑器开放接口
        remove_filter('the_content', 'wptexturize'); // 禁止代码标点符合转义
        add_filter('show_admin_bar', '__return_false'); // 彻底移除管理员工具条

        // 禁用 emoji's
        function disable_emojis() {
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            remove_action('admin_print_scripts', 'print_emoji_detection_script');
            remove_action('wp_print_styles', 'print_emoji_styles');
            remove_action('admin_print_styles', 'print_emoji_styles');
            remove_filter('the_content_feed', 'wp_staticize_emoji');
            remove_filter('comment_text_rss', 'wp_staticize_emoji');
            remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
            add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
        }
        add_action('init', 'disable_emojis');

        // 用于删除tinymce插件的emoji
        function disable_emojis_tinymce($plugins) {
            if (is_array($plugins)) {
                return array_diff($plugins, ['wpemoji']);
            } else {
                return [];
            }
        }
    }

    // 禁用古腾堡编辑器
    if (in_array('5', $selected_features)){ 
        add_filter('use_block_editor_for_post', '__return_false', 10);
    }
}

add_action('init', 'load_selected_features');
