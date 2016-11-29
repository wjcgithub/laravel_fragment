# laravel 邮件队列

## laravel　队列配置
http://laravelacademy.org/post/6125.html

## laravel 邮件配置
http://laravelacademy.org/post/1986.html

## ．env配置
- APP_ENV=local
- APP_DEBUG=true
- APP_KEY=WXXCxREmmoAzwzJz8XTXHpZsg2r5XTsg

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_DATABASE=laravel_study
- DB_USERNAME=laravel
- DB_PASSWORD=123456

- CACHE_DRIVER=file
- SESSION_DRIVER=file
- QUEUE_DRIVER=beanstalkd

- REDIS_HOST=127.0.0.1
- REDIS_PASSWORD=null
- REDIS_PORT=6379

- MAIL_DRIVER=smtp
- MAIL_HOST=smtp.sina.com.cn
- MAIL_PORT=25
- MAIL_USERNAME=wjc163@sina.cn
- MAIL_PASSWORD=
- MAIL_ENCRYPTION=null
- MAIL_PRETEND=1
- MAIL_ADDRESS=wjc163@sina.cn

- APP_LOG=daily

## supervisor配置
```powershell
[program:queue-emails]
process_name=%(program_name)s_%(process_num)02d
command=php /home/wwwroot/laravel/my_laravel_test/artisan queue:work --queue=emails --sleep=3 --tries=3 --daemon beanstalkd
autostart=true
autorestart=true
user=www
numprocs=1
redirect_stderr=true
stdout_logfile=/home/wwwlogs/my_laravel_test/worker-emails.log


[program:queue-high]
process_name=%(program_name)s_%(process_num)02d
command=php /home/wwwroot/laravel/my_laravel_test/artisan queue:work --queue=queue-high --sleep=3 --tries=3 --daemon beanstalkd
autostart=true
autorestart=true
user=www
numprocs=1
redirect_stderr=true
stdout_logfile=/home/wwwlogs/my_laravel_test/worker-queue-high.log
```

### 使用supervisor

#### 写好配置文件执行下面的命令开启消费者
- sudo supervisorctl reread
- sudo supervisorctl update
- sudo supervisorctl start queue-emails:* queue-high:*
- sudo supervisorctl status 

#### 启动supervisor 服务
- `/etc/init.d/supervisor [start|stop|restart|status]`

## beanstalkd
- `/etc/init.d/beanstalkd [start|stop|restart|status]`

## queue:work 注意
- 如果更换队列驱动别忘了修改最后的参数
- `php artisan queue:work [options] [--] [<connection>]`

## 入队操作
- http://local.laravel.test.com/mail/send/queue/1

## 接下来
打算用d3js做一个基于beanstalkd的实时队列查看