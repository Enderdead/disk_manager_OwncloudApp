<?php
namespace OCA\diskM\AppInfo;

use OCA\diskM\Hooks;
use \OCP\AppFramework\App;

class Application extends App {

    public function __construct(array $urlParams=array()){
        parent::__construct('disk_manager', $urlParams);
        $container = $this->getContainer();
        $container->registerService('hooks', function($c) {
            return new Hooks(
                $c->query('ServerContainer')->getRootFolder()
            );
        });
    }


}

?>