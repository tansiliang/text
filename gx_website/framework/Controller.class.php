<?php
class Controller{

    /* private $auth = array(
        'admin' => array(//权限列表
            array(c, a),
            array(c2, a2)
        ),
        'root'=> ...
    )

    public function __construct(){
        g = session(group)
        $auth = $this->auth[$g];
        if(g== admin){
            $_GET['a'];
        }
    } */
    //页面跳转类
    public function jump($url,$message,$time = 1){
        if($message == ''){
            header('location:'.$url);
        }else{
            $file_name = VIEW_LEVEL_DIR.'jump.html';
            if(file_exists($file_name)){
                require $file_name;
            }else{
                echo <<<HTML
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta http-equiv="Refresh" content="3 ;url= $url">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>提示信息：$message </title>
  <link href="./app/view/admin/styles/login1.css" rel="stylesheet" type="text/css" />
 </head>
 <body>
     $message
 </body>
 </html>
HTML;
            }
        }
        die();
    }
}