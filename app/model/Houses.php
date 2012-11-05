<?php
    namespace App\Model;
    use Library\Framework\Model\DbCollection;

    class Houses extends DbCollection{
        protected $type = 'houses';
        protected $itemClass = 'App\Model\House';
    }
?>