<?php
class FootinfoModel extends Model{
    public $table_name = "foot_info";//逻辑表名
    /**
     * 显示列表
     */
    public function getList(){
        $sql = "select * from {$this->table()} where 1";
        return $this->db->fetchAll($sql);
    }
    /**
     * 更改编辑页面的信息
     * @param $data array
     * @return bool
     */
    public function editList($data){
        $sql = "update {$this->table()} set info_copy='{$data['info_copy']}',info_url='{$data['info_url']}',info_icp='{$data['info_icp']}',info_icp_url='{$data['info_icp_url']}',info_qq='{$data['info_qq']}',info_wx='{$data['info_wx']}',info_wb='{$data['info_wb']}',info_wb_url='{$data['info_wb_url']}',info_dz='{$data['info_dz']}',info_email='{$data['info_email']}',info_phone='{$data['info_phone']}',info_show='{$data['info_show']}' where info_id='{$data['info_id']}'";
        return $this->db->query($sql);
    }
}