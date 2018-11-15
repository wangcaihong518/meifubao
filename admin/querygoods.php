<?php
include_once 'checklogin.php';
include_once '../lib/db.php';

include_once "../lib/page.php";
include_once "header.php";


//一页显示几条数据
$num = 2;

$pages = new Page($mysql,$num);
//执行函数获取所有页数
$size = $pages -> allpage();

//页面查询时默认是没有页码的，如果当前查询页没有页码则要给它一个默认值
//    页码数
$pagenum = isset($_GET['pagenum'])?$_GET['pagenum']:1;
//一页显示几条数据
$result = $pages -> getdata($pagenum);

//多表查询
//$sql = "select goods.*,category.title as cname from goods,category where goods.cid=category.cid";
//$sql = "select * from goods";
//$result = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);

include_once '../template/admin/querygoods.html';