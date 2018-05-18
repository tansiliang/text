<?php
class ImagesTools{
    private $create_funcs = array(
        'image/jpeg' => 'imagecreatefromjpeg',
        'image/png' => 'imagecreatefrompng',
        'image/gif' => 'imagecreatefromgif'
    );//判断图片的格式
    private $out_funcs = array(
        'image/jpeg' => 'imagejpeg',
        'image/png' => 'imagepng',
        'image/gif' => 'imagegif'
    );//判断图片的格式
    /**
     * 形成缩略图
     * @param $src_file string 原文件路径
     * @param $max_w int  缩略图的宽
     * @param $max_h int 缩略图的高
     * @return string 返回缩略图地址，失败返回false 
     */
    public function ImageMake($src_file,$max_w,$max_h){
        if(!file_exists($src_file)){
            $this->error_info = "文件不存在！！！";
            return false;
        }
        $src_info = getimagesize($src_file);
        $src_w = $src_info[0];//获得原图宽
        $src_h = $src_info[1];//获得原图高
        
        //判断原图尺寸的大小，获得缩略图的大小
        #可能出现两种情况，一种是原图大于缩略图，一种是缩略图大于原图
        if($max_w > $src_w && $max_h > $src_h){
            //缩略图大于原图时，直接使用原图的宽高
            $dst_w = $src_w;
            $dst_h = $src_h;
        }else{
            if($src_w/$max_w > $src_h/$max_h){
                $dst_w = $max_w;
                $dst_h = $src_h/$src_w * $dst_w;//按照原图的宽高比求出等比后的高
            }else{
                $dst_h = $max_h;
                $dst_w = $src_w/$src_h*$dst_h;
            }
        }
        //创建画布
        //判断当前原图的图片格式
        $create_func = $this->create_funcs[$src_info['mime']];
        $src_img = $create_func($src_file);//利用可变函数，获取当前图皮
        // $src_img = imagecreatefromjpeg($src_file);

        //缩略图的大小一致
        $dst_img = imagecreatetruecolor($dst_w,$dst_h);
#-------------------留白执行失败--------------------
        //为缩略图确定颜色，白色
        // $whites = imagecolorallocate($dst_img,255,255,255);
        // imagefill($dst_img,0,0,$whites);//填充

        //采样，拷贝，修改大小。注意放置的位置
        // $dst_x = ($max_w - $dst_w)/2;
        // $dst_y = ($max_h - $dst_h)/2;
#-------------------------------------------------
        $dst_x = 0;
        $dst_y = 0;
        imagecopyresampled($dst_img,$src_img,$dst_x,$dst_y,0,0,$dst_w,$dst_h,$src_w,$src_h);
        // die(var_dump($dst_y));
        //导出
        //取得原始文件的路径与名字
        $src_dir = dirname($src_file);
        $src_base = basename($src_file);
        $thumb_file = substr($src_base,0,strrpos($src_base,'.')).'_thumb'.strrchr($src_base,'.');
        
        //判断当前图片的格式是什么
        $out_func = $this->out_funcs[$src_info['mime']];
        $out_func($dst_img,$src_dir.DS.$thumb_file);//创建图片
        // imagejpeg($dst_img,$src_dir.DS.$thumb_file);
        //销毁图片
        imagedestroy($dst_img);
        imagedestroy($src_img);
        //
        return $thumb_file;
    }
}