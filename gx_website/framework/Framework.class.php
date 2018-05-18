<?php
class Framework{
    /**
     * 加载类的时候调用
     */
    public function run(){
        
        $this->Parameter();#三个重要参数
        $this->getDefine();#常量路径
        $this->loadConfig();#调用配置文件 
        //初始化错误处理的配置
        $this->initErrorhandler();
        spl_autoload_register(array('Framework','__autoload'));#自动加载方法
        $this->getRequest();#请求分发器
    }
    /**
     * 错误处理
     */
    public function initErrorhandler(){
        #开发环境
        if('dev' == $GLOBALS['config']['app']['run_mode']){
            ini_set('error_reporting',E_ALL | E_STRICT);
            ini_set('display_error',1);//开启错误显示(报告)
            ini_set('log_errors',0);//关闭错误日志
        }elseif('pro' == $GLOBALS['config']['app']['run_mode']){   
            #生产环境
            ini_set('display_errors',0);//关闭错误显示
            ini_set('error_log',APP_DIR.'error.log');
            ini_set('log_errors',1);//开启错误日志
        }
    }   
    /**
     * 
     * 获得参数p、c、a
     */
    public function Parameter(){
        define('PLATFORM',isset($_GET['p'])?$_GET['p']:'font');//确定平台
        define('CONTROLLER',isset($_GET['c'])?$_GET['c']:'Index');#确定控制器
        define('ACTION',isset($_GET['a'])?$_GET['a']:'list');//确定方法
    }
    /**
     * 定义常量路径
     */
    public function getDefine(){
        define('DS',DIRECTORY_SEPARATOR);//目录分隔符
        define('ROOT_DIR',dirname(dirname(__FILE__)).DS);//当前文件的路径
        define('APP_DIR',ROOT_DIR.'app'.DS);//app目录
        define('CON_DIR',APP_DIR.'controller'.DS);//控制器
        #define('CON_ADMIN_DIR',CON_DIR.'admin'.DS);
        define('CON_LEVEL_DIR',CON_DIR.PLATFORM.DS);
        define('MODEL_DIR',APP_DIR.'model'.DS);//模型
        define('VIEW_DIR',APP_DIR.'view'.DS);//视图
        #define('VIEW_ADMIN_DIR',VIEW_DIR.'admin'.DS);
        define('VIEW_LEVEL_DIR',VIEW_DIR.PLATFORM.DS);
        define('FRAME_DIR',ROOT_DIR.'framework'.DS);#基础类
        define('CONFIG_DIR',APP_DIR.'config'.DS);#配置文件目录
        define('TOOLS_DIR',FRAME_DIR.'Tools'.DS);#工具文件目录
        define('UPLOADED_DIR',APP_DIR.'uploaded'.DS);#上传文件的路径
    }
    /**
     * 请求分发器
     */
    public function getRequest(){
        $controller_name = CONTROLLER.'Controller';
        $controller_value = new $controller_name;//实例化类
        $action_name = ACTION.'Action';
        $controller_value->$action_name();//调用类方法
    }
    /**
     * 自动加载
     * @param $class_name 类名
     */
    public function __autoload($class_name){
        $arr = array(
            'MySQLDB' => FRAME_DIR.'MySQLDB.class.php',
            'Model' => FRAME_DIR.'Model.class.php',
            'Controller' => FRAME_DIR.'Controller.class.php',
            'Framework' => FRAME_DIR.'Framework.class.php'
        );
        if(isset($arr[$class_name])){//判断数组变量是否存在
            require $arr[$class_name];#加载特例文件
        }elseif(substr($class_name,-10) == 'Controller'){
            require CON_LEVEL_DIR.$class_name.'.class.php';#加载控制器文件
        }elseif(substr($class_name,-5) == 'Model'){
            require MODEL_DIR.$class_name.'.class.php';#加载模型文件
        }elseif(substr($class_name,-5) == 'Tools'){
            require TOOLS_DIR.$class_name.'.class.php';#加载工具类文件
        }
    }
    /**
     * 配置文件
     */
    public function loadConfig(){
        $GLOBALS['config'] = require CONFIG_DIR.'app.config.php';
    }
}