<?php
/**
 * \d+(,\d+)*
 * 路由设置
 */
return [
    //用户接口
    //获取用户信息接口
    [
        'method'=>'GET',
        'rule'=>'/users/source/{source:\d+}/id/{id}',
        'controller'=>[
            'Member\Controller\UserController',
            'get'
        ]
    ],
    //获取用户账户接口
    [
        'method'=>'GET',
        'rule'=>'/accounts/source/{source:\d+}/id/{id}',
        'controller'=>[
            'Member\Controller\AccountController',
            'get'
        ]
    ],
    //扣费接口
    [
        'method'=>'POST',
        'rule'=>'/accounts/source/{source:\d+}/id/{id}/pay',
        'controller'=>[
            'Member\Controller\AccountController',
            'pay'
        ]
    ],
];
