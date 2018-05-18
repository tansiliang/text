<?php
class IndexController{
    /**
     * 显示首页信息
     */
    public function listAction(){
        $webset_model = new WebsetModel;//网站设置
        $webset = $webset_model->getList();
        $navigatop_model = new NavigatopModel;//头部导航
        $navigatop = $navigatop_model->getTreeList();
        $navigafoot_model = new NavigafootModel;//底部导航
        $navigafoot = $navigafoot_model->getList();
        $footinfo_model = new FootinfoModel;//页脚信息
        $footinfo = $footinfo_model->getList();
        $friend_model = new FriendModel;//友情链接
        $friendlink = $friend_model->getList();
        $press_model = new PressModel;//新闻列表
        $press = $press_model->getList();
        require VIEW_LEVEL_DIR."index.html";
    }
    /**
     * 文章信息
     */
    public function presslistAction(){
        @$id = $_GET['id'];
        $webset_model = new WebsetModel;//网站设置
        $webset = $webset_model->getList();
        $navigatop_model = new NavigatopModel;//头部导航
        $navigatop = $navigatop_model->getTreeList();
        $naviga_list = $navigatop_model->getTreeList($id);
        $navigafoot_model = new NavigafootModel;//底部导航
        $navigafoot = $navigafoot_model->getList();
        $footinfo_model = new FootinfoModel;//页脚信息
        $footinfo = $footinfo_model->getList();
        $friend_model = new FriendModel;//友情链接
        $friendlink = $friend_model->getList();
        @$data['parent_id'] = $_GET['ids'];
        $works_model = new WorksModel;
        $works = $works_model->fontList($data);
        require VIEW_LEVEL_DIR."presslist.html";
    }
    /**
     * 新闻内容
     */
    public function workslistAction(){
        @$id = $_GET['id'];
        $webset_model = new WebsetModel;//网站设置
        $webset = $webset_model->getList();
        $navigatop_model = new NavigatopModel;//头部导航
        $navigatop = $navigatop_model->getTreeList();
        $navigafoot_model = new NavigafootModel;//底部导航
        $navigafoot = $navigafoot_model->getList();
        $footinfo_model = new FootinfoModel;//页脚信息
        $footinfo = $footinfo_model->getList();
        $friend_model = new FriendModel;//友情链接
        $friendlink = $friend_model->getList();
        $press_model = new PressModel;//显示新闻内容
        $press = $press_model->aotuSelect($id);
        $press_host = $press_model->getList();//显示热点新闻标题
        require VIEW_LEVEL_DIR."xinwen.html";
    }
    /**
     * 新闻列表
     */
    public function getlistAction(){
        $webset_model = new WebsetModel;//网站设置
        $webset = $webset_model->getList();
        $navigatop_model = new NavigatopModel;//头部导航
        $navigatop = $navigatop_model->getTreeList();
        $navigafoot_model = new NavigafootModel;//底部导航
        $navigafoot = $navigafoot_model->getList();
        $footinfo_model = new FootinfoModel;//页脚信息
        $footinfo = $footinfo_model->getList();
        $friend_model = new FriendModel;//友情链接
        $friendlink = $friend_model->getList();
        $press_model = new PressModel;
        $press_host = $press_model->getList();//显示热点新闻标题
        require VIEW_LEVEL_DIR.'xinwenlist.html';
    }
}