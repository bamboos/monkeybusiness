<?php

    use Library\Framework\Loader;
    use Library\Framework\Front;
    use Library\Database\Connector;
    use Library\Framework\Config;

    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Loader.php';

    class MonkeyBusiness {
        public function __construct() {
            //initialize loader
            new Loader();

            //create a database connection
            Connector::getInstance()->connect(
                get_object_vars(Config::get('database'))
            );

            //initialize front controller
            new Front();
        }
    }
?>