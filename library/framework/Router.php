<?php
    namespace Library\Framework;

    class Router {
        private $_uri = null;

        public function __construct($uri) {
            $this->_uri = $uri;
        }

        public function getParams() {
            $params = explode('/', trim($this->_uri, '/'));

            //set default controller/action pair in none of the params is supplied
            if (empty($params[0]) && empty($params[1])) {
                $params[0] = 'index';
                $params[1] = 'index';
            } elseif (empty($params[1])) {
                $params[1] = 'index';
            }

            if (count($params) < 2) {
                throw new \Exception('Wrong route.');
            }

            $params_['controller'] = $params[0];
            $params_['action'] = $params[1];
            unset($params[0]);
            unset($params[1]);
            $params_['args'] = array_values($params);

            return $params_;
        }
    }
?>