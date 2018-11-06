<?php
header('content-type: application/json;charset=utf-8');

$username = $_POST['username'];
$password = $_POST['userpass'];

//包含数据库连接文件
include('link.php');

//检测用户名及密码是否正确
$check_query = mysqli_query($link, "select * from admin where username = '$username' and userpass= '$password'");

if (mysqli_num_rows($check_query) == 1) { //0 false 1 true

    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['isLogin'] = true;

    $result = array(
        'code' => 1,
        'message' => $username . '登录成功',
    );
    echo json_encode($result);
    mysqli_close($link);
    exit;
} else {
    $result = array(
        'code' => 0,
        'message' => '登录失败，请检查用户名和密码是否正确',
    );
    echo json_encode($result);
    mysqli_close($link);
}
?>