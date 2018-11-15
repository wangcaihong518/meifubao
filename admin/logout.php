<?php

//清空session
include_once 'checklogin.php';

session_destroy();
$message = "退出成功";
$url = "login.php";
$type = "success";
include_once "notice.html";