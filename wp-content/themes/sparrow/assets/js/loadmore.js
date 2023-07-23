jQuery(function($){

	// Запрет на повторный клик во время подгрузки
	let ajaxPermission = true;

	$("#loadmore_portfolio").click(event => {

		if (ajaxPermission) {
			console.log("click");

			let btn 	= document.querySelector("#loadmore_portfolio"),
				paged 	= btn.dataset.paged,
				maxPages= btn.dataset.max_pages,
				postsN 	= btn.dataset.posts_n,
				text 	= btn.textContent;

			$.ajax({
				type : 'POST',
				url : myAjax.url, // получаем из wp_localize_script()
				data : {
					paged : paged, // номер текущей страниц
					posts_per_page : postsN,
					action : 'loadmore' // экшен для wp_ajax_ и wp_ajax_nopriv_
				},
				beforeSend : function( xhr ) {
					$("#loadmore_portfolio").text( 'Loading...' );
					ajaxPermission = false;
				},
				success : function( data ){

					ajaxPermission = true;
	 
					paged++; // инкремент номера страницы
					$("#portfolio-wrapper").append( data );
					$("#loadmore_portfolio").text( text );
					
					// если последняя страница, то удаляем кнопку
					if( paged == maxPages ) {
						$("#loadmore_portfolio").remove();
					} else {
						btn.dataset.paged = paged;
					}
	 
				}
	 
			});

		}
			
	});

});