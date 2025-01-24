<?php
if (!defined('ABSPATH')) exit;
?>
<script src="<?php Crychic::Assets('vue/vue.global.js', true) ?>"></script>
<link rel="stylesheet" href="<?php Crychic::Assets('element-plus/index.css', true) ?>">
<script src="<?php Crychic::Assets('element-plus/index.full.min.js', true) ?>"></script>
<div id="CrychicOptions">
    <el-card style="max-width: 98%;margin-top: 30px;">
        <template #header>
            <div class="card-header">
                <span>Crychic · {{ Version }}</span>
                <span style="float: right;" v-html="Powered"></span>
            </div>
        </template>
        <el-tabs type="border-card">
            <?php require_once 'Tomori.php'; ?>
        </el-tabs>
    </el-card>

</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const {
            createApp,
            ref
        } = Vue;
        const {
            ElSwitch,
            ElRadioGroup,
            ElRadio,
            ElCheckboxGroup,
            ElCheckbox
        } = ElementPlus;

        const app = createApp({
            data() {
                return {
                    Version: 'Version: <?php Crychic::ThemeVersion(true) ?>',
                    Powered: '©️ Powered By <a href="https://space.bilibili.com/435502585" target="_blank">鼠子Tomoriゞ</a>',
                    radio1: '<?php echo esc_attr(Crychic::Options('Crychic_GrAvatar', '4')); ?>', // 默认为 Gravatar 官方源
                    optimizeOptions: <?php echo json_encode(get_option('Crychic_Optimize', [])); ?>, // 初始化 optimizeOptions 数据
                };
            },
            setup() {
                const value1 = ref(true);
                const checked1 = ref(true);

                return {
                    value1,
                    checked1,
                };
            }
        });

        app.use(ElementPlus);
        app.mount('#CrychicOptions');
    });
</script>