<?php
namespace OCA\diskM;
use \OCP\Files\Node;

class Hooks{

    private $root_node;

    public function __construct(Node $root_node){
        $this->root_node = $root_node;
    }

    public function register() {
        $callback = function($user) {
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
        $this->root_node->listen('\OC\Files', 'preWrite', $callback);
    }

}
?>