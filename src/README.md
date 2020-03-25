## 基于 laravel 开发微信公众号 composer 扩展包(20200322–_)

## 实现微信公众号对接功能
1. 到[微信公众号开通个人订阅号](https://mp.weixin.qq.com/)，并查看[相关开发文档](https://developers.weixin.qq.com/doc/offiaccount/Basic_Information/Access_Overview.html)，并了解[消息管理中的被动回复用户信息](https://developers.weixin.qq.com/doc/offiaccount/Message_Management/Passive_user_reply_message.html)。
2. 在「微信公众号->开发->基本配置->服务器配置」中配置信息，其中服务器地址（URL）要能被外网访问
## 构建微信公众号对接功能到 composer 扩展包中
    composer init
        添加自动加载autoload
            "psr-4": {
                 "Leeprince\\WeChat\\": "./src/"
            }
    composer update
## laravel 项目集成本地基于微信公众号开发 composer 组件包
    composer config repositories.leeprince path ../composer/laravel-wechat
    composer require leeprince/laravel-wechat:dev-master
    
##【核心服务：路由->控制器】通过为组件自定义服务提供者并继承 laravel 的服务提供者，为组件加载自定义组件中的所有服务。在 config/app.php 中添加该组件的服务提供者 LeePrince\WeChat\WeChatServiceProvider::class, 并开始测试 路由和控制器

##【扩展服务：中间件】测试通过后继续完善代码提取检测签名部分到中间件中作为请求过滤，这里是用的是路由中间件。首先需要在WeChatServiceProvider 服务提供者中加载路由中间件到路由中
	
##【扩展服务：视图】测试通过后，在 WeChatServiceProvider 服务提供者中加载视图文件并设置命名空间，最后添加在组件的路由中注册路由再测试
	
##【扩展服务：配置文件】测试通过后，在WeChatServiceProvider 服务提供者中加载配置文件，并在路由中注册一个测试路由测试获取该配置文件
	
##【扩展服务：外部允许修改配置文件】允许在 laravel 框架的 config 中修改组件的配置文件，而无需到组件的配置文件中修改。
	
##【扩展服务：自定义 Artisan 命令创建控制器到组件中】
## 发布 composer 组件包到 github 作为 composer 的代码仓库
## 在 packagist 中提交该组件的 github 项目地址作为 composer 组件包的包仓库
## 完善 README.md 的编写