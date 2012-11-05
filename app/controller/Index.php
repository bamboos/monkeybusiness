<?php
    namespace App\Controller;

    use Library\Framework\Controller;
    use App\Model\Houses;

    class Index extends Controller {

        public function indexAction() {
            $housesList = new Houses();
            $housesList->populate();
            $this->view->list = $housesList;
        }

        public function createMonkeyAction() {

            if (!empty($_POST)) {
                $this->redirect('/index/index');
            }
        }

        public function workersAction() {
            $params = $this->getParams();
            $monkeyId = @$params['args'][0];
        }
    }
?>