<?php
if (!defined('ABSPATH')) exit;
// 定义GetThemeInfo回调函数
function Crychic_Rest_GetThemeInfo($request) {
    // 返回Json
    return array(
        'message' => '主题信息',
        'data' => array(
            'Name' => 'Crychic',
            'Author' => '鼠子Tomoriゞ',
            'Version' => Crychic::ThemeVersion(false),
            'Gitee' => 'https://gitee.com/ShuShuicu/WordPress-Crychic-Theme',
            'GitHub' => 'https://github.com/ShuShuicu/WordPress-Crychic-Theme',
        )
    );
}