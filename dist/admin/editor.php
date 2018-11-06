<?php
header('content-type: application/json;charset=utf-8');
error_reporting(E_ALL ^ E_NOTICE); //屏蔽页面显示的警告信息
session_start();
if (!$_SESSION['isLogin']) {
    $result = array(
        'code' => 0,
        'message' => '您还未登录，文章发布失败',
    );
    echo json_encode($result);
    exit;
}

$title = $_POST["title"];
$des = $_POST["des"];
$content = $_POST["content"];
//获得当前日期和时间
date_default_timezone_set('PRC');
$addtime = date("Y-m-d H:i:s");

//包含连接数据库文件
include('link.php');

if ($title && $des && $content){
    //插入数据
    $insert = "insert into businessnews(title,des,addtime,content) values('$title','$des','$addtime','$content')";
    mysqli_query($link, $insert);
    mysqli_close($link);
    $result = array(
        'code' => 1,
        'message' => '文章发布成功',
    );
    echo json_encode($result);
}else {
    $result = array(
        'code' => 0,
        'message' => '文章信息没有填写完整',
    );
    echo json_encode($result);
}
?>