<?php
header('content-type: application/json;charset=utf-8');
include('link.php');

$id = intval($_GET["id"]);
$type = $_GET["type"];
$q = "select * from $type where id = $id";
$result = mysqli_query($link, $q);
$row = mysqli_fetch_assoc($result); //mysqli_fetch_assoc得到的数据是一个对象，如果是操作一条数据，不用处理成数组形式了，如果是操作多条数据，那需要放在一个数组里
//多条数据放在一个数组里方法：
//$q = "select * from businessnews order by addtime desc limit 5";
//$result = mysqli_query($link, $q);
//$dataarr = array();
//while ($row = mysqli_fetch_assoc($result)) {
//    $dataarr[] = $row;
//}
$result = array(
    "code" => 1,
    "message" => "success",
    "data" => $row
);
//返回json数据，此时已经是一个json字符串，看前端浏览器是否支持默认转换为对象，如若不支持前端还需转换为JSON对象
echo json_encode($result);
mysqli_close($link);
?>

