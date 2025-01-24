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
    <el-menu
      :default-active="activeIndex"
      class="el-menu-demo"
      mode="horizontal"
      :ellipsis="false"
      @select="handleSelect"
    >
    <a :href="SiteUrl">
    <el-menu-item index="0">
        <img
            style="width: 100px"
            src="<?php echo Crychic::Options('Crychic_Logo', true) ? Crychic::Options('Crychic_Logo', true) : Crychic::Assets('images/logo.png', true); ?>"
            alt="logo"
        />
        <el-skeleton v-else :rows="1" animated />
      </a>
    </el-menu-item>
    <a :href="SiteUrl">
        <el-menu-item index="1">首页</el-menu-item>
    </a>
  </el-menu>
        <div class="Crychic-container">