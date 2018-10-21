<?php
namespace OCA\diskM;
use OCP\IUserManager;

class Hooks {

    private $userManager;

    public function __construct(IUserManager $usermanager){
        $this->userManager = $usermanager;
    }

    public function register() {
        $callback = function($user, $password) {
            //$socket = socket_create(AF_UNIX, SOCK_STREAM, 0);
            //$res = socket_connect($socket, "/tmp/disk.sock");
            //socket_recv($socket, $resultat, 1, 0);
            //socket_close($socket);
            $file = "/home/pi/log.txt";
            // Ouvre un fichier pour lire un contenu existant
            $current = file_get_contents($file);
            // Ajoute une personne
            $current .= date("D, d M Y H:i:s\n");
            // Écrit le résultat dans le fichier
            file_put_contents($file, $current);
            // your code that executes before $user is deleted
        };
        $this->userManager->listen('\OC\User', 'preLogin', $callback);
    }

}
?>