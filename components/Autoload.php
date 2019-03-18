<?
function __spl_autoload_register ($className){
    $paths = ['/controllers/', '/models/'];

    foreach ($paths as $path){
        $path = ROOT . $path . $className . 'php';
        if(is_file($path)){
            include_once $path;
        }
    }
}