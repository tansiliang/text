<?php
class WebsetModel extends Model{
    public $table_name = "webset";//逻辑表名
    public $error_info;//收集错误信息
    /**
     * webset列表
     */
    public function getList(){
    $sql = "select * from {$this->table()}";
    return $this->db->fetchAll($sql);
    }
    /**
     * 添加网站设置
     * @param $data array
     * @return bool
     */
    public function addList($data){
        $sqls = "select count(*) from {$this->table()} where web_name = '{$data['web_name']}'";
        $count_num = $this->db->fetchColumn($sqls);
        if($count_num > 0){
            $this->error_info = "网站设置名称已存在!!!";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
    }
    /**
     * ajax添加页面处理title
     * @param $data array
     * @return bool
     */
    public function addurlList($data){
        $sqls = "select count(*) from {$this->table()} where web_title = '{$data['web_title']}'";
        $count_num = $this->db->fetchColumn($sqls);
        if($count_num > 0){
            $this->error_info = "标题已存在，请重新输入！！！";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
    }

    /**
     * 删除网站设置信息
     * @param $id int
     */
    public function delList($id){
        return $this->aotuDelete($id);
    }
    /**
     * 显示编辑的信息
     * @param $id int 
     * @return bool
     */
    public function seleList($id){
        return $this->aotuSelect($id);
    }
    /**
     * ajax处理编辑页面的网站设置名
     */
    public function editnameList($data){
        $sql = "select count(*) from {$this->table()} where web_name='{$data['web_name']}' and web_id != '{$data['web_id']}' ";
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info = "网站名已存在！！！";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
    }
    /**
     * ajax处理编辑网站设置的标题
     */
    public function edittitleList($data){
        $sql = "select count(*) from {$this->table()} where web_title='{$data['web_title']}' and web_id != '{$data['web_id']}' ";
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info = "标题已存在！！！";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
    }
    /**
     * 更改编辑信息
     * @param $data array
     * @return bool
     */
    public function editList($data){
        $sqls = "select count(*) from {$this->table()} where (web_name = '{$data['web_name']}' or web_title = '{$data['web_title']}') and web_id != '{$data['web_id']}'";
        $count_num = $this->db->fetchColumn($sqls);
        if($count_num > 0){
            $this->error_info = "网站名称或网站标题已存在！";
            return false;
        }
        $sql = "update {$this->table()} set web_name='{$data['web_name']}',web_title='{$data['web_title']}',web_title_ico='{$data['web_title_ico']}',web_seo='{$data['web_seo']}',web_bewrite='{$data['web_bewrite']}',web_show='{$data['web_show']}' where web_id = '{$data['web_id']}'";
        return $this->db->query($sql);
    } 
}