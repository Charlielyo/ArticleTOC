<?php
/**
 * ArticleTOC 插件，用于显示文章目录结构
 * 
 * @package ArticleTOC
 * @author Charlie
 * @version 1.0.0
 * @link https://sodebug.com/
 */
class ArticleTOC_Plugin implements Typecho_Plugin_Interface
{
    public static function activate() {
        Typecho_Plugin::factory('Widget_Archive')->header = array('ArticleTOC_Plugin', 'addHeader');
        Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('ArticleTOC_Plugin', 'parse');
        return 'ArticleTOC Plugin Activated';
    }

    public static function deactivate() {
        return 'ArticleTOC Plugin Deactivated';
    }

    public static function config(Typecho_Widget_Helper_Form $form) {}

    public static function personalConfig(Typecho_Widget_Helper_Form $form) {}

    public static function addHeader() {
        $cssUrl = Helper::options()->pluginUrl . '/ArticleTOC/article-toc.css';
        echo '<link rel="stylesheet" type="text/css" href="' . $cssUrl . '" />';
    }

    public static function parse($content, $widget, $lastResult) {
        $content = empty($lastResult) ? $content : $lastResult;

        if ($widget instanceof Widget_Archive && $widget->is('single')) {
            // 匹配标准HTML标题标签，忽略<strong>标签
            preg_match_all('/<h([1-6])>(<strong>)?(.*?)(<\/strong>)?<\/h[1-6]>/i', $content, $matches, PREG_SET_ORDER);
            
            $toc = '<div id="article-toc"><span>本文目录：</span><ul>';
            foreach ($matches as $match) {
                $id = md5($match[3]);
                $toc .= '<li class="toc-level-' . $match[1] . '"><a href="#' . $id . '">' . htmlspecialchars($match[3]) . '</a></li>';
                $content = str_replace($match[0], '<h'.$match[1].' id="'.$id.'">'.$match[3].'</h'.$match[1].'>', $content);
            }
            $toc .= '</ul></div>';

            $content = $toc . $content;
        }

        return $content;
    }
    public static function addFooter() {
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 添加滚动监听到所有目录链接
            document.querySelectorAll('#article-toc a').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault(); // 阻止默认点击事件
                    var targetId = this.getAttribute('href').substring(1);
                    var targetElement = document.getElementById(targetId);
    
                    if (targetElement) {
                        // 使用平滑滚动到目标元素
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
        </script>
        <?php
    }

}