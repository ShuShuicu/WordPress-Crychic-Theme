<?php
if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="<?php Crychic::Info('charset', true) ?>">
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <?php
  Crychic_SEO();
  wp_head();
  Crychic_CSS();
  Crychic_HeadJS();
  ?>
</head>

<body>
  <main id="app">
    <a-menu mode="horizontal" theme="dark" :default-selected-keys="['1']">
      <a-menu-item key="0" :style="{ padding: 0, height: '30px' }" disabled>
        <img src="<?php echo Crychic::Options('Crychic_Logo', true) ? Crychic::Options('Crychic_Logo', true) : Crychic::Assets('images/logo.png', true); ?>" style="height: 30px; cursor: none;" />
      </a-menu-item>
      <a href="<?php Crychic::Info('siteurl') ?>">
        <a-menu-item key="1">首页</a-menu-item>
      </a>
    </a-menu>
    <div class="Crychic-container">