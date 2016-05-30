
$(document).ready(function() {
	$("#register").click(function() {
		/* Получаем поля формы */
		var family = $('#family').val();
		var firstname = $("#firstname").val();
		var fathername = $("#fathername").val();
		var city = $("#city option:selected").text();
		var street = $("#street").val();
		var birth = $("#birth").val();
		var phone = $("#phone").val();


		if (family == '' || firstname == '' || fathername == '' || city == '' || street == '' || birth == '' || phone == '') {
		/* Проверка на заполнение всех полей */
			alert("Заполните все поля");

			} 	else {

			$.post("addtodb.php", {
				/* Посылаем все значения в скрипт php который добавляет запись в базу данных */
				family1:family,
				firstname1: firstname,
				fathername1: fathername,
				city1: city,
				street1: street,
				birth1: birth,
				phone1: phone

			}, function(data) {

				document.getElementById('form1').reset();/*  очистка формы */



			});

		}
	});
});


function showUsers() {/* Показать все записи */

        if (window.XMLHttpRequest) {

            xmlhttp = new XMLHttpRequest();
        } else {

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("allusers").innerHTML = xmlhttp.responseText; /* вставка данных в блок div allusers */
            }
        };

        xmlhttp.open("GET","getusers.php",true);
        xmlhttp.send();
 }
function edit(str) { /* реактирование записи */

	if (window.XMLHttpRequest) {

            xmlhttp = new XMLHttpRequest();
        } else {

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('editing').innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET","edituser.php?id="+str,true);
        xmlhttp.send();
}
function updateuser(){ /* отправка новых значений редактируемой записи */

		var uId = $("#upid").val();
		var uFamily = $("#upfamily").val();
		var uFirstname = $("#upfirstname").val();
		var uFathername = $("#upfathername").val();
		var uCity = $("#upcity option:selected").text();
		var uStreet = $("#upstreet").val();
		var uBirth = $("#upbirth").val();
		var uPhone = $("#upphone").val();


		$.post("update.php", {
				idUpdate:uId,
				familyUpdate: uFamily,
				firstnameUpdate: uFirstname,
				fathernameUpdate: uFathername,
				cityUpdate: uCity,
				streetUpdate: uStreet,
				birthUpdate: uBirth,
				phoneUpdate: uPhone
		}, function(data) {

				showUsers(); /* после обновления, показать список записей */

			})

}

function deleteuser(){ /* удаление */

		var uId = $("#upid").val(); /* id записи которую удалить */

		$.post("delete.php", {
				idUpdate:uId,

		}, function(data) {

				showUsers();  /* после обновления, показать список записей */

			})

}

function selectCity() { /* подгружаем список городов в <select> */

	if (window.XMLHttpRequest) {

            xmlhttp = new XMLHttpRequest();
        } else {

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('city').innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET","selectCity.php",true);
        xmlhttp.send();


}
function selectStreet() { /* подгружаем список улиц в соответствии с выбранным городом */

		$( '#city' ).change(function () {

			$( '#street' ).find( 'option:not(:first)' )	// Ищем все теги option, не являющиеся тегом по умолчанию
				.remove()	// Удаляем теги
				.end()		// Возвращаемся к исходному объекту
				.prop( 'disabled',true );// Делаем поля неактивными
			var typeid =  $(this).val(); //сохраняем выбранное значение города
			$.post("selectStreet.php", { /* отправляем id города в соответствии с которым должны выбрать улицы */

				id:typeid


			  }, function(data) {

						$( '#street' ).append(data); /* добавляем улицы */

					$( '#street' ).prop( 'disabled', false ); /* Делаем поля активными */
				}
				)});
}
function selectStreetEdit() { /* Та же функция что и сверху - только для окна editing.... подгружаем список улиц в соответствии с выбранным городом */



			$( '#upstreet' ).find( 'option:not(:first)' )	// Ищем все теги option, не являющиеся тегом по умолчанию
				.remove()	// Удаляем теги
				.end()		// Возвращаемся к исходному объекту
				.prop( 'disabled',true );// Делаем поля неактивными
			var typeid =  $('#upcity').val(); //сохраняем выбранное значение города
			$.post("selectStreet.php", { /* отправляем id города в соответствии с которым должны выбрать улицы */

				id:typeid


			  }, function(data) {

						$( '#upstreet' ).append(data); /* добавляем улицы */

					$( '#upstreet' ).prop( 'disabled', false ); /* Делаем поля активными */
				}
				);
}
