<?php
class WorksModel extends Model{
    public $table_name = "Works";//逻辑表名
    public $error_info;
    /**
     * 显示列表
     */
    public function getList(){
        $sql = "select * from {$this->table()}";
        return $this->db->fetchAll($sql);
    }
     /**
     * 分页列表
     * @param $page int 当前的页数
     * @param $pagesize int 当前页数显示的条数
     * @return bool
     */
    public function gePagetList($page,$pagesize){
        $offter = ($page-1) * $pagesize;
        $sql = "select * from {$this->table()} order by works_order limit $offter,$pagesize";
        $data['list'] = $this->db->fetchAll($sql);
        $sqls = "select count(*) from {$this->table()}";
        $count_num = $this->db->fetchColumn($sqls);//获取一共有多少条数据
        $data['totalpage'] = ceil($count_num/$pagesize);//获得总页数
        return $data;
    }
    /**
     * 添加文章
     * @param $data array
     */
    public function addList($data){
        $sql = "select count(*) from {$this->table()} where works_title='{$data['works_title']}'";;
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info = "文章类名已经存在！！！";
            return false;
        }
        return $this->aotuInsert($data);
    }
    /**
     * 更改信息
     * @param $data array
     */
    public function editList($data){
        $sql = "select count(*) from {$this->table()} where works_title='{$data['works_title']}' and works_id != '{$data['works_id']}'";
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info = "更改新闻标题名已存在！！！";
            return false;
        }
        $sqls = "update {$this->table()} set works_title='{$data['works_title']}',works_categoryid='{$data['works_categoryid']}',works_content='{$data['works_content']}',works_hot='{$data['works_hot']}',works_order='{$data['works_order']}',works_show='{$data['works_show']}',works_updateTime='{$data['works_updateTime']}',works_file='{$data['works_file']}' where works_id='{$data['works_id']}'";
        return $this->db->query($sqls);
    }

    /**
     * 在前台显示文章内容
     * @param $data array
     */
    public function fontList($data){
        $sql = "select * from {$this->table()} where works_categoryid='{$data['parent_id']}'";
        return $this->db->fetchrow($sql);
    }
}