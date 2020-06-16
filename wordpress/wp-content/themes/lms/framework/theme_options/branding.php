<!-- advance starts here-->
<div id="branding" class="bpanel-content">
  	<!-- .bpanel-main-content starts here-->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-admin"><?php esc_html_e("Admin", 'lms');?></a></li>
        </ul>
        

        <!-- my-admin starts here --> 
        <div id="my-admin" class="tab-content">
        	<div class="bpanel-box">
                
                <!-- Buddha Panel logo -->
                <div class="box-title">
                   <h3><?php esc_html_e('Buddha Panel Logo', 'lms');?></h3>
                </div>
                
                <div class="box-content">
                	<h6> <?php esc_html_e('Replace Buddha Panel Logo', 'lms');?> </h6>
                    
                    <div class="column one-fifth">                
						<?php $checked = ( "true" ==  dttheme_option('advance','enable-buddhapanel-logo-url') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('advance','enable-buddhapanel-logo-url') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="enable-buddhapanel-logo-url" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="enable-buddhapanel-logo-url" name="mytheme[advance][enable-buddhapanel-logo-url]" type="checkbox" value="true" 
                        <?php echo "{$checked}";?> />
                    </div>
                    
                    <div class="column four-fifth last">                
                        <div class="image-preview-container">
                            <input id="mytheme-buddhapanellogo" name="mytheme[advance][buddhapanel-logo-url]" type="text" class="uploadfield medium" readonly="readonly"
                                value="<?php echo  dttheme_option('advance','buddhapanel-logo-url');?>" />
                            <input type="button" value="<?php esc_attr_e('Upload', 'lms');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php esc_attr_e('Remove', 'lms');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('advance','buddhapanel-logo-url'),true,'logo.png');?>
                        </div>
                    </div>
                    <p class="note"> <?php esc_html_e('Upload an image to replace the default buddha panel logo.<b><i>You can set your own brnad</i></b>. ', 'lms');?> </p>
                    
                </div><!-- Buddha Panel logo -->
                
                
            </div> <!-- .bpanel-box ends here -->
        </div><!-- my-admin ends here -->
     </div><!-- .bpanel-main-content ends here-->   
</div><!-- advance ends here -->