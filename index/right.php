<?php
include_once "../lib/db.php";
$sql = "select * from goods";
$result = $mysql -> query($sql)->fetch_all(MYSQLI_ASSOC);
//var_dump($result);
//exit();
include_once "../template/index/right.html";