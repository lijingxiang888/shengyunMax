<?php

//PHP连接数据库
$link = mysqli_connect("localhost", "root", "root") or die("数据库连接错误");

//选择数据库
mysqli_select_db($link, "shengyun") or die("数据库访问错误".mysqli_error());
?>