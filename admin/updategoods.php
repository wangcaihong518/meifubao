<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 19:14
 */
include_once 'checklogin.php';

//连接数据库
include_once "../lib/db.php";

//获取下拉框
include_once "../lib/function.php";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
//    更新的是哪一条，更新时需要接收gid
    $gid = $_GET['gid'];


    $result = $mysql -> query("select * from goods where gid=$gid")->fetch_assoc();

    $obj = new Menu();
    $str = $obj -> getCate($mysql,'category',0,0);

    include_once "../template/admin/updategoods.html";
}else if($_SERVER['REQUEST_METHOD'] =='POST'){
//    var_dump($_POST);
    $arr = $_POST;

    $gid = $arr['gid'];

    $sql = "update goods set ";
    foreach($arr as $keys=>$values){
        $sql .= "$keys='$values', ";
    }
    $sql = substr($sql,0,-1)." where gid=$gid";
    echo $sql;
    exit();
    $mysql -> query($sql);
    if($mysql -> affected_rows ==1){
        $message = "栏目修改成功";
        $url = "querygoods.php";
        $type = "success";
    }else {
        $message ="栏目修改失败";
        $url = "updategoods.php?gid=$gid";
        $type = "danger";
    }
    include_once "notice.html";

}
