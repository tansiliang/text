<?php

// 存在很大的问题
class PageTools{
    /**
     * 处理的只是HTML页面代码
     * 翻页的HTML代码方法
     * @param $page 当前页码
     * @param $pagesize 每页显示的条数
     * @param $total 总页数
     * @param $url 路径
     * @param $param_page array 请求的附加参数
     */
    public function showPage($page,$pagesize,$total,$url,$param_page=array()){
        #总页数
        $total_page = ceil($total/$pagesize);

        #处理路径URL
        $url_info = parse_url($url);//将URL路径分成各部分，数组
        if(isset($url_info['query'])){//判断路径的附加参数是否存在
            $url .= '&';//存在则连接
        }else{
            //没有存在，则
            $url .= '?';
        }
        //将URL额外的附加参数拼凑起来
        foreach($param_page as $key=>$value){
            $url .= $key.'='.$value.'&';
        }
        //添加额外的参数
        $url .= 'page=';

        //拼凑信息部分
        $page_info = <<<HTML
        共有<span id="">$total</span>条数据，
        总页数<span>$total_page</span>
        每页显示<input type="text" value="$pagesize" onblur="window.location.href='$url'+'1'+'&pagesize='+this.value" size="3" />条数据，
HTML;
        #链接部分,上下页形成一个循环
        $prev = $page==1?$total_page:($page-1);
        $next = $page==$total_page?1:($page+1);
        $page_link = <<<HTML
        <a href="{$url}1">首页</a>
        <a href="{$url}{$prev}">上一页</a>
        <a href="{$url}{$next}">下一页</a>
        <a href="{$url}{$total_page}">末页</a>
HTML;
        //页码列表
        $page_option = <<<HTML
        <select onchange="window.location.href='$url'+this.value">
HTML;
        for($p = 1; $p <= $total_page; $p++){
            if($p == $page){
                $page_option .= <<<HTML
                <option value="$p" selected="selected">$p</option>
HTML;
            }else{
                    $page_option .= <<<HTML
                    <option value="$p">$p</option>
HTML;
                }
        }
            $page_option .= '</select>';
            return $page_info.'<span>'.$page_link.$page_option.'</span>';
        
    }
}