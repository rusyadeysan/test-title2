<?
include_once '/var/www/html/models/App.php';
$url = $_REQUEST['url'];
if(!empty($url)){

    $app = new App;

    $res = $app->get_title($url);
    $app->add_info_url($url, $res);
    exit (json_encode(['data' => $res]));

}