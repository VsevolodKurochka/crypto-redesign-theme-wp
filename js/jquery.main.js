jQuery(document).ready(function($){

	//

	function scroll(scrollLink, speed){
		$('html, body').animate({
			scrollTop: scrollLink.offset().top
		}, speed);
		return false;
	}
	$('.anchor').click(function(e){
		e.preventDefault();
		scroll($( $(this).attr('href') ), 1500);
	});

	// Collapse

		$(".js-collapse__group.active").children(".js-collapse__group-body").slideDown();

		$('.js-collapse').on('click', '.js-collapse__group-header', function(){
			var collapseInner = $(this).parents('.js-collapse').find('.js-collapse__group');

			$(this)
				.parent()
				.toggleClass('active');

			$(this)
				.next()
				.slideToggle('slow');

			collapseInner
				.not($(this).parent())
				.removeClass('active');

			collapseInner
				.children('.js-collapse__group-body')
				.not($(this).next())
				.slideUp("slow");

		});
	// Tabs
		$('[data-action="tab"]').click(function(){			
			// Tab links toggle class
				$(this).closest(".vtabs__list").children("li").removeClass('vactive');
				$(this).parent().addClass('vactive');
			// Show tab content
				var tabTarget = $(this).attr('data-target');
				$(tabTarget).addClass('vactive');
				$(".vtabs__content > div").not($(tabTarget)).removeClass('vactive');
		});
	// Develope

	// jQuery.dsClient2CrmServer({
	// 	"FormIDs": "_form_7_",
	// 	"PreloadInit": true
	// }).init();

	$('.block-counter__content-element').each(function(i){
		$(this).addClass('block-counter__content-element-' + i);
	});

	var getCurrentDate = function(){
		var today = new Date(); // Today Date
		var dd = today.getDate(); // Day
		var mm = today.getMonth() + 1; // January is 0!
		var yyyy = today.getFullYear(); // Year

		var hours = today.getHours(); // Hours
		var minutes = today.getMinutes(); // Minutes

		// If day < 10
		if(dd < 10) {
				dd = '0' + dd;
		} 

		// If month < 10
		if(mm < 10) {
				mm = '0' + mm;
		}

		// If hours < 10
		if(hours < 10) {
				hours = '0' + hours;
		}

		// If minutes < 10
		if(minutes < 10) {
				minutes = '0' + minutes;
		}

		var collectDate = dd + '.' + mm + '.' + yyyy;
		var collectTime = hours + ':' + minutes;

		printDate( $('.js-current-date'), collectDate );
		printDate( $('.js-current-time'), collectTime );
	}

	// Print date
	// @param el = jQuery Object
	// @param item = string
	var printDate = function(el, time){
		el.text(time);
	}

	// Define AJAX URL JSON
	var blockChainUrl = "https://blockchain.info/ru/ticker";

	var ajaxCall = function(){
		var jqxhr = $.getJSON(blockChainUrl)
			.success(function(data) {

				// Get info from USD
				var course = data.USD;

				// Get last price of bitcoin
				var courseLast = course.last;

				//var symbol = course.symbol;
				$('.js-course-value').fadeTo("slow", 0.3);
				$('.js-course-value').text(courseLast);
				setTimeout(function(){
					$('.js-course-value').fadeTo("fast", 1);
				},500);
				//$('.js-cource-currency').text(symbol);

				if($('.block-counter').length > 0){

					// Define counter
					var counter = $('.block-counter');

					// Define array
					// In future inside this array will be number
					// F.e we get number '19494'
					// we will convert to
					// ['1', '9', '4', '9', '4']
					var courseLastOutput = [];

					// Get number, round it and convert to string
					var courseLastString = Math.round(courseLast).toString();

					// Get length of this string
					var courseLastStringLength = courseLastString.length;


					// Set him attribute data-value with value "courseLastString"(parsing from JSON -> round -> to string)
					counter.attr('data-value', courseLastString);

					for(var i = 0; i < courseLastStringLength; i++){
						// push to defined array current char
						courseLastOutput.push(+courseLastString.charAt(i));
					}

					// Show in console output array
					//console.log(courseLastOutput);

					$('.block-counter__content-element').each(function(i){

						// Define children
						// We have only one children -> span
						var number = $(this).children();

						// Get number of it's children and parse to type Int(integer)
						//var numberText = parseInt(number.text());
						number.addClass('active');
						setTimeout(function(){
							number.text(courseLastOutput[i]);
							number.removeClass('active');
						}, 2000);
						// Change number
						// var numberChange = setInterval(function(){
							
						// 	if(numberText == 0){
						// 		clearInterval(numberChange);
						// 		number.text(courseLastOutput[i]);
						// 	}else{
						// 		number.text(numberText - 1);
						// 	}
						// }, 1000);
					});

					// var numberChange = setInterval(function(){
					// 	$('.block-counter__content-element').each(function(i){

					// 	});
					// }, 500);


				}

			})
			.error(function() { console.error("Error connect to JSON file"); });
	}

	ajaxCall();
	getCurrentDate();

	// Every 5 seconds do ajax call to server and update date
	setInterval(function(){
		ajaxCall();
		getCurrentDate();
	}, 5000);


	// Init OwlCarousel on FrontPage
	var owlBlogOptions = {
		items: 1,
		margin: 30,
		dots: true,
		navText: ['<i class="vfa vfa-angle-left"></i>', '<i class="vfa vfa-angle-right"></i>'],
		loop: true,
		autoplay: true,
		responsive: {
			768: {
				items: 2
			},
			992: {
				items: 3,
				nav: true,
				dots: false
			}
		}
	}
	if($('.js-owl-blog').length > 0){
		$('.js-owl-blog').owlCarousel(owlBlogOptions);
	}
	if($(window).width() > 992){
		if($('#world-map').length > 0){
			var map = $('#world-map').vectorMap({
				map: 'world_mill',
				backgroundColor: "",
				zoomOnScroll: false,
				zoomOnScrollSpeed: false,
				regionsSelectable: true,
				selectedRegions: ['RU', 'UA'],
				regionStyle: {
					initial: {
				    fill: '',
				    "fill-opacity": 0,
				    stroke: '#ed114a',
				    "stroke-width": 0.5,
				    "stroke-opacity": 1
				  },
				  hover: {
				  	"fill": '#ed114a',
				    "fill-opacity": 0.8,
				    cursor: 'pointer'
				  },
				  selected: {
				    fill: '#ed114a'
				  },
				  selectedHover: {
				  }
				}
				// onRegionOver: function(e, code){
				// 	$('.map-list-element').removeClass('active');
				// 	$('.map-list-element[data-title='+code+']').addClass('active');
				// }
			});
			//map.setSelectedRegions(['IT']);
			$('.map-list-element').each(function(){
				var code = $(this).attr('data-title');
				$(this).mouseenter(function(){
					
					$('.jvectormap-element[data-code="'+code+'"]')
						.attr('fill', '#ed114a')
						.attr('fill-opacity', '1');
					$('.map-list-element').removeClass('active');
					$(this).addClass('active');
				})
				$(this).mouseleave(function(){
					$(this).removeClass('active');
					$('.jvectormap-element').attr('fill-opacity', '0');
				})
			});
				
		}
	}


	// If exists Header_wave
		if( $('.vsite-header_wave').length > 0 ) {
			$('.vsite-header_wave').append('<a href="#section-two" class="vsite-header__arrow-down"></a>');
			$('.vsite-header__arrow-down').click(function(){
				$('html, body').animate({
					scrollTop: $( $(this).attr('href') ).offset().top - 125
				}, 1500);
				return false;
			});
		}

	// Partner Page

		// Phase
			var phaseItem = $('.partner-phase__item');
			var phaseItemLength = phaseItem.length;
			var pointStart = $('.partner-phace-line-start');

			var phaseRow = $('.phrase-row_items');

			phaseRow.attr('data-emergence', 'hidden');

			phaseItem.each(function(index){
				$(this)
					.addClass('partner-phase__item_' + index)
					.mouseenter(function(){
						// Get offset left from window
						// var offset = $(this).offset();
						//var x = e.pageX;
						var containerWidth = $('.partner-phase__container').width();
						var x = containerWidth / phaseItemLength;

						var phaseItemWidth = $(this).width();
						pointStart.css({
							'width': ( x * (index + 1) - phaseItemWidth / 3 ) + 'px'
						});

						// Get index
						//console.log(index);
						var hoveredElements = [];
						for(var j = 0; j < index; j++){
							hoveredElements.push(phaseItem[j]);
						}
						// for(var k = 0; k < hoveredElements.length; k++){
						// 	hoveredElements[k].addClass('active');
						// }
						$.each(hoveredElements, function(key, element){
							$(element).addClass('active');
						});

						// Check if hovered element is last
						if($('.partner-phase__item').last().is(':hover')){

							// Start point = full width
							pointStart.css({
								'width': '100%'
							});

							// Add animation to flag
							$('.partner-phace-line-end').addClass('active');
							setTimeout(function(){
								$('.partner-phace-line-end').removeClass('active');
							}, 500);
						}
					})
					.mouseleave(function(){
						$(this).removeClass('active');
					});
			});

			$('.partner-phase').mouseleave(function(){
				pointStart.attr('style', '');
				phaseItem.removeClass('active');
			});

		// Get data attribute from modal

			var modalPartnerButton = $('.partner-contact-form-link');
			var modalPartnerButtonDataID = modalPartnerButton.attr('data-class-id');

			$('.js-vcontact-form__modal-text').attr('data-class-id', modalPartnerButtonDataID);

	
});	