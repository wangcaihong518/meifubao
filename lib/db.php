<?php
//连接数据库
$mysql = new mysqli('localhost','root','','cloth','3306');
//测试数据库是否连接成功
if($mysql -> connect_errno){
    echo '数据库连接失败，失败的原因是：'.$mysql -> connect_errno;
    exit();
}
//设置字符集
$mysql -> query('set names utf8');