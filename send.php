<?php
header('content-type: text/html; charset=utf-8');

$username = $_POST["username"];
$userTel = $_POST["userTel"];
$msgContent = $_POST["msgContent"];
echo $username, $userTel, $msgContent;


    //下面的代码用于获得当前日期和时间
date_default_timezone_set('PRC');
$addtime = date("Y-m-d H:i:s");//得到日期

    //PHP连接数据库
$link = mysqli_connect("localhost", "root", "root") or die("数据库连接错误");
   

    //选择数据库
mysqli_select_db($link, "shengyun");
$insert = "insert into message(author,tel,content,addtime) values('$username','$userTel','$msgContent','$addtime')";
mysqli_query($link, $insert);
mysqli_close($link);
echo "<script language=javascript>alert('留言成功!');window.location.href='dist/about.html';</script>"

?>