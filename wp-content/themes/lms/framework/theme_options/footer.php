<!-- general -->
<div id="theme-footer" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel"> 
            <li><a href="#my-footer"><?php esc_html_e("Footer", 'lms');?></a></li>
        </ul>
        

        <!-- my-footer-->
        <div id="my-footer" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php esc_html_e('Footer', 'lms');?></h3>
                </div>
                
                <div class="box-content">
                
                    <div class="bpanel-option-set">

                         <h6><?php esc_html_e('Show Footer', 'lms');?></h6>
                    	 <?php $switchclass = ( "on" ==  dttheme_option('general','show-footer') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                         <div data-for="mytheme-show-footer" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
						 <input class="hidden" id="mytheme-show-footer" name="mytheme[general][show-footer]" type="checkbox" 
						 <?php checked(dttheme_option('general','show-footer'),'on');?>/>
                         <div class="hr"></div>
                    
                        <h6><?php esc_html_e('Footer Column Layout', 'lms');?></h6>
                        <p class="note"><?php esc_html_e("Select a perfect column layout style for your theme's footer.", 'lms');?></p>
                        
                        <ul class="bpanel-post-layout bpanel-layout-set">
                        <?php $footer_layouts = array(
									1=>'one-column',							2=>'one-half-column',
									3=>'one-third-column',						4=>'one-fourth-column',
									5=>'onefourth-onefourth-onehalf-column',	6=>'onehalf-onefourth-onefourth-column',
									7=>'onefourth-threefourth-column',			8=>'threefourth-onefourth-column',
									9=>'onethird-twothird-column',				10=>'twothird-onethird-column');?>
                        <?php foreach($footer_layouts as $k => $v): $class = ( $k ==  dttheme_option('general','footer-columns')) ? " class='selected' " : "";?>
                       		<li><a href="#" rel="<?php echo esc_attr( $k );?>" <?php echo "{$class}";?>><img src="<?php echo IAMD_FW_URL."theme_options/images/columns/{$v}.png";?>"/></a></li>	
                        <?php endforeach;?>
                        </ul><input id="mytheme[general][footer-columns]" name="mytheme[general][footer-columns]" type="hidden"
                        			value="<?php echo  dttheme_option('general','footer-columns');?>"/>
                                    
                    </div><!-- .bpanel-option-set -->
                    
                     <div class="hr"></div>
                     
                     
                    <h6><?php esc_html_e('Footer Background Image', 'lms');?></h6>
                    <div class="image-preview-container">
                        <input id="mytheme-footerbg" name="mytheme[general][footer-bg]" type="text" class="uploadfield" readonly="readonly" value="<?php echo dttheme_option('general','footer-bg');?>" />
                        <input type="button" value="<?php esc_attr_e('Upload', 'lms');?>" class="upload_image_button show_preview" />
                        <input type="button" value="<?php esc_attr_e('Remove', 'lms');?>" class="upload_image_reset" />
                        <?php dttheme_adminpanel_image_preview(dttheme_option('general','footer-bg'));?>
                    </div>
                    <p class="note"><?php esc_html_e('Upload an image for footer background, or specify the image url directly', 'lms');?></p>
                    <div class="clear"></div>
                    
                    <div class="column one-half">

	                    <?php $bg_settings = array("repeat","repeat-x","repeat-y","no-repeat"); ?>

                        <div class="bpanel-option-set">
                          <label><?php esc_html_e('Background Image Repeat', 'lms');?></label>
                          <div class="clear"></div>
                          <select name="mytheme[general][footer-bg-repeat]">
                              <option value=""><?php esc_html_e("Select", 'lms');?></option>
                              <?php foreach($bg_settings as $option):?>
                                  <option value="<?php echo esc_attr($option);?>"
                                      <?php selected($option,dttheme_option('general', 'footer-bg-repeat')); ?>><?php echo esc_html( $option );?></option>
                              <?php endforeach;?>
                          </select>
                          <p class="note"><?php esc_html_e("Select how would you like to repeat the background image", 'lms');?></p>
                          <div class="hr_invisible"> </div>
                        </div>

                    </div>

                    <div class="column one-half last">

                    	<?php $bg_settings = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right"); ?>

                        <div class="bpanel-option-set">
                          <label><?php esc_html_e('Background Image Position', 'lms');?></label>
                          <div class="clear"></div>
                          <select name="mytheme[general][footer-bg-position]">
                              <option value=""><?php esc_html_e("Select", 'lms');?></option>
                              <?php foreach($bg_settings as $option):?>
                                  <option value="<?php echo esc_attr($option);?>"
                                      <?php selected($option,dttheme_option('general', 'footer-bg-position')); ?>><?php echo esc_html( $option );?></option>
                              <?php endforeach;?>
                          </select>
                          <p class="note"><?php esc_html_e("Select how would you like to position the background", 'lms');?></p>
                          <div class="hr_invisible"> </div>
                        </div>
                    </div><!-- Boxed Layout BG Settings End -->

                    <div class="hr"></div>

                    <div class="bpanel-option-set">
                         <h6><?php esc_html_e('Show Copyright Text', 'lms');?></h6>
                    	 <?php $switchclass = ( "on" ==  dttheme_option('general','show-copyrighttext') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                         <div data-for="mytheme-show-copyrighttext" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
						 <input class="hidden" id="mytheme-show-copyrighttext" name="mytheme[general][show-copyrighttext]" type="checkbox" 
						 <?php checked(dttheme_option('general','show-copyrighttext'),'on');?>/>
                         <div class="hr_invisible"></div>
                    
                        <h6><?php esc_html_e('Copyright Text', 'lms');?></h6>
                        <textarea id="mytheme-copyright-text" name="mytheme[general][copyright-text]"
                        	rows="" cols=""><?php echo htmlspecialchars (stripslashes(dttheme_option('general','copyright-text')));?></textarea>
                        <p class="note"> <?php esc_html_e('You can paste your copyright text in this box. This will be automatically added to the footer.', 'lms');?> </p>
                    </div><!-- .bpanel-option-set -->
                                        
                </div> <!-- .box-content -->
            
            </div><!-- .bpanel-box end -->
        </div><!--my-footer end-->
        
    </div><!-- .bpanel-main-content end-->
</div><!-- general end-->