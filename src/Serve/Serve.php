<?php
namespace Itedo\Socket\Serve;

use PHPSocketIO\SocketIO;

class Serve
{
    private $io;

    /**
     * Serve constructor.
     */
    public function __construct()
    {
        $this->io = new SocketIO(config('itesocket.service.port'));
    }

    public function connection()
    {
        $this->io->on('workerStart', function($socket) {
            // 监听一个text 3121端口
            $inner_http_worker = new Worker('text://0.0.0.0:3121');
            $inner_http_worker->onMessage = function($http_connection, $data){
                global $user;
                $data = json_decode($data,true);
                if ($data['code'] == 1){
                    $this->io->to($user[$data['uid']]['socketId'])->emit('noticeMsg');
                }elseif ($data['code'] == 2){
                    $this->io->to($user[$data['uid']]['socketId'])->emit('updateFriendList', $data);
                }elseif ($data['code'] == 3){
                    $this->io->to($user[$data['uid']]['socketId'])->emit('msgBox', $data['read']);
                }elseif ($data['code'] == 4){
                    foreach ($data['uid'] as $value){
                        $this->io->to($user[$value]['socketId'])->emit('removeGroup', $data['group']);
                    }
                }elseif ($data['code'] == 5){
                    $http_connection->leave('room'.$data['group']);
                    $this->io->to($user[$data['uid']]['socketId'])->emit('removeGroup', $data['group']);
                }elseif ($data['code'] == 6){
                    $this->io->to($user[$data['uid']]['socketId'])->emit('removeFriend', $data['friendId']);
                }
            };
            // 执行监听
            $inner_http_worker->listen();
        });
    }
}