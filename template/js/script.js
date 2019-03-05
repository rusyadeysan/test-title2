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
            preloader('show');
            sendHead();
        }
    };
    
    function checkError(val) {
        if(val.trim()) {
            error.innerText = '';
            return true
        } else {
            error.innerText     = 'введите адрес';
            return false
        }
    }

    function sendHead() {
        var formData = new FormData(document.forms.form);
        var xhr = new XMLHttpRequest();
        var resTitle = '';

        xhr.open("POST", urlAjax);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4){
                var res = JSON.parse(xhr.responseText);
                for (key in res.data) {
                    if (res.data[key] == null) {
                        res.data[key] = 'тайтл не найден';
                    }
                    resTitle += '<p class="res-title">'+ key + ' : ' + res.data[key] + '</p>';
                }
                preloader('hide');
                resDiv.innerHTML = resTitle;
            }
        }

        xhr.send(formData);

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