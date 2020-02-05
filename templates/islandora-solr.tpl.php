<?php
/**
 * @file
 * Islandora solr search primary results template file.
 *
 * Variables available:
 * - $results: Primary profile results array
 *
 * @see template_preprocess_islandora_solr()
 */

?>
<script type='text/javascript' src='/sites/all/themes/uws-themec/js/toggle-author-display.js'></script>
<?php if (empty($results)): ?>
  <p class="no-results"><?php print t('Sorry, but your search returned no results.'); ?></p>
<?php else: ?>
  <div class="islandora islandora-solr-search-results">
    <?php $row_result = 0; ?>
    <?php foreach($results as $key => $result): ?>
      <!-- Search result -->
      <div class="islandora-solr-search-result clear-block <?php print $row_result % 2 == 0 ? 'odd' : 'even'; ?>">
        <div class="islandora-solr-search-result-inner">
          <!-- Thumbnail -->
          <dl class="solr-thumb">
            <dt>
              <?php print $result['thumbnail']; ?>
            </dt>
            <dd></dd>
          </dl>
          <!-- Metadata -->
          <dl class="solr-fields islandora-inline-metadata">
			<?php foreach($result['solr_doc'] as $key => $value): ?>
            <?php
            if($value['label'] == "Abstract")
            {
               $value['value'] = "";
            }
            else
            {
            ?>
              <dt class="solr-label <?php print $value['class']; ?>">
                <?php
                 print $value['label'];

                 if($value['label'] == "Resource Type") //broken as not good idea, fix by change to match Publication type
                 {
                    $value['value'] = "<a rel=\"nofollow\" href=\"/islandora/search/?type=dismax&amp;f[0]=mods_genre_ms%3A%22".$value['value']."%22\">".$value['value']."</a>";
                 }
                 if($value['label'] == "Author")
                 {

                     $creator_arr = explode(",",trim($value['value']));
                     $creator_siz = sizeof($creator_arr);
                     $new_creator_str = NULL;
                     for($x=0;$x<$creator_siz;$x = $x+2)
                     {
                        //This rubbish gets rid of Universities in the author list
                        if(strpos($creator_arr[$x],"niversity") > 0)
                        {
                           $creator_arr[$x] = "";
                        }
                        if(strpos($creator_arr[$x+1],"niversity") > 0)
                        {
                           $creator_arr[$x+1] = "";
                        }
                        //This if/else statement is also rubbish that gets rid of Universities in the author list(creator_full line is good)
                        if($creator_arr[$x] != "" and $creator_arr[$x+1] != "")
                        {
                           $creator_full = trim($creator_arr[$x]).", ".trim($creator_arr[$x+1]);
                        }
                        else
                        {
                           $creator_full = trim($creator_arr[$x]).trim($creator_arr[$x+1]);
                        }
                        $creator_full = "<a rel=\"nofollow\" href=\"/islandora/search/?type=dismax&amp;f[0]=mods_name_personal_namePart_ms%3A%22".$creator_full."%22\">".$creator_full."</a>";
                        if($x == 0)
                        {
                           $new_creator_str = $creator_full;
                        }
                        else
                        {
                          $new_creator_str = $new_creator_str."; ".$creator_full;
                        }
                     }
                     //$value['value'] = implode(";",$creator_arr);
                     $value['value'] = $new_creator_str;
                     //print " (".$creator_siz.") ";
                    //$value['value'] = "<a rel=\"nofollow\" href=\"/islandora/search/?type=dismax&amp;f[0]=mods_genre_ms%3A%22".$value['value']."%22\">".$value['value']."</a>";
                 }
                 ?>
              </dt>
               <dd class="solr-value <?php print $value['class']; ?>">
			   <?php

				// We only want to hide the authors of the paper
			   	if ($value['label'] == "Author") {
					// How many authors should be displayed before being hidden
          $num_authors = 10;

          // Get an array back from the nicely formatted list
          $authors = explode('; ', $value['value']);

					// If there's num_authors or less, then display all of them
					if (count($authors) <= $num_authors) {

						print $value['value'];
					} else {

						// Grab num_authors number of authors to show
						$shown_authors = array_slice($authors, 0, $num_authors);
						print implode('; ', $shown_authors);
						print('; ');

						// NOTE: $row_result is used to uniquely identify
						// each search result so the toggle will work properly

						// Take the rest of the authors and hide them
						$hidden_authors = array_slice($authors, $num_authors);
						print "<span id='hidden-authors-"
								. $row_result
								. "' style='display:none'>";
						print implode('; ', $hidden_authors);
						print "</span>";

						// Show the "Show X more" link
						// Where X is the number of hidden authors
						print "<br/><a style='cursor:pointer' id='author-display-toggle-"
								. $row_result
								. "'onclick='ToggleAuthors(". $row_result .")'>"
								. "Show ". count($hidden_authors) ." more</a>";
					}

				} else {

					// It's some field that's not authors, so don't do anything
					print $value['value'];
				}
			   ?>
              </dd>
              <?php
              } //end of else of if(abstract)
              ?>
            <?php endforeach; ?>
          </dl>
        </div>
      </div>
    <?php $row_result++; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
