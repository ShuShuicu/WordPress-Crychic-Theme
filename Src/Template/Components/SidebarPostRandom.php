<?php
if (!defined("ABSPATH")) {
    exit();
} ?>
<v-card elevation="6">
    <?php 
    $Url = file_get_contents(Crychic::HomeUrl(false) . '/wp-json/Crychic/v1/GetPostRandom?number=5');
    $Data = json_decode($Url, true);
    ?>
    <v-list>
    <?php 
    if (isset($Data['data']) && is_array($Data['data'])) {
        foreach ($Data['data'] as $item) {
    ?>
        <v-list-item link href="<?php echo esc_url(get_permalink($item['id'])); ?>">
            <v-list-item-title><?php echo esc_html($item['title']); ?></v-list-item-title>
        </v-list-item>
    <?php 
        }
    } else {
        echo '<v-list-item><v-list-item-title>没有文章</v-list-item-title></v-list-item>';
    }
    ?>
    </v-list>
</v-card>