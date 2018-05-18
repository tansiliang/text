<?php
class PressModel extends Model{
    public $table_name = "press";//逻辑表名
    public $error_info;
    /**
     * 显示列表
     */
    public function getList(){
        $sql = "select * from {$this->table()} order by press_order";
        return $this->db->fetchAll($sql);
    }   
    public function gePagetList($page,$pagesize){
        $offter = ($page-1) * $pagesize;
        $sql = "select * from {$this->table()} order by press_order limit $offter,$pagesize";
        $data['list'] = $this->db->fetchAll($sql);
        $sqls = "select count(*) from {$this->table()}";
        $count_num = $this->db->fetchColumn($sqls);//获取一共有多少条数据
        $data['totalpage'] = ceil($count_num/$pagesize);//获得总页数
        return $data;
    }
    /**
     * 添加新闻列表数据
     * @param $data array
     */
    public function addList($data){
        $sql = "select count(*) from {$this->table()} where press_title='{$data['press_title']}'";;
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info = "标题已经存在！！！";
            return false;
        }
        return $this->aotuInsert($data);
    }
    /**
     * 更改信息
     * @param $data array
     */
    public function editList($data){
        $sql = "select count(*) from {$this->table()} where press_title='{$data['press_title']}' and press_id != '{$data['press_id']}'";
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info = "更改新闻标题名已存在！！！";
            return false;
        }
        $sqls = "update {$this->table()} set press_title='{$data['press_title']}',press_categoryid='{$data['press_categoryid']}',press_author='{$data['press_author']}',press_content='{$data['press_content']}',press_keyword='{$data['press_keyword']}',press_hot='{$data['press_hot']}',press_click='{$data['press_click']}',press_order='{$data['press_order']}',press_show='{$data['press_show']}',press_updateTime='{$data['press_updateTime']}',press_file='{$data['press_file']}' where press_id='{$data['press_id']}'";
        return $this->db->query($sqls);
    }
}