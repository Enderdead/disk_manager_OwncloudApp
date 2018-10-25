<?php
namespace OCA\diskM;
use OCP\Files\IRootFolder;

class Hooks{

	/** @var IRootFolder*/
    private $root_node;

    public function __construct(IRootFolder $root_node){
        $this->root_node = $root_node;
    }

    public function register() {
        $callback = function($node) {
            //$socket = socket_create(AF_UNIX, SOCK_STREAM, 0);
            //$res = socket_connect($socket, "/tmp/disk.sock");
            //socket_recv($socket, $resultat, 1, 0);
            //socket_close($socket);
			\OCP\Util::writeLog('disk_manager','test','3');
            //$file = "/home/pi/log.txt";
            // Ouvre un fichier pour lire un contenu existant
            //$current = file_get_contents($file);
            // Ajoute une personne
            //$current .= date("D, d M Y H:i:s\n");
            // Écrit le résultat dans le fichier
            //file_put_contents($file, $current);
            // your code that executes before $user is deleted
        };
        $this->root_node->listen('\OC\Files', 'preWrite', $callback);
    }

}
?>