<!-- specialty-pages -->
<div id="specialty-pages" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
    	 <ul class="sub-panel">
         <?php $sub_menus = array(
					array("title"=>esc_html__("Post Archives", 'lms'), "link"=>"#post-archives"),
                    array("title"=>esc_html__("Portfolio Archives", 'lms'), "link"=>"#portfolio-archives"),
					array("title"=>sprintf(esc_html__('%s Archives', 'lms'), $GLOBALS['teachers-singular-label']), "link"=>"#teacher-archives"),
					array("title"=>esc_html__("Search", 'lms'), "link"=>"#search"),
					array("title"=>esc_html__("404", 'lms'), "link"=>"#not-found-404"));
				  foreach($sub_menus as $menu): ?>
                  	<li><a href="<?php echo esc_url( $menu['link'] );?>"><?php echo esc_html( $menu['title'] );?></a></li>
		 <?php endforeach?>
         </ul>
         
         <?php 
		 
		 $posts_layout_array_one =   array( 'one-column'=>esc_html__("Single post per row.", 'lms'),'one-half-column'=>esc_html__("Two posts per row.", 'lms'),'one-third-column'=>esc_html__("Three posts per row.", 'lms'));
		 
		 $posts_layout_array_two =   array( 'one-column'=>esc_html__("Single post per row.", 'lms'),'one-half-column'=>esc_html__("Two posts per row.", 'lms'),'one-third-column'=>esc_html__("Three posts per row.", 'lms'), 'one-fourth-column' => esc_html__("Four posts per row.", 'lms'));

		$tabs = array(

				array(  "id"=>"post-archives", 
						"layout-title"=>esc_html__("Post's Archive Page Layout", 'lms'),
						"layout-tooltip"=>esc_html__("You can choose between a left, right or no sidebar layout for the Archive pages.", 'lms'),
						"post-layout-title" => esc_html__("Posts Layout", 'lms'),
						"post-layout-tooltip"=>esc_html__("Your archive results will use the layout you select below.", 'lms'),                                
						"post-layouts" => $posts_layout_array_one
				 ),


				array(  "id"=>"portfolio-archives", 
						"layout-title"=>esc_html__("Portfolio Custom Post's Archive Page Layout", 'lms'),
						"layout-tooltip"=>esc_html__("You can choose between a left, right or no sidebar layout for the Portfolio custom post's Archive page.", 'lms'),
						"post-layout-title" => esc_html__("Posts Layout", 'lms'),
						"post-layout-tooltip"=>esc_html__("Your archive results will use the layout you select below.", 'lms'),                                
						"post-layouts" => array(
							'one-column'=>esc_html__("Single gallery item  per row.", 'lms'),
							'one-half-column'=>esc_html__("Two gallery items per row.", 'lms'),
							'one-third-column'=>esc_html__("Three gallery items per row.", 'lms'),                                   
							'one-fourth-column' => esc_html__("Four gallery items per row.", 'lms'))
				),

				array(  "id"=>"teacher-archives", 
						"layout-title"=>sprintf(esc_html__('%s Custom Post\'s Archive Page Layout', 'lms'), $GLOBALS['teachers-singular-label']),
						"layout-tooltip"=>sprintf(esc_html__('You can choose between a left, right or no sidebar layout for the %s custom post\'s Archive page.', 'lms'), $GLOBALS['teachers-singular-label']),
						"post-layout-title" => esc_html__("Posts Layout", 'lms'),
						"post-layout-tooltip"=>esc_html__("Your archive results will use the layout you select below.", 'lms'),                                
						"post-layouts" => $posts_layout_array_two
				),

				array(  "id"=>"search",
						"layout-title"=>esc_html__("Search Layout", 'lms'),
						"layout-tooltip"=>esc_html__("You can choose between a left, right or no sidebar layout for your Search page.", 'lms'),
						"post-layout-title" => esc_html__("Posts Layout", 'lms'),
						"post-layout-tooltip"=>esc_html__("Your Search results will use the layout you select below.", 'lms'),
						"post-layouts" => $posts_layout_array_one
				),

				array(  "id"=>"not-found-404",
						"layout-title"=>esc_html__("404 Layout", 'lms'),
						"layout-tooltip"=>esc_html__("You can choose between a left, right or no sidebar layout for your 404 page.", 'lms'),
						
						"bg-title"=>esc_html__("404 Background", 'lms'),
						"bg-label"=>esc_html__("404 background image", 'lms'),
						"bg-tooltip"=>esc_html__('Upload an image for the theme\'s 404 page background', 'lms'),

						"content-title" => esc_html__("404 Message", 'lms'),
						"content-tooltip"=>esc_html__("You can give custom 404 page message", 'lms')
				));
				
				?>
        <?php foreach($tabs as $tab): 
				$id =  $tab['id'];?>
        	<div id="<?php echo esc_attr( $id );?>" class="tab-content">
            	 <div class="bpanel-box">
                 
                 	<!-- Section 1 -->	
                    <div class="box-title"><h3><?php echo esc_html( $tab['layout-title'] );?></h3></div>
                    <div class="box-content">
                    	<p class="note"> <?php echo esc_html( $tab['layout-tooltip'] );?></p>

                    	<div class="bpanel-option-set">
                        	<ul class="bpanel-post-layout bpanel-layout-set" id="<?php echo 'dt-'.$id;?>">
                           	<?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar','both-sidebar'=>'both-sidebar');
							foreach($layout as $key => $value):
								$class = ( $key ==  dttheme_option('specialty',"{$id}-layout")) ? " class='selected' " : "";
								echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' alt='' /></a></li>";
							endforeach; ?>
                            </ul>
                            <input id="mytheme[specialty][<?php echo esc_attr( $id );?>-layout]" name="mytheme[specialty][<?php echo esc_attr( $id );?>-layout]" type="hidden"  
                            	value="<?php echo dttheme_option('specialty',"{$id}-layout");?>"/>
                        </div>
                            
						 <?php 
                         $sb_layout = dttheme_option('specialty',"{$id}-layout");
                         $sidebar_both = $sidebar_left = $sidebar_right = '';
                         if($sb_layout == 'content-full-width') {
                            $sidebar_both = 'style="display:none;"'; 
                         } elseif($sb_layout == 'with-left-sidebar') {
                            $sidebar_right = 'style="display:none;"'; 
                         } elseif($sb_layout == 'with-right-sidebar') {
                            $sidebar_left = 'style="display:none;"'; 
                         } 
                         ?>
                        <div id="bpanel-widget-area-options" <?php echo 'class="dt-'.$id.'" '.$sidebar_both;?>>
                            
                            <div id="left-sidebar-container" class="bpanel-page-left-sidebar" <?php echo "{$sidebar_left}"; ?>>
                                <!-- 2. Every Where Sidebar Left Start -->
                                <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                    <h6><?php esc_html_e('Disable Every Where Sidebar Left', 'lms');?></label></h6>
                                    <?php dttheme_switch("",'specialty','disable-everywhere-left-sidebar-for-'.$id); ?>
                                </div><!-- Every Where Sidebar Left End-->
                            </div>
        
                            <div id="right-sidebar-container" class="bpanel-page-right-sidebar" <?php echo "{$sidebar_right}"; ?>>
                                <!-- 3. Every Where Sidebar Right Start -->
                                <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                    <h6><?php esc_html_e('Disable Every Where Sidebar Right', 'lms');?></label></h6>
                                    <?php dttheme_switch("",'specialty','disable-everywhere-right-sidebar-for-'.$id); ?>
                                </div><!-- Every Where Sidebar Right End-->
                            </div>
                            
                        </div>
                        
                        
                    </div><!-- Section 1 End -->


                    <?php if( $id != "not-found-404" ): ?>
                    <!-- Post Layout Section -->
	                <div class="box-title"><h3><?php echo esc_html( $tab['post-layout-title'] );?></h3></div>
                    <div class="box-content">
                    	<p class="note"><?php echo esc_html( $tab['post-layout-tooltip'] );?></p>
                    	<div class="bpanel-option-set">
                        	<ul class="bpanel-post-layout bpanel-layout-set">
                            <?php $posts_layout = $tab['post-layouts'];
									$v = dttheme_option('specialty',"{$id}-post-layout");
									$v = !empty($v) ? $v : "one-column";
								  foreach($posts_layout as $key => $value):
									$class = ( $key ==  $v ) ? " class='selected' " :"";								  
									echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' alt='' /></a></li>";
                           		 endforeach;?>
                    		</ul>
                            <input id="mytheme[specialty][<?php echo esc_attr( $id );?>-post-layout]" name="mytheme[specialty][<?php echo esc_attr( $id );?>-post-layout]" type="hidden"  
                            	value="<?php echo dttheme_option('specialty',"{$id}-post-layout");?>"/>
                        </div>
                    </div>
                    <!-- Post Layout Section End-->
                    <?php endif; ?>
                    

                   
                    <!-- 404 Content -->
                    <?php if($id == "not-found-404"): ?>
                        <div class="box-title"><h3><?php echo esc_html( $tab['content-title'] );?></h3></div>
                        <div class="box-content">
                        	<p class="note"><?php echo esc_html( $tab['content-tooltip'] );?></p>
                            
                            
                            <div class="bpanel-option-set">
                                <h6><?php esc_html_e('404 Custom Message', 'lms');?></h6>
                                <textarea id="mytheme-404-text" name="mytheme[specialty][404-message]" rows="" 
                                	cols=""><?php echo stripslashes(dttheme_option('specialty','404-message'));?></textarea>
                            </div>
                            <div class="hr"></div>
                            
                            <h6><?php esc_html_e("Disable Font Settings", 'lms'); ?></h6>
                            <div class="column one-fifth bpanel-option-set">
                            	<?php dttheme_switch("",'specialty','disable-404-font-settings');?>
                            </div>
                            <div class="column four-fifth last"><p class="note"><?php esc_html_e('Enable / Disable 404 Font settings', 'lms');?></p></div>
                            <div class="hr"></div>
                        
                        	<!-- Font Section -->                        	
                            <div class="column one-column">
                                <div class="bpanel-option-set">
                                    <?php dttheme_admin_fonts(esc_html__('Message Font', 'lms'),'mytheme[specialty][message-font]',dttheme_option('specialty','message-font'));?>
                                </div>
                            </div>
                            <!-- Font Section -->
                            <div class="hr_invisible"> </div>
                            <!-- Font Color Section -->
                            <div class="column one-half">
        	                    <?php $label = 		esc_html__("Message Font Color", 'lms');
									  $name  =		"mytheme[specialty][message-font-color]";	
									  $value =  	 (dttheme_option('specialty','message-font-color')!= NULL) ? dttheme_option('specialty','message-font-color') : "#";
									  $tooltip = 	esc_html__("Pick a custom color for 404 message font color of the theme e.g. #a314a3", 'lms'); ?>
									  <h6> <?php echo esc_html( $label );?> </h6>
                                  <?php dttheme_admin_color_picker("",$name,$value,'');?>
                            
                            </div><!-- Font Color Section -->
                            <div class="column one-half last">
								<?php dttheme_admin_jqueryuislider(esc_html__('Message Font Size', 'lms'),"mytheme[specialty][message-font-size]",
    	                        dttheme_option('specialty',"message-font-size"));?>
                            </div>
                            
                        </div>
                    <?php endif;?>
                    <!-- 404 Content End-->

                 </div><!-- .bpanel-box end -->
            </div><!-- .tab-content end -->
        <?php endforeach;?>
    </div>
</div><!-- specialty-pages end-->