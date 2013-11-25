jQuery(document).ready(function($) {

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
				{ top : '-155px'},
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
	
    // Search Filter onClick Functions

	$('.uws-filter-container').click(function() {
    
		/* Amir: changed the logic to act as radio buttons */
		$('#uws-search-option-all').removeClass('uws-filter-container-selected');
		$('#uws-search-option-books').removeClass('uws-filter-container-selected');
		$('#uws-search-option-journals').removeClass('uws-filter-container-selected');

		$(this).addClass('uws-filter-container-selected');

		if ($('#uws-search-option-books').hasClass('uws-filter-container-selected')) {
			$("input[name='s.cmd']").val('addFacetValueFilters(ContentType,Book / eBook,Journal / eJournal:t,Journal Article:t,Newsletter:t,Newspaper Article:t,Trade Publication Article:t,Book Review:t)');
		} else if ($('#uws-search-option-journals').hasClass('uws-filter-container-selected')) {
			$("input[name='s.cmd']").val('addFacetValueFilters(ContentType,Journal Article:f,Book / eBook:f,Book Chapter:f,Book Review:t,Image:f,Newspaper Article:t)');
		} else {
			// All
			$("input[name='s.cmd']").val('addFacetValueFilters(ContentType,Book Review:t,Newspaper Article:t)');
		}
	});
    
	$('.uws-filter-container').each(function() {
    
		var currentSelectedWidth = $(this).outerWidth();
		var arrowWidth = $(this).children('.uws-filter-container-s').outerWidth();
		var uwsArrow = $(this).children('.uws-filter-container-s');

		uwsArrow.css({
			'position'	: 'absolute',
			'left'		: ((currentSelectedWidth / 2) - (arrowWidth / 2))
		});
	});

	if ($('.uws-library-block-container-gm').length > 0) {

		//$('.uws-library-block-container-gm h2').append('<span class="c_s_gm"></span>');
		$('.uws-library-block-container-gm h2').prepend('<span class="c_s_gm"></span>');

		if ($('.uws-library-content-sidebar-right').height() < $('#gm_wrapper_gm').height()) {

			$('.uws-library-content-sidebar-right').css(
				'min-height',
				$("#gm_wrapper_gm").height() + 5 + 'px'
			);
		}
	}

	// Opens the refchatter window by default
	$('#block-uws-online-librarian-uws-online-librarian').find('.c_s_gm').addClass('mm_gm');
	$('#block-uws-online-librarian-uws-online-librarian').find('.content').css(
		'display',
		'block'
	);

	$('.uws-library-block-container-gm h2').click(function() {
		$('.uws-library-block-container-gm .content').hide();
		$('.mm_gm').removeClass('mm_gm');
		$(this).parent('div').find('.content').slideToggle();
		$(this).find('.c_s_gm').addClass('mm_gm');
	});
	
});

(function($) {
	update_legacy_iframe_size = function(id) {

		if (id != '' && id != null) {
			size = $('#' + id).contents().find('body').height() + 100;
			//alert(size);
			$('#' + id).height(size + 'px');
		}
	};
}(jQuery));
