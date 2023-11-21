# ArticleTOC for Typecho

`ArticleTOC` 是一个为 Typecho 博客平台设计的插件，它可以自动生成文章的目录结构，帮助读者更容易地导航您的内容。它支持浅色和深色主题，确保无论用户偏好如何，都能提供流畅的阅读体验。

![image](https://github.com/Charlielyo/ArticleTOC/assets/78399982/29a4f9de-a3f6-4c5c-8096-87c06895495f)

## 功能特性

- **自动目录生成**：基于文章标题自动生成目录。
- **平滑滚动**：通过平滑滚动效果增强导航体验。
- **主题兼容性**：支持浅色和深色主题。
- **响应式设计**：适应各种设备和屏幕尺寸。
- **可定制外观**：可以通过CSS进行样式定制。

##Demo演示
点击此处预览效果。
[个人网站](https://sodebug.com/)
[插件教程](https://sodebug.com/Linux/ArticleTOC.html)


## 安装方法

1. 从仓库下载`ArticleTOC`插件。
2. 解压下载的文件，并将`ArticleTOC`目录上传到您的Typecho的`usr/plugins`目录下。
3. 登录到Typecho管理面板，进入插件部分，激活`ArticleTOC`。

## 使用方法

一旦激活，插件会自动扫描您的文章标题，并在内容的开始处生成并显示目录。

![image](https://github.com/Charlielyo/ArticleTOC/assets/78399982/9b436839-a46e-42aa-b85d-dfd070a7cba3)

## 样式自定义

您可以通过编辑`article-toc.css`文件来自定义目录的外观。该文件包含了浅色和深色主题的样式，以及响应式设计的调整。

```css
/* 浅色模式样式 */
#article-toc {
    /* ... */
}

/* 深色模式样式 */
@media (prefers-color-scheme: dark) {
    #article-toc {
        /* ... */
    }
}
