<?php
require './source/class/class_core.php';//引入系统核心文件
$discuz = & discuz_core::instance();//以下代码为创建及初始化对象
$discuz->cachelist = $cachelist;
$discuz->init();
loadcache('diytemplatename');//diy要载入缓存
include template('diy:forum/game');//调用单页模版文件
?>