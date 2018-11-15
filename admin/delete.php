<?php

include_once 'checklogin.php';
include_once "../lib/db.php";


//删除前先判断一下是否有子栏目，如果有子栏目则不能删除，没有子栏目才可删除

//    删除时需要获取cid
    $cid = $_GET['cid'];
    $sql = "select * from category where pid = $cid";
    $result = $mysql -> query($sql)->fetch_all(MYSQLI_ASSOC);

    if(count($result)){
        $message = "当前栏目存在子栏目";
        $url = "querycategory.php";
        $type = "danger";
    }else {
        $sql = "delete from category where cid=$cid";


        $mysql -> query($sql);


        if($mysql -> affected_rows == 1){

            $message = "删除栏目成功";

            $url = "querycategory.php";

            $type = "success";

        }else {

            $message = "删除栏目失败";

            $url = "insert.php";

            $type = "danger";

        }

    }
include_once "notice.html";







