<?php
class NavigafootModel extends Model{
    public $table_name = "navigation_foot";//逻辑表名
    public $error_info;
    /**
     * 显示底部导航栏
     * @return mixed 
     */
    public function getList(){
        $sql = "select * from {$this->table()} where 1 order by foot_order";
        return $this->db->fetchAll($sql);
    }
    /**
     * ajax处理底部导航名
     * @param $data array
     */
    public function addList($data){
        $sql = "select count(*) from {$this->table()} where foot_name='{$data['foot_name']}' ";
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info = "导航名已存在！！！";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
      
    }
    /**
     * ajax处理添加导航的url路径
     */
    public function addurlList($data){
        $sql = "select count(*) from {$this->table()} where foot_url='{$data['foot_url']}' ";
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info = "URL路径已存在！！！";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
    }
    /**
     * 删除导航
     * @param $id int 
     * @return bool
     */
    public function delList($id){
        return $this->aotuDelete($id);
    }
    /**
     * 显示编辑视图
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
        $sql = "select count(*) from {$this->table()} where foot_name='{$data['foot_name']}' and foot_id != '{$data['foot_id']}' ";
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
        $sql = "select count(*) from {$this->table()} where foot_url='{$data['foot_url']}' and foot_id != '{$data['foot_id']}' ";
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info = "URL路径已存在！！！";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
    }
    /**
     * 编辑导航
     * @param $data array
     * @return bool
     */
    public function editList($data){
        $sqls = "select count(*) from {$this->table()} where ( foot_name = '{$data['foot_name']}' or foot_url='{$data['foot_url']}') and foot_id != '{$data['foot_id']}'";
        $count_num = $this->db->fetchColumn($sqls);
        if($count_num >0){
            $this->error_info = "导航名或地址已经存在！";
            return false;
        }
        $sql = "update {$this->table()} set foot_name='{$data['foot_name']}',foot_url='{$data['foot_url']}',foot_show='{$data['foot_show']}',foot_order='{$data['foot_order']}' where foot_id='{$data['foot_id']}'";
        return $this->db->query($sql);
    }
}