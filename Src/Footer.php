<?php
if (!defined('ABSPATH')) exit;
?>
</div>
<footer>
    <a-card hoverable :style="{marginTop: '48px' }">
        <div
            :style="{
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'space-between',
        }">
            <span
                :style="{ display: 'flex', alignItems: 'center', }">
                <a-typography-text>{{ Footer.Copyright }}</a-typography-text>
            </span>
            <a-link v-html="Footer.ICP"></a-link>
        </div>
    </a-card>
</footer>
</main>
<?php
Crychic_JavaScript();
wp_footer();
Crychic::Core('Uika');
?>
</body>

</html>