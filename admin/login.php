<?php


//处理登陆
//①打开登陆页面，②验证登陆信息

//var_dump($_SERVER['REQUEST_METHOD']);
//通过请求方式：get时打开页面即引进文件，post时去验证
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    include_once '../template/admin/login.html';
}else {
// post方式接收进行验证
    //连接数据库
    $mysql = new mysqli('localhost','root','','cloth','3306');
//判断是否连接成功
    if($mysql -> connect_errno){
        echo '数据库连接失败，失败的原因是：'.$mysql -> connect_errno;
        exit();
    }
//设置字符集
    $mysql -> query('set names utf8');

//获取前台数据
    $username = $_POST['username'];
    $password = $_POST['password'];
//执行数据库语句  where 字段=‘’
    $sql = "select * from manage where username='$username'";
//将获取到的执行后转为数组
    $result = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
//$result返回的是一个二维数组，一维的是用户名，二维的是密码，


//管理员不存在,其长度为0
//管理员存在，但密码不匹配
//管理员存在，密码也匹配，成功

    if(!count($result)){
        $type = 'danger';
        $message = '用户名不存在';
        $url = 'login.php';
        include_once 'notice.html';
        exit();
    }

    for($i=0;$i<count($result);$i++){
//    判断它的密码，$result[$i]是用户名，$result[$i]['password']是密码
        if($result[$i]['password'] == $password){
            $type = 'info';
            $message = '登陆成功';
            $url = 'index.php';
//            将信息存储到session中，
//            开启session
            session_start();
////            设置判断字段
            $_SESSION['islogin'] = 'yes';
            $_SESSION['username'] = $username;
            include_once 'notice.html';
            exit();
        }

    }

    $type = 'danger';
    $message = '登陆失败';
    $url = 'login.php';
    include_once 'notice.html';


}
?>
