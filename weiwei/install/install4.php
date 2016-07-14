<?php
header('content-type:text/html;charset=utf8');
define('IA_DIR', str_replace("\\",'/', __DIR__.'/../'));
        $dbhost=$_POST['dbhost'];
        $dbport=$_POST['dbport'];
        $dbname=$_POST['dbname'];
        $dbpwd=$_POST['dbpwd'];
        $dbnames=$_POST['dbnames'];
        $username=$_POST['username'];
        $password=MD5($_POST['password']);

$link = mysql_connect($dbhost, $dbname, $dbpwd);
if(empty($link)) {
    echo "<script>alert('请检查输入数据');location.href='install3.php'</script>";
} else {
    $select = mysql_select_db("$dbnames", $link);
    if($select){
        $sql="drop database ".$dbnames;
        mysql_query($sql);
    }
    $sql="create database ".$dbnames;
    mysql_query($sql);
  }
if(file_exists(IA_DIR . 'install/install.sql')){
    $file = file_get_contents(IA_DIR. '/install/install.sql');

    $arr=explode('-- ----------------------------',$file);
    $select = mysql_select_db("$dbnames", $link);
    for($i=0;$i<count($arr);$i++){
        if($i%2==0){
            $a=explode(";",trim($arr[$i]));
            array_pop($a);
            foreach($a as $v){
                mysql_query($v);
            }
        }
    }

}else{
    die('<script type="text/javascript">alert("安装包不正确, sql脚本缺失.");history.back();</script>');
}

$str="<?php
					return [
						'class' => 'yii\db\Connection',
						'dsn' => 'mysql:host=".$dbhost.";prot=".$dbport.";dbname=".$dbnames."',
						'username' => '".$dbname."',
						'password' => '".$dbpwd."',
						'charset' => 'utf8',
                 ];";
file_put_contents('../config/db.php',$str);

$sql="insert into user (username,password) VALUES ('$username','$password')";
mysql_query($sql);

unlink(IA_DIR. '/install/install.lock');
?>


<!DOCTYPE html>
<html lang="zh-cn"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>安装系统 - 微擎 - 公众平台自助开源引擎</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        html,body{font-size:13px;font-family:"Microsoft YaHei UI", "微软雅黑", "宋体";}
        .pager li.previous a{margin-right:10px;}
        .header a{color:#FFF;}
        .header a:hover{color:#428bca;}
        .footer{padding:10px;}
        .footer a,.footer{color:#eee;font-size:14px;line-height:25px;}
    </style>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color:#28b0e4;">
<div class="container">
    <div class="header" style="margin:15px auto;">
        <ul class="nav nav-pills pull-right" role="tablist">
            <li role="presentation" class="active"><a href="javascript:;">安装微擎系统</a></li>
            <li role="presentation"><a href="http://www.we7.cc/">微擎官网</a></li>
            <li role="presentation"><a href="http://bbs.we7.cc/">访问论坛</a></li>
        </ul>
        <img src="install.php">
    </div>
    <div class="row well" style="margin:auto 0;">
        <div class="col-xs-3">
            <div class="progress" title="安装进度">
                <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                    100%
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    安装步骤
                </div>
                <ul class="list-group">
                    <a href="javascript:;" class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-copyright-mark"></span> &nbsp; 许可协议</a>
                    <a href="javascript:;" class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; 环境监测</a>
                    <a href="javascript:;" class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-cog"></span> &nbsp; 参数配置</a>
                    <a href="javascript:;" class="list-group-item list-group-item-info"><span class="glyphicon glyphicon-ok"></span> &nbsp; 成功</a>
                </ul>
            </div>
        </div>
        <div class="col-xs-9">
            <div class="page-header"><h3>安装完成</h3></div>
            <div class="alert alert-success">
                恭喜您!已成功安装“微擎 - 公众平台自助开源引擎”系统，您现在可以: <a target="_blank" class="btn btn-success" href="../web/index.php">访问网站首页</a>
            </div>
        </div>
    </div>
    <div class="footer" style="margin:15px auto;">
        <div class="text-center">
            <a href="http://www.we7.cc/">关于微擎</a> &nbsp; &nbsp; <a href="http://bbs.we7.cc/">微擎帮助</a> &nbsp; &nbsp; <a href="http://www.we7.cc/">购买授权</a>
        </div>
        <div class="text-center">
            Powered by <a href="http://www.we7.cc/"><b>微擎</b></a> v0.7 © 2014 <a href="http://www.we7.cc/">www.we7.cc</a>
        </div>
    </div>
</div>
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>

</body></html>