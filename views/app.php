<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>App</title>
        <link rel="stylesheet" href="/template/css/style.css">
    </head>
    <body>
    <div id="main">
        <div class="link">
            <a href="/statistic/">Сттатистика</a>
        </div>
        <h3>Введите URL адреса</h3>
        <p class="text">(адрес нужно вводить с новой строки)</p>
        <p class="error"></p>
        <form class="form" method="post" name="form">
            <textarea rows="10" cols="50" name="url" id="url"></textarea>
            <input type="button" id="submit" value="получить информацию">
        </form>
    </div>
    <div class="res"></div>
    </body>
    <script src="/template/js/script.js"></script>
</html>
