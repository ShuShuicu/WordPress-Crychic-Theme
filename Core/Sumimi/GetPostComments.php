<?php
if (!defined('ABSPATH')) exit;
// 定义GetPostComments回调函数
function Crychic_Rest_GetPostComments($request) {
    // 获取请求参数中的文章ID
    $post_id = $request->get_param('post_id');

    // 获取评论列表
    $comments = get_comments(array(
        'post_id' => $post_id,
        'status' => 'approve',
        'order' => 'DESC',
        'number' => 10,
    ));
}