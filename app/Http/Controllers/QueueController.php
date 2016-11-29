<?php

namespace App\Http\Controllers;

use App\Entity\AsyncData;
use App\Services\Common\CommonService;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendReminderEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $task = new AsyncData();
        $task->setServiceName('SendMail')
            ->setParams(['user' => $user])
            ->setQueue(AsyncData::HIGH)
            ->setDelays(0);
        return CommonService::getInstance()->createAsyncTask($task);
    }

    /**
     * 处理订单
     *
     * @param Request $request
     * @param $id
     */
    public function processOrder(Request $request, $id)
    {
        // 处理请求...
        $this->dispatchFrom('App\Jobs\ProcessOrder', $request, [
            'custom_params' => 20,
        ]);
    }
}
