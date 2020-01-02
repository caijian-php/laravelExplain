<?php
/*
https://learnku.com/articles/38633
runRoute

路由分发
    中间件是否启用
    收集中间件
        当前Controller+Action决定middleware
    路由分发器ControllerDispatcher
        通过getMiddleware返回collect收集中相应的middleware
    run->runController->dispatch by controller,method,array_value($parameters)
        parameter from resolveClassMethodDependencies
        if method_exists(callAction) run it