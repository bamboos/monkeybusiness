<?php
    namespace Library\Framework;

    class View {
        private $_template = null;

        public function __construct($template) {
            $this->_template = $template;
        }

        public function getContent() {

            if (!file_exists(BASE_DIR . '/app/scripts/' . $this->_template)) {
                throw new \Exception('Wrong template file.');
            }

            ob_start();
                include_once BASE_DIR . '/app/scripts/' . $this->_template;
            $content = ob_get_contents();
            ob_end_clean();

            return $content;
        }
    }
?>
