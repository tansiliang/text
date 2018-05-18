<?php 
class WorksclassController extends PlatformAdminController{
    /**
     * 显示文章分类列表
     */
    public function listAction(){
        $model_name = new WorksclassModel;
        $list = $model_name->getTreeList();
        require VIEW_LEVEL_DIR."worksclass_list.html";
    }
    /**
     * 显示添加页面
     */
    public function addPageAction(){
        $model_name = new WorksclassModel;
        $list = $model_name->getTreeList();
        require VIEW_LEVEL_DIR."worksclass_add.html";
    }
    /**
     * 添加文章分类信息
     */
    public function addAction(){
        $data['worksclass_name'] = $_POST['worksclass_name'];
        $data['worksclass_parent'] = $_POST['worksclass_parent'];
        $data['worksclass_order'] = $_POST['worksclass_order'];
        $model_name = new WorksclassModel;
        if($add = $model_name->addList($data)){
            $this->jump("index.php?p=admin&c=Worksclass&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Worksclass&a=addPage",'添加失败，原因'.$model_name->error_info,2);
        }
    }
     /**
     * 删除新闻分类信息
     */
    public function delAction(){
        $id = $_GET['id'];
        $model_name = new WorksclassModel;
        if($del = $model_name->delList($id)){
            $this->jump("index.php?p=admin&c=Worksclass&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Worksclass&a=list",'删除失败，原因：'.$model_name->error_info,2);
        }
    }
    /**
     * 显示修改页面
     */
    public function seleAction(){
        $id = $_GET['id'];
        $model_name = new WorksclassModel;
        $lists = $model_name->getTreeList();
        $list = $model_name->aotuSelect($id);
        require VIEW_LEVEL_DIR."Worksclass_edit.html";
    }
    /**
     *更改页面信息
     */
    public function editAction(){
        $data['worksclass_name'] = $_POST['worksclass_name'];
        $data['worksclass_parent'] = $_POST['worksclass_parent'];
        $data['worksclass_order'] = $_POST['worksclass_order'];
        $data['worksclass_id'] = $_POST['worksclass_id'];
        $model_name = new WorksclassModel;
        if($edit = $model_name->editList($data)){
            $this->jump("index.php?p=admin&c=Worksclass&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Worksclass&a=sele&id={$data['worksclass_id']}","修改失败，原因".$model_name->error_info,2);
        }
    }
}