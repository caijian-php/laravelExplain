<?php

function Pipeline($stack, $pipe)
{
    return function ($passable) use ($stack, $pipe) {
        if (is_callable($pipe)) {
//            return $pipe($passable, $stack);
        } elseif (is_object($pipe)) {
            $method = "handle";
            if (!method_exists($pipe, $method)) {
                throw new InvalidArgumentException('object that own handle method');
            } else {
                return $pipe->$method($passable, $stack);
            }
        } else {
            throw new InvalidArgumentException('$pipe must be callback or object');
        }
    };
}

interface  TestUnit
{
    public function handle($passable, callable $next = null);
}

class  Unit1 implements TestUnit
{
    public function handle($passable, callable $next = null)
    {
        echo __CLASS__ . '->' . __METHOD__ . " called\n";
        return $next($passable).'-'.get_called_class();
    }
}

class  Unit2 implements TestUnit
{
    public function handle($passable, callable $next = null)
    {
        echo __CLASS__ . '->' . __METHOD__ . " called\n";
        return $next($passable).'-'.get_called_class();
    }
}

class  Unit3 implements TestUnit
{
    public function handle($passable, callable $next = null)
    {
        echo __CLASS__ . '->' . __METHOD__ . " called\n";
        return $next($passable).'-'.get_called_class();
    }
}

class  InitialValue implements TestUnit
{
    public function handle($passable, callable $next = null)
    {
        echo __CLASS__ . '->' . __METHOD__ . " called\n";
        //$next($passable);
        return get_called_class();
    }
}

$pipeline = array_reduce([new Unit1(), new Unit2(), new Unit3()], "Pipeline", function ($passable) {
    return (new InitialValue())->handle($passable);
});
var_dump($pipeline(1));

//$result = array_reduce([1,2,3],function($carry,$item){
//    print_r($carry.'-' . $item . PHP_EOL);
//    return $carry+$item;
//});

//$result = array_reduce([1,2,3],function($carry,$item){
//    return function()use($carry,$item){
//        if (is_callable($carry)) {
//            $carry = $carry();
//        }
//        if (is_callable($item)) {
//            $item = $item();
//        }
//        print_r($carry.'-' . $item . PHP_EOL);
//        return $carry+$item;
//    };
//},0);
//var_dump($result());

//$result = array_reduce([1,2,3],function($carry,$item){
//    return function()use($carry,$item){
//        if (is_callable($carry)) {
//            $carry = $carry();
//        }
//        if (is_callable($item)) {
//            $item = $item();
//        }
//        print_r($carry.'-' . $item . PHP_EOL);
//        return $carry+$item;
//    };
//}, 0);
//var_dump($result());