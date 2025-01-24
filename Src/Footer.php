<?php 
if (!defined('ABSPATH')) exit;
?>
        </div>
<footer>
<el-card style="margin-top: 48px;">
    <span>{{ Footer.Copyright }}</span>
    <span style="float: right;" v-html="Footer.ICP"></span>
</el-card>
</footer>
</main>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const { createApp, ref } = Vue;
    const { createVuetify } = Vuetify;
    const { default: ElementPlus } = window.ElementPlus;
    const TDesign = window.TDesign;

    // 创建 Vuetify 实例
    const vuetify = createVuetify({
        // 配置选项
    });

    const app = createApp({
        data() {
            return {
                SiteUrl: '<?php Crychic::HomeUrl(true); ?>',
                Header: {
                    Logo: '<?php echo Crychic::Options('Crychic_Logo', true) ? Crychic::Options('Crychic_Logo', true) : Crychic::Assets('images/logo.png', true); ?>',
                },
                Footer: {
                    ICP: '<a href="https://beian.miit.gov.cn/" target="_blank" rel="external nofollow noopener"><?php echo Crychic::Options('Crychic_ICP', true); ?></a>',
                    Copyright: '© <?php echo date("Y") . ' · ' . Crychic::Info('name', false); ?>. All Rights Reserved.'
                }
            };
        },
        setup() {
            const value2 = ref(true);

            return {
                value2
            };
        }
    });

    app.use(vuetify); // 注册 Vuetify
    app.use(ElementPlus); // 注册 Element Plus
    app.use(TDesign); // 注册 TDesign

    app.mount('#app'); // 确保挂载点正确
});
</script>
<?php 
Crychic_JavaScript();
wp_footer(); 
?>
</body>
</html>