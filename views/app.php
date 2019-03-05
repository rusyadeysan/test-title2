<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>App</title>
        <link rel="stylesheet" href="/template/css/style.css">
        <script src="/template/js/script.js"></script>
    </head>
    <body>
        <div id="main">
            <h3>Введите URL адреса</h3>
            <p class="text">(адрес нужно вводить с новой строки)</p>
            <p class="error"></p>
            <form class="form" method="post" name="form">
                <textarea rows="10" cols="50" name="url" id="url"></textarea>
                <input type="button" id="submit" value="Отправить">
            </form>
            <div class="res"></div>
        </div>
        <div id="cube-loader" style="display: none">
            <div class="caption" >
                <div class="cube-loader">
                    <div class="cube loader-1"></div>
                    <div class="cube loader-2"></div>
                    <div class="cube loader-4"></div>
                    <div class="cube loader-3"></div>
                </div>
            </div>
        </div>
    </body>
</html>
