<?php
class UploadedTools{
    public $upload_dir;#保存的文件路径
    public $size;//大小
    public $alow_type;//文件类型
    public $error_info;//错误信息

    /**
     * 构造方法,初始化属性
     * @param $dir string 文件路径
     * @param $size int 文件大小
     * @param $types array 文件类型
     */
    public function __construct($dir='',$size,$types=array()){
        $this->upload_dir = $dir;
        $this->size = $size;
        $this->alow_type = empty($types)?array('image/jpeg','image/png','image/gif'):$types;
    }
    /**
     * 当为不可访问的属性赋值的时候调用改函数
     */
    public function __set($name,$values){
        if(in_array($name,array("upload_dir","size","alow_type","error_info"))){
            $this->name = $values;
        }
    }

    /**
     * 定义file函数
     * @param $prefix 保存文件的前缀
     * @return $file_name 返回文件名
     * @param $file mixed 上传的图片的所有信息
     */
    public function Uploaded($file,$prefix = 'upload_',$filename){
        //判断文件是否发生错误
        switch($file['error']){
            case 1:{
            $this->error_info= "文件太大，超过PHP上传文件的最大限制！";
            break;
            }
            case 2:{
            $this->error_info = "文件过大，超出了表单内一个隐藏元素的限制！";
            break;}
            case 3:{
            $this->error_info = "文件没有上传！";
            break;}
            case 4:{
            $this->error_info = "没有上传文件！";
            break;}
            case 6:
            case 7:{
            $this->error_info = "临时文件夹出现错误!";
            break;}
        }
        //判断文件的大小
        if($file['size'] > $this->size){
            $this->error_info = "文件过大，上传失败！";
            return false;
        }
        //判断文件类型
        if(!in_array($file['type'],$this->alow_type)){
            $this->error_info = "文件类型错误，上传失败！";
            return false;
        }
        //判断文件是否为上传文件
        if(!is_uploaded_file($file['tmp_name'])){
            $this->error_info = "文件不是上传文件，上传失败！";
            return false;   
        }
        //创建图片的name
        $file_str = strrchr($file['name'],'.');//获取上传文件的后缀名
        $file_name = uniqid($prefix).$file_str;//生成随机的文件名
        date_default_timezone_set("Asia/Shanghai");
        $date = date('Ymd');
        if(!is_dir($this->upload_dir.$filename.DS.$date)){
            //文件不存在则创建
            mkdir($this->upload_dir.$filename.DS.$date,0777,true);
        }
        if(move_uploaded_file($file["tmp_name"],$this->upload_dir.$filename.DS.$date.DS.$file_name)){
            #上传文件成功
            return $filename.'/'.$date."/".$file_name;  
        }else{
            $this->error_info = "上传失败！";
            return false;
        }
    }
}