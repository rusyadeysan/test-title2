<?
require_once ('/var/www/html/components/Db.php');

class Statistic {

    public static function getStatistic ($url) {

        $db = Db::getConnection();
        $sql = 'SELECT * FROM url_info WHERE URL=:url AND DATE_U >= DATE_SUB(CURRENT_DATE, INTERVAL 5 DAY)';

        $res = $db->prepare($sql);

        $res->bindParam(':url', $url, PDO::PARAM_STR);

        $res->execute();

        $urlInfo = [];
        while ($resalt = $res->fetch()){
            $date = explode(' ', $resalt['DATE_U']);
            $resalt['DATE_U'] = $date[0];

            $urlInfo[$resalt['DATE_U']][$resalt['STATUS']] = $urlInfo[$resalt['DATE_U']][$resalt['STATUS']] ? ++$urlInfo[$resalt['DATE_U']][$resalt['STATUS']] : 1;

        }

        foreach ($urlInfo as $k => $value) {
            $urlInfo['ITEMS'][200][] = $value[200] ?? 'null';
            $urlInfo['ITEMS'][301][] = $value[301] ?? 'null';
            $urlInfo['ITEMS'][404][] = $value[404] ?? 'null';
            $urlInfo['DATE'][] = $k;
            unset($urlInfo[$k]);

        }

        return $urlInfo;

    }


}