<?php
include_once 'checklogin.php';
include_once "../lib/db.php";
include_once "../lib/function.php";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    //打开页面
    $obj = new Menu();
    $str = $obj -> getCate($mysql,'category',0,0);

//    $sql = "select * from category";
//    $result = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    include_once '../template/admin/insertcategory.html';
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //提交
//    var_dump($_POST);得到一个数组

//    sql语句

    $sql = "insert into category (";

//    获取属性

    $keys = array_keys($_POST);

    for($i = 0;$i<count($keys);$i++){
        $sql .= $keys[$i] . ',';
    }
//    去掉最后一个逗号，且加上一个括号
        $sql = substr($sql,0,-1) . ') values(';

//    遍历关联数组
    foreach($_POST as $value){
        $sql .= "'$value',";
    };
//    去最后一个逗号，加上括号
         $sql = substr($sql,0,-1)  . ');';
//        echo $sql;
//        exit();

    $mysql -> query($sql);

    if($mysql -> affected_rows == 1){
        $message = "栏目插入成功";
        $url = "querycategory.php";
        $type ="success";

    }else {
        $message = "栏目插入失败";
        $url = "insertcategory.php";
        $type ="danger";
    }
//    成功与否都会进入提示页面
    include_once "notice.html";


}