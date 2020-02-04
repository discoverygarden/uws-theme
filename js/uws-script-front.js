jQuery(document).ready(function($){

	var uwsQuickLinksToggle = false;

	$('#uws-quickLinks-toggle-trigger').click(quickLinksToggle).keypress(quickLinksToggle);
	$('#header-top-menu-first').focus(quickLinksClose);
	$('#header-quickLinks-first').focus(quickLinksOpen);
	$('#header-quickLinks-last').focus(quickLinksOpen);

	function quickLinksToggle() {

		if (uwsQuickLinksToggle === true) {

			quickLinksClose();

		} else {

			quickLinksOpen();
		}
	}

	function quickLinksClose() {
		
		if (uwsQuickLinksToggle === true) {
			$('.uws-quick-links').animate(
				{ top : '-15px'},
				500
			);
			$('#uws-quickLinks-toggle-trigger').removeClass('uws-quickLinks-toggle-trigger-active');
			$('#uws-quickLinks-toggle-trigger').addClass('uws-quickLinks-toggle-trigger-inactive');
			uwsQuickLinksToggle = false;
		}
	}

	function quickLinksOpen() {

		if (uwsQuickLinksToggle === false) {

			$('.uws-quick-links').animate(
				{ top : '0px' },
				500
			);

			$('#uws-quickLinks-toggle-trigger').removeClass(
				'uws-quickLinks-toggle-trigger-inactive'
			);
			$('#uws-quickLinks-toggle-trigger').addClass('uws-quickLinks-toggle-trigger-active');

			uwsQuickLinksToggle = true;
		}
	}

	//$("#uws_main_navigation-container #nice-menu-1").superfish();
	//$("#uws-new-menu-container #nice-menu-1").superfish(); 

	// Search Filter onClick Functions
    
	$('.uws-filter-container').click(function() {
    
		if ($(this).hasClass('uws-filter-container-selected')) {

			$(this).removeClass('uws-filter-container-selected');

		} else {

			$(this).addClass('uws-filter-container-selected');
		}
	});
    
	$('.uws-filter-container').each(function() {

		var currentSelectedWidth = $(this).outerWidth();
		var arrowWidth = $(this).children('.uws-filter-container-s').outerWidth();
		var uwsArrow = $(this).children('.uws-filter-container-s');

		uwsArrow.css({
			'position'  : 'absolute',
			'left'      : ((currentSelectedWidth / 2) - (arrowWidth / 2))
		});
    });

});