<?php
if (!defined("ABSPATH")) {
    exit();
} ?>
<div id="Index">

    <?php Crychic::Components('IndexPostCard'); ?>

    <v-row justify="center" class="mt-10">
  <?php 
    previous_posts_link('<v-chip prepend-icon="$vuetify">上一页</v-chip>');
    next_posts_link('<v-chip append-icon="$vuetify">下一页</v-chip>'); 
  ?>
    </v-row>
</div>