<?php
require dirname(dirname(__FILE__)).'/system/Base.php';
//加载核心配置
$base = Base::init();
if(WSP_SEC_KEY == '{WSP_SEC_KEY}'){
	$base->createWebApplication('install');
}
else{
	$url = SYSTEM_HOST;
	header("Location:$url");
	exit;
}