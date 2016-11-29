<?php
/**
 * Created by PhpStorm.
 * User: evolution
 * Date: 16-11-29
 * Time: 下午4:16
 */
namespace App\Services\Consumer;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendMail
{
    public function doAction($params)
    {
        try{
            $user = $params['user'];
            Mail::send('emails.reminder', ['name'=>$user['email']], function ($m) use ($user){
                Log::notice('给'.$user['email'].'发送邮件成功------++++++++');
                $m->to($user['email'])->subject('性能发布'.date('Y-m-d H:i:s', time()));
            });
//            $this->user->reminders->create('');
        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }
}