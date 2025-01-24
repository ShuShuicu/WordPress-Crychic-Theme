<?php
if (!defined("ABSPATH")) { exit(); } 
?>
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
            <v-col cols="6" xs="6" sm="6" md="6" lg="3">
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
                        </v-img>

                        <v-card-title>
                        <?php the_title(); ?>
    </v-card-title>

    <v-card-subtitle style="padding-bottom: 15px;">
    <?php the_time("Y-m-d"); ?>
    </v-card-subtitle>


                    </v-card>
                </a>
            </v-col>
        <?php
        } ?>
    </v-row>
