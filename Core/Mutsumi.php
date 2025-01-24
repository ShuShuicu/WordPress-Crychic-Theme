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

}

// 定义GetThemeInfo回调函数
function Crychic_Rest_GetThemeInfo($request) {
    // 返回Json
    return array(
        'message' => '主题信息',
        'data' => array(
            'Name' => 'Crychic',
            'Author' => '鼠子Tomoriゞ',
            'Version' => Crychic::ThemeVersion(false),
            'GitHub' => 'https://github.com/ShuShuicu/WordPress-Crychic-Theme',
        )
    );
}

// 定义GetPostList回调函数
function Crychic_Rest_GetPostList($request) {
    // 获取请求参数中的页码，默认为1
    $page = $request->get_param('page') ? intval($request->get_param('page')) : 1;
    // 获取后台设置的每页文章数量
    $posts_per_page = get_option('posts_per_page', 5); // 默认值为5
    // 获取请求参数中的number，默认为后台设置的数量
    $number = $request->get_param('number') ? intval($request->get_param('number')) : $posts_per_page;

    // 查询最新文章
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $number,
        'paged' => $page,
    );

    $query = new WP_Query($args);

    $posts = array();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            
            // 获取缩略图URL
            if (has_post_thumbnail()) {
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            } else {
                // 获取文章第一张图片
                $thumbnail_url = Crychic_GetThumbnails();
                if (!$thumbnail_url) {
                    // 使用默认图片
                    $thumbnail_url = Crychic::Assets("images/thumbnail.svg", false);
                }
            }

            // 获取分类信息
            $categories = get_the_category();
            $category_list = array();
            foreach ($categories as $category) {
                $category_list[] = array(
                    "term_id" => $category->term_id,
                    "name" => $category->name,
                    "slug" => $category->slug,
                    "term_group" => $category->term_group,
                    "term_taxonomy_id" => $category->term_taxonomy_id,
                    "taxonomy" => $category->taxonomy,
                    "description" => $category->description,
                    "parent" => $category->parent,
                    "count" => $category->count,
                    "filter" => $category->filter
                );
            }

            // 获取标签信息
            $tags = get_the_tags();
            $tag_list = array();
            if ($tags) {
                foreach ($tags as $tag) {
                    $tag_list[] = array(
                        "term_id" => $tag->term_id,
                        "name" => $tag->name,
                        "slug" => $tag->slug,
                        "term_group" => $tag->term_group,
                        "term_taxonomy_id" => $tag->term_taxonomy_id,
                        "taxonomy" => $tag->taxonomy,
                        "description" => $tag->description,
                        "parent" => $tag->parent,
                        "count" => $tag->count,
                        "filter" => $tag->filter
                    );
                }
            }

            $posts[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'content' => get_the_excerpt(),
                'date' => get_the_date('Y-m-d'),
                'category' => $category_list,
                'tags' => $tag_list,
                'author' => get_the_author(),
                'thumbnail' => $thumbnail_url,
                'permalink' => get_the_permalink(),
            );
        }
    }

    // 重置文章数据
    wp_reset_postdata();

    // 返回Json
    return array(
        'message' => '文章列表',
        'data' => $posts,
        'total_pages' => $query->max_num_pages,
        'current_page' => $page,
    );
}

// 定义GetPostRandom回调函数
function Crychic_Rest_GetPostRandom($request) {
    // 获取请求参数中的页码，默认为1
    $page = $request->get_param('page') ? intval($request->get_param('page')) : 1;
    // 获取后台设置的每页文章数量
    $posts_per_page = get_option('posts_per_page', 5); // 默认值为5
    // 获取请求参数中的number，默认为后台设置的数量
    $number = $request->get_param('number') ? intval($request->get_param('number')) : $posts_per_page;

    // 查询随机文章
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $number,
        'paged' => $page,
        'orderby' => 'rand', // 随机排序
    );

    $query = new WP_Query($args);

    $posts = array();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            
            // 获取缩略图URL
            if (has_post_thumbnail()) {
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            } else {
                // 获取文章第一张图片
                $thumbnail_url = Crychic_GetThumbnails();
                if (!$thumbnail_url) {
                    // 使用默认图片
                    $thumbnail_url = Crychic::Assets("images/thumbnail.svg", false);
                }
            }

            // 获取分类信息
            $categories = get_the_category();
            $category_list = array();
            foreach ($categories as $category) {
                $category_list[] = array(
                    "term_id" => $category->term_id,
                    "name" => $category->name,
                    "slug" => $category->slug,
                    "term_group" => $category->term_group,
                    "term_taxonomy_id" => $category->term_taxonomy_id,
                    "taxonomy" => $category->taxonomy,
                    "description" => $category->description,
                    "parent" => $category->parent,
                    "count" => $category->count,
                    "filter" => $category->filter
                );
            }

            // 获取标签信息
            $tags = get_the_tags();
            $tag_list = array();
            if ($tags) {
                foreach ($tags as $tag) {
                    $tag_list[] = array(
                        "term_id" => $tag->term_id,
                        "name" => $tag->name,
                        "slug" => $tag->slug,
                        "term_group" => $tag->term_group,
                        "term_taxonomy_id" => $tag->term_taxonomy_id,
                        "taxonomy" => $tag->taxonomy,
                        "description" => $tag->description,
                        "parent" => $tag->parent,
                        "count" => $tag->count,
                        "filter" => $tag->filter
                    );
                }
            }

            $posts[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'content' => get_the_excerpt(),
                'date' => get_the_date('Y-m-d'),
                'category' => $category_list,
                'tags' => $tag_list,
                'author' => get_the_author(),
                'thumbnail' => $thumbnail_url,
                'permalink' => get_the_permalink(),
            );
        }
    }

    // 重置文章数据
    wp_reset_postdata();

    // 返回Json
    return array(
        'message' => '随机文章列表',
        'data' => $posts,
        'total_pages' => $query->max_num_pages,
        'current_page' => $page,
    );
}