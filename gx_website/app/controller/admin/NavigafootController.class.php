<?php
class NavigafootController extends PlatformAdminController{
    /**
     * 显示底部导航列表
     */
    public function listAction(){
        $model_name = new NavigafootModel;
        $list = $model_name->getList();
        require VIEW_LEVEL_DIR."navigafoot_list.html";
    }
    /**
     * 显示添加底部导航栏视图
     */
    public function addPageAction(){
        require VIEW_LEVEL_DIR."navigafoot_add.html";
    }
    /**
     * 添加底部导航
     */
    public function addAction(){
        $data['foot_name'] = $_POST['foot_name'];
        $data['foot_url'] = $_POST['foot_url'];
        $data['foot_show'] = $_POST['foot_show'];
        $data['foot_order'] = $_POST['foot_order'];
        $model_name = new NavigafootModel;
        if($naviga = $model_name->aotuInsert($data)){
            $this->jump("index.php?p=admin&c=Navigafoot&a=list",'');
        }else{
            $this->jump("index.php?p=admin&c=Navigafoot&a=addPage","添加失败",2);
        }
    }
    /**
     * ajax处理添加导航的名字是否已经存在
     */
    public function ajaxAddAction(){
        $data['foot_name'] = $_POST['foot_name'];
        $model_name = new NavigafootModel;
        if(!$model_name->addList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
    /**
     * ajax处理添加导航的URL路径
     */
    public function ajaxAddurlAction(){
        $data['foot_url'] = $_POST['foot_url'];
        $model_name = new NavigafootModel;
        if(!$model_name->addurlList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
    /**
     * 删除导航
     */
    public function delAction(){
        $id = $_GET['id'];
        $model_name = new NavigafootModel;
        if($dele = $model_name -> delList($id)){
            $this->jump("index.php?p=admin&c=Navigafoot&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Navigafoot$a=list",'删除失败',2);
        }
    }
    /**
     * 显示编辑页面
     */
    public function seleAction(){
        $id = $_GET['id'];
        $model_name = new NavigafootModel;
        $list = $model_name->seleList($id);
        require VIEW_LEVEL_DIR."navigafoot_edit.html";
    }
    /**
     * ajax处理编辑页面的导航名
     */
    public function editnameAction(){
        $data['foot_name'] = $_POST['foot_name'];
        $data['foot_id'] = $_POST['id'];
        $model_name = new NavigafootModel;
        if(!$model_name->editnameList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
    /**
     * ajax处理编辑导航的URL路径
     */
    public function ajaxediturlAction(){
        $data['foot_id'] = $_POST['id'];
        $data['foot_url'] = $_POST['foot_url'];
        $model_name = new NavigafootModel;
        if(!$model_name->editurlList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
    /**
     * 更改编辑页面
     */
    public function editAction(){
        $data['foot_id'] = $_POST['foot_id'];
        $data['foot_name'] = $_POST['foot_name'];
        $data['foot_url'] = $_POST['foot_url'];
        $data['foot_show'] = $_POST['foot_show'];
        $data['foot_order'] = $_POST['foot_order'];
        $model_name = new NavigafootModel;
        if($edit = $model_name->editList($data)){
            $this->jump('index.php?p=admin&c=Navigafoot&a=list','');
        }else{
            $this->jump("index.php?p=admin&c=Navigafoot&a=edit","编辑失败，原因：".$model_name->error_info,2);
        }
    }
}