<?php 
class AdminController extends PlatformAdminController{
    /**
     * 显示登录页面
     */
    public function loginAction(){
        if(isset($_COOKIE['ad_username']) && isset($_COOKIE['ad_userpass'])){
            // if( $dies == 'die'){
            //     require VIEW_LEVEL_DIR.'login.html';
            // }else{
            @session_start();
            $_SESSION['is_name'] = "yes";
            $data['ad_username'] = $_COOKIE['ad_username'];
            $model_name = new AdminModel;
            $list = $model_name->listList($data);
            $this->jump('index.php?p=admin&c=Index&a=index&id='.$list['ad_id'],'');
            // }
        }else{
            require VIEW_LEVEL_DIR.'login.html';
        }
    }

    /**
     * 显示验证码
     */
    public function captchaAction(){
        $captcha_tool = new CaptchaTools;
        $captcha_tool->captCha();
    }
    /**
     * ajax验证验证码是否正确
     */
    public function ajaxcaptAction(){
        $captcha_tool = new CaptchaTools;
        if(!$captcha_tool->chackCapt($_POST['textcode'])){
            echo "验证码错误,请重新输入！";
            return false;
        }
    }
    /**
     * ajax验证添加页面的用户名
     */
    public function ajaxnameAction(){
        $data['ad_username'] = $_POST['username'];
        $model_name = new AdminModel;
        if(!$model_name->addList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
    
    /**
     * 验证用户信息
     */
    public function validataAction(){
        //获取用户输入的用户名和面
        $data["ad_username"] = $_POST["textuser"];
        $data["ad_userpass"] = $_POST["textpass"];
        #验证码验证
        $captcha_tool = new CaptchaTools;
       if( !$captcha_tool->chackCapt($_POST['textcode'])){
           //验证失败
           $this->jump('index.php?p=admin&c=Admin&a=login','验证码错误',2);
       }
        //调用模型
        $model_name = new AdminModel;
        if($validata = $model_name->validataList($data)){
            //判断是否需要记录cookie值
            if(isset($_POST['aotuload']) && $_POST['aotuload'] == 1){
                //需要保存
                //cookie的有效期一个小时
                setcookie("ad_username",$validata['ad_username']);
                //还需要用md5处理下密码
                setcookie("ad_userpass",md5($validata['ad_userpass'].$validata['ad_salt']));
                //利用session来保存登录的技术
                // @session_start();
                // $_SESSION['ad_username'] = $validata['ad_username'];//保存用户名
                // $_SESSION['ad_password'] = md5($validata['ad_userpass'].$validata['ad_salt']);
            }
            //登录成功，跳转到后台首页
            //使用session会话技术传值
            // var_dump($validata);
            @session_start();
            $_SESSION['is_name'] = "yes";
            //更新当前登录的时间和ip地址
            $data['ad_lastlogn'] = time();//获得当前登录的时间戳
            $data['ad_lastip'] = $_SERVER['REMOTE_ADDR'];//获得当前登录的ip地址
            $data["ad_id"] = $validata['ad_id'];
            $model_name->changeList($data);
            $this->jump('index.php?p=admin&c=Index&a=index&id='.$data['ad_id'],'');
        }else{
            $this->jump("index.php?p=admin&c=Admin&a=login","登录信息错误",2);
        }
    }
    /**
     * 退出功能
     */
    public function dieAction(){
        //清除cookie值,利用名字置空cookie值
        setcookie('ad_username','','');
        setcookie('ad_userpass','','');
        //清除session会话的
        session_destroy();//销毁会话的全部数据
        $this->jump("index.php?p=admin&c=Admin&a=login",'');
    }
    /**
     * 管理员列表页
     */
    public function listAction(){
        //
        $model_name = new AdminModel;
        $list = $model_name->getList();
        require VIEW_LEVEL_DIR.'admin_list.html';
    }
    /**
     * 添加页面视图
     */
    public function addPageAction(){
        require VIEW_LEVEL_DIR.'admin_add.html';
    }

    /**
     * 添加管理员页
     */
    public function addAction(){
        $data['ad_username'] = $_POST['ad_username'];//用户名
        $data['ad_userpass'] = md5($_POST['ad_userpass']);//md5加密密码
        $data['ad_mail'] = $_POST['ad_mail'];//邮箱
        $data['ad_salt'] = mt_rand(100,9999);
        $data['ad_addtime'] = time();#添加的时间
        $data['ad_lastlogn'] = time();#最后登录的时间
        $data["ad_lastip"] = $_SERVER["REMOTE_ADDR"];//获取服务器的ip地址
        $model_name = new AdminModel;
        if(!$addlist = $model_name->aotuInsert($data)){
            //添加不成功
            $this->jump("index.php?p=admin&c=Admin&a=addPage",'添加失败',2);
        }else{
            //添加成功，跳转回管理员列表页
            $this->jump("index.php?p=admin&c=Admin&a=list",'');
        }
    }
    /**
     * 删除管理员信息
     */
    public function delAction(){
        $id = $_GET['id'];//获取需要删除的id
        $model_name = new AdminModel;
        if($del = $model_name->delList($id)){
            //删除成功
            $this->jump("index.php?p=admin&c=Admin&a=list",'');
        }
    }
    /**
     * 显示编辑管理员信息页面
     */
    public function seleAction(){
        $id = $_GET['id'];
        $model_name = new AdminModel;
        $list = $model_name -> editSeleList($id);
        require VIEW_LEVEL_DIR.'admin_edit.html';
    }
    /**
     * 利用ajax处理编辑页面的用户名信息
     */
    public function ajaxeditAction(){
        $data['ad_id'] = $_POST['id'];//获得当前需要修改的管理员的id
        $data['ad_username'] = $_POST['ad_username'];
        $model_name = new AdminModel;
        if(!$model_name->ajaxEditList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
    /**
     * 利用ajax处理编辑页面旧密码
     */
    public function ajaxpassAction(){
        $data['ad_id'] = $_POST['id'];
        $data['ad_userpass'] = $_POST['oldpass'];
        $model_name = new AdminModel;
        if(!$model_name->ajaxpassList($data)){
            echo $model_name->error_info;
            return false;
        }else{
            echo $model_name->error_info;
        }
    }
    /**
     * 编辑页面的信息
     */
    public function updateAction(){
        $data['ad_id'] = $_GET['id'];//获得当前需要修改的管理员的id
        $data['ad_username'] = $_POST['ad_username'];
        $data['ad_mail'] = $_POST['ad_mail'];
        $data['ad_userpass']=empty($_POST['ad_oldpass'])?$_POST['ad_userpass']:$_POST['ad_password'];//如果检测到旧密码为空，则取原来的值，如果不为空则获取新的密码值
        $model_name = new AdminModel;
        if($update = $model_name->updateList($data)){
            //修改成功
            // echo "修改成功";
            $this->jump("index.php?p=admin&c=Admin&a=list",'');
        }else{
            $this->jump("index.php?p=admin&c=Admin&a=sele",'编辑失败原因：'.$model_name->error_info,2);
        }
    }

}