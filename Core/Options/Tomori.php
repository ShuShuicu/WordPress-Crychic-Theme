<?php
if (!defined('ABSPATH')) exit;
?>
<form method="post" action="options.php">
<?php 
    settings_fields('CrychicOptions'); 
    do_settings_sections('CrychicOptions');
?>
<div id="CrychicTomori">
<el-tab-pane label="常规">
    <table class="form-table">
        <tr valign="top">
            <th scope="row"><?php echo esc_html__('Logo', CRYCHIC_TEXTDOMAIN); ?></th>
            <td>
                <input type="text" name="Crychic_Logo" placeholder="https://" value="<?php esc_attr(Crychic::Options('Crychic_Logo', true)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php echo esc_html__('ICP备案号', CRYCHIC_TEXTDOMAIN); ?></th>
            <td>
                <input type="text" name="Crychic_ICP" placeholder="沪ICP备13002172号-3" value="<?php esc_attr(Crychic::Options('Crychic_ICP', true)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php echo esc_html__('SEO Key', CRYCHIC_TEXTDOMAIN); ?></th>
            <td>
                <input type="text" name="Crychic_SEO_Key" placeholder="偷摸零,圣爱音,客服小祥,睦头人,长期素食,狸希" value="<?php esc_attr(Crychic::Options('Crychic_SEO_Key', true)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php echo esc_html__('SEO Description', CRYCHIC_TEXTDOMAIN); ?></th>
            <td>
                <textarea name="Crychic_SEO_Des" placeholder="我是来复活哭来西裤的！" rows="5" cols="50" class="large-text"><?php esc_textarea(Crychic::Options('Crychic_SEO_Des', true)); ?></textarea>
            </td>
        </tr>
    </table>
    <el-button type="primary" native-type="submit" name="submit" id="submit" style="float: right;">保存设置</el-button>
</el-tab-pane>
<el-tab-pane label="文章">
<el-skeleton :rows="5" animated />
</el-tab-pane>
<el-tab-pane label="优化">
    <table class="form-table">
        <tr valign="top">
            <th scope="row"><?php echo esc_html__('GrAvatar头像源', CRYCHIC_TEXTDOMAIN); ?></th>
            <td>
                <div class="mb-2 ml-4">
                    <el-radio-group v-model="radio1">
                        <el-radio value="1" name="Crychic_GrAvatar" size="large">CrAvatar</el-radio>
                        <el-radio value="2" name="Crychic_GrAvatar" size="large">WeAvatar</el-radio>
                        <el-radio value="3" name="Crychic_GrAvatar" size="large">GrAvatar(镜像源)</el-radio>
                        <el-radio value="4" name="Crychic_GrAvatar" size="large">GrAvatar(官方源)</el-radio>
                    </el-radio-group>
                </div>
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
                <label>
                    <input type="checkbox" name="Crychic_Optimize[]" value="3" <?php checked(in_array('3', $optimize_options)); ?>>
                    <?php esc_html_e('移除所有更新监测', 'CRYCHIC_TEXTDOMAIN'); ?>
                </label><br>
                <label>
                    <input type="checkbox" name="Crychic_Optimize[]" value="5" <?php checked(in_array('1', $optimize_options)); ?>>
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
    <el-button type="primary" native-type="submit" name="submit" id="submit" style="float: right;">保存设置</el-button>
</el-tab-pane>
<el-tab-pane label="关于">
<el-skeleton :rows="5" animated />
</el-tab-pane">
</div>
</form>