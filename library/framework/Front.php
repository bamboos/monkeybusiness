<?php
    namespace Library\Framework;

    class Front {
        public function __construct() {
            $dispatcher = new Dispatcher(new Router($_SERVER['REQUEST_URI']));
            $actionContent = $dispatcher->execute();

            //create view
            $view = new View('layout.php');
            $view->content = $actionContent;
            echo $view->getContent();
        }
    }
?>