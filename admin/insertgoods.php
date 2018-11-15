<?php
include_once 'checklogin.php';
include_once "../lib/db.php";
include_once "../lib/function.php";
include_once "../lib/upload.php";
if($_SERVER['REQUEST_METHOD'] == 'GET'){
//    获取商品标题的下拉框
    $obj = new Menu();
    $str = $obj -> getCate($mysql,'category',0,0);

//    获取推荐位
    $sql = "select * from position";
    $result = $mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    include_once '../template/admin/insertgoods.html';
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
//    PDF和word格式会为empty


    if(count($_FILES) > 0){
        //    获取缩略图的路径通过调用函数
//    var_dump()
        $obj = new Upload();
        $file = $_FILES['thumb'];
//        var_dump($file);
//        exit();
        $thumb = $obj -> upload($file);

//    判断接收到的值是数字还是路径字符串


        if($thumb['code'] != 10){
            $message = $thumb['msg'];
            $url = "insertgoods.php";
            $type = "danger";
            include_once "notice.html";
        }else if($thumb['code'] == 10){
            $arr = $_POST;
//            获得路径msg
            $arr['thumb']=$thumb['msg'];
//            $cid = $arr['cid'];
//            var_dump($arr);
            //    得到所有的字段
            $keys = array_keys($arr);

            $sql = "insert into goods (";
            for($i = 0;$i < count($keys);$i++){
                $sql .= $keys[$i].',';
            }
            $sql = substr($sql,0,-1).') values(';

            foreach($arr as $v){
                $sql .= "'$v',";
            }
            $sql = substr($sql,0,-1).')';

            $mysql -> query($sql);
            if($mysql -> affected_rows == 1){
                $message = "商品插入成功";
                $url = "querygoods.php";
                $type = "success";
            }else {
                $message = "商品插入失败";
                $url = "insertgoods.php";
                $type = "danger";
            }

            include_once "notice.html";
        }
    }



}