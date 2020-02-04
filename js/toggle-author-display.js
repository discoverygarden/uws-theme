// Script handles the toggling of the display of authors
// when viewing a publication on Islandora

// Toggles visibility for the list of authors
// element_id is used as an identifier
function ToggleAuthors(element_id) {

	// Grab the hidden authors element
	// All hidden authors lists have the id "hidden-authors-X"
	// Where X is some number
	var hidden_authors =
		document.getElementById("hidden-authors-" + element_id);

	// Grab the button/link to toggle author display
	// Similar to the hidden author lists, these all have the id
	// "author-display-toggle-X"
	var display_toggle =
		document.getElementById("author-display-toggle-" + element_id);

	// Actually toggle the list visibility
	if (hidden_authors.style.display === "none") {

		hidden_authors.style.display = "";
		display_toggle.innerText = "Show less";
	} else {

		hidden_authors.style.display = "none";
		var num_hidden = hidden_authors.children.length;
		display_toggle.innerText = "Show " + num_hidden + " more";
	}
}
