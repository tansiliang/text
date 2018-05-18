<?php
class FootinfoController extends PlatformAdminController{
    /**
     * 显示列表视图
     */
    public function listAction(){
        $model_name = new FootinfoModel;
        $list = $model_name->getList();
        require VIEW_LEVEL_DIR."footinfo_list.html";
    }
    /**
     * 显示添加页面
     */
    public function addPageAction(){
        require VIEW_LEVEL_DIR."footinfo_add.html";
    }
    /**
     * 获取添加页面的信息
     */
    public function addAction(){
        $data['info_copy'] = $_POST['info_copy'];
        $data['info_url'] = $_POST['info_url'];
        $data['info_icp'] = $_POST['info_icp'];
        $data['info_icp_url'] = $_POST['info_icp_url'];
        $data['info_qq'] = $_POST['info_qq'];
        $data['info_wx'] = $_POST['info_wx'];
        $data['info_wb'] = $_POST['info_wb'];
        $data['info_wb_url'] = $_POST['info_wb_url'];
        $data['info_dz'] = $_POST['info_dz'];
        $data['info_email'] = $_POST['info_email'];
        $data['info_phone'] = $_POST['info_phone'];
        $data['info_show'] = $_POST['info_show'];
        $model_name = new FootinfoModel;
        if($model_name->aotuInsert($data)){
            $this->jump("index.php?p=admin&c=Footinfo&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Footinfo&a=addPage",'执行失败',2);
        }
    }
    /**
     * 删除
     */
    public function delAction(){
        $id = $_GET['id'];
        $model_name = new FootinfoModel;
        if($model_name->aotuDelete($id)){
            $this->jump("index.php?p=admin&c=Footinfo&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Footinfo&a=list",'删除失败',2);
        }
    }
    /**
     * 显示编辑页面
     */
    public function seleAction(){
        $id=$_GET['id'];
        $model_name = new FootinfoModel;
        $list = $model_name->aotuSelect($id);
        require VIEW_LEVEL_DIR."footinfo_edit.html";
    }
    /**
     * 更改页面的信息
     */
    public function editAction(){
        $data['info_id'] = $_POST['info_id'];
        $data['info_copy'] = $_POST['info_copy'];
        $data['info_url'] = $_POST['info_url'];
        $data['info_icp'] = $_POST['info_icp'];
        $data['info_icp_url'] = $_POST['info_icp_url'];
        $data['info_qq'] = $_POST['info_qq'];
        $data['info_wx'] = $_POST['info_wx'];
        $data['info_wb'] = $_POST['info_wb'];
        $data['info_wb_url'] = $_POST['info_wb_url'];
        $data['info_dz'] = $_POST['info_dz'];
        $data['info_email'] = $_POST['info_email'];
        $data['info_phone'] = $_POST['info_phone'];
        $data['info_show'] = $_POST['info_show'];
        $model_name = new FootinfoModel;
        if($model_name->editList($data)){
            $this->jump("index.php?p=admin&c=Footinfo&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Footinfo&a=sele","更改失败",2);
        }
    }
}