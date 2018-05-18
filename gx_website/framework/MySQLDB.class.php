<?php

	class MySQLDB{
		//对象初始化的属性
		private $host;	//
		private $port;	//端口
		private $user;	//用户名
		private $pass;	
		private $charset; //字符集
		private $dbname;	//库名
		
		#运行时生成的属性
		private $link;	//连接数据库
		private $lasc_sql; //最后执行的SQL
		private static $instance; #当前实例对象
		
		/**
		*@access  
		*
		*$param $arr Array 
		*/
		private function __construct($arr = array()){
			$this->host = isset($arr['host'])?$arr['host']:'127.0.0.1';
			$this->port = isset($arr['port'])?$arr['port']:'3306';
			$this->user = isset($arr['user'])?$arr['user']:'root';
			$this->pass = isset($arr['pass'])?$arr['pass']:'root';
			$this->charset = isset($arr['charset'])?$arr['charset']:'utf8';
			$this->dbname = isset($arr['dbname'])?$arr['dbname']:'';
			
			//连接数据库
			$this->Connect();
			//设置字符集
			$this->setCharset();
			//打开数据库
			$this->selectDb();
		}
		
		/**
		*克隆
		*/
		private function __clone(){
			
		}
		
		/**
		*实现单例模式
		*
		*/
		public static function getInstance($arr){
			if(!(self::$instance instanceof self)){
				self::$instance = new self($arr);//实例化时，需要将参数传递到构造方法内
			}
			return self::$instance;
		}
		
		/**
		*连接数据库
		*
		*/
		private function Connect(){
			if(!$link = mysql_connect($this->host.':'.$this->port,$this->user,$this->pass)){
				echo '连接失败，请联系管理员！！！';
				die;
			}else{
				#连接成功，记录数据
				$this->link = $link;
				
			}
		}
		
		/**
		*设置字符集
		*/
		private function setCharset(){
			$sql = 'set names '.$this->charset;
			$this->query($sql);
		}
		
		/**
		*选择数据库
		*/
		private function selectDb(){
			//判断一个库是否存在
			if($this->dbname === ''){
				return ;
			}
			return mysql_select_db($this->dbname,$this->link);
		}
		
		/**
		*执行SQL语句
		*
		*@param $sql string 待执行的SQL语句 
		*
		*@return mixed 成功返回 资源或true 失败返回false
		*/
		public function query($sql){
			$this->lasc_sql = $sql;
			#执行并返回结果
			if(!$resulf = mysql_query($sql,$this->link)){
				echo 'SQL语句执行失败！';
				echo '失败的SQL语句是'.$sql.'<br/>';
				echo '错误的代码是'.mysql_errno($this->link).'<br/>';
				echo '错误的信息是'.mysql_error($this->link);
				die;
		}else{
			return $resulf;
		}
		}
		
		/**
		*遍历所有数据
		*
		*@param $sql string 待执行SQL语句
		*
		*@return array 二维数组
		*/
		public function fetchAll($sql){
			if($result = $this->query($sql,$this->link)){
				//执行成功
				#遍历所有数据，形成一个二维数组
				$rows = array(); //初始化
				while($row = mysql_fetch_assoc($result)){
					$rows[] = $row;
				}
				mysql_free_result($result);//释放结果集
				return $rows;
			}else{
				//执行失败
				return false;
			}
		}
		
		/**
		*返回符合条件的，第一条数据
		*
		*@param $sql string 待执行的SQL语句
		*
		*@return array 一维数组
		*/
		public function fetchrow($sql){
			if($result = $this->query($sql,$this->link)){
				$row = mysql_fetch_assoc($result);
				mysql_free_result($result);//释放结果集
				return $row;
			}else{
				return false;
			}
		}
		
		/**
		*利用一个SQL，返回符合条件的第一条记录的第一个值
		*
		*@param $sql string 待执行SQL语句
		*
		*@return string 执行的结果
		*/
		public function fetchColumn($sql){
			if($result = $this->query($sql,$this->link)){
				if($row = mysql_fetch_row($result)){#mysql_fetch_row返回索引数组，所以第一列一定为0
					$rows = $row[0];
					mysql_free_result($result);#释放结果集
					return $rows;
				}else{
					return false;
				}
			}else{
				#执行失败
				return false;
			}
		}
		
		/**
		*在序列化时调用
		*
		*用于指明哪些属性需要序列化
		* 
		*@return array
		*/
		public function __sleep(){
			return array('host','port','user','pass','charset','dbname');
		}
		
		/**
		*在反序列化时调用
		*
		*用于对对象的属性进行初始化
		*
		*/
		public function __wakeup(){
			//连接数据库
			$this->Connect();
			//设置字符集
			$this->setCharset();
			//选择数据库
			$this->selectDb();
		}
		
	}
	// $s = new MySQLDB;
	// $arr = array(
	// 'host' => '127.0.0.1',
	// 'port' => '3306',
	// 'user' => 'root',
	// 'pass' => 'root',
	// 'charset' => 'utf8',
	// 'dbname' => 'itcase'
	// )
	// MySQLDB::getInstance($arr);