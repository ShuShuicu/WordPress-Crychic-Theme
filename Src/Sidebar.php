<?php
if (!defined("ABSPATH")) {
    exit();
} ?>
<v-col cols="12" xs="12" sm="12" md="3" lg="3" id="Sidebar">
<?php 
Crychic::Components('SidebarPostInfo');
Crychic::Components('SidebarPostRandom');
?>
</v-col>

<script>
    jQuery(document).ready(function () {
        jQuery('#Sidebar').theiaStickySidebar({
            // 顶部距离
            additionalMarginTop: 30
        });
    });
</script>