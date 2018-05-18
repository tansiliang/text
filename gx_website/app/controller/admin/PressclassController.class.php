<?php
class PressclassController extends PlatformAdminController{
    /**
     * 显示新闻分类列表
     */
    public function listAction(){
        $model_name = new PressclassModel;
        $list = $model_name->getTreeList();
        require VIEW_LEVEL_DIR."pressclass_list.html";
    }
    /**
     * 显示添加页面
     */
    public function addPageAction(){
        $model_name = new PressclassModel;
        $list = $model_name->getTreeList();
        require VIEW_LEVEL_DIR."pressclass_add.html";
    }
    /**
     * 添加新闻分类信息
     */
    public function addAction(){
        $data['class_name'] = $_POST['class_name'];
        $data['class_parent'] = $_POST['class_parent'];
        $data['class_order'] = $_POST['class_order'];
        $model_name = new PressclassModel;
        if($add = $model_name->addList($data)){
            $this->jump("index.php?p=admin&c=Pressclass&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Pressclass&a=addPage",'添加失败，原因'.$model_name->error_info,2);
        }
    }
    /**
     * 删除新闻分类信息
     */
    public function delAction(){
        $id = $_GET['id'];
        $model_name = new PressclassModel;
        if($del = $model_name->delList($id)){
            $this->jump("index.php?p=admin&c=Pressclass&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Pressclass&a=list",'删除失败，原因：'.$model_name->error_info,2);
        }
    }
    /**
     * 显示修改页面
     */
    public function seleAction(){
        $id = $_GET['id'];
        $model_name = new PressclassModel;
        $lists = $model_name->getTreeList();
        $list = $model_name->aotuSelect($id);
        require VIEW_LEVEL_DIR."pressclass_edit.html";
    }
    /**
     *更改页面信息
     */
    public function editAction(){
        $data['class_name'] = $_POST['class_name'];
        $data['class_parent'] = $_POST['class_parent'];
        $data['class_order'] = $_POST['class_order'];
        $data['class_id'] = $_POST['class_id'];
        $model_name = new PressclassModel;
        if($edit = $model_name->editList($data)){
            $this->jump("index.php?p=admin&c=pressclass&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Pressclass&a=sele&id={$data['class_id']}","修改失败，原因".$model_name->error_info,2);
        }
    }
}