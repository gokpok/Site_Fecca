//function drawingFunction(){
	// тут ваш код


	// Поворот карты по клику

	$('.card_block').click( function() {							// Вызов функции по событию клика
		if($(this).find('.card_wrap').hasClass('flip')) { 			// Если у карточки есть класс поворота
			$(this).find('.card_wrap').removeClass('flip'); 		// Удаляем класс поворота
			$(this).find('.card_back').removeClass('adapt_back');	// Удаляем вспомогательный класс, позволяющий оборотной стороне карты увеличивать высоту от содержимого
			$(this).find('.card').removeClass('adapt_front');		// Удаляем вспомогательный класс лицевой стороны
		} else {
			$(this).find('.card_wrap').addClass('flip');			// Добавляем класс поворота
			$(this).find('.card_back').addClass('adapt_back');		// Добавляем вспомогательные классы
			$(this).find('.card').addClass('adapt_front');
		}
	})



	//Код разворота пунктов FAQ

	var acc = document.getElementsByClassName("accordion");			// Запись кнопок с классом "accordion" в переменную асс
	var i;															// Переменная для цикла

	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
			/* Toggle between adding and removing the "active" class,
			to highlight the button that controls the panel */
			this.classList.toggle("active");

			/* Toggle between hiding and showing the active panel */
			var panel = this.nextElementSibling;
			if (panel.style.display === "block") {
				panel.style.display = "none";
			} else {
				panel.style.display = "block";
			}
		});
	} 

	// Поворот стрилки в правом краю пункта FAQ

	$(".button_wrap").click(function() {
		var target = $( event.target );
		/*
		if ( target.is("a") ) {
		//follow that link
		return true;
		} else */
		$(this).find(".ar").toggleClass("rotate"); // Переключение класса поворота на 180 градусов
		
		return false;
	});

	// Код слайдера с карточками

	let swiper = new Swiper(".mySwiper", {
		slidesPerView: 1,							// Слайдов на жкран
		spaceBetween: 30,
		
		
		//Точки отзыва
		breakpoints: {
		// Когда окно браузера >= 1305px
		1305: {
			slidesPerView: 3,
			spaceBetween: 20,
			//autoHeight: true
		},
		},
		// Вид индикатора навигации
		pagination: {
		el: ".swiper-pagination",
		clickable: true,
		},
	});

	// Добавление класса с display block (отображением) окну с дочерним меню уровня вложенности 2 и более по наведению мыши
	if (screen.width >= 1305){
		$(".drop").hover(function() {
			var target = $( event.target );
			$(this).children('ul').toggleClass("open");	
		});
	}
	else{
		$(".drop").click(function() {
			var target = $( event.target );
			$(this).children('ul').toggleClass("open");	
		});
	}
	// Добавление класса с display block (отображением) окну с дочерним меню уровня вложенности 1 по клику мыши
/*
	$(".main_drop").click( function() {
		var target = $( event.target );

		
		if($(this).children('ul').hasClass('open')) {					// Если у дочернего меню есть класс открытости (подменю выпало)
	//		$(this).children('ul').removeClass('open');					// Удаляем класс открытости
	//		$(this).find(".menu_nav").removeClass("rotate");			// удаляем класс поворота стрелки 
		}
		else{															// Если у дочернего мкню нет класса открытости (подменю закрыто)
			$(".main_drop").children('ul').removeClass('open');			// Закрываем все подменю у все других пунктов меню
			$(".main_drop").find(".menu_nav").removeClass("rotate");	// поворачиваем стрелки назад

			
		}
		
	});
	*/

	$(".main_drop").click( function(e) {									// событие клика по пункту меню 0 уровня

		let flag = false;
		//alert("ok");
		console.log(this);
		console.log(e.target);
		if (e.target === this												// если клик произошёл по пункту
			&& !$(this).children('ul').hasClass('open')){					// и подменю закрыто
				$(".main_drop").children('ul').removeClass('open');			// закрываем все пункты меню

				$(".main_drop").find(".menu_nav").removeClass("rotate");	// Поворачиваем стрелку пунктов меню
				
				$(this).children('ul').addClass('open');					// Октрываем подменю целевого пункта меню
				$(this).find(".menu_nav").addClass("rotate");				// Поворачиваем стрелку целевого пункта меню
		}else{
				if (e.target === this												// если клик произошёл по пункту
					&&  $(this).children('ul').hasClass('open')){					// и подменю открыто
						$(".main_drop").children('ul').removeClass('open');					// закрываем все подменю
						$(".main_drop").find(".menu_nav").removeClass("rotate");			// Поворачиваем стрелку пунктов меню
				}		
		}
	})
	
	$(document).mouseup(function (e){ 									// событие клика по веб-документу
		var div = $(".main_drop"); 										// тут указываем класс элемента

		if (!div.is(e.target) 											// если клик был не по нашему блоку
			&& div.has(e.target).length === 0) { 						// и не по его дочерним элементам
			$(".main_drop").children('ul').removeClass('open');			// закрываем все подменю
			$(".main_drop").find(".menu_nav").removeClass("rotate");	// поворачиваем стрелки обратно
		}
	}); 

	$(document).ready(function() {
		$('.menu-burger__header').click(function() {
			$('.menu-burger__header').toggleClass('open-menu');
			$('.header__nav').toggleClass('open-menu');
			$('body').toggleClass('lock');
		});
	});



	$( window ).resize(function() {
		if (screen.width <= 767){
			//alert("ok");
			//$.delay(700);
			function checkForChanges()
			{
				var height = $('.card').height(); //получаем высоту одного элемента
				$('.card_back').height(height); //записываем высоту другому элементу
			}
			checkForChanges();
		}
	  });
/*
$(window).resize(function() {
	console.log('window is resized');
	drawingFunction();
   });
   
   $( document ).ready(function() {
   drawingFunction(); // for onload 
   });*/