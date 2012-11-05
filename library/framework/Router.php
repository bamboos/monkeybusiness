<?php
    namespace Library\Framework;

    class Router {
        private $_uri = null;

        public function __construct($uri) {
            $this->_uri = $uri;
        }

        public function getParams() {
            $params = explode('/', trim($this->_uri, '/'));

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