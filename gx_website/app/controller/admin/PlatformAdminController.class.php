<?php
class PlatformAdminController extends Controller{
    //后台公共平台类
    /**
     * 构造方法
     */
    public function __construct(){
        //调用session工具类
        $this->session();
        //调用方法
        $this->entryJuge();
    }

    /**
     * 实例化session
     */
    public function session(){
        return new SessionTools();
    }

    /**
     * 判断后台文件是否都登录了
     */
    public function entryJuge(){
        if(CONTROLLER == "Admin" && (ACTION == "login" || ACTION == "validata" || ACTION == "captcha" || ACTION == "ajaxcapt")){
            //不需要进行session验证
        }else{
            @session_start();
            if($_SESSION['is_name']=="yes"){
                //
            }else{
                //没有session登录标记
                //判断是否存在合法的cookie值，利用模型验证是否合法
                $model_name = new AdminModel;
                if($model_name->checkCookie()){
                    //有合法的cookie，设置新的session值
                    @session_start();
                    $_SESSION['is_name'] = "yes";
                }else{
                    //没有合法cookie
                    $this->jump("index.php?p=admin&c=Admin&a=login",'请先登录',2);
                }
            }
        }
        
    }
}