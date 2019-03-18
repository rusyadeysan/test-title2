<?
include_once ROOT . '/models/Statistic.php';

class statisticController {

    public function actionIndex () {

        include_once ROOT . '/views/statistic.php';
        return true;

    }

}