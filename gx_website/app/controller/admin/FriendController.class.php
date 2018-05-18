<?php
class FriendController extends PlatformAdminController{
    /**
     * 显示友情链接列表
     */
    public function listAction(){
        $model_name = new FriendModel;
        $list = $model_name->getList();
        require VIEW_LEVEL_DIR.'friendlink_list.html';
    }
    /**
     * 显示添加链接页面
     */
    public function addPageAction(){
        require VIEW_LEVEL_DIR.'friendlink_add.html';
    }
    /**
     * 添加友情链接
     */
    public function addAction(){
        $data['link_name'] = $_POST['link_name'];
        $data['link_url'] = $_POST['link_url'];
        $data['link_show'] = $_POST['link_show'];
        $data['show_order'] = $_POST['show_order'];
        $model_name = new FriendModel;
        if($add = $model_name->aotuInsert($data)){
            $this->jump("index.php?p=admin&c=Friend&a=list",'');
        }else{
            $this->jump("index.php?p=admin&c=Friend&a=addPage",'添加失败,原因：'.$model_name->error_info,2);
        }
    }
      /**
     * ajax处理添加导航的名字是否已经存在
     */
    public function ajaxAddAction(){
        $data['link_name'] = $_POST['link_name'];
        $model_name = new FriendModel;
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
        $data['link_url'] = $_POST['link_url'];
        $model_name = new FriendModel;
        if(!$model_name->addurlList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
    /**
     * 删除友情链接
     */
    public function delAction(){
        $id = $_GET['id'];
        $model_name = new FriendModel;
        if($del = $model_name->delList($id)){
            $this->jump("index.php?p=admin&c=Friend&a=list",'');
        }else{
            $this->jump("index.php?p=admin&c=Friend&a=list",'删除失败，'.$model_name,2);
        }
    }
    /**
     * 显示编辑页面视图
     */
    public function seleAction(){
        $id = $_GET['id'];
        $model_name = new FriendModel;
        $list = $model_name->seleList($id);
        require VIEW_LEVEL_DIR."friendlink_edit.html";
    }
    /**
     * ajax处理编辑页面的导航名
     */
    public function editnameAction(){
        $data['link_name'] = $_POST['link_name'];
        $data['link_id'] = $_POST['id'];
        $model_name = new FriendModel;
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
        $data['link_id'] = $_POST['id'];
        $data['link_url'] = $_POST['link_url'];
        $model_name = new FriendModel;
        if(!$model_name->editurlList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
    /**
     * 编辑信息
     */
    public function editAction(){
        $data['link_id'] = $_POST['link_id'];
        $data['link_name'] = $_POST['link_name'];
        $data['link_url'] = $_POST['link_url'];
        $data['link_show'] = $_POST['link_show'];
        $data['show_order'] = $_POST['show_order'];
        $model_name = new FriendModel;
        if($edit = $model_name->editList($data)){
            $this->jump("index.php?p=admin&c=Friend&a=list",'');
        }else{
            $this->jump("index.php?p=admin&c=Friend&a=sele&id={$data['link_id']}",'修改失败，原因：'.$model_name->error_info,2);
        }
    }
}