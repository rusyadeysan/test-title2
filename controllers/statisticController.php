<?
include_once ROOT . '/models/Statistic.php';

class statisticController {

    public function actionIndex () {

        $db = Db::getConnection();

        include_once ROOT . '/views/statistic.php';
        return true;

    }

}