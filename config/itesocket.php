<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Ite socket.io config
    |--------------------------------------------------------------------------
    |
    | Ite socket is developed based on laravel framework and is a secondary encapsulation
    | facade extension of workerman.
    |
    */

    /**
     * service config
     */
    'service' => [
        //service ip address 服务端IP
        'address' => '0.0.0.0',
        //web worker port web监听端口
        'port' => 2222,
        //processes 进程数
        'processes' => 2
    ],

    /**
     * client config
     */
    'client' => [
        'address' => '127.0.0.1',
        'port' => 1212
    ]
];