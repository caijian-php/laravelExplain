<?php
/*
https://learnku.com/articles/37493
========================================================================================================================
所谓 Facade 就是门面模式，即将多个对象组合起来完成一个功能，对外提供统一接口。
以 laravel facade 为例，使用魔术方法__callStatic + 约束接口 getFacadeAccessor 来统一，
另外的使用 composer.json 的 extra 信息指定接入 laravel，以 provider 信息作为服务提供者注册信息，以 alias 作为 Facade 注册信息，
完成一个大统一以及对外的良好接入。
