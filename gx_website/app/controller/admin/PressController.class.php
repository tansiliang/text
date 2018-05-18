<?php
class PressController extends PlatformAdminController{
    /**
     * 显示新闻列表
     */
    public function listAction(){
        $model_name = new PressModel;
        // $list = $model_name->getList();
        $page = isset($_GET['page'])?$_GET['page']:'1';//当前页数
        $pagesize = $GLOBALS['config']['admin']['works_list_pagesize'];//当前列表显示的数值
        $reselt = $model_name->gePagetList($page,$pagesize);
        $list = $reselt['list'];//列表
        $last_page = $reselt['totalpage'];//总页数
        require VIEW_LEVEL_DIR."press_list.html";
    }
    /**
     * 显示添加页面
     */
    public function addPageAction(){
        $model_name = new PressclassModel;
        $lists = $model_name->getTreeList();
        require VIEW_LEVEL_DIR."press_add.html";
    }
    /**
     * 添加功能
     */
    public function addAction(){
        $data['press_title'] = $_POST['press_title'];
        $data['press_categoryid'] = $_POST['press_categoryid'];
        $data['press_author'] = $_POST['press_author'];
        $data['press_content'] = $_POST['press_content'];
        $data['press_keyword'] = $_POST['press_keyword'];
        $data['press_hot'] = $_POST['press_hot'];
        $data['press_order'] = $_POST['press_order'];
        $data['press_show'] = $_POST['press_show'];
        $data['press_releaseTime'] = time();
        $data['press_updateTime'] = time();
        $upload_name = new UploadedTools(UPLOADED_DIR,10000000);
        if($upload = $upload_name->Uploaded($_FILES['press_file'],'Press_',"Press")){
            //上传成功,将图片名字存入数据库中
            $data['press_file'] = $upload;
        }
        $model_name = new PressModel;
        if($add = $model_name->addList($data)){
            $this->jump("index.php?p=admin&c=Press&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Press&a=addPage",'添加事变，原因：'.$model_name->error_info,2);
        }
    }
    /**
     * 删除功能
     */
    public function delAction(){
        $id = $_GET['id'];
        $model_name = new PressModel;
        $del = $model_name->aotuDelete($id);
        $this->jump("index.php?p=admin&c=Press&a=list");
    }
    /**
     * 显示修改页面
     */
    public function seleAction(){
        $id = $_GET['id'];
        $model_name = new PressModel;
        $list = $model_name->aotuSelect($id);
        $model_names = new PressclassModel;
        $lists = $model_names->getTreeList();
        require VIEW_LEVEL_DIR."press_edit.html";
    }
    /**
     * 更改页面信息
     */
    public function editAction(){
        $data['press_title'] = $_POST['press_title'];
        $data['press_categoryid'] = $_POST['press_categoryid'];
        $data['press_author'] = $_POST['press_author'];//来源
        $data['press_content'] = $_POST['press_content'];//内容
        $data['press_keyword'] = $_POST['press_keyword'];
        $data['press_hot'] = $_POST['press_hot'];
        $data['press_click'] = $_POST['press_click'];//点击次数
        $data['press_order'] = $_POST['press_order'];
        $data['press_show'] = $_POST['press_show'];
        $data['press_id'] = $_POST['press_id'];
        $data['press_updateTime'] = time();//更新信息
        if($_FILES['press_file']['name'] == ''){
            $data['press_file'] = $_POST['press_true'];
        }else{
        $upload_name = new UploadedTools(UPLOADED_DIR,10000000);
        if($upload = $upload_name->Uploaded($_FILES['press_file'],'Press_',"Press")){
            //上传成功,将图片名字存入数据库中
            $data['press_file'] = $upload;
        }
        }
        $model_name = new PressModel;
        if($model_name->editList($data)){
            $this->jump("index.php?p=admin&c=Press&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Press&a=sele","更改失败，原因：".$model_name->error_info,2);
        }
    }

}