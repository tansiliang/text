<?php
class PressclassModel extends Model{
    public $table_name = "press_class";//逻辑表名
    public $error_info;
    /**
     * 显示列表
     */
    public function getList(){
        $sql = "select * from {$this->table()} order by class_order";
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
            if($row['class_parent'] == $parent_id){
                #通过判断来对数据库里面的信息进行排序
                $row['dree'] = $dree;//获得级别的数值（用来进行缩进）
                $tree[] = $row;
                $this->getTree($arr,$row['class_id'],$dree + 1);
            }
        }
       return $tree;
    }
    /**
     * 添加分类
     * @param $data array
     */
    public function addList($data){
        if($data['class_name'] == ""){
            $this->error_info = "分类名不能为空！！！";
            return false;
        }
        $sql = "select count(*) from {$this->table()} where class_name='{$data['class_name']}'";
        $count_num = $this->db->fetchColumn($sql);
        if($count_num > 0){
            $this->error_info ="分类名已经存在，请重新输入！！！";
            return false;
        }
        return $this->aotuInsert($data);
    }
     /**
     * 判断当前分类是否是叶子分类
     * @param $class_id int
     * @return bool 返回true
     */
    public function isLead($id){
        $sql = "select count(*) from {$this->table()} where class_parent = '$id'";
        $count_nub = $this->db->fetchColumn($sql);
        #当父类和子类没有相同的时候返回的count值为0
        return $count_nub == 0;#结果等于0时为真
    }
    /**
     * 删除新闻分类信息
     * @param $id int 
     */
    public function delList($id){
        if(!$this->isLead($id)){
            $this->error_info = "该节点不是末节点！！！";
            return false;
        }
        return $this->aotuDelete($id);
    }
    /**
     * 更改新闻分类信息
     * @param $data array
     */
    public function editList($data){
        $child_id = $this->getTreelist($data['class_id']);#获得所有的后代id
        $ids = array($data['class_id']);
        foreach($child_id as $row){
            $ids[] = $row['class_id'];#将所有的后代id放入到ids数组里
        }
        if(in_array($data['class_parent'],$ids)){#判断所传进来的父类id是否在后代id数组里面
            #如果存在在返回false
            $this->error_info = '输入的上一级类不能为自己或者是后代';
            return false;
        }
        $sql = "update {$this->table()} set class_name='{$data['class_name']}',class_parent='{$data['class_parent']}',class_order='{$data['class_order']}' where class_id='{$data['class_id']}'";
        return $this->db->query($sql);
    }

}