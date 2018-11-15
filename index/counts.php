<?php

include_once "../lib/db.php";

$gid = $_GET['gid'];
$all = "select * from goods where gid=$gid";
$allmsg = $mysql -> query($all) -> fetch_all(MYSQLI_ASSOC);

$count = $_GET['count'];
$sql = "update goods set count=$count where gid=$gid";
$result = $mysql -> query($sql);

if($mysql -> affected_rows == 1){
    echo 'yes';
}else {
    echo 'no';
}