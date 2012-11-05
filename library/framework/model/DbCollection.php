<?php
    namespace Library\Framework\Model;
    use Library\Database\Connector;

    class DbCollection implements \Iterator {
		private $_connector = null;
        protected $type = null;
        private $_array = null;
        private $_index = null;
        protected $_itemClass = '';

		public function __construct() {
			$this->setConnector(Connector::getInstance());
		}

		private function setConnector(Connector $connector) {
			$this->_connector = $connector;
		}

		private function getConnector() {
			return $this->_connector;
		}

		private function getAll($criteria = '') {
			$this->_array = $this->getConnector()->fetch($this->type, $criteria);
		}

        public function populate($criteria = '') {
            $this->_index = 0;
            $this->getAll($criteria);
        }

        /**
         * (PHP 5 &gt;= 5.0.0)<br/>
         * Return the current element
         * @link http://php.net/manual/en/iterator.current.php
         * @return mixed Can return any type.
         */
        public function current()
        {
            return new $this->itemClass($this->_array[$this->_index]);
        }

        /**
         * (PHP 5 &gt;= 5.0.0)<br/>
         * Move forward to next element
         * @link http://php.net/manual/en/iterator.next.php
         * @return void Any returned value is ignored.
         */
        public function next()
        {
            return new $this->itemClass($this->_array[$this->_index++]);
        }

        /**
         * (PHP 5 &gt;= 5.0.0)<br/>
         * Return the key of the current element
         * @link http://php.net/manual/en/iterator.key.php
         * @return mixed scalar on success, or null on failure.
         */
        public function key()
        {
            return $this->_index;
        }

        /**
         * (PHP 5 &gt;= 5.0.0)<br/>
         * Checks if current position is valid
         * @link http://php.net/manual/en/iterator.valid.php
         * @return boolean The return value will be casted to boolean and then evaluated.
         * Returns true on success or false on failure.
         */
        public function valid()
        {
            return isset($this->_array[$this->_index]);
        }

        /**
         * (PHP 5 &gt;= 5.0.0)<br/>
         * Rewind the Iterator to the first element
         * @link http://php.net/manual/en/iterator.rewind.php
         * @return void Any returned value is ignored.
         */
        public function rewind()
        {
            $this->_index = 0;
        }
    }
?>