<?php
    namespace  Library\Framework;

    class Controller {
        protected $view = null;
        private $_params = null;

        public function __construct($action) {
            $class = explode('\\', get_class($this));
            $this->view = new View(strtolower($class[count($class) - 1]) . '_' . $action . '.php');
        }

        public function render() {
            return $this->view->getContent();
        }

        protected function redirect($location) {
            header("Location: $location");
        }

        public function setParams($params) {
            $this->_params = $params;
        }

        protected  function  getParams() {
            return $this->_params;
        }
    }
?>