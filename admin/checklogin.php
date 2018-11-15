<?php

//判断session
session_start();
if(!isset($_SESSION['islogin'])){
    $message = "请登录";
    $url = "login.php";
    $type = "danger";
    include_once "notice.html";
    exit();
}