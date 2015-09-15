<?php
require dirname(dirname(__FILE__)).'/system/Base.php';
$base = Base::init();

if(empty($_GET['loginData']) || empty($_GET['code']) || empty($_GET['state'])){
	$error = '参数错误，请重试！';
	include('wxLoginFail.php');
	exit;
}

$url = 'http://wx.aodianyun.com/openlogin/dmsLogin.php?code=' . $_GET['code'] . '&loginData=' . $_GET['loginData'] . '&state=' . $_GET['state'];
header('Location:'.$url);

?>