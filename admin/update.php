<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/15
 * Time: 15:01
 */
include_once 'checklogin.php';
include_once "../lib/db.php";
include_once "../lib/function.php";
//打开页面
if($_SERVER['REQUEST_METHOD'] == 'GET'){

   $cid = $_GET['cid'];

   $result = $mysql->query("select * from category where cid=$cid")->fetch_assoc();

   $obj = new Menu();
   $str = $obj->getCate($mysql,'category',0,0,$cid);

    require "../template/admin/update.html";

//    进行修改
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
//    var_dump($_POST);
    $arr = $_POST;

    $cid = $arr["cid"];
//    array_pop($arr);

    $sql = "update category set ";

    foreach($arr as $key=>$value){
        $sql .= "$key='$value',";

    }
    $sql = substr($sql,0,-1)." where cid =$cid";
//    echo $sql;
//    exit();
    $mysql -> query($sql);

    if($mysql -> affected_rows ==1){
        $message = "栏目修改成功";
        $url = "querycategory.php";
        $type = "success";
    }else {
        $message ="栏目修改失败";
        $url = "update.php?cid=$cid";
        $type = "danger";
    }
    include_once "notice.html";



}

