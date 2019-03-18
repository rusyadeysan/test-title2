document.addEventListener('DOMContentLoaded', function(){

    var btn =  document.getElementById('submit'),
        urlAjax = '/ajax/ajaxTitle.php',
        preloaderId = document.getElementById('cube-loader'),
        mainClass = document.getElementById('main'),
        textClass = document.getElementById('url'),
        resDiv = document.querySelector('.res'),
        error = document.querySelector('.error');

    btn.onclick =  function() {
        if(checkError(textClass.value)) {

            var arrUrl = textClass.value.split('\n') ,
                resTable = '<ul>'

            for (key in arrUrl) {
                if(arrUrl[key].trim()) {
                    resTable += '<li><span><a href="/statistic/?url=' + arrUrl[key] + '">' + arrUrl[key] + ' : </a></span><span id="res-' + key + '"></span></li><img class="preloader" id="preloader-' + key + '" src="/template/img/preload.gif">';
                }
            }

            resTable += '</ul>';
            resDiv.innerHTML = resTable;

            for (key in arrUrl) {
                sendHead(arrUrl[key], key);
            }
        }
    };

    function checkError(val) {
        if(val.trim()) {
            error.innerText = '';
            return true
        } else {
            error.innerText = 'введите адрес';
            return false
        }
    }

    function sendHead(url, key) {

        var xhr = new XMLHttpRequest();

        xhr.open("POST", urlAjax);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4){
                var dataRes = JSON.parse(xhr.responseText),
                    title = document.querySelector('#res-'+key),
                    preloader = document.querySelector('#preloader-'+key);

                title.innerText = dataRes.data == null ? 'ничего не найдено' : dataRes.data;
                preloader.remove();
            }
        }

        xhr.send("url=" + url);

    }

    function preloader(param) {
        if (param === 'show') {
            preloaderId.style.display = 'flex';
            mainClass.style.display = 'none';
        } else if (param === 'hide') {
            setTimeout(function() {
                preloaderId.style.display = 'none';
                mainClass.style.display = 'block';
            }, 1000);

        }
    }

});