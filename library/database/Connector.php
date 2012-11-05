<?php
    namespace Library\Database;

	class Connector {
        private static $_instance = null;
        private $_link = null;

		private function __construct() {
            //static constructor
		}

        public static function getInstance() {
            if (!self::$_instance) {
                self::$_instance = new Connector();
            }

            return self::$_instance;
        }

        public function connect($params) {

            if (!isset($params['host']) || !isset($params['username']) || !isset($params['password']) || !isset($params['db'])) {
                throw new \Exception("Wrong params", 1);

            }

            $this->_link = mysqli_connect(
                $params['host'],
                $params['username'],
                $params['password'],
                $params['db']
            );

            if (!$this->_link) {
                throw new \Exception('Can\'t connect to a database.');
            }
        }

		public function save(array $data) {
			if (!empty($data['id'])) {
				$this->query();
			} else {
				$this->query();		
			}
		}

		public function delete($cond) {
			
			if (is_int($cond)) {
				$this->query();
			} else if (is_array($cond)) {
				$this->query();
			} else if (is_string($cond)) {
				$this->query();
			}
		}

		public function query($sql = '') {
            return mysqli_query($this->_link, $sql);
		}

        public function fetch($table, $criteria = '') {
            return mysqli_fetch_all($this->query("SELECT * FROM $table"), MYSQLI_ASSOC);
        }
	}
?>