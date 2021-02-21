<?php

$ip = '';
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
// change the following paths if necessary
$yii=dirname(__FILE__).'/../../yii-1.1.16/framework/yii.php';
$config=dirname(__FILE__).'/../../yii-1.1.16/protected/config/main.php';

// remove the following lines when in production mode
if(($ip == '217.64.18.253')){
defined('YII_DEBUG') or define('YII_DEBUG',true);
}else{
defined('YII_DEBUG') or define('YII_DEBUG', false);
}
//defined('YII_DEBUG') or define('YII_DEBUG',false);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
