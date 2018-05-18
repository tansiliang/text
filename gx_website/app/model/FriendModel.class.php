<?php
class FriendModel extends Model{
    public $table_name = "friend_link";//逻辑表名
    public $error_info;
    /**
     * 友情链接列表
     */
    public function getList(){
        $sql = "select * from {$this->table()} where 1 order by show_order";
        return $this->db->fetchAll($sql);
    }
    /**
     * 添加链接
     * @param $data array
     * @return bool
     */
    public function addList($data){
        //判断链接地址和链接名称是否存在
        $sqls = "select count(*) from {$this->table()} where link_name = '{$data['link_name']}'";
        $count_num = $this->db->fetchColumn($sqls);
        if($count_num > 0){
            $this->error_info = "链接名称已存在！";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
    }
    /**
     * ajax添加页面处理url
     * @param $data array
     * @return bool
     */
    public function addurlList($data){
        //判断链接地址和链接名称是否存在
        $sqls = "select count(*) from {$this->table()} where link_url = '{$data['link_url']}'";
        $count_num = $this->db->fetchColumn($sqls);
        if($count_num > 0){
            $this->error_info = "url地址已存在！";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
    }
    /**
     * 删除链接
     * @param $id int 
     * @return bool
     */
    public function delList($id){
        return $this->aotuDelete($id);
    }
    /**
     * 显示编辑页面的信息
     * @param $id int 
     * @return bool
     */
    public function seleList($id){
        return $this->aotuSelect($id);
    }
    /**
     * ajax处理编辑页面的导航名
     */
    public function editnameList($data){
        $sql = "select count(*) from {$this->table()} where link_name='{$data['link_name']}' and link_id != '{$data['link_id']}' ";
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info = "导航名已存在！！！";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
    }
    /**
     * ajax处理编辑导航的url路径
     */
    public function editurlList($data){
        $sql = "select count(*) from {$this->table()} where link_url='{$data['link_url']}' and link_id != '{$data['link_id']}' ";
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info = "URL路径已存在！！！";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
    }
    /**
     * 编辑链接信息
     * @param $data array
     * @return bool
     */
    public function editList($data){
        //判断更改名字是否已经存在
        $sqls = "select count(*) from {$this->table()} where (link_name = '{$data['link_name']}' or link_url = '{$data['link_url']}') and link_id != '{$data['link_id']}'";
        $count_num = $this->db->fetchColumn($sqls);
        if($count_num > 0){
            $this->error_info = "链接名称或地址已经存在！";
            return false;
        }
        $sql = "update {$this->table()} set link_name = '{$data['link_name']}',link_url='{$data['link_url']}',show_order='{$data['show_order']}',link_show='{$data['link_show']}' where link_id = '{$data['link_id']}'";
        return $this->db->query($sql);
    }
}