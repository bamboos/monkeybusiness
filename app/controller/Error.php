<?php
    namespace App\Controller;

    use Library\Framework\Controller;

    class Error extends Controller {
        private $_message = null;

        public function indexAction() {
            $this->view->error = $this->getErrorMessage();
        }

        public function setErrorMessage($message) {
            $this->_message = $message;
        }

        public function getErrorMessage() {
            return $this->_message;
        }
    }
?>