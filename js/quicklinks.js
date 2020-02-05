jQuery(document).ready(function($){

	var QuickLinksToggle = false;

	$('#-quickLinks-toggle-trigger').click(quickLinksToggle).keypress(quickLinksToggle);
	$('#header-top-menu-first').focus(quickLinksClose);
	$('#header-quickLinks-first').focus(quickLinksOpen);
	$('#header-quickLinks-last').focus(quickLinksOpen);

	function quickLinksToggle() {

		if (QuickLinksToggle === true) {

			quickLinksClose();

		} else {

			quickLinksOpen();
		}
	}

	function quickLinksClose() {
		
		if (QuickLinksToggle === true) {
			$('.-quick-links').animate(
				{ top : '-15px'},
				500
			);
			$('#-quickLinks-toggle-trigger').removeClass('-quickLinks-toggle-trigger-active');
			$('#-quickLinks-toggle-trigger').addClass('-quickLinks-toggle-trigger-inactive');
			QuickLinksToggle = false;
		}
	}

	function quickLinksOpen() {

		if (QuickLinksToggle === false) {

			$('.-quick-links').animate(
				{ top : '0px' },
				500
			);

			$('#-quickLinks-toggle-trigger').removeClass(
				'-quickLinks-toggle-trigger-inactive'
			);
			$('#-quickLinks-toggle-trigger').addClass('-quickLinks-toggle-trigger-active');

			QuickLinksToggle = true;
		}
	}
});