<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MiddleController extends Controller
{
    public function activity()
    {
        return "活动快要开始了，敬请期待";
    }

    public function activity1()
    {
        return "活动进行中，谢谢参与1！";
    }

    public function activity2()
    {
        return "活动进行中，谢谢参与2！";
    }
}
