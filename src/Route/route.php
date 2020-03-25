<?php
/**
 * [路由]
 *
 * @Author  leeprince:2020-03-22 19:20
 */

Route::any('hello', function() {
   dump('hello world');
});

Route::any('subscription',  'WxSubscriptionController@index')->middleware('wechat.subscription.CheckSignture');

Route::any('welcome',  function() {
    // 注意在 WeChatServerProvider 服务提供者中 loadViewsFrom 方法为视图路径设置的命名空间。
    // 所以此处的写法必须是: 设置的命名空间::视图模版名称(去掉.blade.php)
    return view('wechatview::welcome');
});

Route::any('config',  function() {
    dump(config());
    // dump(config('wechat'));
    // dump(config('wechat.wechat_template'));
    // dump(config('wechat.wechat_template.text'));
});


