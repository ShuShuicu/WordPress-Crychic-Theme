<?php
if (!defined('ABSPATH')) exit;

// 注册REST API端点
add_action('rest_api_init', 'Crychic_RegisterRestEndpoints');

function Crychic_RegisterRestEndpoints() {
    // 注册GetThemeInfo路由
    register_rest_route('Crychic/v1', '/GetThemeInfo', array(
        // 定义HTTP请求方法为GET
        'methods' => 'GET',
        // 定义回调函数
        'callback' => 'Crychic_Rest_GetThemeInfo',
    ));

    // 注册GetPostList路由
    register_rest_route('Crychic/v1', '/GetPostList', array(
        // 定义HTTP请求方法为GET
        'methods' => 'GET',
        // 定义回调函数
        'callback' => 'Crychic_Rest_GetPostList',
    ));

    // 注册GetPostRandom路由
    register_rest_route('Crychic/v1', '/GetPostRandom', array(
        // 定义HTTP请求方法为GET
        'methods' => 'GET',
        // 定义回调函数
        'callback' => 'Crychic_Rest_GetPostRandom',
    ));

    // 注册GetPostComments路由
    register_rest_route('Crychic/v1', '/GetPostComments', array(
        // 定义HTTP请求方法为GET
        'methods' => 'GET',
        // 定义回调函数
        'callback' => 'Crychic_Rest_GetPostComments',
    ));

}

$RestAPI = [
    'GetThemeInfo',
    'GetPostList',
    'GetPostRandom',
    'GetPostComments',
];
foreach ($RestAPI as $file) {
    require_once 'Sumimi/' . $file . '.php';
}