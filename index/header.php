<?php

//获取头部数据
include_once "../lib/db.php";
$sql = "select * from category";
$cate = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
//头部的页面
$sql = "select * from aboutus";
$aboutus = $mysql -> query($sql) -> fetch_assoc();

include_once "../template/index/header.html";
