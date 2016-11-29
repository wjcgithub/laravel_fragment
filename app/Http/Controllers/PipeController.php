<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\BaseController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\App;
use \App\Contracts\LogContract;

class PipeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function myfunction()
    {
        return function ($a,$b){
            return function ($v) use ($a,$b){
                echo $v."<hr>";
            };
        };
    }

    /**
     * reduce test
     */
    function reduce()
    {
        $a=array(4,2,2);
        print_r(call_user_func(array_reduce($a,$this->myfunction(), 5),1));
        die;
    }

    public function index(Request $request, LogContract $log)
    {
        try{
            $method = explode('::',__METHOD__)[1];
            $pipe5 = "test:$method"."Validate";
            $pipeArr = $this->rebuildPipe([$pipe5]);
            $poster['req'] = $request->all();
            echo "result: " . app('Illuminate\Pipeline\Pipeline')->send($poster)->through($pipeArr)->then(function ($poster) {
                    echo "then received: <hr>";
                    return 3;
                }) . "<hr>";
        }catch (\Exception $e){
            dd($e);
        }

    }
}
