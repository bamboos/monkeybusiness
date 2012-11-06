<?php
    namespace Library\Framework;

    class Dispatcher {
        private $_router = null;

        public function __construct(Router $router) {
            $this->_router = $router;
        }

        public function execute() {
            try {
                $params = $this->_router->getParams();
                $class = 'App\Controller\\' . ucfirst($params['controller']);
                $error = '';

                try {
                    $reflectionMethod = new \ReflectionMethod($class, $params['action'] . 'Action');
                    $action = $params['action'];
                } catch (\ReflectionException $e) {
                    $class = $class = 'App\Controller\Error';
                    $reflectionMethod = new \ReflectionMethod($class, 'indexAction');
                    $action = 'index';
                    $error = 'Wrong resource';
                }
            } catch (\Exception $e) {
                $class = $class = 'App\Controller\Error';
                $reflectionMethod = new \ReflectionMethod($class, 'indexAction');
                $action = 'index';
                $error = 'Wrong resource';
            }

            $instance = new $class($action);

            if (!empty($error)) {
                $params['controller'] = 'error';
                $params['action'] = 'index';
                $instance->setErrorMessage($error);
            }

            $instance->setParams($params);
            $reflectionMethod->invoke($instance);

            return $instance->render();
        }
    }
?>