<?php
class NavigatopModel extends Model{
    public $table_name = "naviga_top";//逻辑表名
    public $error_info;
    
    /**
     * 分页列表
     * @param $page int 当前的页数
     * @param $pagesize int 当前页数显示的条数
     * @return bool
     */
    public function gePagetList($page,$pagesize){
        $offter = ($page-1) * $pagesize;
        $sql = "select * from {$this->table()} order by naviga_order limit $offter,$pagesize";
        $data['list'] = $this->db->fetchAll($sql);
        $sqls = "select count(*) from {$this->table()}";
        $count_num = $this->db->fetchColumn($sqls);//获取一共有多少条数据
        $data['totalpage'] = ceil($count_num/$pagesize);//获得总页数
        return $data;
    }
    /**
     * 显示列表
     */
    public function getList(){
        $sql = "select * from {$this->table(0)} order by naviga_order ";
        return $this->db->fetchAll($sql);
    }
    /**
     * 调用树状型列表方法
     */
    public function getTreeList($p_id = 0){
        $list = $this->getList();
         return $this->getTree($list,$p_id,0);
    }
    /**
     * 递归，排序和缩进
     * @param $arr Array 需要进行排序和缩进的数组
     * @param $parent_id int 父类id
     * @param $dree 记录查找的次数
     */
    public function getTree($arr,$parent_id = 0,$dree = 0){
        static $tree = array();
        foreach ($arr as $row){
            if($row['naviga_parent'] == $parent_id){
                #通过判断来对数据库里面的信息进行排序
                $row['dree'] = $dree;//获得级别的数值（用来进行缩进）
                $tree[] = $row;
                $this->getTree($arr,$row['naviga_id'],$dree + 1);
            }
        }
       return $tree;
    }
    /**
     * 判断当前删除的id是否是叶子分类
     * @param $id int 
     */
    public function isList($id){
        $sql = "select count(*) from {$this->table()} where naviga_parent = '$id'";
        $count_num = $this->db->fetchColumn($sql);
        return $count_num == 0;
    }

    /**
     * ajax处理导航名
     * @param $data array
     * @return bool
     */
    public function ajaxaddnameList($data){
        $sql = "select count(*) from {$this->table()} where naviga_name ='{$data['naviga_name']}' ";
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info = "导航名已存在！！！";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
    }
    /**
     * 更改编辑页面
     * @param $data array
     * @return bool
     */
    public function editList($data){
        $sql = "update {$this->table()} set naviga_name='{$data['naviga_name']}',naviga_url='{$data['naviga_url']}',naviga_bar='{$data['naviga_bar']}',naviga_order='{$data['naviga_order']}',naviga_parent='{$data['naviga_parent']}' where naviga_id='{$data['naviga_id']}'";
        return $this->db->query($sql);
    }
    /**
     * ajax处理编辑页面的导航名
     */
    public function editnameList($data){
        $sql = "select count(*) from {$this->table()} where naviga_name='{$data['naviga_name']}' and naviga_id != '{$data['naviga_id']}' ";
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info = "导航名已存在！！！";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
    }
}