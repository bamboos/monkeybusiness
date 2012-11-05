<?php
    namespace App\Model;
    use Library\Framework\Model\DbModel;

	class Monkey extends DbModel {
        protected $_type = null;

		public function __construct($type) {
            $this->_type = $type;
        }
	}
?>