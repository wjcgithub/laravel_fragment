<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        $name='进化论';
        try{
            $flag = Mail::send('emails.test', ['name'=>$name], function ($message){
                $to = '732578448@qq.com';
                $message->to($to)->subject('测试邮件');
            });
        }catch (\Exception $e){
            Log::notice($e->getMessage().'--'.$e->getFile().'---'.$e->getLine());
        }

        if ($flag){
            echo '邮件发送成功';
        } else {
            echo '邮件发送失败';
        }
    }
}
