<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title>后台首页|保定盛雲知识产权代理有限公司</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="email=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="author" content="924415666@qq.com">
    <link rel="icon" href="../../images/favicon.ico">
    <meta name="renderer" content="webkit">
    <meta name="Description"
          content="保定盛雲知识产权代理有限公司是目前国内专业性最强的知识产权顾问咨询公司之一。公司成立以来，本着“专业，诚信，和谐”的公司宗旨,主要以商标驳回复审,商标异议答辩,专利检索分析,全方位为个人、企业提供海内外专利申请，商标注册，专利与商标的纠纷。"/>
    <meta name="Keywords" content="商标注册,商标驳回复审,商标异议答辩,专利申请,专利检索分析,版权登记,高新认定"/>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <!--<link rel="stylesheet/less" href="less/layout.less">-->
    <link rel="stylesheet" href="../../css/common.css">
    <link rel="stylesheet" href="../../css/layout.css">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
    <style>
        html, body {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
<!--[if lte IE 8]>
<div class="point">
    <p style="text-align: center;font-size: 30px">
        您正在使用一个<strong>过时</strong>的浏览器。请
        <a href="http://browsehappy.com/" target="_blank">升级您的浏览器</a>，
        以提高您的体验。
    </p>
</div>
<![endif]-->
<?php
header("Content-Type:text/html;charset=utf-8");
session_start();
if (!$_SESSION['isLogin']) {
    header('location: ../login.html');
    exit;
}
//获得系统当前日期和时间
date_default_timezone_set('PRC');
$time = date("Y-m-d H:i:s");

echo '<div class="welcome container">
    <div class="row">
        <h2 class="h2 text-center">欢迎回来,' . $_SESSION["username"] . '<a class="btn btn-info pull-left" href="../index.html" target="_blank">返回前端</a></h2>
    </div>    
   <div class="row">      
      <div class="list-group col-xs-2">
          <a class="list-group-item active" href="../editor.html" target="_blank">文章管理</a>
          <a class="list-group-item" href="messageList.php">留言管理</a>
      </div>
      <div class="col-md-10 text-center" style="height: 600px;line-height: 600px">
            ٩(๑>◡<๑)۶ 持续开发中ing...
      </div>
   </div>
</div>'
?>

<script src="../../js/jquery-1.11.3.min.js"></script>
<script src="../../js/bootstrap.js"></script>
</body>
</html>