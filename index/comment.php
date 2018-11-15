<?php

//插入留言
include_once "../lib/db.php";

$name = $_GET['name'];
$phone = $_GET['phone'];
$suggest = $_GET['suggest'];
$sql = "insert into comment (name,phone,suggest) values('{$name}','{$phone}','{$suggest}')";
$result = $mysql -> query($sql);
if($mysql -> affected_rows == 1){
    echo "success";
}else {
    echo "fail";
}