<!-- events starts here-->
<div id="events" class="bpanel-content">
  	<!-- .bpanel-main-content starts here-->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-events"><?php esc_html_e("Events Settings", 'lms');?></a></li>
        </ul>
        
        <!-- my-events starts here --> 
        <div id="my-events" class="tab-content">
        	<div class="bpanel-box">
<?php  if( class_exists('Tribe__Events__Main') ) : ?>

				<!-- Events Page -->
            	<div class="box-title"><h3><?php esc_html_e('Events', 'lms');?></h3></div>
                <div class="box-content">
                	<!-- Events Page Layout -->
                    <h6><?php esc_html_e('Layout', 'lms');?></h6>
                    <p class="note no-margin"> <?php esc_html_e("Choose the Events page layout", 'lms');?></p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                    	<ul class="bpanel-post-layout bpanel-layout-set" id="event-archive-layout">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar','both-sidebar'=>'both-sidebar');
							  $v = 	dttheme_option('events',"event-archive-layout");
							  $v = !empty($v) ? $v : "content-full-width";
							  
                        foreach($layout as $key => $value):
                            $class = ( $key ==  $v ) ? " class='selected' " : "";
                            echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png'/></a></li>";
                        endforeach; ?>
                        </ul>
                        <input name="mytheme[events][event-archive-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                    </div><!-- Events Page Layout End-->
                    
					 <?php 
                     $sb_layout = dttheme_option('events',"event-archive-layout");
                     $sidebar_both = $sidebar_left = $sidebar_right = '';
                     if($sb_layout == 'content-full-width') {
                        $sidebar_both = 'style="display:none;"'; 
                     } elseif($sb_layout == 'with-left-sidebar') {
                        $sidebar_right = 'style="display:none;"'; 
                     } elseif($sb_layout == 'with-right-sidebar') {
                        $sidebar_left = 'style="display:none;"'; 
                     } 
                     ?>
                    <div id="bpanel-widget-area-options" <?php echo 'class="event-archive-layout" '.$sidebar_both;?>>
                        
                        <div id="left-sidebar-container" class="bpanel-page-left-sidebar" <?php echo esc_attr( $sidebar_left ); ?>>
                            <!-- 2. Every Where Sidebar Left Start -->
                            <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                <h6><?php esc_html_e('Disable Event Every Where Sidebar Left', 'lms');?></label></h6>
                                <?php dttheme_switch("",'events','disable-event-everywhere-left-sidebar-for-event-archive-layout'); ?>
                            </div><!-- Every Where Sidebar Left End-->
                        </div>
    
                        <div id="right-sidebar-container" class="bpanel-page-right-sidebar" <?php echo esc_attr( $sidebar_right ); ?>>
                            <!-- 3. Every Where Sidebar Right Start -->
                            <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                <h6><?php esc_html_e('Disable Event Every Where Sidebar Right', 'lms');?></label></h6>
                                <?php dttheme_switch("",'events','disable-event-everywhere-right-sidebar-for-event-archive-layout'); ?>
                            </div><!-- Every Where Sidebar Right End-->
                        </div>
                        
                    </div>                    
                    
                </div><!-- Events Page -->

				<!-- Event Detail Page -->
            	<div class="box-title"><h3><?php esc_html_e('Event Detail', 'lms');?></h3></div>
                <div class="box-content">
                	<!-- Event Detail Page Layout -->
                    <h6><?php esc_html_e('Layout', 'lms');?></h6>
                    <p class="note no-margin"> <?php esc_html_e("Choose the Event page layout", 'lms');?></p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                    	<ul class="bpanel-post-layout bpanel-layout-set" id="event-detail-layout">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar','both-sidebar'=>'both-sidebar');
							  $v = 	dttheme_option('events',"event-detail-layout");
							  $v = !empty($v) ? $v : "content-full-width";
							  
                        foreach($layout as $key => $value):
                            $class = ( $key ==  $v ) ? " class='selected' " : "";
                            echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png'/></a></li>";
                        endforeach; ?>
                        </ul>
                        <input name="mytheme[events][event-detail-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                    </div><!-- Event Detail Page Layout End-->
                    
					 <?php 
                     $sb_layout = dttheme_option('events',"event-detail-layout");
                     $sidebar_both = $sidebar_left = $detail = '';
                     if($sb_layout == 'content-full-width') {
                        $sidebar_both = 'style="display:none;"'; 
                     } elseif($sb_layout == 'with-left-sidebar') {
                        $sidebar_right = 'style="display:none;"'; 
                     } elseif($sb_layout == 'with-right-sidebar') {
                        $sidebar_left = 'style="display:none;"'; 
                     } 
                     ?>
                    <div id="bpanel-widget-area-options" <?php echo 'class="event-detail-layout" '.$sidebar_both;?>>
                        
                        <div id="left-sidebar-container" class="bpanel-page-left-sidebar" <?php echo esc_attr( $sidebar_left ); ?>>
                            <!-- 2. Every Where Sidebar Left Start -->
                            <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                <h6><?php esc_html_e('Disable Event Every Where Sidebar Left', 'lms');?></label></h6>
                                <?php dttheme_switch("",'events','disable-event-everywhere-left-sidebar-for-event-detail-layout'); ?>
                            </div><!-- Every Where Sidebar Left End-->
                        </div>
    
                        <div id="right-sidebar-container" class="bpanel-page-right-sidebar" <?php echo esc_attr( $sidebar_right ); ?>>
                            <!-- 3. Every Where Sidebar Right Start -->
                            <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                <h6><?php esc_html_e('Disable Event Every Where Sidebar Right', 'lms');?></label></h6>
                                <?php dttheme_switch("",'events','disable-event-everywhere-right-sidebar-for-event-detail-layout'); ?>
                            </div><!-- Every Where Sidebar Right End-->
                        </div>
                        
                    </div>                    
                    
                </div><!-- Event Page -->

				<!-- Event Category Page -->
            	<div class="box-title"><h3><?php esc_html_e('Event Category', 'lms');?></h3></div>
                <div class="box-content">
                	<!-- Event Category Page Layout -->
                    <h6><?php esc_html_e('Layout', 'lms');?></h6>
                    <p class="note no-margin"> <?php esc_html_e("Choose the Event category page layout Style", 'lms');?></p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                    	<ul class="bpanel-post-layout bpanel-layout-set" id="event-category-layout">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar','both-sidebar'=>'both-sidebar');
							  $v = 	dttheme_option('events',"event-category-layout");
							  $v = !empty($v) ? $v : "content-full-width";
							  
                        foreach($layout as $key => $value):
                            $class = ( $key ==  $v ) ? " class='selected' " : "";
                            echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png'/></a></li>";
                        endforeach; ?>
                        </ul>
                        <input name="mytheme[events][event-category-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                    </div><!-- Event Category Page Layout End-->
                    
					 <?php 
                     $sb_layout = dttheme_option('events',"event-category-layout");
                     $sidebar_both = $sidebar_left = $sidebar_right = '';
                     if($sb_layout == 'content-full-width') {
                        $sidebar_both = 'style="display:none;"'; 
                     } elseif($sb_layout == 'with-left-sidebar') {
                        $sidebar_right = 'style="display:none;"'; 
                     } elseif($sb_layout == 'with-right-sidebar') {
                        $sidebar_left = 'style="display:none;"'; 
                     } 
                     ?>
                    <div id="bpanel-widget-area-options" <?php echo 'class="event-category-layout" '.$sidebar_both;?>>
                        
                        <div id="left-sidebar-container" class="bpanel-page-left-sidebar" <?php echo esc_attr( $sidebar_left ); ?>>
                            <!-- 2. Every Where Sidebar Left Start -->
                            <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                <h6><?php esc_html_e('Disable Event Every Where Sidebar Left', 'lms');?></label></h6>
                                <?php dttheme_switch("",'events','disable-event-everywhere-left-sidebar-for-event-category-layout'); ?>
                            </div><!-- Every Where Sidebar Left End-->
                        </div>
    
                        <div id="right-sidebar-container" class="bpanel-page-right-sidebar" <?php echo esc_attr( $sidebar_right ); ?>>
                            <!-- 3. Every Where Sidebar Right Start -->
                            <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                <h6><?php esc_html_e('Disable Event Every Where Sidebar Right', 'lms');?></label></h6>
                                <?php dttheme_switch("",'events','disable-event-everywhere-right-sidebar-for-event-category-layout'); ?>
                            </div><!-- Every Where Sidebar Right End-->
                        </div>
                        
                    </div>                    
                    
                </div><!-- Event Category Page -->

<?php 	else: ?>
				<div class="box-title"><h3><?php esc_html_e('Warning', 'lms');?></h3></div>
                <div class="box-content"><p class="note"><?php esc_html_e("You have to install and activate the TheEventsCalendar plugin to use this module ..", 'lms');?></p></div>
<?php   endif;?>                
            </div><!--.bpanel-box End -->
        </div><!-- my-events ends here -->        

    </div><!-- .bpanel-main-content ends here-->    
</div><!-- events end-->