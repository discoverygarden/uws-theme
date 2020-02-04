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
 /**
  * David modifications 20140709
  * This is a modified version of Details area of page.
  * It is not collapsed on opening the page.
  * ("collapsed" removed from end of class="islandora islandora-metadata collapsible")
  * 
  * It depends on $solr_fields Affiliation and Role being before Author so that all
  * details for an Author or Editor display on the same line. It depends on Editors
  * to be after Authors in the MODS in order to display Authors before Editors  
  *      
  * It depends on GENRE(publication type) being the first field(label) in $solr_fields
  * and uses that to make the next 2 labels (Title and Host) customised to suit GENRE
  * (eg. Article title instead of Title, Journal Title instead of Host).        
  * This is not finished, it has only been done for Articles and Chapters. 
  *
  */               
?>

<?php if (count($solr_fields) > 1): ?>
  <fieldset <?php $print ? print 'class="islandora islandora-metadata"' : print 'class="islandora islandora-metadata collapsible"';?>>
    <legend><span class="fieldset-legend"><?php print t('Details'); ?></span></legend>
    <div class="fieldset-wrapper">
      <dl xmlns:dcterms="http://purl.org/dc/terms/" class="islandora-inline-metadata islandora-metadata-fields">
        <?php 
        $row_field = 0;
        $rec_type = '';
         ?>
        <?php foreach($solr_fields as $value): ?>
          <?php
           $rec_size = sizeof($value['value']);                    
           if($row_field == 0)
           {
              $rec_type = $value['value'][0];
           }
           else if($value['display_label'] == "Affiliation")
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
           else
           { ?>  
          <dt class="<?php print $row_field == 1 ? ' first' : ''; ?>">
            <?php
            if($rec_type == "journal article" and $value['display_label'] == "Title")
            {
                print 'Article Title';
            }
            else if($rec_type == "book chapter" and $value['display_label'] == "Title")
            {
                print 'Chapter Title';
            }
            else if($rec_type == "journal article" and $value['display_label'] == "Host")
            {
                print 'Journal Title';
            }
            else if($rec_type == "book chapter" and $value['display_label'] == "Host")
            {
                print 'Book Title';
            }
            else   
            {
                print $value['display_label'];
            }
            if($value['display_label'] == "Author")
            {
               for($y = 0;$y<$role_size;$y++)
               {
                  $value['value'][$y] = $value['value'][$y]."&nbsp;&nbsp;&nbsp;(".$role_arr[$y].")";
               }
               for($z = 0;$z<$aff_size;$z++)
               {
                  $value['value'][$z] = $value['value'][$z]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$aff_arr[$z];
               }
               ?>
               </dt>
               <dd class="<?php print $row_field == 1 ? ' first' : ''; ?>">
               <?php
                print implode('<br/>', $value['value']);
                //print " (".$rec_size.")";
                ?>
               </dd>            
               <?php
            }
            else
            {             
            ?>
          </dt>
          <dd class="<?php print $row_field == 1 ? ' first' : ''; ?>">
            <?php
             print implode('<br/>', $value['value']);
             //print " (".$rec_size.")";
             ?>
          </dd>
          <?php } } //end of if($row_field == 0 etc) and end of if($value['display_label'] == "Author") ?>
          <?php $row_field++; ?>
        <?php endforeach; ?>
      </dl>
    </div>
  </fieldset>
<?php endif; ?>
