<?php
/** dttheme_options_page()
  * Objective:
  *		To create thme option page at back end.
**/
function dttheme_options_page(){ ?>
<!-- wrapper -->
<div id="wrapper">

	<!-- Result -->
    <div id="bpanel-message" style="display:none;"></div>
    <div id="ajax-feedback" style="display:none;"><img src="<?php echo IAMD_FW_URL.'theme_options/images/loading.png';?>"/></div>
    <!-- Result -->


	<!-- panel-wrap -->
	<div id="panel-wrap">
    
       	<!-- bpanel-wrapper -->
        <div id="bpanel-wrapper">
        
           	<!-- bpanel -->
           	<div id="bpanel">
            
                	<!-- bpanel-left -->
                	<div id="bpanel-left">
                    	<div id="logo"> 
                        <?php $logo =  IAMD_FW_URL.'theme_options/images/logo.png';
							  $advance = dttheme_option('advance');
							  if(isset($advance['buddhapanel-logo-url']) && isset( $advance['enable-buddhapanel-logo-url'])):
							  	$logo = $advance['buddhapanel-logo-url'];
							  endif;?>
                        <img src="<?php echo esc_url( $logo );?>" width="186" height="101"/> </div>                        
                        <?php $tabs = array(
									array('id'=>'general' , 'name'=>esc_html__('General', 'lms')),
									array('id'=>'appearance', 'name'=>esc_html__('Appearance', 'lms')),
									array('id'=>'skin', 'name'=>esc_html__('Skins', 'lms')),
									array('id'=>'integration', 'name'=>esc_html__('Integration', 'lms')),
									array('id'=>'specialty-pages', 'name'=>esc_html__('Speciality Pages', 'lms')),
									array('id'=>'theme-footer', 'name'=>esc_html__('Footer', 'lms')),																		
									array('id'=>'widgetarea', 'name'=>esc_html__('Widget Area', 'lms')),
									array('id'=>'woocommerce', 'name'=>esc_html__('WooCommerce', 'lms')),
									array('id'=>'courses', 'name'=>esc_html__('LMS', 'lms')),
									array('id'=>'senseicourses', 'name'=>esc_html__('Sensei Courses', 'lms')),
									array('id'=>'events', 'name'=>esc_html__('Events', 'lms')),
									array('id'=>'buddypress-pages', 'name'=>esc_html__('BuddyPress', 'lms')),
									array('id'=>'pagebuilder', 'name'=>esc_html__('Page Builder', 'lms')),
									array('id'=>'mobile', 'name'=>esc_html__('Responsive &amp; Mobile', 'lms')),
									array('id'=>'branding', 'name'=>esc_html__('Branding', 'lms')),
									array('id'=>'privacy', 'name'=>esc_html__('Privacy & Cookies','lms')),
									array('id'=>'backup', 'name'=>esc_html__('Backup', 'lms')),
								);
								
							  $output = "<!-- bpanel-mainmenu -->\n\t\t\t\t\t\t<ul id='bpanel-mainmenu'>\n";
									foreach($tabs as $tab ):
									$output .= "\t\t\t\t\t\t\t\t<li><a href='#{$tab['id']}' title='{$tab['name']}'><span class='{$tab['id']}'></span>{$tab['name']}</a></li>\n";
									endforeach;
							  $output .= "\t\t\t\t\t\t</ul><!-- bpanel-mainmenu -->\n";
							  echo "{$output}";?>
                    </div><!-- bpanel-left  end-->
                    
                    <form id="mytheme_options_form" name="mytheme_options_form" method="post" action="options.php">
		                <?php settings_fields(IAMD_THEME_SETTINGS);?>
                        <input type="hidden" id="mytheme-full-submit" name="mytheme-full-submit" value="0" />
                        <input type="hidden" name="mytheme_admin_wpnonce" value="<?php echo wp_create_nonce(IAMD_THEME_SETTINGS.'_wpnonce');?>" />
                        
                    	<?php require_once(IAMD_TD.'/framework/theme_options/general.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/appearance.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/integration.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/specialty-pages.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/footer.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/widgetarea.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/woocommerce.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/courses.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/senseicourses.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/events.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/buddypress.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/pagebuilder.php');?>
						<?php require_once(IAMD_TD.'/framework/theme_options/responsive.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/branding.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/skins.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/privacy.php');?>
                        <?php require_once(IAMD_TD.'/framework/theme_options/backup.php');?>
						<!-- bpanel-bottom -->
                        <div id="bpanel-bottom">
                           <input type="submit" value="<?php esc_attr_e('Reset All', 'lms');?>" class="save-reset mytheme-reset-button bpanel-button white-btn" name="mytheme[reset]" />
						   <input type="submit" value="<?php esc_attr_e('Save All', 'lms');?>" name="submit"  class="save-reset mytheme-footer-submit bpanel-button white-btn" />
                        </div><!-- bpanel-bottom end-->        
                    </form>

            </div><!-- bpanel -->
            
            
            
        </div><!-- bpanel-wrapper -->
    </div><!-- panel-wrap end -->
</div><!-- wrapper end-->
<?php
}
### --- ****  dttheme_options_page() *** --- ###
?>