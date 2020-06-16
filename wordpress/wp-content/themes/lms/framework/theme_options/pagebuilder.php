<!-- pagebuilder -->
<div id="pagebuilder" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel"> 
            <li><a href="#my-pagebuilder"><?php esc_html_e("Page Builder", 'lms');?></a></li>
        </ul>
        

        <!-- my-pagebuilder-->
        <div id="my-pagebuilder" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php esc_html_e('Page Builder', 'lms');?></h3>
                </div>
                
                <?php
				$dt_pb_status = class_exists ( 'DTCorePlugin' );
				if($dt_pb_status) {
				?>
                <div class="box-content">
                
                    <div class="bpanel-option-set">
                    
						<h6><?php esc_html_e('Choose any of these post types to activate page builder', 'lms');?></h6><?php
						//Getting post types...
						$post_types = array( 'post' => 'Post', 'page' => 'Page', 'dt_portfolios' => 'Portfolio', 'dt_classes' => 'Classes', 'dt_courses' => 'Courses', 'dt_lessons' => 'Lessons', 'dt_teachers' => $GLOBALS['teachers-plural-label'] );
						foreach ( $post_types as $key => $pname ):
							
							$sel_posttypes = array();
							if(is_array(dttheme_option('pagebuilder', 'post-types'))) {
								$sel_posttypes = dttheme_option('pagebuilder', 'post-types');	
							} else {
								$sel_posttypes = dttheme_option('pagebuilder', $key);
								$sel_posttypes = !is_array($sel_posttypes) ? array($sel_posttypes => $sel_posttypes) : $sel_posttypes;
							}
							
						  	$switchclass = ( array_key_exists($key, $sel_posttypes) && $key ==  $sel_posttypes[$key] ) ? 'checkbox-switch-on' :'checkbox-switch-off';
						  	$obj = get_post_type_object( $key );?>
							  <div class="column one-third"><label><?php echo esc_attr($obj->labels->singular_name); ?></label></div>
							  <div class="column two-third last">
								   <div data-for="mytheme-<?php echo esc_attr($key);?>" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
								   <input class="hidden" id="mytheme-<?php echo esc_attr($key);?>" name="mytheme[pagebuilder][post-types][<?php echo esc_attr($key);?>]" type="checkbox" value="<?php echo esc_attr($key);?>"
								   <?php if(array_key_exists($key, $sel_posttypes)) checked($sel_posttypes[$key],$key);?>/>
							  </div><?php
						endforeach;
                    	?>

                         <div class="hr"></div>

                    </div><!-- .bpanel-option-set -->
 
                    <div class="bpanel-option-set">

                         <?php
						 $checked = ( true ==  dttheme_option('pagebuilder','enable-pagebuilder') ) ? ' checked="checked"' : '';
						 $pb_switchclass = ( true ==  dttheme_option('pagebuilder', 'enable-pagebuilder') ) ? 'checkbox-switch-on' :'checkbox-switch-off';
						?>
                         <h6><?php esc_html_e('Keep page builder active in above selected post types', 'lms'); ?></h6>
                         <div data-for="mytheme-enable-pagebuilder" class="checkbox-switch <?php echo esc_attr( $pb_switchclass );?>"></div>
                         <input class="hidden" id="mytheme-enable-pagebuilder" name="mytheme[pagebuilder][enable-pagebuilder]" type="checkbox" value="true" <?php echo "{$checked}"; ?>/>
                         
                        <div class="hr"></div>

                    </div><!-- .bpanel-option-set -->
                    
                </div> <!-- .box-content -->
                
                <?php } else { ?>
            	
                	<div class="bpanel-box">
                    	 <div class="bpanel-option-set">
                            <p class="note"><?php esc_html_e('Please activate "DesignThemes Core Features Plugin" to get the Page Builder options.', 'lms');?></p>
                        </div>
                    </div>
                    
                <?php } ?>
                
            </div><!-- .bpanel-box end -->
            
            
        </div><!--my-footer end-->
        
    </div><!-- .bpanel-main-content end-->
</div><!-- general end-->