<?php
if (!defined("ABSPATH")) {
    exit();
} ?>
<a-col :xs="24" :sm="24" :md="5" :lg="5" :xl="5" :xxl="5" id="Sidebar">
<?php 
if (is_single()) {
    Crychic::Components('SidebarPostInfo');
}
Crychic::Components('SidebarPostRandom');
?>
</a-col>

<script>
    jQuery(document).ready(function () {
        jQuery('#Sidebar').theiaStickySidebar({
            // 顶部距离
            additionalMarginTop: 30
        });
    });
</script>