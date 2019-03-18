<?
$url = $_REQUEST['url'];
if($url) {
    $stat = Statistic::getStatistic($url);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Статистика</title>
</head>
    <body>
        <?if($stat){?>
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <?} else {?>
            <h1>Ничего не найдено</h1>
        <?}?>
    </body>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="/template/js/script-table.js"></script>
    <script>
        setTable(<?=json_encode(['items' => $stat['ITEMS'], 'date' => $stat['DATE']])?>);
    </script>
</html>
