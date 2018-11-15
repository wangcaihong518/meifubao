<?php
include_once 'checklogin.php';
include_once '../lib/db.php';
include_once "header.php";


$sql = "select * from category";

$result = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);



include_once '../template/admin/category.html';