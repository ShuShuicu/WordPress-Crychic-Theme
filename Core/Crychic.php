<?php
if (!defined("ABSPATH")) {
    exit();
}
/**
 * true 输出 echo
 * false 输出 return
 */
class Crychic
{
    // 主页URL
    public function HomeUrl($echo = true)
    {
        $HomeUrl = home_url();
        if ($echo) {
            echo $HomeUrl;
        } else {
            return $HomeUrl;
        }
    }

    // 获取Title
    public function Title($echo = true)
    {
        $site_name = Crychic::Info("name",false);
        $site_description = Crychic::Info("description",false);
        if (is_front_page()) {
            // 首页标题
            if (!empty($site_description)) {
                $title = $site_name . " - " . $site_description;
            } else {
                $title = $site_name;
            }
        } elseif (is_category()) {
            // 分类页面标题
            $category_name = single_cat_title("", false);
            $title = $category_name . " - " . $site_name;
        } elseif (is_tag()) {
            // 标签页面标题
            $tag_name = single_tag_title("", false);
            $title = $tag_name . " - " . $site_name;
        } elseif(is_404()) {
        // 404页面标题
            $title = "404 - " . Crychic::Info("name",false);
        } elseif (is_author()) {
            // 作者页面标题
            $author_name = get_the_author();
            $title = $author_name . " - " . $site_name;
        } else {
            // 内页标题
            $page_title = get_the_title();
            $title = $page_title . " - " . $site_name;
        }

        if ($echo) {
            echo $title;
        } else {
            return $title;
        }
    }

    // 主题Url
    public function ThemeUrl($echo = true)
    {
        $ThemeUrl = get_template_directory_uri();
        if ($echo) {
            echo $ThemeUrl;
        } else {
            return $ThemeUrl;
        }
    }

    // 主题AssetsUrl
    public function AssetsUrl($echo = true)
    {
        $AssetsUrl = get_template_directory_uri() . "/Assets";
        if ($echo) {
            echo $AssetsUrl;
        } else {
            return $AssetsUrl;
        }
    }

    // 引用Assets资源
    public function Assets($file, $echo = true)
    {
        $AssetsUrl = get_template_directory_uri() . "/Assets/" . $file;
        if ($echo) {
            echo $AssetsUrl;
        } else {
            return $AssetsUrl;
        }
    }

    // 主题版本
    public function ThemeVersion($echo = true)
    {
        $ThemeVersion = wp_get_theme()->get("Version");
        if ($echo) {
            echo $ThemeVersion;
        } else {
            return $ThemeVersion;
        }
    }

    // 获取设置项
    public static function Options($option, $echo = true)
    {
        $optionValue = get_option($option);
        if ($echo) {
            echo $optionValue;
        } else {
            return $optionValue;
        }
    }

    // 获取bloginfo
    public static function Info($info, $echo = true)
    {
        $Info = get_bloginfo($info);
        if ($echo) {
            echo $Info;
        } else {
            return $Info;
        }
    }

    // 引用Core文件
    public static function Core($file)
    {
        require_once get_theme_file_path() . "/Core/" . $file . ".php";
    }

    // 引用Src文件
    public static function Src($file)
    {
        require_once get_theme_file_path() . "/Src/" . $file . ".php";
    }

    // 引用Src/Template文件
    public static function Template($file)
    {
        require_once get_theme_file_path() . "/Src/Template/" . $file . ".php";
    }
    // 引用Src/Template/Components文件
    public static function Components($file)
    {
        require_once get_theme_file_path() . "/Src/Template/Components/" . $file . ".php";
    }

    // 入口规则
    public static function Mujica()
    {
        Crychic::Src("Header");
        if (is_front_page()) {
            Crychic::Template("Index");
        } elseif (is_single()) {
            Crychic::Template("Single");
        } elseif(is_404()) {
            Crychic::Template("Error");
        } else {
            Crychic::Template("Index");
        }
        Crychic::Src("Footer");
    }
}
