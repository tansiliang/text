<?php
class IndexController extends PlatformAdminController{
    public function indexAction(){
        require VIEW_LEVEL_DIR.'index.html';
    }
    public function headerAction(){
        //加载当前管理员
        $id = $_GET['id'];//获取页面传递过来的id值
        $model_name = new IndexModel;
        $list = $model_name -> adminList($id);
        require VIEW_LEVEL_DIR.'header.html';
    }
    public function contentAction(){
        require VIEW_LEVEL_DIR.'content.html';
    }
    public function sidebarAction(){
        require VIEW_LEVEL_DIR.'sidebar.html';
    }
    /**
     * 退出功能
     */
    public function dieAction(){
        //清除cookie值,利用名字置空cookie值
        // $dies = $_GET['die'];
        
        setcookie('ad_username','',time()*-10);
        setcookie('ad_userpass','',time()*-10);
        //清除session会话的
        session_destroy();//销毁会话的全部数据
        $this->jump("index.php?p=admin&c=Admin&a=login",'');    
    }
    
}