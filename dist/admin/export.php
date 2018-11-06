<?php
$filename="info.xls";//先定义一个excel文件
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");
//我们先在excel输出表头，当然这不是必须的
echo iconv("utf-8", "gb2312", "id")."\t";
echo iconv("utf-8", "gb2312", "姓名")."\t";
echo iconv("utf-8", "gb2312", "手机号")."\t";
echo iconv("utf-8", "gb2312", "留言内容")."\t";
echo iconv("utf-8", "gb2312", "留言时间")."\n";//注意这个要换行

//这里我们连接数据库
include('link.php');

//mysqli_query('set names utf8');//需要加这句，不知道为什么，不然导出的中文乱码，大家在使用的时候，如果utf8乱码，就改为GBK，反正也可以
$sql="select * from message";
$result=mysqli_query($link,$sql); //查询的表条件

while($row =mysqli_fetch_array($result)){
    echo iconv("utf-8", "gb2312", $row['id'])."\t";
    echo iconv("utf-8", "gb2312", $row['author'])."\t";
    echo iconv("utf-8", "gb2312", $row['tel'])."\t";
    echo iconv("utf-8", "gb2312", $row['content'])."\t";
    echo iconv("utf-8", "gb2312", $row['addtime'])."\n  ";//注意这个要换行
}
?>
