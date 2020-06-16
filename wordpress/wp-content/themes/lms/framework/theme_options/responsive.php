<!-- mobile -->
<div id="mobile" class="bpanel-content">
  <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-responsive"><?php esc_html_e("Responsive", 'lms');?></a></li>        
        </ul>
        
        <!-- my-responsive start --> 
        <div id="my-responsive" class="tab-content">
        	<div class="bpanel-box">
                <!-- Responsive Layout Options start -->
                <div class="box-title"><h3><?php esc_html_e('Responsive', 'lms');?></h3></div>
                <div class="box-content">
                
	                <div class="one-half-content">
    	            	<div class="bpanel-option-set">
                          <h6><?php esc_html_e("Make My Site Responsive", 'lms');?></h6>
                          <?php $checked = ( "true" ==  dttheme_option('mobile','is-theme-responsive') ) ? ' checked="checked"' : ''; ?>
                          <?php $switchclass = ( "true" ==  dttheme_option('mobile','is-theme-responsive') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                          <div data-for="is-theme-responsive" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                          <input class="hidden" id="is-theme-responsive" name="mytheme[mobile][is-theme-responsive]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                          <p class="note"><?php esc_html_e('Choose whether you need responsive version for your website', 'lms');?></p>
        	            </div>
                     </div>

	                <div class="one-half-content last">
    	            	<div class="bpanel-option-set">
	                      <h6><?php esc_html_e('Disable Slider for Mobile Devices', 'lms');?></h6>
                          <?php $checked = ( "true" ==  dttheme_option('mobile','is-slider-disabled') ) ? ' checked="checked"' : ''; ?>
                          <?php $switchclass = ( "true" ==  dttheme_option('mobile','is-slider-disabled') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                          <div data-for="is-slider-disabled" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                          <input class="hidden" id="is-slider-disabled" name="mytheme[mobile][is-slider-disabled]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                          <p class="note"><?php esc_html_e('Choose whether you wish to hide / display the slider area of your website on mobile devices', 'lms');?></p>
        	            </div>
                    </div>
                </div><!-- Responsive Layout Options end -->
            
            </div>
        </div><!-- my-responsive end -->
        
     </div><!-- .bpanel-main-content end-->   
</div><!-- mobile end -->