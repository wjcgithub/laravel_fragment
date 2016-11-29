<?php
namespace App\Services\Common;

use App\Contracts\LogContract;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class XinLogService implements LogContract
{
    static private $logFile = 'buycar_access.log';

    public function __construct()
    {
        echo __CLASS__."<hr>";
    }

    /**
     * 记录接口访问日志
     * @return \Closure
     */
    public function accessLog()
    {
        $fun = function ($data, \Closure $next)
        {
            $req = $data['req'];
            $logObj = App::make('App\Contracts\LogContract');
            if (in_array(env('APP_ENV'),['local','testing'])) {
                //记录到本地
                $logObj->addInfo(json_encode($req), self::$logFile,'',1);
            }else{
                //记录到服务器
                $logObj->addInfo(json_encode($req), self::$logFile);
            }

            return $next($data);
        };

        return $fun;
    }

    /**
     * 记录日志信息
     * @param $msg
     * @param string $fileName
     * @param string $dir
     * @param bool $isWriteFile 是否立即记录日志 默认：否，异步记日志
     */
    public function addInfo($msg, $fileName = '', $dir = '',$isWriteFile=false)
    {
        if (!empty($msg)) {
            $msg = date('Y-m-d H:i:s') . "\t{$msg}\r\n";

            if($isWriteFile) {
                $default_log_path = Config::get('common.log_dir');
                if (empty($dir) == false) {
                    $newdir = rtrim($default_log_path, '/') . '/' . rtrim($dir, '/') . '/';
                } else {
                    $newdir = rtrim($default_log_path, '/') . '/';
                }
                !is_dir($default_log_path) && $this->chown_dir_priv($default_log_path);
                !is_dir($newdir) && $this->chown_dir_priv($newdir);
                $newdir .= date('Ym') . '/';
                !is_dir($newdir) && $this->chown_dir_priv($newdir);
                if (empty($fileName)) {
                    $file = $newdir . "nc.log";
                } else {
                    $file = $newdir . $fileName;
                }
                if (exec('whoami') == 'root' && exec("ls -l $file | awk '{print $3}'") == 'root') {
                    chown($file, 'nginx');
                    chgrp($file, 'nginx');
                }
                file_put_contents($file, $msg, FILE_APPEND);
                return;
            }
            else{
                $asyncData=new AsyncData();
                $asyncData->setServiceName('AddLog');
                $asyncData->setParams(['message'=>$msg,'filename'=>$fileName,'dir'=>$dir]);
                $asyncData->setPriority(AsyncData::HIGH);
                CommonService::getInstance()->createAsyncTask($asyncData);
            }
        }
    }

    //创建目录时修改目录权限
    public function chown_dir_priv($dir)
    {
        @mkdir($dir, 0777, true);
        if (exec('whoami') == 'root') {
            chown($dir, 'nginx');
            chgrp($dir, 'nginx');
        }
    }

    /**
     * 读取指定行数的日志文件内容(从文件末尾向前读)
     *
     * @param string $fileName
     *            文件完整路径
     * @param int $startLine
     *            开始行数
     * @param int $endLine
     *            结束行数
     * @return array
     */
    public function getLogContent($fileName, $startLine, $endLine)
    {
        try {
            $common = new Common();
            $ret = $common->getFileLines($fileName, $startLine, $endLine, true);
            foreach ($ret as $k => $v) {
                $v = str_replace(array('\r\n', '\r', '\n'), "<br>", $v);
                if (empty($v)) {
                    unset($ret[$k]);
                } else {
                    $ret[$k] = $v;
                }
            }
            return $ret;
        } catch (\Exception $e) {
            throw $e;
        }
    }
    /**
     * 记录错误日志
     * @param $msg
     */
    public function logError($msg)
    {
        $this->addInfo($msg,'http_error.log');
    }

}
