<?
require_once ('/var/www/html/components/Db.php');

class App {

    public function get_title($url){
        $str = file_get_contents($url);
        if(strlen($str)>0){
            $str = trim(preg_replace('/\s+/', ' ', $str));
            preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title);
            return $title[1];
        }
    }

    public function add_info_url($url, $title = 'not found'){
        if (empty($title)){
            $title = 'not found';
        }

        $headers = get_headers($url);

        if($headers){
            $headersStatus = explode(" ", $headers[0]);
            $status = $headersStatus[1];

            $db = Db::getConnection();

            $sql = 'INSERT INTO url_info (URL, STATUS, TITLE) VALUES (:url, :status, :title)';
            $res = $db->prepare($sql);

            $res->bindParam(':url', $url, PDO::PARAM_STR);
            $res->bindParam(':status', $status, PDO::PARAM_STR);
            $res->bindParam(':title', $title, PDO::PARAM_STR);

            $res->execute();
        }

    }


}