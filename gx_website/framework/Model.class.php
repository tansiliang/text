<?php
class Model{
    protected $prefix;#前缀
    //用来保存数据
    public $db;
    protected $fields;#用来保存所有的字段名

    /**
     * 构造方法
     */
    public function __construct(){
        #连接数据库
        $this->info_db(); 
        #初始化表名前缀
        $this->prefix = $GLOBALS['config']['databases']['prefix'];
        $this->getField();#获得字段信息
    }

    /**
     * 连接数据库
     */
    public function info_db(){
        return $this->db =  MySQLDB::getInstance($GLOBALS['config']['databases']);
    }
    /**
     * 拼凑表名
     */
    public function table(){
        return $table = '`'.$this->prefix.$this->table_name.'`';
    }
    /**
     * 获取所有的字段和主键字段
     */
    private function getField(){
        $sql = "desc {$this->table()}";
        $rows = $this->db->fetchAll($sql);
        foreach($rows as $row){
            #获取所有的字段名
            $this->fields[] = $row['Field'];
            if($row['Key'] == 'PRI'){
                $this->fields['pk'] = $row['Field'];#主键字段
        }
    }
    }
    /**
     * 拼凑自动查询
     * 查询一条的数据
     * select * from {$this->table()} where 主键名 = '主键值';
     * @param $id int
     * @return mixed 返回查询信息
     */
    public function aotuSelect($id){
        $sql = "select * from {$this->table()} where {$this->fields['pk']} = '$id'";
        return $this->db->fetchrow($sql);
    }
    /**
     * 自动删除
     * 
     * delete from {$this->table()} where {$this->fields['pk']} = '主键值'
     * @param $id int
     * 
     * @return bool
     */
    public function aotuDelete($id){
        $sql = "delete from {$this->table()} where {$this->fields['pk']} = '$id'";
        return $this->db->query($sql);
    }
    /**
     * 自动插入
     * insert into {$this->table()} (字段1，字段2，字段n) values(值1，值2，值n); 
     * @param $data array
     * @return bool
     */
    public function aotuInsert($data){
        $sql = "insert into {$this->table()} ";
        #获取需要添加的字段名
        $fild = array_keys($data);//获取键名
        $filed_str = implode(',',$fild);#用字符串，将field连接在一起
        $sql .= "($filed_str)";
        $values = array_map( function($val){return "'". $val."'";}, $data ); #获得字段值
        $values_str = implode(',',$values);
        $sql .= ' values ('.$values_str.')';
        return $this->db->query($sql);
    }
    /**
     * 自动更改
     * update {$this->table()} set 字段1=字段1值，字段2=字段2值…… where {$this->fields['pk']}='值';
     */

}