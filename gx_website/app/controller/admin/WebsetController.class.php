<?php
class WebsetController extends PlatformAdminController{
    /**
     * 网站设置列表
     */
    public function listAction(){
        $model_name = new WebsetModel;
        $list = $model_name->getList();
        require VIEW_LEVEL_DIR."webset_list.html";
    }
    /**
     * 显示添加网站设置
     */
    public function addPageAction(){
        require VIEW_LEVEL_DIR."webset_add.html";
    }
    /**
     * 添加信息
     */
    public function addAction(){
        $data['web_name'] = $_POST['web_name'];
        $data['web_title'] = $_POST['web_title'];
        $data['web_seo'] = $_POST['web_seo'];
        $data['web_bewrite'] = $_POST['web_bewrite'];
        $data['web_show'] = $_POST['web_show'];
        //获取图标文件
        $upload_name = new UploadedTools(UPLOADED_DIR,10000000);
        if($upload = $upload_name->Uploaded($_FILES['web_title_ico'],'webset_',"Webset")){
            //上传成功,将图片名字存入数据库中
            $data['web_title_ico'] = $upload;
        }
        $model_name = new WebsetModel;
        if($add = $model_name->aotuInsert($data)){
            $this->jump("index.php?p=admin&c=Webset&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Webset&a=addPage","添加失败，原因：".$model_name->error_info,2);
        }
    }
      /**
     * ajax处理添加网站设置的名字是否已经存在
     */
    public function ajaxAddAction(){
        $data['web_name'] = $_POST['web_name'];
        $model_name = new WebsetModel;
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
        $data['web_title'] = $_POST['web_title'];
        $model_name = new WebsetModel;
        if(!$model_name->addurlList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
    /**
     * 删除网站设置信息
     */
    public function delAction(){
        $id = $_GET['id'];
        $model_name = new WebsetModel;
        if($del = $model_name->delList($id)){
            $this->jump("index.php?p=admin&c=Webset&a=list");
        }
    }
    /**
     * 显示网站设置编辑的信息
     */
    public function seleAction(){
        $id = $_GET['id'];
        $model_name = new WebsetModel;
        $list = $model_name->seleList($id);
        require VIEW_LEVEL_DIR."webset_edit.html";
    }
    /**
     * ajax处理编辑页面的网站
     */
    public function editnameAction(){
        $data['web_name'] = $_POST['web_name'];
        $data['web_id'] = $_POST['id'];
        $model_name = new WebsetModel;
        if(!$model_name->editnameList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
    /**
     * ajax处理编辑网站设置的标题
     */
    public function ajaxedittitleAction(){
        $data['web_id'] = $_POST['id'];
        $data['web_title'] = $_POST['web_title'];
        $model_name = new WebsetModel;
        if(!$model_name->edittitleList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
    /**
     * 执行编辑信息
     */
    public function editAction(){
        $data['web_id'] = $_POST['web_id'];
        $data['web_name'] = $_POST['web_name'];
        $data['web_title'] = $_POST['web_title'];
        $data['web_seo'] = $_POST['web_seo'];
        $data['web_bewrite'] = $_POST['web_bewrite'];
        $data['web_show'] = $_POST['web_show'];
        //做一个判断，判断文件是否更改，
        if($_FILES['web_title_ico']['name'] == ''){
            $data['web_title_ico'] = $_POST['web_ico'];
        }else{
            $upload_name = new UploadedTools(UPLOADED_DIR,10000000);
            if($upload = $upload_name->Uploaded($_FILES['web_title_ico'],'webset_','Webset')){
                //上传成功,将图片名字存入数据库中
                $data['web_title_ico'] = $upload;
            }
        }
        $model_name = new WebsetModel;
        if($edit = $model_name->editList($data)){
            $this->jump("index.php?p=admin&c=Webset&a=list");
        }else{
            $this->jump("index.php?p=admin&c=Webset&a=editPage","编辑失败,原因：".$model_name->error_info,2);
        }
    }
}