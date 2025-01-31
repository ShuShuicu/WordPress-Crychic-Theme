<?php
if (!defined("ABSPATH")) {
    exit();
}
?>

<?php while (have_posts()) {
    the_post(); ?>
    <?php if (has_post_thumbnail()) {
        // 当前文章有缩略图
        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), "full");
    } else {
        // 当前文章没有设置缩略图，获取文章第一张图片
        $thumbnail_url = Crychic_GetThumbnails();
        if (!$thumbnail_url) {
            // 文章没有图片，使用默认图片
            $thumbnail_url = Crychic::Assets("images/thumbnail.svg", false);
        }
    } ?>
    <a-col :xs="24" :sm="24" :md="12" :lg="12" :xl="6" :xxl="6">
        <a href="<?php the_permalink(); ?>">
            <a-card
                hoverable
                :bordered="false"
                style="margin:5px"
            >
                <template #cover>
                    <div class="thumbnail" :style="{
                        backgroundImage: `url(<?php echo esc_url($thumbnail_url); ?>)`,
                    }"></div>
                </template>
                <a-card-meta title="<?php the_title(); ?>">
                    <template #description>
                        <?php the_time("Y-m-d"); ?>
                    </template>
                </a-card-meta>
            </a-card>
        </a>
    </a-col>
<?php
} ?>
<v-row justify="center" style="margin-top: 10px;">
    <?php
    previous_posts_link('<v-chip prepend-icon="$vuetify">上一页</v-chip>');
    next_posts_link('<v-chip append-icon="$vuetify">下一页</v-chip>');
    ?>
</v-row>