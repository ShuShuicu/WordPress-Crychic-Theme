<?php
if (!defined("ABSPATH")) {
    exit();
} ?>
<div id="Index">
    <v-row>
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
            <v-col cols="12" xs="12" sm="6" md="4" lg="4">
                <a href="<?php the_permalink(); ?>">
                    <v-card
                        class="mx-auto"
                        max-width="400"
                        hover
                    >
                        <v-img
                            class="align-end text-white"
                            height="200"
                            src="<?php echo esc_url($thumbnail_url); ?>"
                            cover
                        >
                            <v-card-title style="background-color: #22222280;"><?php the_title(); ?></v-card-title>
                        </v-img>

                        <v-card-subtitle class="pt-4">
                            <?php the_time("Y-m-d"); ?>
                        </v-card-subtitle>

                        <v-card-text>
                            <div>
                                <?php
                                $excerpt = get_the_excerpt();
                                if (!empty($excerpt)) {
                                    the_excerpt();
                                } else {
                                    echo "Ciallo～(∠・ω< )⌒☆";
                                }
                                ?>
                            </div>
                        </v-card-text>
                    </v-card>
                </a>
            </v-col>
        <?php
        } ?>
    </v-row>

    <!-- 分页导航 -->
    <v-row justify="center" class="mt-10">
  <?php 
    previous_posts_link('<v-chip prepend-icon="$vuetify">上一页</v-chip>');
    next_posts_link('<v-chip append-icon="$vuetify">下一页</v-chip>'); 
  ?>
    </v-row>
</div>