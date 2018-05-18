<?php
class NavigatopController extends PlatformAdminController{
    /**
     * 显是导航列表页
     */
    public function listAction(){
        $page = isset($_GET['page'])?$_GET['page']:'1';
        $pagesize = $GLOBALS['config']['admin']['works_list_pagesize'];
        $model_name = new NavigatopModel;
        $rel = $model_name->getList($page,$pagesize);
        $list = $model_name->getTreeList();
        require VIEW_LEVEL_DIR."navigatop_list.html";
    }
    /**
     * 显示添加导航
     */
    public function addPageAction(){
        $model_name = new NavigatopModel;
        $list = $model_name->getTreeList();
        require VIEW_LEVEL_DIR."navigatop_add.html";
    }
    /**
     * 添加导航
     */
    public function addAction(){
        $data['naviga_name'] = $_POST['naviga_name'];
        $data['naviga_parent'] = $_POST['naviga_parent'];
        $data['naviga_url'] = $_POST['naviga_url'];
        $data['naviga_bar'] = $_POST['naviga_show'];
        $data['naviga_order'] = $_POST['naviga_order'];
        $model_name = new NavigatopModel;
        if($model_name->aotuInsert($data)){
            $this->jump("index.php?p=admin&c=Navigatop&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Navigatop&a=addPage","语句执行失败",2);
        }
    }
    /**
     * ajax验证导航名
     */
    public function ajaxaddnameAction(){
        $data['naviga_name'] = $_POST['naviga_name'];
        $model_name = new NavigatopModel;
        if(!$model_name->ajaxaddnameList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
    /**
     * 删除
     */
    public function delAction(){
        $id = $_GET['id'];
        $model_name = new NavigatopModel;
        if($model_name->isList($id)){
            $model_name->aotuDelete($id);
            $this->jump("index.php?p=admin&c=Navigatop&a=list");
            
        }else{
            $this->jump("index.php?p=admin&c=Navigatop&a=list",'删除失败,该分支不是叶子分支！！！',2);
        }
    }
    /**
     * 显示编辑页面
     */
    public function seleAction(){
        $id = $_GET['id'];
        $model_name = new NavigatopModel;
        $list = $model_name->aotuSelect($id);
        $lists = $model_name->getTreeList();
        require VIEW_LEVEL_DIR."navigatop_edit.html";
    }
    /**
     * 更改操作
     */
    public function editAction(){
        $data['naviga_id'] = $_POST['naviga_id'];
        $data['naviga_name'] = $_POST['naviga_name'];
        $data['naviga_url'] = $_POST['naviga_url'];
        $data['naviga_parent'] = $_POST['naviga_parent'];
        $data['naviga_bar'] = $_POST['naviga_bar'];
        $data['naviga_order'] = $_POST['naviga_order'];
        $model_name = new NavigatopModel;
        if($model_name->editList($data)){
            $this->jump("index.php?p=admin&c=Navigatop&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Navigatop&a=sele","更新失败",2);
        }
    }
    /**
     * ajax处理编辑页面的导航名
     */
    public function editnameAction(){
        $data['naviga_name'] = $_POST['naviga_name'];
        $data['naviga_id'] = $_POST['id'];
        $model_name = new NavigatopModel;
        if(!$model_name->editnameList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
}