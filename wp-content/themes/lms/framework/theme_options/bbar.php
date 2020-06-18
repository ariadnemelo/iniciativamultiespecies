<!-- Buddha Bar Settings -->
<div id="bbar" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-bar"><?php esc_html_e("Bar Settings", 'lms');?></a></li>
        </ul>
        
        <!-- my-bar-->
        <div id="my-bar" class="tab-content">
        	
            <!-- Settings -->
            <div class="bpanel-box">
		        <div class="box-title"><h3><?php esc_html_e('Bar Settings', 'lms');?></h3></div>
                <div class="box-content">
                	
                    <div class="column one-half">
                    	<h6><?php esc_html_e('Enable Bar', 'lms');?></h6>
	                	<?php dttheme_switch("",'bbar','show-bbar');?>
                    </div>

                    <div class="column one-half last">
                    	<h6><?php esc_html_e('Hide Bar by default', 'lms');?></h6>
	                	<?php dttheme_switch("",'bbar','status-bbar');?>
                    </div>
                    
                    <div class="hr"> </div>

                
                    <div class="column one-half">
                        <?php $label = 		__("Bar BG Color", 'lms');
                          $name  =		"mytheme[bbar][bar-bg-color]";	
                          $value =  	 (dttheme_option('bbar','bar-bg-color')!= NULL) ? dttheme_option('bbar','bar-bg-color') : "#";
                          $tooltip = 	__("Pick a custom buddha bar background color e.g. #a314a3", 'lms'); ?>
                          <h6><?php echo esc_html( $label );?></h6>	
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>
                          <p class="note"><?php echo esc_html( $tooltip );?></p>   
                          <h6><?php esc_html_e('Show BG Color', 'lms');?></h6>                     
                          <div class="bpanel-option-set"><?php dttheme_switch("",'bbar','disable-bg-color');?></div>
                    </div>
                    
                    <div class="column one-half last">
                        <?php $label = 		__("Shadow Color", 'lms');
                          $name  =		"mytheme[bbar][bar-shadow-color]";	
                          $value =  	 (dttheme_option('bbar','bar-shadow-color')!= NULL) ? dttheme_option('bbar','bar-shadow-color') : "#";
                          $tooltip = 	__("Pick a custom buddha bar shadow color e.g. #a314a3", 'lms'); ?>
						  <h6><?php echo esc_html( $label );?></h6>	
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>
                          <p class="note"><?php echo ec_html( $tooltip );?></p>   
                          <h6><?php esc_html_e('Show Shadow Color', 'lms');?></h6>   
                          <div class="bpanel-option-set"><?php dttheme_switch("",'bbar','disable-shadow-color');?></div>
                    </div>
                          
                </div>
            </div><!-- Settings End-->
            
        
        	<!-- Message Text Settings -->
        	<div class="bpanel-box">
            	<div class="box-title"><h3><?php esc_html_e('Message Settings', 'lms');?></h3></div>
                <div class="box-content">
                     
                     <div class="bpanel-option-set">
                         <h6><?php esc_html_e('Message', 'lms');?></h6>
                         <textarea id="mytheme-bbar-tmsg" name="mytheme[bbar][message]" rows="" cols=""><?php echo stripslashes(dttheme_option('bbar','message'));?></textarea>
                         <p class="note"><?php esc_html_e("You can add your custom buddha bar message.", 'lms');?></p>
                     </div>
                     
                    <div class="hr"> </div>
                      
                    <div class="column one-column"> 
                        <div class="bpanel-option-set">
							<?php dttheme_admin_fonts(esc_html__('Message Font', 'lms'),'mytheme[bbar][message-font]',dttheme_option('bbar','message-font'));?>
                            <div class="clear"></div>
                            <p class="note"><?php esc_html_e("Choose Message Font", 'lms');?></p>
                        </div>                        
                    </div>
                    
                    <div class="hr_invisible"> </div>

                    <div class="column one-half">
                        <?php $label = 		esc_html__("Message Font Color", 'lms');
                          $name  =		"mytheme[bbar][message-font-color]";	
                          $value =  	 (dttheme_option('bbar','message-font-color')!= NULL) ? dttheme_option('bbar','message-font-color') : "#";
                          $tooltip = 	esc_html__("Pick a custom font color for the message e.g. #a314a3", 'lms'); ?>
                          <h6> <?php echo esc_html( $label );?> </h6>
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>
                          <p class="note no-margin"><?php echo es_html( $tooltip );?></p>     
                    </div>
                    <div class="column one-half last">
						<?php dttheme_admin_jqueryuislider(esc_html__('Message Font Size', 'lms'),"mytheme[bbar][message-font-size]",
                            dttheme_option('bbar',"message-font-size"));?>
                    </div>
                    
                    <div class="hr"> </div>
                    
                    <div class="column one-third">
                    	<h6><?php esc_html_e('Disable Font Color', 'lms');?></h6>   
                        <?php dttheme_switch("",'bbar','disable-message-font-color');?>
                    </div>
                    
                    <div class="column one-third"> 
                        <?php $label = 		esc_html__("Link Color", 'lms');
                          $name  =		"mytheme[bbar][link-color]";	
                          $value =  	 (dttheme_option('bbar','link-color')!= NULL) ? dttheme_option('bbar','link-color') : "#";
                          $tooltip = 	esc_html__("Pick a custom primary color for the links in buddha bar e.g. #564912 ", 'lms'); ?>
                          <h6><?php echo esc_html( $label );?></h6>	
                          <?php dttheme_admin_color_picker('',$name,$value,'');?> 
                          <p class="note"><?php echo esc_html( $tooltip );?></p>                    
                    </div>

                    <div class="column one-third last">
                        <?php $label = 		esc_html__("Link hover Color", 'lms');
                          $name  =		"mytheme[bbar][link-hover-color]";	
                          $value =  	 (dttheme_option('bbar','link-hover-color')!= NULL) ? dttheme_option('bbar','link-hover-color') : "#";
                          $tooltip = 	esc_html__("Pick a custom hover state color for the links in buddha bar e.g. #564912 ", 'lms'); ?>
						  <h6><?php echo esc_html( $label );?></h6>	
                          <?php dttheme_admin_color_picker('',$name,$value,'');?>                    
                          <p class="note"><?php echo esc_html( $tooltip );?></p> 
                    </div>
                    

                </div>
            </div><!-- Message Text Settings End -->
        </div><!-- my-bar -->
    </div><!-- .bpanel-main-content end-->
</div><!-- Buddha Bar Settings end-->