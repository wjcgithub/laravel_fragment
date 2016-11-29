<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class BaseController extends Controller
{
    /**
     * 追加访问日志pipe
     * @param $pipeArr
     * @return array
     */
    protected function rebuildPipe($pipeArr)
    {
        $logObj = App::make('App\Contracts\LogContract');
        return array_merge([$logObj->accessLog()],$pipeArr);
    }
}
