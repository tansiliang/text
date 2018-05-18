<?php
header("Content-Type:text/html; charset=utf8");
class AdminModel extends Model{
    public $table_name = "admin_user";
    public $error_info ;//用来收集错误信息
    /**
     * 验证登录的信息是否正确
     */
    public function validataList($data){
        //验证密码是否正确
        $sql = "select * from {$this->table()} where ad_username = '{$data['ad_username']}' and ad_userpass = md5('{$data['ad_userpass']}')";
        return $this->db->fetchrow($sql);
    }
    /**
     * 获取更改最新登录的时间
     * @param $data array 
     */
    public function changeList($data){
        $sql = "update {$this->table()} set ad_lastlogn = '{$data['ad_lastlogn']}',ad_lastip = '{$data['ad_lastip']}' where ad_id = {$data['ad_id']}";
        return $this->db->query($sql);
    }
    /**
     * 如果存在cookie数据，通过验证用户名获取相应的数据
     */
    public function listList($data){
        $sql = "select * from {$this->table()} where ad_username = '{$data['ad_username']}'";
        return $this->db->fetchrow($sql);
    }
    /**
     * 点击管理员信息表后显示管理员信息列表
     */
    public function getList(){
        $sql ="select * from {$this->table()} where 1";
        return $this->db->fetchAll($sql);
    }
    /**
     * 添加管理员信息
     * 利用ajax来处理
     * @param $data array
     * 
     */
    public function addList($data){
        //判断是否同名
        $sql = "select count(*) from {$this->table()} where ad_username = '{$data['ad_username']}' ";
        $list_num = $this->db->fetchColumn($sql);
        if($list_num > 0){
            $this->error_info = "用户名已存在,请重新输入！！！";
            return false;
        }else{
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }
      
    }
    /**
     * 删除管理员信息
     * @param $id int 
     */
    public function delList($id){
        return $this->aotuDelete($id);
    }
    /**
     * 查询编辑管理员信息
     * @param $id int 
     * @return mixed 
     */
    public function editSeleList($id){
        return $this->aotuSelect($id);
    }
    /**
     * 利用ajax异步判断编辑页面是否有同名的
     * @param $data array
     */
    public function ajaxEditList($data){
         //判断是否有同名的
         $sqls = "select count(*) from {$this->table()} where ad_username ='{$data['ad_username']}' and ad_id != '{$data['ad_id']}'";
         $count_num = $this->db->fetchColumn($sqls);
         if($count_num > 0){
             $this->error_info="更改的用户名已存在,请重新更改用户名！！！";
             return false;
         }else{
             $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
         }
    }
    /**
     * ajax异步处理编辑页面的旧密码
     * @param $id int
     */
    public function ajaxpassList($data){
        $sql = "select count(*) from {$this->table()} where ad_userpass = md5('{$data['ad_userpass']}') and ad_id = '{$data['ad_id']}'";
        $count_num = $this->db->fetchColumn($sql);
        if($count_num == 1){
            $this->error_info = "<img src='./app/view/admin/images/yes.gif' />";
        }else{
            $this->error_info = "密码错误，请重新输入！！！";
            return false;
        }
    }
    /**
     * 更改管理员的信息
     * @param $data array
     */
    public function updateList($data){
        $sql = "update {$this->table()} set ad_username='{$data['ad_username']}',ad_mail='{$data['ad_mail']}',ad_userpass= md5('{$data['ad_userpass']}') where ad_id = '{$data['ad_id']}'";
        return $this->db->query($sql);
    }

    /**
     * 验证是否选中自动登录,验证cookie密码
     * 
     */
    public function checkCookie(){
        if(!isset($_COOKIE['ad_username']) || !isset($_COOKIE['ad_userpass'])){
            //判断是否有cookie
            //没有则返回false
            return false;
        }
        $sql = "select * from `gx_admin_user` where ad_username = '{$_COOKIE['ad_username']}' and md5(concat(ad_userpass,ad_salt))='{$_COOKIE['ad_userpass']}'";
        return $this->db->fetchrow($sql);
    }

}