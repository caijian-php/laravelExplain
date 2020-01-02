<?php
/*
https://learnku.com/articles/38911

事件触发
runRoute
    return $this->prepareResponse($request,
        $this->runRouteWithinStack($route, $request)
    );
        return (new Pipeline($this->container))
        ->send($request)
        ->through($middleware)
        ->then(function ($request) use ($route) {
            return $this->prepareResponse(
                $request, $route->run()
            );
        });
            $route->run()
                $this->runController();
                    return $this->controllerDispatcher()->dispatch(
                        $this, $this->getController(), $this->getControllerMethod()
                    );
                        $parameters = $this->resolveClassMethodDependencies(
                            $route->parametersWithoutNulls(), $controller, $method
                        );
                            resolveClassMethodDependencies();
                                resolveMethodDependencies();
                                    $instance = $this->transformDependency(
                                        $parameter, $parameters
                                    );
                                        this->container->make($class->name);
                                            return $this->resolve
                                                $this->fireResolvingCallbacks($abstract, $object);
                                                    $this->fireAfterResolvingCallbacks($abstract, $object);

触发获取
Illuminate\Foundation\Providers function boot()
    $this->app->afterResolving(\Illuminate\Contracts\Validation\ValidatesWhenResolved::class, function ($resolved) {
        resolved->validateResolved();
    });
        $resolved->validateResolved();
            $instance = $this->getValidatorInstance();
                 $validator = $this->createDefaultValidator
                    return $factory->make()
                        \Illuminate\Validation\Factory->make()
                            \Illuminate\Validation\Factory->resolve()
                                return new \Illuminate\Validation\Validator(...)

获取调用
$this->fails();
    $this->passes()


