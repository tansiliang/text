<?php
return array(
    'databases' => array(
        'host' => '127.0.0.1',
        'prot' => '3306',
        'user' => 'root',
        'pass' => 'root',
        'charset' => 'utf8',
        'dbname' => 'gdgxjx',
        'prefix' => 'gx_',//表名前缀
    ),#数据库
    'app' => array(
        'run_mode' => 'dev',//运行模式，dev(开发环境)|pro（开发环境）
    ),#应用程序的项目组
    'admin' => array(
        'works_list_pagesize' => '6',
    ),//后台
);
