<?php
/**
 * 奥点云框架微频道配置文件
 *
 * @author phenixsoul(329580886@qq.com)
 * @link http://www.aodianyun.com
 * @copyright 2008-2015 aodiansoft
 */
return array(
	'moduleName' => 'install',
	'defaultAction' => 'install/step1',
	'controllerDir' => __BASE__ . '/install/controllers/',
	'template' => array(
		'template_dir'  => __BASE__ . '/themes/tpl/wsp/',
		'cache_dir'	=> __BASE__ . '/themes/compile/wsp/',
		'cache_lifetime'=> 1,
		'debug'		=> false
	)
);