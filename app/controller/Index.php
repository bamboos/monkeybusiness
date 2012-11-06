<?php
    namespace App\Controller;

    use Library\Framework\Controller;
    use App\Model\Houses;
    use App\Model\House;
    use App\Model\Monkeys;

    class Index extends Controller {

        public function indexAction() {
            $housesList = new Houses();
            $housesList->populate();
            $this->view->list = $housesList;
        }

        public function houseAction() {

            if (!empty($_POST)) {
                $this->redirect('/index/index');
            }
        }

        public function workersAction() {
            $params = $this->getParams();
            $houseId = @$params['args'][0];

            if (!$houseId) {
                $this->redirect('/error/index');
            }

            $monkeysList = new Monkeys();
            $monkeysList->populate(array('relation' => array(
                'name' => 'production',
                'subject' => 'house',
                'object' => 'monkey',
                'key' => $houseId
            )));

            $this->view->list = $monkeysList;
            $this->view->houseId = $houseId;
        }

        public function addWorkerAction() {
            $params = $this->getParams();
            $houseId = @$params['args'][0];

            if (!empty($_POST) && isset($_POST['form'])) {
                $this->redirect('/index/workers/' . $_POST['form']['house_id']);
            }

            $house = new House();
            if ($houseId) {
                $house->load($houseId);
            }

            if (!isset($house->id)) {
                $this->redirect('/error/index');
            }

            $monkeysList = new Monkeys();
            $monkeysList->populate();

            $this->view->workers = $monkeysList;
            $this->view->house = $house;
        }
    }
?>