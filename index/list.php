<?php

include_once "../lib/db.php";
include_once "header.php";
include_once "../lib/pages.php";
//header('Content-type:text/html;charset:utf-8');

//获取所有的描述
$cid = $_GET['cid'];
$sql = "select * from category where cid=$cid";
$cate = $mysql -> query($sql)->fetch_assoc();


if($cate['module'] == 'list'){
//    分页
    $pages = new Page($mysql,3,$cid);
    $size = $pages -> allpage();
//    页码
    $pagenum = !isset($_GET['pagenum'])?1:$_GET['pagenum'];
    $goods = $pages -> getdata($pagenum);


}else if($cate['module'] == 'comment'){

}else if($cate['module'] == 'aboutus'){
    $sql = "select * from aboutus";
    $aboutus = $mysql -> query($sql) -> fetch_assoc();
}
include_once "../template/index/{$cate['tem']}";



//模板：列表  留言   文章
//列表：模板