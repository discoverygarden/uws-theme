<?php

/**
 * @file
 * UWS internal page template
 *
 * UWS Library theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/uws_library.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['horizontal_menu']: The black dropdown menu with six items
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see uws_library_process_page()
 * @see html.tpl.php
 */
?>
<div id="page-wrapper">
	<div id="page">

		<?php include('common_header_links.tpl.php'); ?>

		<div class="uws-slider-container"></div>

		<?php if ($page['featured']): ?>
		<div id="featured">
			<div class="section clearfix">
				<?php print render($page['featured']); ?>
			</div><!-- /.section -->
		</div><!-- /#featured -->
		<?php endif; ?>

		<!-- The content starts here -->
		<div class="uws-library-content">

			<div id="gm_wrapper_gm">
				<div class="container_24" id="uws-library-body-center">
					<aside role="complementary">
						<div class="uws-library-content-sidebar-left"><!-- UWS Sidebar Container -->
							<div class="region-uws-sidebar-left">
								<?php if ($page['sidebar_first']): ?>
									<?php print render($page['sidebar_first']); ?>
								<?php endif; ?>

								<?php if ($page['sidebar_second']): ?>
									<?php print render($page['sidebar_second']); ?>
								<?php endif; ?>
							</div>
						</div><!-- END UWS Sidebar Container -->
					</aside>

					<div class="uws-library-body-center-row-container" id="main-content" role="main"><!-- Body Centre Row Container -->

						<div class="breadcrumb"><!-- UWS Breadcrumbs -->
							<?php
              //Code to fix breadcrumbs for 2 main collections and root of Islandora (shows search results rather than folder view)
              if($totalCol = strpos($breadcrumb,"Islandora Repository"))
              {
                 //This  goes to HOME $breadcrumb = substr($breadcrumb,0,$totalCol-11).substr($breadcrumb,$totalCol-2);
                 $breadcrumb = substr($breadcrumb,0,$totalCol-2)."/search/?type=dismax".substr($breadcrumb,$totalCol-2);
              }
              if($research = strpos($breadcrumb,"researchCollection"))
              {
                 if($object = strpos($breadcrumb,"object"))
                 {
                    $breadcrumb_alt = substr($breadcrumb,0,$object)."search".substr($breadcrumb,$object+6,25)."?type=dismax".substr($breadcrumb,$object+31);
                    print $breadcrumb_alt;
                 }
              }
              else if($thesis = strpos($breadcrumb,"thesisCollection"))
              {
                 if($object = strpos($breadcrumb,"object"))
                 {
                    $breadcrumb_alt = substr($breadcrumb,0,$object)."search".substr($breadcrumb,$object+6,23)."?type=dismax".substr($breadcrumb,$object+29);
                    print $breadcrumb_alt;
                 }
              }
              else if($school = strpos($breadcrumb,">404"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school)."> The Whitlam Institute".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }                   
              else if($school = strpos($breadcrumb,">409"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Education".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }                        
              else if($school = strpos($breadcrumb,">414"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Communication Arts".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }
              else if($school = strpos($breadcrumb,">416"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Strategy and Quality".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }                         
              else if($school = strpos($breadcrumb,">417"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Medicine".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }
              else if($school = strpos($breadcrumb,">418"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Library".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }  
              else if($school = strpos($breadcrumb,">419"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Humanities and Languages".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }             
              else if($school = strpos($breadcrumb,">420"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Natural Sciences".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }             
              else if($school = strpos($breadcrumb,">424"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Computing and Mathematics".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">425"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Deans Unit - Health and Science".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }                  
              else if($school = strpos($breadcrumb,">426"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Deans Unit - Arts".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">427"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Deans Unit - Business".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }               
              else if($school = strpos($breadcrumb,">428"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Social Sciences".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">429"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Marketing".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">430"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Sydney Graduate School of Management".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }          
              else if($school = strpos($breadcrumb,">432"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Biomedical and Health Sciences".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }             
              else if($school = strpos($breadcrumb,">433"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Engineering".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">434"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Nursing and Midwifery".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              } 
              else if($school = strpos($breadcrumb,">435"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Economics and Finance".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }                            
              else if($school = strpos($breadcrumb,">436"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Psychology".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }                           
              else if($school = strpos($breadcrumb,">437"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">MARCS Auditory Laboratories".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }               
              else if($school = strpos($breadcrumb,">438"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Centre for Cultural Research".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">440"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Social Justice, Social Change".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }             
              else if($school = strpos($breadcrumb,">441"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Accounting".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">442"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Law".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }             
              else if($school = strpos($breadcrumb,">443"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Management".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">445"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">National Institute of Complementary Medicine".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">446"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Office of Pro-Vice Chancellor (Research)".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">447"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Capital Works and Facilities".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">450"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Nanoscale Organisation and Dynamics Research Group".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              } 
              else if($school = strpos($breadcrumb,">451"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Family and Community Health".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }                        
              else if($school = strpos($breadcrumb,">452"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Writing and Society Research Centre".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }                     
              else if($school = strpos($breadcrumb,">453"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Urban Research Centre".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">456"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Industry and Innovation Studies".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">457"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">CRC Irrigation Futures".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">458"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Centre for Educational Research".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">459"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Office of Pro Vice-Chancellor (Learning and Teaching)".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">464"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Division of Corporate Strategy and Services".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">465"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Student Support Services".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">467"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Badanami Indigenous Education".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">468"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Chief Financial Officer".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">490"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Centre for Citizenship and Public Policy".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">512"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Religion and Society Research Centre".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }
              else if($school = strpos($breadcrumb,">513"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Interpreting and Translation".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }                         
              else if($school = strpos($breadcrumb,">514"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Justice Research".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }             
              else if($school = strpos($breadcrumb,">515"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Sustainability and Social Research Group".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">516"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Centre for Civionics - Infrastructure Engineering".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">517"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Disaster Response and Resilience".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }             
              else if($school = strpos($breadcrumb,">518"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Centre for Health Research".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">519"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Solar Energy Technologies".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">532"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Molecular Medicine Research Group".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">534"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Office of Deputy Vice Chancellor (Academic and Research)".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">535"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Human Resources".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">536"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Organisational Development Unit".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">537"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Corporate Stategy and Services".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">538"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Registrars Office".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">539"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Campus Development Unit".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">540"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Student Accomodation".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }             
              else if($school = strpos($breadcrumb,">541"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Office of DVC Academic and Enterprise".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">542"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">UWS International".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">543"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">UWS Innovation and Consulting".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }             
              else if($school = strpos($breadcrumb,">544"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Information Technology Services".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">545"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Office of Engagement and Partnerships".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">546"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Hawkesbury Institute for the Environment".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }            
              else if($school = strpos($breadcrumb,">567"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Institute for Culture and Society".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">568"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">The MARCS Institute".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">569"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Centre for Infrastructure Engineering".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">571"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Business".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">572"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Computing, Engineering and Mathematics".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">573"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Humanities and Communication Arts".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">574"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Science and Health".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">575"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">School of Social Sciences and Psychology".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">589"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Artificial Intelligence Research Group".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">591"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Community Economics".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">592"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Office of Pro-Vice Chancellor (Education)".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">593"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Office of Pro-Vice Chancellor (Engagement and International)".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">594"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Office of Pro Vice-Chancellor (Students)".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">595"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Marketing and Communication".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">596"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Human Resources".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }           
              else if($school = strpos($breadcrumb,">597"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Centre for Research in Mathematics".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }          
              else if($school = strpos($breadcrumb,">598"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Digital Humanities Research Group".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }  
              else if($school = strpos($breadcrumb,">602"))
              {
                 $breadcrumb_alt = substr($breadcrumb,0,$school).">Australia-China Institute for Arts and Culture".substr($breadcrumb,$school+4,2500);
                 print $breadcrumb_alt;
              }          
              else
              { 
                 print $breadcrumb;
              } 
              ?>
						</div><!-- END UWS Breadcrumbs -->
						<span class="my_bookmarks_link">
							<a href="http://researchdirect.uws.edu.au/islandora-bookmark" title="My bookmarks">My bookmarks</a>
						</span>
						<?php if ($messages): ?>
						<div id="messages">
							<div class="section clearfix">
								<?php print $messages; ?>
							</div><!-- /.section -->
						</div><!-- /#messages -->
						<?php endif; ?>

						<div class="content"><!-- UWS Content Container -->
							<?php if ($page['highlighted']): ?>
							<div id="highlighted">
								<?php print render($page['highlighted']); ?>
							</div>
							<?php endif; ?>
							<?php print render($title_prefix); ?>
							<?php if ($title): ?>
							<h1 class="title" id="page-title">
								<?php print $title; ?>
							</h1>
							<?php endif; ?>
							<?php
              
               print render($title_suffix); 
               ?> 

							<?php if ($tabs): ?>
							<div class="tabs">
								<?php print render($tabs); ?>
							</div>
							<?php endif; ?>
							<?php print render($page['help']); ?>
							<?php if ($action_links): ?>
							<ul class="action-links">
								<?php print render($action_links); ?>
							</ul>
							<?php endif; ?>
							<?php print render($page['content']); ?>
							<?php print $feed_icons; ?>
						</div><!-- END UWS Content Container -->
					</div><!-- END Body Centre Row Container -->

					<!-- 
					<aside> contents removed from here 
					-->

				</div>
			</div>
		</div>
		<!-- The content finishes here -->

		<?php include('common_footer_links.tpl.php'); ?>

	</div><!-- /#page -->
</div><!-- /#page-wrapper -->