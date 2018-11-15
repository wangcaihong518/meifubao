<?php
include_once 'checklogin.php';
    include_once './header.php';
$username = $_SESSION['username'];
//后台入口展示后台页面
include_once '../template/admin/index.html';