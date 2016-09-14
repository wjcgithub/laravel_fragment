<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use App\Contracts\TestContract;
use App\Facades\TestClass;

class TestController extends Controller
{
    public $test;

    /**
     * 构造方法
     * TestController constructor.
     * @param TestContract $test
     */
    public function __construct(TestContract $test)
    {
        $this->test = $test;
    }

    /**
     * 默认测试
     */
    public function index()
    {
        $parsedClass = new \Go\ParserReflection\ReflectionClass(self::class);
        dump($this);
//        print_r($parsedClass->getMethods());
//        $test = App::make('test');
//        $test->callMe('TestController');
        $this->test->callMe('TestController');
    }

    /**
     * 自定义门面模式
     */
    public function customfacade()
    {
        TestClass::doSomething();
    }
}