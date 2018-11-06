<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title>留言列表|保定盛雲知识产权代理有限公司</title>
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
<div class=" msgList container">
    <a class="btn btn-success pull-left" href="welcome.php">返回首页</a>
    <a class="btn btn-primary pull-right" href="export.php" target="_blank">导出留言</a>
    <table class="table table-hover table-responsive text-center">
        <caption class="text-center h2">客户留言列表</caption>
        <thead>
        <tr>
            <th class="text-center">姓名</th>
            <th class="text-center">TEL</th>
            <th class="text-center">留言</th>
            <th class="text-center">时间</th>
            <th class="text-center">操作</th>
        </tr>
        </thead>
        <tbody>

        <?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        if (!$_SESSION['isLogin']) {
            header('location: ../login.html');
            exit;
        }

        include('link.php');

        $q = "select * from message order by addtime desc"; //根据添加时间设置倒叙查询语句
        $result = mysqli_query($link, $q); //执行查询语句

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["author"] . "</td><td>" . $row["tel"] . "</td><td>" . $row["content"] . "</td><td>" . $row["addtime"] . "</td><td><a class='btn btn-danger remove' href='javascript:;' data-id=".$row["id"].">删除</a></td></tr>";
        }
        mysqli_close($link);
        ?>
        </tbody>
    </table>
</div>

<script src="../../js/jquery-1.11.3.min.js"></script>
<script src="../../js/bootstrap.js"></script>
<script>
    $(function () {
        $('.remove').click(function () {
            
            if (confirm('确认删除吗？')){
                $(this).attr('data-id');
                $.ajax({
                    url: 'message.php?id=' + $(this).attr('data-id'),
                    type: 'GET',
                    dataType: 'json',
                    success :function (result) {
                        window.location.href = window.location.href;
                    },
                    error: function () {
                        alert('发生未知错误，删除失败！')
                    }
                })
            }
        })
    })
</script>
</body>
</html>