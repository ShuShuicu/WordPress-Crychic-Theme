<?php 
if (!defined('ABSPATH')) exit;
add_theme_support( 'post-thumbnails', array( 'post' ) ); // 给文章启用文章缩略图功能

function Crychic_GetThumbnails() {
    global $post;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];

    if ( empty($first_img) ) {
        // 如果没有找到图片，返回空字符串
        return '';
    }

    return $first_img;
}

// 显示页面查询次数、加载时间和内存占用
function performance( $visible = false ) {
    $stat = sprintf(  '%d 次查询 %.3f 秒, %.2fMB 内存',
        get_num_queries(),
        timer_stop( 0, 3 ),
        memory_get_peak_usage() / 1024 / 1024
    );
    echo $visible ? $stat : "<!-- {$stat} -->" ;
	echo $visible ? $stat : "<script>console.log('{$stat}')</script>";
}
add_action( 'wp_footer', 'performance', 20 );

// 获取加载时间
function get_load_time() {
    return timer_stop( 0, 3 );
}

function left_admin_footer_text($text) {
    $text = '<span id="footer-thankyou">感谢使用 <a href="https://cn.wordpress.org/">WordPress</a> & Crychic 进行创作。</span>'; 
    return $text;
}
add_filter('admin_footer_text', 'left_admin_footer_text'); 

// 修改自Hello Dolly插件
function hello_dolly_get_lyric() {
	/** These are the lyrics to Hello Dolly */
$lyrics = "重要的，珍惜的，一直在身边，一旦成为理所当然，就难以发现。
如果你说最喜欢 我会回你最最喜欢
重要的…珍视的东西总是伴随在身边， 却当成理所当然没有察觉。​
大家都好厉害啊，不要扔下我自己长大哦?
但是我遇到了 那美丽的天使 毕业不是终点 以后我们还是朋友。
无论走到哪里，我们都是放课后茶会！
就算相隔两地，我们看到的仍是同一片天空。
但是我遇到了 那美丽的天使 毕业不是终点 以后我们还是朋友 你说“最喜欢你”， 我回一句“最最喜欢你” 不要留下遗憾， 永远都在一起哦…";

	// Here we split it into lines.
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line.
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later.
function hello_dolly() {
	$chosen = hello_dolly_get_lyric();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="dolly"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'Quote from Hello Dolly song, by Jerry Herman:' ),
		$lang,
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'hello_dolly' );

// We need some CSS to position the paragraph.
function dolly_css() {
	echo "
	<style type='text/css'>
	#dolly {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #dolly {
		float: left;
	}
	.block-editor-page #dolly {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#dolly,
		.rtl #dolly {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );