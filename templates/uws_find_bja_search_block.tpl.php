<?php
$form = drupal_get_form('islandora_solr_simple_search_form');
print drupal_render($form);
?>



<script type="text/javascript">
<!-- Functions for changing the behaviour of the Search Form if "data" and "publications" selected

//-->

	function on_data_click() {
		delete_cookie('search');
		document.forms['islandora-solr-simple-search-form'].action = 'http://research-data.uws.edu.au/redbox/default/search'; 
		document.forms['islandora-solr-simple-search-form'].method = 'get'; 
		// rename form field "islandora_simple_search_query" to "query" compatible to redbox one
		document.getElementById('edit-islandora-simple-search-query').setAttribute('name', 'query');
		document.getElementById('advanced-search').setAttribute('href', '#');
		document.cookie='search=data';
		
	}

	function on_publications_click() {
		delete_cookie('search');
		document.forms['islandora-solr-simple-search-form'].action = '/'; 
		document.forms['islandora-solr-simple-search-form'].method = 'post'; 
		// rename form field  "query" to "islandora_simple_search_query" compatible to redbox one
		document.getElementById('edit-islandora-simple-search-query').setAttribute('name', 'islandora_simple_search_query');
		document.getElementById('advanced-search').setAttribute('href', '/adv-search');
		document.cookie='search=publications';
	}

	function getCookie(cname) {
	    var name = cname + "=";
	    var ca = document.cookie.split(';');
	    for(var i=0; i<ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') c = c.substring(1);
	        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
	    }
	    return "";
	}

	var delete_cookie = function(name) {
		var pathname = window.location.pathname;
	    document.cookie = name + '=; '+'path='+pathname+'expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	};

	function on_pageload_verify () {
		if (getCookie('search') == 'data') {
			on_data_click();
		} 
		else
		{
			on_publications_click();
		}
	}

</script>



<script>
jQuery(document).ready(function($){
	console.log( "ready!" );
	on_pageload_verify();
});

</script>
<span>
	<!--<a class="browse" href="/islandora/object" title="Browse all">Browse all</a>-->
	<a id="browse-all" class="browse" href="/" title="Browse all" onclick="document.forms['islandora-solr-simple-search-form'].submit(); return false;">Browse all</a>
	<a id="advanced-search" class="adv-search" href="/adv-search" title="Advanced search">Advanced search</a>
    <!-- Removing these radio button 20200131 -->
      <!-- Amir: Added to change form action on the fly without changing the Islandora module -->
      <!--	<form style='display:inline; color: black; font-size: 80%; font-weight: bold;'>
		&nbsp;&nbsp;&nbsp;
		<input type="radio" id="publications-radiobutton" name="searchtype" value="pub" checked onclick="on_publications_click();">Publications&nbsp;&nbsp;&nbsp;
		<input type="radio" id="data-radiobutton" name="searchtype" value="data" onclick="on_data_click();" >Data
	</form>
       -->
</span>	

