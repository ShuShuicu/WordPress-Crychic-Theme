<?php
if (!defined("ABSPATH")) {
    exit();
}
?>
        <?php while (have_posts()) {
            the_post(); ?>
            <div class="Crychic-Post-List">
                <a href="<?php the_permalink(); ?>">
                    <v-card-item>
                        <v-card-title>
                            <?php the_title(); ?>
                        </v-card-title>

                        <v-card-subtitle>
                            <?php the_time("Y-m-d"); ?>
                        </v-card-subtitle>
                    </v-card-item>

                    <v-card-text>
                        <?php
                        $content = get_the_content();
                        $trimmed_content = wp_trim_words($content, 150, '[...]');
                        if (empty(trim($trimmed_content))) {
                            echo 'Ciallo～(∠・ω< )⌒☆';
                        } else {
                            echo $trimmed_content;
                        }
                        ?>
                    </v-card-text>
                </a>
            </div>
        <?php
        } ?>
