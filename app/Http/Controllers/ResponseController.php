<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Session;

class ResponseController extends Controller
{
    public function res1()
    {
//        $data = [
//            'errCode' => 404,
//            'errMsg' => 'success',
//            'data' => 'sean'
//        ];
//
//        return response()->json($data);
    }

    public function res2()
    {
        //with使用的是Session中的flash一次性数据机制
//        return redirect('redirect1')->with('message', '我是传值数fd据');
//        return redirect()->action('ResponseController@redirect1')->with('message', '我是传值数fd据');
        return redirect()->route('redir1')->with('messagea', '我是传值数fd据');
        return redirect()->back();
    }

    public function redirect1()
    {
        return Session()->get('messagea','暂无数据');
    }
}
