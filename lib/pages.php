<?php

//用于商品显示几页，一页显示几个数据
class Page{
//    一页显示的数量
    public $size;
//    用于接收句柄
    public $mysql;
//    一共的页数
    public $pages;
//    哪个栏目
    public $cid;
    function __construct($mysql,$size,$cid)
    {
//    初始让每页显示的数据个数等于传入的值

        $this -> mysql = $mysql;
        $this -> size =$size;
        $this -> pages = 0;
        $this -> cid = $cid;
    }

//    一共有几页：总数据数/一页显示几条
    function allpage(){
//        查询一共有几页
//        获取到的是一个总数
        $sql = "select count(*) as num from goods where cid =$this->cid";
//        转为一条fetch_assoc()
        $result = $this -> mysql -> query($sql) -> fetch_assoc();

        $total = $result['num'];

        $this -> pages = ceil($total/$this -> size);

        return $this -> pages;

    }
//    每一页显示的数据
    function getdata($pages){
//        每一页显示的数据limit 偏移量（会变）  长度（不变）
//        $offset 为每一页的偏移量
        $offset = ($pages - 1)* $this -> size;
//        长度
        $len = $this -> size;
        $sql = "select goods.*,category.title as cname from goods,category where goods.cid=category.cid and goods.cid=$this->cid order by gid asc limit $offset,$len";
        $result = $this -> mysql -> query($sql) -> fetch_all(MYSQLI_ASSOC);
        return $result;

    }
}
