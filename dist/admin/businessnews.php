<?php
header('content-type: application/json;charset=utf-8');

//包含连接数据库文件
include('link.php');

function json($code, $message = "", $data = array())
{
    $result = array(
        "code" => $code,
        "message" => $message,
        "data" => $data
    );
    echo json_encode($result);
    exit;
}

$q = "select * from businessnews order by addtime desc limit 5";
$result = mysqli_query($link, $q);
$dataarr = array();
while ($row = mysqli_fetch_assoc($result)) {
    $dataarr[] = $row;
}
mysqli_close($link);
echo json(1, "数据返回成功", $dataarr);
?>