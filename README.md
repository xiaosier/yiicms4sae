YiiCms 企业站管理系统，基于 yii2 basic 开发，当前项目是SAE云空间运行环境适配版本。
===============================


原项目地址：<https://github.com/yongshengli/yiicms/>

yiicms 主要功能：
1. 新闻管理
2. 产品管理
3. 下载管理
4. 图片管理
5. 后台权限rbac
6. 前台菜单自定义、后台菜单自定义
7. 多模板多主题
8. 内容批量操作
9. 多语言支持
10. 友情链接

YiiCms版权
----------

<http://git.oschina.net/templi/yiicms/blob/master/LICENSE.md>，版权归原始作者所有。

在SAE上安装
----------

- 从 <http://sae.sina.com.cn/?m=apps&a=create> 这里创建一个PHP、5.6、云空间允许环境的应用。
- 开通共享型数据库服务，从数据库管理页面导入根目录下的yiicms.sql文件。**请从共享型数据库管理页面导入功能导入，不要从phpmyadmin导入。**
- 从代码管理处上传整个项目文件，**全选文件点右键压缩为一个zip直接上传，注意不要直接压缩文件夹，解压后的目录结构和压缩包中会一致。**
- 访问即可


后台地址
----------

http://项目访问地址/backend.html

修改管理员密码
----------

直接修改数据库``admin_user``表的``password_hash``字段，是密码的md5值，修改admin那个记录即可，把demo的记录删除。

在线演示地址
----------

<http://ss2s2s2ws2.applinzi.com/>

有疑问
----------

请咨询微博 @lazypeople <http://weibo.com/lazypeole>


