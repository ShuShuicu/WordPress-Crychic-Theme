<?php
if (!defined('ABSPATH')) exit;
Crychic_OptionsHead();
?>
<a-tabs default-active-key="1">
    <a-tab-pane key="1" title="基础">
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php echo esc_html__('Logo', CRYCHIC_TEXTDOMAIN); ?></th>
                <td>
                    <a-input type="text" name="Crychic_Logo" placeholder="https://" value="<?php esc_attr(Crychic::Options('Crychic_Logo', true)); ?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php echo esc_html__('ICP备案号', CRYCHIC_TEXTDOMAIN); ?></th>
                <td>
                    <a-input type="text" name="Crychic_ICP" placeholder="沪ICP备13002172号-3" value="<?php esc_attr(Crychic::Options('Crychic_ICP', true)); ?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php echo esc_html__('SEO Key', CRYCHIC_TEXTDOMAIN); ?></th>
                <td>
                    <a-input type="text" name="Crychic_SEO_Key" placeholder="偷摸零,圣爱音,客服小祥,睦头人,长期素食,狸希" value="<?php esc_attr(Crychic::Options('Crychic_SEO_Key', true)); ?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php echo esc_html__('SEO Description', CRYCHIC_TEXTDOMAIN); ?></th>
                <td>
                    <a-textarea name="Crychic_SEO_Des" placeholder="我是来复活哭来西裤的！" rows="5" cols="50" class="large-text"><?php esc_textarea(Crychic::Options('Crychic_SEO_Des', true)); ?></a-textarea>
                </td>
            </tr>
        </table>
        <a-button type="primary" html-type="submit" name="submit" id="submit" style="float: right;">保存设置</a-button>
    </a-tab-pane>
    <a-tab-pane key="2" title="优化">
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php echo esc_html__('GrAvatar头像源', CRYCHIC_TEXTDOMAIN); ?></th>
                <td>
                    <?php
                    $gravatar_source = Crychic::Options('Crychic_GrAvatar', false);
                    ?>
                    <input type="radio" value="1" name="Crychic_GrAvatar" <?php checked($gravatar_source, '1'); ?>>CrAvatar</input><br>
                    <input type="radio" value="2" name="Crychic_GrAvatar" <?php checked($gravatar_source, '2'); ?>>WeAvatar</input><br>
                    <input type="radio" value="3" name="Crychic_GrAvatar" <?php checked($gravatar_source, '3'); ?>>GrAvatar(镜像源)</input><br>
                    <input type="radio" value="4" name="Crychic_GrAvatar" <?php checked($gravatar_source, '4'); ?>>GrAvatar(官方源)</input>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php esc_html_e('其他优化', 'CRYCHIC_TEXTDOMAIN'); ?></th>
                <td>
                    <?php $optimize_options = Crychic::Options('Crychic_Optimize', [], false); ?>
                    <label>
                        <input type="checkbox" name="Crychic_Optimize[]" value="1" <?php checked(in_array('1', $optimize_options)); ?>>
                        <?php esc_html_e('禁止裁剪图片', 'CRYCHIC_TEXTDOMAIN'); ?>
                    </label><br>
                    <label>
                        <input type="checkbox" name="Crychic_Optimize[]" value="3" <?php checked(in_array('3', $optimize_options)); ?>>
                        <?php esc_html_e('移除所有更新监测', 'CRYCHIC_TEXTDOMAIN'); ?>
                    </label><br>
                    <label>
                        <input type="checkbox" name="Crychic_Optimize[]" value="5" <?php checked(in_array('5', $optimize_options)); ?>>
                        <?php esc_html_e('禁用古腾堡编辑器', 'CRYCHIC_TEXTDOMAIN'); ?>
                    </label><br>
                    <label>
                        <input type="checkbox" name="Crychic_Optimize[]" value="2" <?php checked(in_array('2', $optimize_options)); ?>>
                        <?php esc_html_e('禁止文章修订&自动保存', 'CRYCHIC_TEXTDOMAIN'); ?>
                    </label><br>
                    <label>
                        <input type="checkbox" name="Crychic_Optimize[]" value="4" <?php checked(in_array('4', $optimize_options)); ?>>
                        <?php esc_html_e('一键净化WordPress', 'CRYCHIC_TEXTDOMAIN'); ?>
                    </label>
                </td>
            </tr>
        </table>
        <a-button type="primary" html-type="submit" name="submit" id="submit" style="float: right;">保存设置</a-button>
    </a-tab-pane>
</a-tabs>
<?php Crychic_OptionsFoot(); ?>