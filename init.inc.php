<?php
define("PROJECT_ROOT", __DIR__);
$file = PROJECT_ROOT.'/../framework/lib/';
require PROJECT_ROOT . '/../framework/common/common.php';

//加载配置
$globalConfig = require PROJECT_ROOT . '/config/config.inc.php';
foreach ($globalConfig as $key=>$value){
    C($key, $value);
}

//自动加载函数
spl_autoload_register(
function ($class) {
    $clazz = str_replace("_", "/", $class);
    if(strncmp($class, "YC_", 3) === 0) {
        require PROJECT_ROOT . '/lib/' . $clazz . '.php';
    } else{
        $file = PROJECT_ROOT.'/../framework/lib/'.$class.'.php';
        if(file_exists($file)){
            require $file;
        }
    }
}
);
