//запускаем js только после полной загрузки документа.

document.onreadystatechange = function () {

    if (document.readyState == "complete") {
        //Получаем все формы для навешивания нашего обработчика событий        
        let forms = document.querySelectorAll('form');

        for (let i = 0; i < forms.length; i++) {
            forms[i].addEventListener('submit', myFetch);
        }
    }

    //fetch зарос
    function myFetch(event) {

        event.preventDefault();

        var inps = document.querySelectorAll("input"), //получаем все инпуты
            data = {};  //массив выходных параметров для запроса

        //Собираем массив параметров формы для отправки fetch запросом
        for (var i = 0; i < inps.length; i++) {
            if (inps[i].name && inps[i].form === this) {
                data[inps[i].name] = inps[i].value;
            }
        }

        //Входящие данные
        const requestURL = this.action;
        const requestMethod = this.method;

        //Вызов функции
        sendRequest(requestMethod, requestURL, data)
            //Здесь ответ в случае успеха
            .then(data => console.log(data))
            //Здесь ответ в случае неудачи
            .catch(err => console.error(err))
    }

    //Функция генерирующая fetch запрос
    function sendRequest(method, url, body = null) {
        //Формируем заголовок запроса (можно и без него я в php просто парсю полезную нагрузку)
        const headers = {
            'Content-Type': 'application/json',
        }
        //В выводе функции вызываем fetch запрос с подготовленными данными
        return fetch(url, {
            method: method,
            body: JSON.stringify(body),
            headers: headers
            //Так как результатом fetch возвращается promise, то стрелочной функцией разбираем ответ как json (можно получать объекты)
        }).then(response => {
            return response.json();
        })
    };

}


//https://good-code.ru/ajax-zapros/