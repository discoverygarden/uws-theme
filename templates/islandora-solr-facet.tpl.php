<?php
/**
 * @file
 * Template file for default facets
 *
 * @TODO document available variables
 */
?>

<ul class="<?php print $classes; ?>">
  <?php foreach($buckets as $key => $bucket): ?>
    <li>
      <?php
      //This fixes date to year in facet
      //if($pos_date = strpos($bucket['link'],"mods_originInfo_dateIssued_dt"))
      //if(substr($bucket['link'],$pos_date+67,4) == "date")
      //{
      //  print substr($bucket['link'],0,$pos_date+ 68).substr($bucket['link'],$pos_date+84);
      //}
      //This shortens long subject names in facet 
      if($pos_sub = strpos($bucket['link'],"mods_subject_topic_ms"))
      {
         $pos_sub_st_tag = strpos($bucket['link'],">");
         $pos_sub_fn_tag = strpos($bucket['link'],"<",1);
         $sub_length = $pos_sub_fn_tag - $pos_sub_st_tag;
         if($sub_length > 22)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+23)."...".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }
         else
         {
            print $bucket['link'];
         }
            
      }
      else if($pos_sub = strpos($bucket['link'],"mods_name_personal_author_note_school_code_ms"))
      {
         $pos_sub_st_tag = strpos($bucket['link'],">");
         $pos_sub_fn_tag = strpos($bucket['link'],"<",1);
         //$sub_length = $pos_sub_fn_tag - $pos_sub_st_tag;
          //print substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4);
         if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 404)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."The Whitlam Institute".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 409)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Education".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 414)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Communication Arts .....".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 416)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Strategy and Quality".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }         
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 417)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Medicine".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 418)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Library".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         } 
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 419)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Humanities and Languages".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }                        
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 420)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Natural Sciences".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }             
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 424)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Computing and Mathematics".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 425)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Deans Unit - Health and Science...".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }               
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 426)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Deans Unit - Arts".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }                  
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 427)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Deans Unit - Business".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }               
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 428)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Social Sciences".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 429)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Marketing".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }                
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 430)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Sydney Graduate School of Management".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 432)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Biomedical and Health Sciences".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }               
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 433)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Engineering".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }                   
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 434)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Nursing and Midwifery.....".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }             
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 435)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Economics and Finance".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 436)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Psychology".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }              
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 437)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."MARCS Auditory Laboratories ......".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 438)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Centre for Cultural Research ........".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 440)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Social Justice, Social Change.......".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 441)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Accounting".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }             
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 442)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Law".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }              
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 443)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Management".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 445)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."National Institute of Complementary Medicine".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 446)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Office of Pro-Vice Chancellor (Research)".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }             
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 447)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Capital Works and Facilities".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 450)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Nanoscale Organisation and Dynamics Research Group".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 451)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Family and Community Health.......".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 452)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Writing and Society Research Centre".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }               
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 453)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Urban Research Centre".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 456)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Industry and Innovation Studies.....".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }              
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 457)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."CRC Irrigation Futures".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 458)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Centre for Educational Research.....".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 459)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Office of Pro Vice-Chancellor (Learning and Teaching)".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 464)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Division of Corporate Strategy and Services".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 465)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Student Support Services".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }              
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 467)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Badanami Indigenous Education.....".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }             
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 468)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Chief Financial Officer".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 490)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Centre for Citizenship and Public Policy".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }              
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 512)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Religion and Society Research Centre".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 513)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Interpreting and Translation".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 514)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Justice Research".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 515)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Sustainability and Social Research Group".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 516)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Centre for Civionics - Infrastructure Engineering".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 517)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Disaster Response and Resilience".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }             
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 518)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Centre for Health Research".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 519)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Solar Energy Technologies".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 532)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Molecular Medicine Research Group".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }             
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 534)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Office of Deputy Vice Chancellor (Academic and Research)".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 535)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Human Resources".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }             
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 536)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Organisational Development Unit".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 537)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Corporate Stategy and Services.....".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 538)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Registrars Office".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 539)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Campus Development Unit".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }             
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 540)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Student Accomodation".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }                 
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 541)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Office of DVC Academic and Enterprise".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }               
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 542)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."UWS International".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 543)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."UWS Innovation and Consulting".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 544)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Information Technology Services".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }                 
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 545)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Office of Engagement and Partnerships".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }              
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 546)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Hawkesbury Institute for the Environment".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 567)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Institute for Culture and Society.....".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 568)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."The MARCS Institute".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 569)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Centre for Infrastructure Engineering".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }               
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 571)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Business".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }              
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 572)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Computing, Engineering and Mathematics ......".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }             
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 573)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Humanities and Communication Arts".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 574)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Science and Health ......".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 575)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."School of Social Sciences and Psychology".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 589)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Artificial Intelligence Research Group".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 590)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Centre for Positive Psychology and Education".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 591)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Community Economics".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 592)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Office of Pro-Vice Chancellor (Education)".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 593)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Office of Pro-Vice Chancellor (Engagement and International) .....".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }             
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 594)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Office of Pro Vice-Chancellor (Students)".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }            
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 595)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Marketing and Communication".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 596)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Human Resources".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 597)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Centre for Research in Mathematics".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 598)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Digital Humanities Research Group".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         } 
         else if(substr($bucket['link'],$pos_sub_st_tag+1,$pos_sub_st_tag+4) == 602)
         {
            print substr($bucket['link'],0,$pos_sub_st_tag+1)."Australia-China Institute for Arts and Culture".substr($bucket['link'],$pos_sub_fn_tag);
            //print $bucket['link'].$pos_sub_tag;
         }           
         else
         {
            print $bucket['link'];
         }            
      }      
      else
      {
       print $bucket['link'];
       }
        ?>
      <span class="count">(<?php print $bucket['count'] ?>)</span>
      <span class="plusminus">
        <?php print $bucket['link_plus']; ?>
        <?php print $bucket['link_minus']; ?>
      </span>
    </li>
  <?php endforeach; ?>
</ul>
