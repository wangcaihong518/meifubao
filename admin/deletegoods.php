<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 20:14
 */
include_once 'checklogin.php';
//连接数据库mysql
include_once "../lib/db.php";
//删除的时候只需要判断一下它gid是否有子栏目，如果有子栏目则不能被删，如果没有子栏目cid则可以被删除

$gid = $_GET['gid'];

//找它的子栏目
$sql = "select * from goods where cid=$gid";

$result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

if(count($result)){
    $message = "该商品存在子商品";
    $url = "querygoods.php";
    $type = "danger";
}else {
//    不存在子栏目则可以执行删除操作
    $sql = "delete from goods where gid=$gid";
    $mysql -> query($sql);
    if($mysql -> affected_rows ==1){
        $message = "删除商品成功";
        $url = "querygoods.php";
        $type = "success";
    }else {
        $message = "删除商品失败";
        $url = "querygoods.php";
        $type = "danger";
    }

}
include_once "notice.html";

