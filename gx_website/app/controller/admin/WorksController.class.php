<?php
class WorksController extends PlatformAdminController{
    /**
     * 显示列表
     */
    public function listAction(){
        $model_name = new WorksModel;
        // $list = $model_name->getList();
        $page = isset($_GET['page'])?$_GET['page']:'1';//当前页数
        $pagesize = $GLOBALS['config']['admin']['works_list_pagesize'];//当前列表显示的数值
        $reselt = $model_name->gePagetList($page,$pagesize);
        $list = $reselt['list'];//列表
        $last_page = $reselt['totalpage'];//总页数
        require VIEW_LEVEL_DIR.'works_list.html';
    }
    /**
     * 显示添加页面
     */
    public function addPageAction(){
        $model_name = new NavigatopModel;
        $lists = $model_name->getTreeList();
        require VIEW_LEVEL_DIR."works_add.html";
    }
    /**
     * 添加功能
     */
    public function addAction(){
        $data['works_title'] = $_POST['works_title'];
        $data['works_categoryid'] = $_POST['works_categoryid'];
        $data['works_content'] = $_POST['works_content'];
        $data['works_hot'] = $_POST['works_hot'];
        $data['works_order'] = $_POST['works_order'];
        $data['works_show'] = $_POST['works_show'];
        $data['works_releaseTime'] = time();
        $data['works_updateTime'] = time();
        $upload_name = new UploadedTools(UPLOADED_DIR,10000000);
        if($upload = $upload_name->Uploaded($_FILES['works_file'],'works_',"Works")){
            //上传成功,将图片名字存入数据库中
            $data['works_file'] = $upload;
        }
        $model_name = new WorksModel;
        if($add = $model_name->addList($data)){
            $this->jump("index.php?p=admin&c=Works&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Works&a=addPage",'添加事变，原因：'.$model_name->error_info,2);
        }
    }
     /**
     * 删除功能
     */
    public function delAction(){
        $id = $_GET['id'];
        $model_name = new WorksModel;
        $del = $model_name->aotuDelete($id);
        $this->jump("index.php?p=admin&c=Works&a=list");
    }
    /**
     * 显示修改页面
     */
    public function seleAction(){
        $id = $_GET['id'];
        $model_name = new WorksModel;
        $list = $model_name->aotuSelect($id);
        $model_name = new NavigatopModel;
        $lists = $model_name->getTreeList();
        require VIEW_LEVEL_DIR."works_edit.html";
    }
    /**
     * 更改页面信息
     */
    public function editAction(){
        $data['works_title'] = $_POST['works_title'];
        $data['works_categoryid'] = $_POST['works_categoryid'];
        $data['works_content'] = $_POST['works_content'];//内容
        $data['works_hot'] = $_POST['works_hot'];
        $data['works_order'] = $_POST['works_order'];
        $data['works_show'] = $_POST['works_show'];
        $data['works_id'] = $_POST['works_id'];
        $data['works_updateTime'] = time();//更新信息
        if($_FILES['works_file']['name'] == ''){
            $data['works_file'] = $_POST['works_true'];
        }else{
        $upload_name = new UploadedTools(UPLOADED_DIR,10000000);
        if($upload = $upload_name->Uploaded($_FILES['works_file'],'works_',"Works")){
            //上传成功,将图片名字存入数据库中
            $data['works_file'] = $upload;
        }
        }
        $model_name = new WorksModel;
        if($model_name->editList($data)){
            $this->jump("index.php?p=admin&c=Works&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Works&a=sele","更改失败，原因：".$model_name->error_info,2);
        }
    }
    

}