<?php
    namespace App\Model;
    use Library\Framework\Model\DbCollection;

    class Monkeys extends DbCollection {
        protected $type = 'monkeys';
        protected $itemClass = 'App\Model\Monkey';
    }
?>