# addressbook
Адрессная книга состоит из двух вкладок. На первой можно добавить запись, на второй просмотреть, отредактировать и удалить записи.
Цикл работы приложения: С загрузкой страницы на вкладке "Добавление записи", срабатывает функция selectCity, которая посылает get
запрос к selectCity.php (в котором выбираются города из базы данных), и  получает список улиц. Затем при изменении 
<select id = "city"> срабатывает функция selectStreet, которая действует по аналогии предыдущей. После заполнения всех полей, 
и нажатия на кнопку "Создать запись" срабатывает главная функция в файле js "my.js", которая отправляет данные POST-запросом в 
файл addtodb.php (где происходит добавление данных(INSERT)). После чего можно просмотреть список добавленных записей на вкладке 
"Все записи". При нажатии на вкладку срабатывает showUsers/getusers, действует через AJAX обновляет данные на странице. Имеется
возможность отредактировать или удалить каждую запись, возле каждой записи есть кнопка "редактировать", при нажатии на которую 
добавляется форма редактирования (опять же загруженная через ajax) в <div id = "editing">, в данной форме можно удалить запись
или сохранить отредактированную запись, нажав на соответствующие кнопки. После удаления или сохранения результата редактирования 
так же срабатывает showUsers/getusers.
Все функции js  в одном файле - my.js. Подключение к базе происходит из файла connect.php.
    

