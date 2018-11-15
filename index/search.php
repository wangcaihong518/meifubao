<?php
include_once "header.php";
include_once "../lib/db.php";



$keywords = $_GET['keywords'];
$sql = "select * from goods where title like '%$keywords%'";
//var_dump($sql);
//exit();
$result = $mysql -> query($sql)->fetch_all(MYSQLI_ASSOC);


include_once "../template/index/search.html";

include_once "footer.php";