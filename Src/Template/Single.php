<?php 
if (!defined('ABSPATH')) exit;
Crychic::Src('Header');
?>
<div id="Post">

  <v-row>
        <v-col cols="12" xs="12" sm="12" md="9" lg="9">
        <t-card title="<?php the_title(); ?>" header-bordered >
  <div class="Crychic-typo">
      <?php the_content(); ?>
    </div>
  </t-card>
        </v-col>
    <?php Crychic::Src('Sidebar'); ?>
  </v-row>
  </div>
<script>
  window.ViewImage && ViewImage.init('#Post img');
</script>
<?php
Crychic::Src('Footer');
?>

