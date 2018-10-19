<?php
namespace OCA\diskM;
use OCP\IUserManager;

class DiskHooks {

    private $userManager;

    public function __construct(IUserManager $usermanager){
        $this->userManager = $usermanager;
    }

    public function register() {
        $callback = function($user) {
            $socket = socket_create(AF_UNIX, SOCK_STREAM, 0);
            $res = socket_connect($socket, "/tmp/disk.sock");
            socket_recv($socket, $resultat, 1, 0);
            socket_close($socket);
            
            // your code that executes before $user is deleted
        };
        $userManager->listen('\OC\User', 'preLogin', $callback);
    }

}
?>