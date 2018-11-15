<?php
include_once "../lib/db.php";
include_once "header.php";

//获取商品的pid
$gid = $_GET['gid'];
$cid = $_GET['cid'];
$sql = "select * from goods where gid=$gid";
$result = $mysql -> query($sql) -> fetch_assoc();

//上一篇下一篇:相同栏目，下一篇的gid要大的第一个，上一篇是的gid要小的最后一个
//下一篇
$next = "select * from goods where cid=$cid and gid>$gid order by gid asc limit 0,1";
$nextres = $mysql -> query($next) ->fetch_assoc();
$string = "";
if($nextres){
    $string = "<a href='info.php?cid=$cid&gid={$nextres['gid']}' class='active'>{$nextres['title']}</a>";
}else {
    $string = "<a href='javascript:void(0)'>没有了</a>";
}
//上一篇
$previous = "select * from goods where cid=$cid and gid<$gid order by gid desc limit 0,1";
$previousres = $mysql -> query($previous) -> fetch_assoc();
$string1 = "";
if($previous){
    $string1 = "<a href='info.php?cid=$cid&gid={$previousres['gid']}' class='active'>{$previousres['title']}</a>";
}else {
    $string1 = "<a href='javascript:void(0)'>没有了</a>";
}



include_once "../template/index/info.html";
