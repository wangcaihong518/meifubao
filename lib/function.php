<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/15
 * Time: 15:17
 */

//公共方法

//获取几级栏目：数据库$mysql，表$tablename，几级栏目$parentid,标识几级栏目$flag

//用class方式声明一个类
class Menu {
    public $str;
//    类中的construct方法
    function __construct(){

       $this->str ='';
    }
//    类中的方法
    function getCate($mysql,$tablename,$parentid,$flag,$currentid=null){

        $pid = null;
        if($currentid){
            $arr = $mysql->query("select * from category where cid=$currentid")->fetch_assoc();
            $pid = $arr["pid"];
        }


        $sql = "select * from $tablename where pid = $parentid";
        $result = $mysql->query($sql);
        $flag++;
        while($row = $result->fetch_assoc()){
//            重复$flag次
            $str = str_repeat('-',$flag);

            if($row['cid'] == $pid){
                $this->str .= "<option selected value={$row['cid']}>{$str}{$row['title']}</option>";
            }else {
                $this->str .= "<option value={$row['cid']}>{$str}{$row['title']}</option>";
            }

            $this->getCate($mysql,$tablename,$row['cid'],$flag);
        }
        return $this->str;
    }
}
