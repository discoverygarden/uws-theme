<?php
/**
 * @file
 * Islandora_solr_metadata display template.
 *
 * Variables available:
 * - $solr_fields: Array of results returned from Solr for the current object
 *   based upon defined display configuration(s). The array structure is:
 *   - display_label: The defined display label corresponding to the Solr field
 *     as defined in the configuration in translatable string form.
 *   - value: An array containing all the result(s) found for the specific field
 *     in Solr for the current object when queried against Solr.
 *
 * @see template_preprocess_islandora_solr_metadata_display()
 */
?>
<script type='text/javascript' src='https://d1bxh8uas1mnw7.cloudfront.net/assets/embed.js'></script>
<script type='text/javascript' src='/sites/all/themes/uws-themec/js/toggle-author-display.js'></script>

<div style="text-align: right;">
<span style="margin-right: 50px;"><img src="/sites/all/themes/uws-themec/images/Visible17.png" style="vertical-align:middle;" />&nbsp;<?php print $object_views_count; ?> Views</span>
<span><img src="/sites/all/themes/uws-themec/images/Down12.png" />&nbsp;<?php print $pdf_datastream_download_count; ?> Downloads</span>
</div>

<?php if (count($solr_fields) > 1): ?>
  <fieldset <?php $print ? print 'class="islandora islandora-metadata"' : print 'class="islandora islandora-metadata collapsible"';?>>
    <legend><span class="fieldset-legend"><?php print t('Details'); ?></span></legend>
    <div class="fieldset-wrapper">
      <dl xmlns:dcterms="http://purl.org/dc/terms/" class="islandora-inline-metadata islandora-metadata-fields">
        <?php $row_field = 0; ?>
        <?php foreach($solr_fields as $value): ?>
          <?php
           $rec_size = sizeof($value['value']);

           //This shortens Date to year only - was used when date was not dc.date
           //if($value['display_label'] == "Date")
           //{
              //$value['value'][0] = substr($value['value'][0],0,4);
           //}
          //Removes doi: if present and puts in test for use in AltMetric
          if($value['display_label'] == "DOI ")
           {
              if(strpos($value['value'][0],"oi:")==1)
              {
                 $test = substr($value['value'][0],4);
              }
              else
              {
                 $test = $value['value'][0];
              }
              $value['value'][0] = $value['value'][0]." <div class='altmetric-embed' data-badge-type='4' data-link-target='_blank' data-hide-no-mentions='false' data-doi='".$test."'></div>";
           }
           if($value['display_label'] == "AltMetric")
           {
              $value['value'][0] = "<div class='altmetric-embed' data-badge-type='4' data-link-target='_blank' data-hide-no-mentions='true' data-doi='".$test."'></div>";
           }
		   if($value['display_label'] == "Scopus_ID")
           {
              $scopus = $value['value'][0];
              $value['value'][0] = $value['value'][0]." <br><a href='http://www.scopus.com/record/display.url?eid=".$scopus."&origin=resultslist' target='_blank'><img src='http://api.elsevier.com/content/abstract/citation-count?eid=".$scopus."&httpAccept=image/jpeg&apiKey=cf8ea27fd21143479ba1388bd8cf9704'></img></a>";
           }
           //Makes Handle a hyperlink
           if($value['display_label'] == "Handle")
           {
              $value['value'][0] = "<a href=\"".$value['value'][0]."\">".$value['value'][0]."</a>";
           }
           //Makes URL a hyperlink that opens in a new window/tab
           if($value['display_label'] == "URL")
           {
              $value['value'][0] = "<a target=\"blank\" href=\"".$value['value'][0]."\">".$value['value'][0]."</a>";
           }
           //Makes Grant Link a hyperlink that opens in a new window/tab
           if($value['display_label'] == "Related Grant(s)")
           {
              $rgu_size = $rec_size;
              for($x = 0;$x<$rgu_size;$x++)
              {
                 $value['value'][$x] = "<a target=\"blank\" href=\"".$value['value'][$x]."\">".$value['value'][$x]."</a>";
              }
           }
           //Makes Related Dataset a hyperlink that opens in a new window/tab
           if($value['display_label'] == "Related Dataset(s)")
           {
              $rdu_size = $rec_size;
              for($x = 0;$x<$rdu_size;$x++)
              {
                 $value['value'][$x] = "<a target=\"blank\" href=\"".$value['value'][$x]."\">".$value['value'][$x]."</a>";
              }
           }
           //This prepares affiliation and role labels to not load, and there values to load on the same line as Author
           if($value['display_label'] == "Affiliation")
           {
              $aff_size = $rec_size;
              for($x = 0;$x<$aff_size;$x++)
              {
                 $aff_arr[$x] = $value['value'][$x];
              }
           }
           else if($value['display_label'] == "Role")
           {
              $role_size = $rec_size;
              for($x = 0;$x<$role_size;$x++)
              {
                 $role_arr[$x] = $value['value'][$x];
              }
           }
           else if($value['display_label'] == "FOR code") //This selects For code data
            {
               //This blanks out blank data with "XXXXXX - Unknown" code in FOR code field
               if(strpos($value['value'][0],"XXXXX -")==1)
               {
                  $value['display_label'] = "";
                  $value['value'][0] = "";
               }
               else
               {
                  ?>
                  <dt class="<?php print $row_field == 0 ? ' first' : ''; ?>">
                  <?php
                  print $value['display_label'];
                  ?>
                  </dt>
                  <dd class="<?php print $row_field == 0 ? ' first' : ''; ?>">
                  <?php
                  print implode('<br/>', $value['value']);
                  //print " (".$rec_size.")";
                  //print_r($solr_fields);
                  ?>
                  </dd>
                  <?php
               }
            }
            else
           { ?>
          <dt class="<?php print $row_field == 0 ? ' first' : ''; ?>">
            <?php
               print $value['display_label'];
               //This loads affiliation and role on the same line as author
               if($value['display_label'] == "Author")
               {
                  for($y = 0;$y<$role_size;$y++)
                  {
                     $tab_sp = "";
                     for($w=0;$w<(30-strlen($value['value'][$y]));$w++)
                     {
                        $tab_sp = $tab_sp."&nbsp;";
                     }
                     //This blanks out wrong data with University names in Author field
                     if(strpos($value['value'][$y],"niversity")==1)
                     {
                        $value['value'][$y] = "";
                     }
                     //This and a similar line below blank out extra empty authors in data, that show role and affiliation
                     if($value['value'][$y] != "")
                     {
                        //$value['value'][$y] = $value['value'][$y].$tab_sp."(".$role_arr[$y].")";
                        $value['value'][$y] = $value['value'][$y].$tab_sp;
                     }
                  }
                  for($z = 0;$z<$aff_size;$z++)
                  {
                     if($aff_arr[$z] == "University of Western Sydney")
                     {
                        $aff_arr[$z] = "Western Sydney University";
                     }
                     //if($aff_arr[$z] != "non UWS")  //could change this to if($aff_arr[$z] == "University of Western Sydney")
                     if($aff_arr[$z] == "Western Sydney University")
                     {
                        if($value['value'][$z] != "")
                        {
                           $value['value'][$z] = $value['value'][$z]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$aff_arr[$z];
                        }
                     }
                  }
            ?>
          </dt>
          <dd class="<?php print $row_field == 0 ? ' first' : ''; ?>">
            <?php
              // How many authors should be displayed before being hidden
              $num_authors = 10;

              // If there's num_authors or less, then display all of them
              if ($role_size <= $num_authors) {

                print implode('<br/>', $value['value']);
              } else {

                // Grab num_authors number of authors to show
                $shown_authors = array_slice($value['value'], 0, $num_authors);
                print implode('<br/>', $shown_authors);

                // Take the rest of the authors and hide them
                $hidden_authors = array_slice($value['value'], $num_authors);
                print "<div id='hidden-authors-0' style='display:none'>";
                print implode('<br/>', $hidden_authors);
                print "<br/></div>";

                // Show the "Show X more" link
                // The calculation shows how many hidden authors there are
                print "<br><a style='cursor:pointer' id='author-display-toggle-0'"
                    . "onclick='ToggleAuthors(0)'>"
                    . "Show ". count($hidden_authors) ." more</a>";
              }
            ?>
          </dd>
            <?php
            }
            else
            {
            ?>
          </dt>
          <dd class="<?php print $row_field == 0 ? ' first' : ''; ?>">
            <?php
             print implode('<br/>', $value['value']);
             //print " (".$rec_size.")";
             //print_r($solr_fields);
             ?>
          </dd>
          <?php } } //end of if($row_field == 0 etc) and end of if($value['display_label'] == "Author") ?>
          <?php $row_field++; ?>
        <?php endforeach; ?>
      </dl>
    </div>
  </fieldset>
<?php endif; ?>
