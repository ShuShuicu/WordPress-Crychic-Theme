<?php
if (!defined('ABSPATH')) exit;
Crychic::Src('Header');
?>
<div id="Post">

  <v-row>
    <a-col :xs="24" :sm="24" :md="17" :lg="17" :xl="17" :xxl="17" style="margin-right: 10px;">
        <a-card title="<?php the_title(); ?>">
          <template #extra>
            <a-link>More</a-link>
          </template>
          <div class="Crychic-typo">
            <?php the_content(); ?>
          </div>
        </a-card>
    </a-col>
    <?php Crychic::Src('Sidebar'); ?>
  </v-row>
</div>
<script>
  window.ViewImage && ViewImage.init('#Post img');
</script>
<?php
Crychic::Src('Footer');
?>