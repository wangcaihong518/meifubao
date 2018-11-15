<?php

include_once "../lib/db.php";

//页数
$pagenum = $_GET["pagenum"];

//echo $pagenum;
//exit();
//偏移量
$offset = ($pagenum-1)*3;
$sql = "select * from comment order by id desc limit $offset,3";
//var_dump($sql);
//exit();
$result = $mysql ->query($sql)->fetch_all(MYSQLI_ASSOC);

//得到的是一个数组，将数组转换为json
echo json_encode($result);


