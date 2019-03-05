<?
include_once ROOT . '/models/App.php';

class appController {

    public function actionIndex () {

        include_once ROOT . '/views/app.php';
        return true;

    }
    
}