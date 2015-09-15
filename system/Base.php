<?php
/**
 * 奥点云框架核心类
 *
 * @author phenixsoul(329580886@qq.com)
 * @link http://www.aodianyun.com
 * @copyright 2008-2015 aodiansoft
 */
define('__BASE__', dirname(dirname(__FILE__)));
define('SYSTEM_HOST', 'http://' . $_SERVER['HTTP_HOST'] . str_replace('/system/Base.php', '', str_replace(str_replace('\\', '/' , $_SERVER['DOCUMENT_ROOT']), '', str_replace('\\', '/' , __FILE__))));
define('CONFIG_PATH', __BASE__ . '/system/config');

class Base{

	private static $instance;

	private function __clone(){}

	private function __construct(){
		//自动加载类
        spl_autoload_register(array($this,'autoload'));
        //自定义错误处理
        set_exception_handler(array('CException','getStaticException'));
	}

	public static function init(){
		if(!self::$instance instanceof self){
            self::$instance = new self();
			//加载核心配置
			CConfig::init()->getConfig('system','base',false);
        }
        return self::$instance;
	}
	
	/**
	 * [createWebApplication 创建web应用]
	 */
	public function createWebApplication($module){
		if(empty($module)){
			throw new CException(Base::init()->getMessage('base','Module is null'));
		}
		$webApp = new CWebApplication($module);
		$webApp->run();
	}

	/**
	 * [api 数据模型]
	 */
	public function api($api, array $param = array()){
		if(empty($api)){
			throw new CException(Base::init()->getMessage('base','Api is null'));
		}
		return CApi::init()->run($api, $param);
	}

	/**
	 * [getMessage 系统消息]
	 */
	public function getMessage($type, $message, $params = array(), $language = ''){
		$language = $language === '' ? SYSTEM_LANGUAGE : $language;
		$m = require MESSAGE_PATH . '/' . $language . '.php';
		if(!isset($m[$message])){
			return $message;
		}
		if($params === array()){
			return $m[$message];
		}
		$message = $m[$message];
		foreach($params as $key=>$val){
			$message = str_replace($key, $val, $message);
		}
		return $message;
	}

	/**
	 * [autoload 自动加载文件]
	 */
	private static $classItem = array(
		'CApi'=>'/core/CApi.php',
		'CConfig'=>'/core/CConfig.php',
		'CController'=>'/core/CController.php',
		'CException'=>'/core/CException.php',
		'CHttpHeader'=>'/core/CHttpHeader.php',
		'CModel'=>'/core/CModel.php',
		'CRoute'=>'/core/CRoute.php',
		'CWebApplication'=>'/core/CWebApplication.php',
		'CTemplate'=>'/core/CTemplate.php',
		'MDb'=>'/model/MDb.php',
		'MCache'=>'/model/MCache.php',
		'MBridge'=>'/model/MBridge.php',
		'LWxjssdk'=>'/library/LWxjssdk.php',
	);
	private function autoload($name){
		if(empty(self::$classItem[$name])){
			return;
		}
		$path = __BASE__ . '/system' . self::$classItem[$name];
		if(file_exists($path)){
			require $path;
		}
	}

}