<?php
class SessionTools{
    public $db;
    /**
     * 类加载时调用session入库的各项
     */
    public function __construct() {
        ini_set('session.save_handler', 'user');
		//设置处理器方法
		session_set_save_handler(
			array($this, 'sess_open'),
			array($this, 'sess_close'),
			array($this, 'sess_read'),
			array($this, 'sess_write'),
			array($this, 'sess_destroy'),
			array($this, 'sess_gc')
		);
		//开启session
		session_start();
    }
    /**
     * 初始化
     * 在session开启的时执行，
     * 负责完成session存储所需要资源的初始化工作
     */
    public function sess_open(){
        #连接数据库
        $this->db = MySQLDB::getInstance($GLOBALS['config']['databases']);
    }
    /**
     * 关闭脚本
     */
    public function sess_close(){
        return true;
    }
    /**
     * 负责从当前的session记录中，将session数据读取出来(读操作)
     * 
     * @param $sess_id int
     * 
     * @return string 返回的是session数据，不需要序列化
     */
    public function sess_read($sess_id) {
		$sql = "select sess_data from `gx_session` where sess_name='$sess_id'";
		return (string) $this->db->fetchColumn($sql);
	}
    /**
     * 写操作
     * 在脚本结束时执行
     * 负责将当前session数据，同步写入当前的session数据库中
     * @param int $sess_id 
     * 
     * @param string $sess_data
     * 
     * @return bool
     */
    public function sess_write($sess_id, $sess_data) {
		$expire = time();
		$sql = "insert into `gx_session` values ('$sess_id', '$sess_data', $expire) on duplicate key update sess_data='$sess_data', expact=$expire";
		return $this->db->query($sql);
	}
    /**
     * 在运行中使用session_destroy()函数时，会自动调用该方法
     * 利用当前的ID删除session
     * @param int $sess_id
     * 
     * @return 
     */
    public function sess_destroy($sess_id) {
		$sql = "delete from `gx_session` where sess_name='$sess_id'";
		return $this->db->query($sql);
	}
    /**
     * 在session_static()时执行
     * 删除所有的垃圾数据
     * 
     * @param $list 获得配置文件设置的文件保留的时间（最大的声明周期）
     * 
     * @return bool
     */
    public function sess_gc($ttl) {
		$last_time = time()-$ttl;
		$sql = "delete from `gx_session` where expact < $last_time";
		return $this->db->query($sql);
	}


    
}