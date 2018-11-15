<?php

include_once "../lib/db.php";

//$sql = "select * from goods";
//$goods = $mysql -> query($sql)->fetch_all(MYSQLI_ASSOC);

//首页
$sql = "select * from goods where pid=1";
$result = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);

$cate2= "select * from goods where cid=37";
$cat2 = $mysql -> query($cate2) -> fetch_all(MYSQLI_ASSOC);

$cate= "select * from goods where cid=1 order by cid asc limit 0,8";
$cat = $mysql -> query($cate) -> fetch_all(MYSQLI_ASSOC);

$cate1 = "select * from category";
$cat1 = $mysql -> query($cate1) -> fetch_all(MYSQLI_ASSOC);


//前台页面只需要展示页面，不需要判断它的接收方式
include_once "../template/index/index.html";




