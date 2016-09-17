<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>index</title>
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <style type="text/css">
        body{ font-family: 'Microsoft YaHei';}
        /*.panel-body{ padding: 0; }*/
    </style>
</head>
<body>
<div class="jumbotron">
    <div class="container">
        <h1>Laravel 为web艺术家设计</h1>
        <h3>——我就是玩不转form表单</h3>

    </div>
</div>
<div class="container">
    <div class="main">
        <div class="row">
            <!-- 左侧内容 -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="" class="list-group-item text-center active">学生列表</a>
                    <a href="" class="list-group-item text-center">新增学生</a>
                </div>
            </div>
            <!-- 右侧内容 -->
            <div class="col-md-9">
                <!-- 成功提示框 -->
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>成功！</strong> 操作成功提示
                </div>
                <!-- 失败提示框 -->
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>失败！</strong> 操作失败提示
                </div>
                <!-- 自定义内容 -->
                <div class="panel panel-default">
                    <div class="panel-heading">学生列表</div>
                    <div class="panel-body">
                        <table class="table table-striped table-responsive table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>姓名</th>
                                <th>年龄</th>
                                <th>性别</th>
                                <th width="120">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>1001</th>
                                <td>name1</td>
                                <td>18</td>
                                <td>20-男</td>
                                <td>
                                    <a href="">详情</a>
                                    <a href="">修改</a>
                                    <a href="">删除</a>
                                </td>
                            </tr>
                            <tr>
                                <th>1001</th>
                                <td>name1</td>
                                <td>18</td>
                                <td>20-男</td>
                                <td>
                                    <a href="">详情</a>
                                    <a href="">修改</a>
                                    <a href="">删除</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <nav>
                    <ul class="pagination pull-right">
                        <li  class="previous"><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- 尾部 -->
<div class="jumbotron" style=" margin-bottom:0;margin-top:105px;">
    <div class="container">
        <span>&copy; 2016 Saitmob</span>
    </div>
</div>


<script src="static/js/jquery-3.1.0.min.js"></script>
<script src="static/js/bootstrap.min.js"></script>
</body>
</html>