<?php ?>
	<script type="text/javascript">
		//<![CDATA[
			(function ($) {
				BJA_form_submit = function () {
					if ($('#uws-search-option-all').hasClass('uws-filter-container-selected')) {
						$('#scp\\.scps').val('scope:("UWS-ALMA"),primo_central_multiple_fe');
						$('#fctExcV').val('');
					}

					if ($('#uws-search-option-books').hasClass('uws-filter-container-selected')) {
						$('#scp\\.scps').val('scope:("UWS-ALMA")');
						$('#fctExcV').val('journals');
					}

					if ($('#uws-search-option-journals').hasClass('uws-filter-container-selected')) {
						$('#scp\\.scps').val('primo_central_multiple_fe');
						$('#fctExcV').val('');
					}

					return(true);
				}
			}(jQuery));
		//]]>
	</script>

	<form id="uws-library-BJA-search-form" method="get" action="http://dc02kg0387na.hosted.exlibrisgroup.com:1701/primo_library/libweb/action/search.do" onsubmit="return BJA_form_submit();">

		<div class="uws-library-external-search-filter-container">
			<span class="uws-search-label">Search:</span>
			<span id="uws-search-option-all" class="uws-filter-container uws-filter-container-selected">
				<div class="uws-filter-container-s"></div>All
			</span>
			<span id="uws-search-option-books" class="uws-filter-container">
				<div class="uws-filter-container-s"></div>Books only
			</span>
			<span id="uws-search-option-journals" class="uws-filter-container">
				<div class="uws-filter-container-s"></div>Journals &amp; more ...
			</span>
		</div>

		<input type="hidden" name="vid" value="UWS-ALMA">
		<input type="hidden" name="fn" value="search">
		<input type="hidden" name="scp.scps" id="scp.scps" value="">
		<input type="hidden" name="fctExcV" id="fctExcV" value="">
		<input type="hidden" name="rfnExcGrp" id="rfnExcGrp" value="1">
		<input type="hidden" name="mulExcFctN" id="mulExcFctN" value="facet_rtype">

		<label for="uws-search-form" form="uws-library-BJA-search-form" class="offscreen">
			Find books, journal &amp; articles
		</label>

		<input type="text" name="vl(freeText0)" id="uws-search-form" placeholder="Find books, journal articles &amp; more ...">
		<input type="submit" value="Search" id="uws-search-button">
	</form>