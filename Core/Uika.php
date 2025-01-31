<?php
if (!defined("ABSPATH")) {
  exit();
} ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const { createApp, ref } = Vue;
    const { createVuetify } = Vuetify;
    const { default: ElementPlus } = window.ElementPlus;

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
    app.use(ArcoVue); // 注册 Arco Design
    app.mount('#app'); // 确保挂载点正确
});
</script>
