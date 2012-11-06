<?php
    namespace Library\Framework\Model;
    use Library\Database\Connector;

    class DbModel implements IModel {
		private $_connector = null;
        protected $_type = null;
        private $_fields = null;

		public function __construct($defaults = array()) {
			$this->setConnector(Connector::getInstance());
            $this->fromArray($defaults);
		}

		private function setConnector(Connector $connector) {
			$this->_connector = $connector;
		}

		private function getConnector() {
			return $this->_connector;
		}

		public function save() {
			$this->getConnector()->save($this->_type);
		}

		public function delete() {

		}

        public function load($id) {
            if ($id) {
                $array = $this->_connector->fetch($this->_type . 's', array('where' => "id='{$id}'"));
                if (!empty($array)) {
                    $this->fromArray($array[0]);
                }
            }
        }

        public function fromArray($data) {
            $this->_fields = array_keys($data);
            foreach ($data as $name => $item) {
                $this->$name = $item;
            }
        }
	}
?>