<?php
if (!defined("ABSPATH")) {
    exit();
} ?>
<v-card
        subtitle="<?php the_time("Y-m-d H:i:s"); ?>"
        title="文章信息"
        style="margin-bottom: 10px;"
    >
        <v-card-text>
            <div class="flex gap-2" style="margin-bottom: 8px;">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) {
                    $category_types = [
                        "primary",
                        "success",
                        "info",
                        "warning",
                        "danger",
                    ];
                    foreach ($categories as $category) {
                        $random_type =
                            $category_types[array_rand($category_types)];
                        echo '<el-tag style="margin-right: 8px;" size="large" type="' .
                            esc_attr($random_type) .
                            '"><a href="' .
                            esc_url(get_category_link($category->term_id)) .
                            '">' .
                            esc_html($category->name) .
                            "</a></el-tag>";
                    }
                } else {
                    echo '<el-tag size="large" type="info">未分类</el-tag>';
                }
                ?>
            </div>

            <div class="flex gap-2">
                <?php
                $tags = get_the_tags();
                if (!empty($tags)) {
                    $tag_types = [
                        "primary",
                        "success",
                        "info",
                        "warning",
                        "danger",
                    ];
                    foreach ($tags as $tag) {
                        $random_type = $tag_types[array_rand($tag_types)];
                        echo '<el-tag style="margin-right: 8px;" size="large" type="' .
                            esc_attr($random_type) .
                            '" round><a href="' .
                            esc_url(get_tag_link($tag->term_id)) .
                            '">' .
                            esc_html($tag->name) .
                            "</a></el-tag>";
                    }
                } else {
                    echo '<el-tag size="large" type="info" round>无标签</el-tag>';
                }
                ?>
            </div>
        </v-card-text>
    </v-card>
