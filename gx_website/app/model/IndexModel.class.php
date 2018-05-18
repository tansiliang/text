<?php
class IndexModel extends Model{
    public $table_name = "admin_user";//注意
    /**
     * 显示当前管理员
     * @param $id int 
     */
   public function adminList($id){
       $sql = "select * from `gx_admin_user` where ad_id = '$id'";
       return $this->db->fetchrow($sql);
   }
}