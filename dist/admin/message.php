<?php
header('content-type: application/json;charset=utf-8');
error_reporting(E_ALL ^ E_NOTICE); //屏蔽页面显示的警告信息
$author = $_POST["author"];
$tel = (int)$_POST["tel"];
$content = $_POST["content"];
$id = $_GET["id"];
//获得当前日期和时间
date_default_timezone_set('PRC');
$addtime = date("Y-m-d H:i:s");

//包含连接数据库文件
include('link.php');

if ($author && $tel && $content) {
//插入数据
    $insert = "insert into message(author,tel,content,addtime) values('$author','$tel','$content','$addtime')";
    mysqli_query($link, $insert);
    mysqli_close($link);

    $result = array(
        'code' => 1,
        'message' => '留言提交成功',
    );
    echo json_encode($result);
};
if ($id) {
    session_start();

    if (!$_SESSION['isLogin']){

        exit('您还未登录，不能删除该留言');
    }
    $d = "delete from message where id = ".$id."";
    mysqli_query($link,$d);
    mysqli_close($link);
    $result = array(
        "code" => 1,
        "message" => "删除留言成功",
    );
    echo json_encode($result);
}
?>