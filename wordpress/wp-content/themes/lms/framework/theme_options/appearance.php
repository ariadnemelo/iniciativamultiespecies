<!-- appearance -->
<div id="appearance" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
			<?php $sub_menus = array(
						array("title"=>esc_html__("Header", 'lms'), "link" => "#appearance-header" ),
						array("title"=>esc_html__("Menu", 'lms'), "link"=>"#appearance-menu"),
						array("title"=>esc_html__("Body", 'lms'), "link"=>"#appearance-body"),
						array("title"=>esc_html__("Footer", 'lms'), "link"=>"#appearance-footer"),
						array("title"=>esc_html__("Typography", 'lms'), "link"=>"#appearance-typography"),
						array("title"=>esc_html__("Layout & BG", 'lms'), "link"=>"#appearance-layout"));
						
				  foreach($sub_menus as $menu): ?>
                  	<li><a href="<?php echo esc_url( $menu['link'] );?>"><?php echo esc_html( $menu['title'] );?></a></li>
			<?php endforeach?>
        </ul>

        <!-- Header Section -->
        <div id="appearance-header" class="tab-content">
        	<div class="bpanel-box">
                <div class="box-title"><h3><?php esc_html_e('Choose Header', 'lms');?></h3></div>
                <div class="box-content">
                	<h6><?php esc_html_e('Header', 'lms'); ?></h6>
                    <p class="note no-margin"> <?php esc_html_e("Choose the header type", 'lms');?> </p>
                    <div class="hr_invisible"> </div>
					<div class="bpanel-option-set">    
                         <ul class="bpanel-post-layout bpanel-layout-set">
                         <?php $header_types = array("header1","header2","header3","header4");
							 foreach( $header_types as $header_type):
							 	$class = ( $header_type ==  dttheme_option('appearance','header_type')) ? " class='selected' " : "";?>
                                <li class="headerlayout"><a href="#" rel="<?php echo esc_attr( $header_type );?>" <?php echo "{$class}";?> title="<?php echo esc_attr( $header_type );?>">
                                    <img src="<?php echo IAMD_FW_URL."theme_options/images/headers/{$header_type}.png";?>"/>
                                </a></li>
						 <?php endforeach; ?>
                         </ul>
                         <input id="mytheme[appearance][header_type]" name="mytheme[appearance][header_type]" type="hidden" value="<?php echo  dttheme_option('appearance','header_type');?>"/>                         
                    </div>
                    
                    <div class="clear"> </div>
                    <div class="hr"> </div>
                    
                    <div class="bpanel-option-set">
                    	<h6><?php esc_html_e('Enable Cart Icon', 'lms');?></h6>
                        <?php dttheme_switch("",'appearance','enable-header-cart');?>
                        <p class="note"> <?php esc_html_e('Enable or Disable cart icon for header.', 'lms');?>  </p>                        
                    </div>

                    <div class="clear"> </div>
                    <div class="hr"> </div>

                    <div class="bpanel-option-set">
                    <?php $label =      esc_html__("Site Title Color", 'lms');
                          $name  =      "mytheme[appearance][site-title-color]";   
                          $value =      (dttheme_option('appearance','site-title-color') != NULL) ? dttheme_option('appearance','site-title-color') : "#";
                          $tooltip =    esc_html__("Pick a custom color for the site title e.g. #564912", 'lms'); ?>
                          <h6><?php echo esc_html( $label );?></h6> 
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                    
                    </div> 

                </div>
            </div>
        </div><!-- Header Section End -->
        
        <!-- Menu Section -->
        <div id="appearance-menu" class="tab-content">
        	<div class="bpanel-box">
            
                <!-- Header Font -->
                <div class="box-title"><h3><?php esc_html_e('Menu Font', 'lms');?></h3></div>
                <div class="box-content">
            
                    <div class="bpanel-option-set">
                    	<h6><?php esc_html_e('Disable Menu Settings', 'lms');?></h6>
                        <?php dttheme_switch("",'appearance','disable-menu-settings');?>
                        <p class="note"> <?php esc_html_e('Enable or Disable Menu section apperance settings.', 'lms');?>  </p>                        
                    </div>
                    
                    <div class="clear"> </div>
                    <div class="hr"> </div>
                    
                    <!-- Font -->
                    <div class="font-container">
                    
                        <div class="bpanel-option-set">
                            <h6><?php esc_html_e('Choose Font Type', 'lms');?></h6>
                            <?php $switchclass = ("on" == dttheme_option('appearance', 'menu-font-type')) ? 'font-checkbox-switch-on' : 'font-checkbox-switch-off'; ?>
                            <div data-for="mytheme-menu-font-type" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-menu-font-type" name="mytheme[appearance][menu-font-type]" type="checkbox" 
                                <?php checked(dttheme_option('appearance','menu-font-type'),'on');?>/>
                            <p class="note"> <?php esc_html_e('Choose which type font.', 'lms');?>  </p>
                        </div>
                        <div class="hr"></div>
                    
						<?php $show_menu_standard_font = ("on" == dttheme_option('appearance', 'menu-font-type')) ? " style='display:block;' " : "  style='display:none;' ";
                              $show_menu_google_font = (dttheme_option('appearance', 'menu-font-type')) ? "  style='display:none;' " : " style='display:block;' ";?>
                          
                        <div class="standard-font column one-column bpanel-option-set" <?php echo "{$show_menu_standard_font}";?>>
                            <div class="column one-half bpanel-option-set">
                                <?php dttheme_standard_font( esc_html__('Standard Font', 'lms'), 'mytheme[appearance][menu-standard-font]', 
															dttheme_option('appearance', 'menu-standard-font'));?></div>
                            <div class="column one-half last bpanel-option-set">
                                <?php dttheme_standard_font_style( esc_html__('Font Style', 'lms'), 'mytheme[appearance][menu-standard-font-style]', 
                                      dttheme_option('appearance', 'menu-standard-font-style'));?></div>
                        </div>
                    
                        <div class="google-font column one-column bpanel-option-set" <?php echo "{$show_menu_google_font}";?>>
                            <div class="column one-column bpanel-option-set">
                                <?php dttheme_admin_fonts(esc_html__('Menu Font', 'lms'),'mytheme[appearance][menu-font]',dttheme_option('appearance','menu-font'));?>
                                <p class="note"> <?php esc_html_e('Choose the menu font', 'lms');?> </p>
                            </div>
                        </div>
                    </div><!-- Font End -->
                    
                    <div class="column one-column bpanel-option-set">
                        <div class="clear"></div>
                        <?php dttheme_admin_jqueryuislider(esc_html__('Menu Font Size', 'lms'),"mytheme[appearance][menu-font-size]",
						dttheme_option('appearance',"menu-font-size"));?>
                    </div>
                    
                    <div class="hr"> </div>

                    <div class="column one-half">
                    <?php $label = 		esc_html__("Primary / Default Color", 'lms');
                          $name  =		"mytheme[appearance][menu-primary-color]";	
						  $value =  	(dttheme_option('appearance','menu-primary-color') != NULL) ? dttheme_option('appearance','menu-primary-color') : "#";
                          $tooltip = 	esc_html__("Pick a custom primary color for the menu e.g. #564912", 'lms'); ?>
                          <h6><?php echo esc_html( $label );?></h6>	
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                    
                    </div>

                    <div class="column one-half last">
                    <?php $label = 		esc_html__("Hover Color", 'lms');
                          $name  =		"mytheme[appearance][menu-secondary-color]";	
						  $value =  	(dttheme_option('appearance','menu-secondary-color')  != NULL) ? dttheme_option('appearance','menu-secondary-color') : "#";
                          $tooltip = 	esc_html__("Pick a custom hover state color for the menu e.g. #564912", 'lms'); ?>
                          <h6><?php echo esc_html( $label );?></h6>	
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                    
                    </div>
                    
                    <div class="hr"> </div>

                    <div class="column one-half">
                    <?php $label = 		esc_html__("Menu Border Color", 'lms');
                          $name  =		"mytheme[appearance][menu-border-color]";	
						  $value =  	(dttheme_option('appearance','menu-border-color') != NULL) ? dttheme_option('appearance','menu-border-color') : "#";
                          $tooltip = 	esc_html__("Pick a custom border color for the current menu e.g. #564912", 'lms'); ?>
                          <h6><?php echo esc_html( $label );?></h6>	
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                    
                    </div>                    
                    
                </div><!-- Header Font End-->
            </div>
        </div><!-- Menu Section (#appearance-menu) End-->
        
        <!-- Body Section -->
        <div id="appearance-body" class="tab-content">
        	<div class="bpanel-box">
            	
                <!-- Body Font Settings -->
                <div class="box-title"><h3><?php esc_html_e('Body Font', 'lms');?></h3></div>
                <div class="box-content">
                
                    <div class="bpanel-option-set">
                    	<h6><?php esc_html_e('Disable Body Settings', 'lms');?></h6>
                        <?php dttheme_switch("",'appearance','disable-boddy-settings');?>
                        <p class="note"> <?php esc_html_e('Enable or Disable Body apperance settings.', 'lms');?>  </p>
                    </div>    
                    
                    <div class="hr"> </div>
                    
                    
                    <!-- Font -->
                    <div class="font-container">
                        <div class="bpanel-option-set">
                            <h6><?php esc_html_e('Choose Font Type', 'lms');?></h6>
							<?php $switchclass = ("on" == dttheme_option('appearance', 'body-font-type')) ? 'font-checkbox-switch-on' : 'font-checkbox-switch-off'; ?>
                            <div data-for="mytheme-body-font-type" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-body-font-type" name="mytheme[appearance][body-font-type]" type="checkbox" 
                            <?php checked(dttheme_option('appearance','body-font-type'),'on');?>/>
                            <p class="note"> <?php esc_html_e('Choose which type font.', 'lms');?>  </p>
                        </div>
                        <div class="hr"></div>
                        
                        <?php $show_body_standard_font = ("on" == dttheme_option('appearance', 'body-font-type')) ? " style='display:block;' " : "  style='display:none;' ";
                        	  $show_body_google_font = (dttheme_option('appearance', 'body-font-type')) ? "  style='display:none;' " : " style='display:block;' ";?>

                        <div class="standard-font column one-column bpanel-option-set" <?php echo "{$show_body_standard_font}";?>>
                            <div class="column one-half bpanel-option-set">
                                <?php dttheme_standard_font( esc_html__('Standard Font', 'lms'), 'mytheme[appearance][body-standard-font]', 
															dttheme_option('appearance', 'menu-standard-font'));?></div>
                            <div class="column one-half last bpanel-option-set">
                                <?php dttheme_standard_font_style( esc_html__('Font Style', 'lms'), 'mytheme[appearance][body-standard-font-style]', 
                                      dttheme_option('appearance', 'body-standard-font-style'));?></div>
                        </div>
                        
                        <div class="google-font column one-column bpanel-option-set" <?php echo "{$show_body_google_font}";?>>
	                        <div class="column one-column">
                            	<div class="bpanel-option-set">
                                	<?php dttheme_admin_fonts(esc_html__('Body Font', 'lms'),'mytheme[appearance][body-font]',dttheme_option('appearance','body-font'));?>
                                    <div class="clear"></div>
                                    <p class="note"> <?php esc_html_e('Choose the body font', 'lms');?> </p>
                                </div>
                             </div>
                        </div>
                    </div><!-- Font End -->

                

                	<div class="column one-half">
                    <?php $label = 		esc_html__("Body Font Color", 'lms');
						  $name  =		"mytheme[appearance][body-font-color]";	
						  $value =  	(dttheme_option('appearance','body-font-color') != NULL) ? dttheme_option('appearance','body-font-color') :"#";
						  $tooltip = 	esc_html__("Pick a custom font color for body/content e.g. #a314a3", 'lms'); ?>
                          <h6><?php echo esc_html( $label );?></h6> 
                          <?php dttheme_admin_color_picker('',$name,$value,"");?> 
                          <p class="note no-margin"><?php echo esc_html( $tooltip );?></p>   
                    </div>
                	<div class="column one-half last">
						  <?php dttheme_admin_jqueryuislider(esc_html__('Body Font Size', 'lms'),"mytheme[appearance][body-font-size]",
                                  dttheme_option('appearance',"body-font-size"));?>                                             
 					</div>                               
                    <div class="hr"> </div>

                	<div class="one-half-content">
                    <?php $label = 		esc_html__("Primary / Default Color for Links", 'lms');
						  $name  =		"mytheme[appearance][body-primary-color]";	
						  $value =  	(dttheme_option('appearance','body-primary-color') != NULL) ? dttheme_option('appearance','body-primary-color') :"#";
						  $tooltip = 	esc_html__("Pick a custom primary color to links and buttons for body/content e.g. #551256", 'lms'); ?>
                          <h6><?php echo esc_html( $label );?></h6>	
						  <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                     
                    </div>

                	<div class="one-half-content last">
                    <?php $label = 		esc_html__("Hover Color for Links", 'lms');
						  $name  =		"mytheme[appearance][body-secondary-color]";
						  $value =  	(dttheme_option('appearance','body-secondary-color') != NULL) ? dttheme_option('appearance','body-secondary-color') :"#";
						  $tooltip = 	esc_html__("Pick a custom hover state color to links and buttons for body/content e.g. #564912", 'lms'); ?>
                          <h6><?php echo esc_html( $label );?></h6>	
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                   
                    </div>
                </div>
                <!-- Body Font Settings End-->
                 
            </div>
        </div><!-- Body Section(#appearance-body) end -->
        
        <!-- Footer Section -->
        <div id="appearance-footer" class="tab-content">
        	<div class="bpanel-box">

                <!-- Footer Font -->
                <div class="box-title"><h3><?php esc_html_e('Footer Font', 'lms');?></h3></div>
                <div class="box-content">
                
                    <div class="bpanel-option-set">
                    	<h6><?php esc_html_e('Disable Footer Settings', 'lms');?></h6>
                        <?php dttheme_switch(esc_html__("Disable Footer Settings", 'lms'),'appearance','disable-footer-settings');?>
                        <p class="note"><?php esc_html_e('Enable or Disable Footer apperance settings.', 'lms');?>  </p>
                    </div>
                    
                    <div class="hr"> </div>
                    
                    <!-- Font -->
                    <div class="font-container">
                    
                        <div class="bpanel-option-set">
                            <h6><?php esc_html_e('Choose Footer Title Font Type', 'lms');?></h6>
                            <?php $switchclass = ("on" == dttheme_option('appearance', 'footer-title-font-type')) ? 'checkbox-switch-on font-checkbox-switch-on' : 'checkbox-switch-off font-checkbox-switch-off'; ?>
                            <div data-for="mytheme-footer-title-font-type" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-footer-title-font-type" name="mytheme[appearance][footer-title-font-type]" type="checkbox" 
                                <?php checked(dttheme_option('appearance','footer-title-font-type'),'on');?>/>
                            <p class="note"> <?php esc_html_e('Choose which type font.', 'lms');?>  </p>
                        </div>
                        <div class="hr"></div>
                        
						<?php $show_footer_title_standard_font = ("on" == dttheme_option('appearance', 'footer-title-font-type')) ? " style='display:block;' " : "  style='display:none;' ";
                              $show_footer_title_google_font = (dttheme_option('appearance', 'footer-title-font-type')) ? "  style='display:none;' " : " style='display:block;' ";?>
                              
                        <div class="standard-font column one-column bpanel-option-set" <?php echo "{$show_footer_title_standard_font}";?>>
                        	<div class="column one-half bpanel-option-set">
                                <?php dttheme_standard_font( esc_html__('Standard Font', 'lms'), 'mytheme[appearance][footer-title-standard-font]', 
															dttheme_option('appearance', 'footer-title-standard-font'));?></div>
                            <div class="column one-half last bpanel-option-set">
                                <?php dttheme_standard_font_style( esc_html__('Font Style', 'lms'), 'mytheme[appearance][footer-title-standard-font-style]', 
                                      dttheme_option('appearance', 'footer-title-standard-font-style'));?></div>
                        </div>
                        
                        <div class="google-font column one-column bpanel-option-set" <?php echo "{$show_footer_title_google_font}";?>>
                        	<div class="column one-column bpanel-option-set">
                            	<?php dttheme_admin_fonts(esc_html__('Footer Title Font', 'lms'),'mytheme[appearance][footer-title-font]',
										dttheme_option('appearance','footer-title-font'));?>
                                <div class="clear"></div>
                                <p class="note"> <?php esc_html_e('Choose the footer font', 'lms');?> </p>
                            </div>
                        
                        </div>
                    </div><!-- Font End -->
                    
                    
                    <div class="column one-half last">
                    <?php $label = 		esc_html__("Footer Title Font Color", 'lms');
                          $name  =		"mytheme[appearance][footer-title-font-color]";
						  $value =  	(dttheme_option('appearance','footer-title-font-color') != NULL) ? dttheme_option('appearance','footer-title-font-color') :"#";
						  $tooltip = 	esc_html__("Pick a custom footer title font color to the theme e.g. #a314a3", 'lms'); ?>
                          <h6><?php echo esc_html( $label );?></h6>
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>   
                    <p class="note"><?php echo esc_html( $tooltip );?></p>
                    </div>
                    
                    <div class="column one-half last">
					<?php dttheme_admin_jqueryuislider(esc_html__('Footer Font Size', 'lms'),"mytheme[appearance][footer-font-size]",
                          dttheme_option('appearance',"footer-font-size"));?>
                    </div>
                    
                    <div class="hr"> </div>

                    <!-- Font -->
                    <div class="font-container">
                    
                        <div class="bpanel-option-set">
                            <h6><?php esc_html_e('Choose Footer Content Font Type', 'lms');?></h6>
                            <?php $switchclass = ("on" == dttheme_option('appearance', 'footer-content-font-type')) ? 'checkbox-switch-on font-checkbox-switch-on' : 'checkbox-switch-off font-checkbox-switch-off'; ?>
                            <div data-for="mytheme-footer-content-font-type" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-footer-content-font-type" name="mytheme[appearance][footer-content-font-type]" type="checkbox" 
                                <?php checked(dttheme_option('appearance','footer-content-font-type'),'on');?>/>
                            <p class="note"> <?php esc_html_e('Choose which type font.', 'lms');?>  </p>
                        </div>
                        <div class="hr"></div>

						<?php $show_footer_content_standard_font = ("on" == dttheme_option('appearance', 'footer-content-font-type')) ? " style='display:block;' " : "  style='display:none;' ";
                              $show_footer_content_google_font = (dttheme_option('appearance', 'footer-content-font-type')) ? "  style='display:none;' " : " style='display:block;' ";?>

                        <div class="standard-font column one-column bpanel-option-set" <?php echo "{$show_footer_content_standard_font}";?>>
                        	<div class="column one-half bpanel-option-set">
                                <?php dttheme_standard_font( esc_html__('Standard Font', 'lms'), 'mytheme[appearance][footer-content-standard-font]', 
															dttheme_option('appearance', 'footer-content-standard-font'));?></div>
                            <div class="column one-half last bpanel-option-set">
                                <?php dttheme_standard_font_style( esc_html__('Sample Title Font Style', 'lms'), 'mytheme[appearance][footer-content-standard-font-style]', 
                                      dttheme_option('appearance', 'footer-content-standard-font-style'));?></div>
                        </div>
                        
                        <div class="google-font column one-column bpanel-option-set" <?php echo "{$show_footer_content_google_font}";?>>
                        	<div class="column one-column bpanel-option-set">
                            	<?php dttheme_admin_fonts( esc_html__('Footer Content Font', 'lms'),'mytheme[appearance][footer-content-font]',
														   dttheme_option('appearance','footer-content-font'));?>
                                <div class="clear"></div>
                                <p class="note"> <?php esc_html_e('Choose the footer content font', 'lms');?> </p>
                             </div>                        
                        </div>
                    </div><!-- Font End -->
                    
                    
                    <div class="hr_invisible"> </div>
                    
                    <div class="column one-half">
                    <?php $label = 		esc_html__("Footer Content Font Color", 'lms');
                          $name  =		"mytheme[appearance][footer-content-font-color]";
						  $value =  	(dttheme_option('appearance','footer-content-font-color') != NULL) ? dttheme_option('appearance','footer-content-font-color') :"#";
						  $tooltip = 	esc_html__("Pick a custom font color for footer content e.g. #a314a3", 'lms'); ?>
						  <h6><?php echo esc_html( $label );?></h6>
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                  
                    </div>
                    
                    <div class="column one-half last">
						<?php dttheme_admin_jqueryuislider(esc_html__('Footer Content Font Size', 'lms'),"mytheme[appearance][footer-content-font-size]",
                              dttheme_option('appearance',"footer-content-font-size"));?>                    
                    </div>
                    
                    <div class="hr"> </div>
                    
                    <div class="column one-half">
                    <?php $label = 		esc_html__("Primary / Default Color for Links", 'lms');
                          $name  =		"mytheme[appearance][footer-primary-color]";	
						  $value =  	(dttheme_option('appearance','footer-primary-color') != NULL) ? dttheme_option('appearance','footer-primary-color') :"#";
                          $tooltip = 	esc_html__("Pick a custom primary color for links in footer e.g. #551256", 'lms'); ?>
                          <h6><?php echo esc_html( $label );?></h6>
                	      <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                  
                    </div>

                    <div class="column one-half last">
                    <?php $label = 		esc_html__("Hover Color for Links", 'lms');
                          $name  =		"mytheme[appearance][footer-secondary-color]";	
						  $value =  	(dttheme_option('appearance','footer-secondary-color') != NULL) ? dttheme_option('appearance','footer-secondary-color') :"#";
                          $tooltip = 	esc_html__("Pick a custom color for footer links hover state e.g. #564912", 'lms'); ?>
                          <h6><?php echo esc_html( $label );?></h6>
                	      <?php dttheme_admin_color_picker("",$name,$value,'');?>   
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                 
                    </div>
                    
                    <div class="hr"> </div>

                    <div class="column one-half">
                    <?php $label = 		esc_html__("Footer BG Color", 'lms');
    	                  $name  =		"mytheme[appearance][footer-bg-color]";	
        	              $value =  	(dttheme_option('appearance','footer-bg-color')  != NULL) ? dttheme_option('appearance','footer-bg-color') : "#";
            	          $tooltip = 	esc_html__("Pick a custom background color of the theme's footer section.(e.g. #a314a3)", 'lms'); ?>
                          <h6><?php echo esc_html( $label );?></h6>
                	      <?php dttheme_admin_color_picker("",$name,$value,'');?>
                          <p class="note"><?php echo esc_html( $tooltip );?></p>
                    </div>
                    <div class="column one-half last">
                    <?php $label = 		esc_html__("Copyright Section BG Color", 'lms');
    	                  $name  =		"mytheme[appearance][copyright-bg-color]";	
        	              $value =  	(dttheme_option('appearance','copyright-bg-color')  != NULL) ? dttheme_option('appearance','copyright-bg-color') : "#";
            	          $tooltip = 	esc_html__("Pick a custom background color of the theme's copyright section.(e.g. #a314a3)", 'lms'); ?>
						  <h6><?php echo esc_html( $label );?></h6>
                	      <?php dttheme_admin_color_picker("",$name,$value,'');?> 
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                         
                	</div>
                    
                </div>
                <!-- Footer Font End-->		
            
            </div>
        </div><!-- Footer Section (#appearance-footer) End-->        
        
        <!-- Typography Section -->
        <div id="appearance-typography" class="tab-content">
	        <div class="bpanel-box">
            
                <div class="box-title">
                	<h3><?php esc_html_e("Disable Typography Settings", 'lms'); ?></h3>
                </div>
                <div class="box-content">
                    <div class="bpanel-option-set">
                    	<h6><?php esc_html_e('Disable Typography Settings', 'lms');?></h6>
                        <?php dttheme_switch("",'appearance','disable-typography-settings');?>
                        <p class="note"> <?php esc_html_e('Enable or Disable the typography settings', 'lms');?>  </p>
                    </div>
                </div>
            
            	<?php for($i=1;$i<=6;$i++): ?>
                    <div class="box-title">
                    	<h3><?php echo "H{$i} ";?><?php esc_html_e('Font Family, Size and Color', 'lms');?></h3>
                        
                    </div>
                    <div class="box-content">
                    	 <p class="note"> <?php esc_html_e("Choose Font Family, Size and Color for", 'lms'); echo " H{$i}"?> </p>
                         
                         <!-- Font -->
                         <div class="font-container">
                            <div class="bpanel-option-set">
                                <h6><?php echo "H{$i} "; esc_html_e('Choose Font Type', 'lms');?></h6>
                                <?php $switchclass = ("on" == dttheme_option('appearance', "H{$i}-font-type")) ? 'checkbox-switch-on font-checkbox-switch-on' : 'checkbox-switch-off font-checkbox-switch-off'; ?>
                                <div data-for="<?php echo "mytheme-H{$i}-font-type";?>" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                                <input class="hidden" id="<?php echo "mytheme-H{$i}-font-type";?>" name="mytheme[appearance][<?php echo "H{$i}-font-type";?>]" type="checkbox" 
                                    <?php checked(dttheme_option('appearance',"H{$i}-font-type"),'on');?>/>
                                <p class="note"> <?php esc_html_e('Choose which type font.', 'lms');?>  </p>
                            </div>
                            <div class="hr"></div>
                            <?php $show_h_standard_font = ("on" == dttheme_option('appearance',"H{$i}-font-type")) ? " style='display:block;' " : "  style='display:none;' ";
                              	  $show_h_google_font = (dttheme_option('appearance',"H{$i}-font-type")) ? "  style='display:none;' " : " style='display:block;' ";?>
                            
                            <div class="standard-font column one-column bpanel-option-set" <?php echo "{$show_h_standard_font}";?>>
                                <div class="column one-half bpanel-option-set">
                                    <?php dttheme_standard_font( "H{$i} ".esc_html__('Standard Font', 'lms'), "mytheme[appearance][H{$i}-standard-font]", 
                                                                dttheme_option('appearance', "H{$i}-standard-font"));?></div>
                                <div class="column one-half last bpanel-option-set">
                                    <?php dttheme_standard_font_style( "H{$i} ".esc_html__('Standard Font Style', 'lms'), "mytheme[appearance][H{$i}-standard-font-style]", 
                                          dttheme_option('appearance', 'menu-standard-font-style'));?></div>
                            </div>
                            
                            <div class="google-font column one-column bpanel-option-set" <?php echo "{$show_h_google_font}";?>>
                            	<div class="column one-column">
                                	<div class="bpanel-option-set"><?php dttheme_admin_fonts("H{$i} ".esc_html__('Font', 'lms'),
											"mytheme[appearance][H{$i}-font]",dttheme_option('appearance',"H{$i}-font"));?></div>
                                </div>
                            </div>
                            
                         	
                         </div><!-- Font End -->

                         <div class="hr_invisible"> </div>
                         <div class="column one-half last">
							<?php $label = 		"H{$i} ".esc_html__("Font Color", 'lms');
                                  $name  =		"mytheme[appearance][H{$i}-font-color]";
								  $value =  	(dttheme_option('appearance',"H{$i}-font-color") != NULL) ? dttheme_option('appearance',"H{$i}-font-color") :"#"; ?>
								  <h6><?php echo esc_html( $label );?></h6>	
                                  <?php dttheme_admin_color_picker("",$name,$value);?>                    
                         </div>
                         <div class="column one-half last">
						 	<?php dttheme_admin_jqueryuislider("H{$i} ".esc_html__('Font Size', 'lms'),
                           		"mytheme[appearance][H{$i}-size]",dttheme_option('appearance',"H{$i}-size"));?>
                    	 </div>     
                    </div>
                <?php endfor;?>
            </div><!-- .bpanel-box end -->
        </div><!-- Typography Section -->


        <!--Layout Section -->
        <div id="appearance-layout" class="tab-content">
        	<!-- Layout Selection-->
	        <div class="bpanel-box">
                <div class="box-title">
                	<h3><?php esc_html_e('Choose Layout', 'lms');?></h3>
                    
                </div>
                <div class="box-content">
                	<h6><?php esc_html_e('Layout', 'lms');?></h6>
                	<p class="note no-margin"> <?php esc_html_e("Choose the Layout Style(Boxed / Fullwidth)", 'lms');?> </p>
                    <div class="hr_invisible"> </div>
					<div class="bpanel-option-set">    
                         <ul class="bpanel-post-layout bpanel-layout-set">
                         	<?php $layouts = array("boxed","wide");
								  foreach($layouts as $layout):
								  	$class = ( $layout ==  dttheme_option('appearance','layout')) ? " class='selected' " : "";?>
                                  	<li class="themelayout"><a href="#" rel="<?php echo esc_attr( $layout );?>" <?php echo "{$class}";?> title="<?php echo esc_attr( $layout );?>">
                                    	<img src="<?php echo IAMD_FW_URL."theme_options/images/layouts/{$layout}.png";?>"/>
                                    </a></li>
                            <?php endforeach;?>	      
                         </ul>
                         <input id="mytheme[appearance][layout]" name="mytheme[appearance][layout]" type="hidden" 
                         		value="<?php echo  dttheme_option('appearance','layout');?>"/>
                    </div>
                </div><!-- .box-content -->
			</div><!-- Layout Selection End-->
            
        	<!-- Boxed Layout Settings -->
            <?php $style = (dttheme_option('appearance','layout') == "boxed") ? '' :'style="display:none;"'; ?>
	        <div id="boxed" class="bpanel-box" <?php echo "{$style}";?>>
                <div class="box-title"><h3><?php esc_html_e('Boxed Layout BG Background', 'lms');?></h3></div>
                <div class="box-content">
                
                    <?php dttheme_bgtypes("mytheme[appearance][bg-type]","appearance","bg-type");?>
                 
                    <?php $bg_pattern = ( dttheme_option('appearance','bg-type')=="bg-patterns" ) ? 'style="display:block"' : 'style="display:none"'; ?>
                    <?php $bg_custom = ( dttheme_option('appearance','bg-type')=="bg-custom" ) ? 'style="display:block"' : 'style="display:none"'; ?>
                
                	<!-- In-built BG Patterns starts-->
                    <div class="bg-pattern" <?php echo "{$bg_pattern}";?>>
                    	<div class="hr_invisible"> </div>
                    	<h6> <?php esc_html_e('Choose Patterns', 'lms');?> </h6>
                    	<!-- Pattern Sets Start -->
                    	<div class="bpanel-option-set">
                        	
                            <ul class="bpanel-post-layout bpanel-layout-set">
                            <?php $pattrens  = dttheme_listImage(IAMD_FW."theme_options/images/patterns/");
								foreach($pattrens as $key => $value):
									$class = ( $key ==  dttheme_option('appearance','boxed-layout-pattern')) ? " class='selected' " : "";
									echo "<li>";
									echo "<a href='#' rel='{$key}' {$class}><img width='80px' height='80px' src='".IAMD_FW_URL."theme_options/images/patterns/$key' alt='' /></a>";
									echo "</li>";
								endforeach;?></ul>
                            <input id="mytheme[appearance][boxed-layout-pattern]" name="mytheme[appearance][boxed-layout-pattern]" type="hidden" 
                         			value="<?php echo  dttheme_option('appearance','boxed-layout-pattern');?>"/>
                           <p class="note">	<?php esc_html_e('Choose background pattern, you can add patterns by placing the png files in the folder ', 'lms');
						   	echo ('<b>framework/theme_options/images/pattern/</b>');?>   </p>
                        </div><!-- Patterns set End -->

                        <!-- Pattern BG Settings -->
                        <div class="column one-column">
                        	<div class="bpanel-option-set">
                                <h6><?php esc_html_e('Boxed Layout Background Pattern repeat', 'lms');?></h6>
                                <div class="clear"></div>
                                <select name="mytheme[appearance][boxed-layout-pattern-repeat]">
                                    <option value=""><?php esc_html_e("Select", 'lms');?></option>
                                    <?php $options = array("repeat","repeat-x","repeat-y","no-repeat");
										foreach($options as $option):?>
                                        <option value="<?php echo esc_attr( $option );?>"
                                            <?php selected($option,dttheme_option('appearance','boxed-layout-pattern-repeat')); ?>><?php echo esc_html( $option );?></option>
                                    <?php endforeach;?>
                                </select>
                                <p class="note"> <?php esc_html_e("Select how would you like to repeat the pattern image", 'lms');?> </p>
                            </div>
                            
                        </div>
                        
                        <div class="hr"> </div>
                        
                        <div class="column one-half">
                            <h6><?php esc_html_e("Disable Background Color", 'lms');?></h6>
                            <?php dttheme_switch("",'appearance','disable-boxed-layout-pattern-color');?>
                        </div>                            
                        
                        <div class="column one-half last">
                        
                        <?php $label = 		esc_html__("Choose Background Color", 'lms');
                              $name  =		"mytheme[appearance][boxed-layout-pattern-color]";
                              $value =  	(dttheme_option('appearance','boxed-layout-pattern-color') != NULL) ? dttheme_option('appearance','boxed-layout-pattern-color') :"#";
                              $tooltip = 	esc_html__("Pick a custom background color of the theme.(e.g. #a314a3)", 'lms');
                                dttheme_admin_color_picker($label,$name,$value,'');?>    
                                
                                <p class="note"> <?php echo esc_html( $tooltip );?></p>
                        </div>
                        <!-- Pattern BG Settings end-->    
                        
                        <div class="hr"> </div>
                        
                        <div class="bpanel-option-set">
                        <?php echo dttheme_admin_jqueryuislider( esc_html__("Background opacity", 'lms'),	"mytheme[appearance][boxed-layout-pattern-opacity]",
                                                                          dttheme_option("appearance","boxed-layout-pattern-opacity"),"");?>
                        </div> 
                        
                    </div><!-- In-built BG Patterns ends-->
                     	
                	<!-- Upload custom BG option Starts -->
                    <div class="bg-custom" <?php echo "{$bg_custom}";?>>
                        
                        <div class="hr_invisible"> </div>
                        <h6><?php esc_html_e("Boxed Layout Background Image", 'lms');?></h6>
                        <div class="clear"></div>
                        <div class="image-preview-container">
                            <input id="mytheme-boxed-layout-bg" name="mytheme[appearance][boxed-layout-bg]" type="text" class="uploadfield medium" readonly="readonly"
                                    value="<?php echo dttheme_option('appearance','boxed-layout-bg');?>"/>
                            <input type="button" value="<?php esc_attr_e('Upload', 'lms');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php esc_attr_e('Remove', 'lms');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('appearance','boxed-layout-bg'));?>
                        </div>
                        <p class="note"> <?php esc_html_e("Upload an image for the theme's background", 'lms');?> </p>
                       
                       <div class="hr_invisible"> </div>                       
                
                        <!-- Boxed Layout BG Settings -->
                        <div class="column one-half">
                        <?php $bg_settings = array(
                                    array(
                                        "label"=>	esc_html__('Background Image Repeat', 'lms'),
                                        "tooltip"=>	esc_html__("Select how would you like to repeat the background image", 'lms'),
                                        "name" => "mytheme[appearance][boxed-layout-bg-repeat]",
                                        "db-key"=>"boxed-layout-bg-repeat",
                                        "options"=>  array("repeat","repeat-x","repeat-y","no-repeat")
                                    ),
                                    array(
                                        "label"=>esc_html__('Background Image Position', 'lms'),
                                        "tooltip"=>	esc_html__("Select how would you like to position the background", 'lms'),
                                        "name" => "mytheme[appearance][boxed-layout-bg-position]",
                                        "db-key"=>"boxed-layout-bg-position",
                                        "options"=>  array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right")
                                    )
                                );
                    
                              foreach($bg_settings as $bgsettings): ?>
                                  <div class="bpanel-option-set">
                                    <label><?php echo esc_html( $bgsettings['label'] );?></label>
                                    <div class="clear"></div>
                                    <select name="<?php echo esc_attr( $bgsettings['name'] );?>">
                                        <option value=""><?php esc_html_e("Select", 'lms');?></option>
                                        <?php foreach($bgsettings['options'] as $option):?>
                                            <option value="<?php echo esc_attr( $option );?>"
                                                <?php selected($option,dttheme_option('appearance',$bgsettings['db-key'])); ?>><?php echo esc_html( $option );?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <p class="note"> <?php echo esc_html( $bgsettings['tooltip'] );?>  </p>
                                    <div class="hr_invisible"> </div>
                                  </div>
                        <?php endforeach;?>
                        		 <div class="bpanel-option-set">	
                                     
                                 	 <h6><?php esc_html_e("Disable Background Color", 'lms');?></h6>
	                        		 <?php dttheme_switch("",'appearance','disable-boxed-layout-bg-color');?>
                                 </div>    
                        </div><!-- Boxed Layout BG Settings End -->
                        
                         <!-- Boxed Layout BG Color -->
                         <div class="column one-half last">
	                        
                            <?php $label = 		esc_html__("Background Color", 'lms');
                                  $name  =		"mytheme[appearance][boxed-layout-bg-color]";
                                  $value =  	(dttheme_option('appearance','boxed-layout-bg-color') != NULL) ? dttheme_option('appearance','boxed-layout-bg-color') :"#";
                                  $tooltip = 	esc_html__("Pick a background color of the theme.(e.g. #a314a3)", 'lms');
                                dttheme_admin_color_picker($label,$name,$value,'');?>
                                
                                <p class="note"> <?php echo esc_html( $tooltip );?> </p>
                                
                                <div class="hr_invisible"> </div>
                                
							 <?php echo dttheme_admin_jqueryuislider( esc_html__("Background opacity", 'lms'),	"mytheme[appearance][boxed-layout-bg-opacity]",
                                                                      dttheme_option("appearance","boxed-layout-bg-opacity"),"");?>                                
                         </div><!-- Boxed Layout BG Color -->
                    </div><!-- Upload custom BG option Ends -->
                     
                </div><!-- .box-content -->   
            </div><!-- .bpanel-box -->    
        </div><!--Layout Section  End-->        
        
    </div><!-- .bpanel-main-content end -->
</div><!-- appearance  end-->