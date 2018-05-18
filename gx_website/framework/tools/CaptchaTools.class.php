<?php
class CaptchaTools{
    /**
     * 生成并显示验证码图片
     */
    public function captCha(){
        header('Content-Type:image/gif');
        $num = range(0,9);#生成0到9字符的数组
        $str_lefft1 = range('A','Z');
        $mergas = array_merge($num,$str_lefft1);//将数组连接起来
        $string = '';#用来连接字符串的变量
        for($i = 0,$len = count($mergas); $i < 4;$i++){
            $new_number[$i] = $mergas[rand(0,$len-1)];
            $string = $string.$new_number[$i];
        }
        #字符串的工作已经完成
        @session_start();
        $_SESSION['is_captcha'] = $string;
        #创建图片
        $img_w = 100;#宽度
        $img_h = 40;#高度
        $img = imagecreatetruecolor($img_w,$img_h);#创建一个真彩色的图片
        $r = mt_rand(0,255);
        $g = mt_rand(0,255);
        $b = mt_rand(0,255);
        $white = imagecolorallocate($img,255,255,255);#填充的色彩
        $r1 = mt_rand(0,255);
        $g1 = mt_rand(0,255);
        $b1 = mt_rand(0,255);
        $black = imagecolorallocate($img,$r1,$g1,$b1);
        imagefill($img,0,0,$white);#填充背景颜色
        for($i = 0; $i < 200; $i++){
            $x = mt_rand(1,$img_w);
            $y = mt_rand(1,$img_h);
            imagesetpixel($img,$x,$y,$black);#生成一个个的点
        }
        for($i = 0 ,$len = count($new_number); $i < $len;$i++){
            $x = mt_rand(1,8) + $img_w * $i / 4;
            $y = mt_rand(1,$img_h/4);
            $colorss = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
            imagestring($img,5,$x,$y,$new_number[$i],$colorss);
        }
        imagepng($img);
        imagedestroy($img);
    }
    /**
     * 验证验证码的信息
     */
    public function chackCapt($code){
        @session_start();
        //不区分大小写
        return strcasecmp($code,$_SESSION['is_captcha']) == false;
    }
}