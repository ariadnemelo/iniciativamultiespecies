<!-- woocommerence starts here-->
<div id="woocommerce" class="bpanel-content">
    <!-- .bpanel-main-content starts here-->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-woocommerce"><?php esc_html_e("wooCommerce Settings", 'lms');?></a></li>
        </ul>        
        
        <!-- my-woocommerce starts here --> 
        <div id="my-woocommerce" class="tab-content">
            <div class="bpanel-box">
            
			<?php  if( class_exists('woocommerce') ) : ?>

                <!-- SHOP PAGE -->
                <div class="box-title"><h3><?php esc_html_e('Shop', 'lms');?></h3></div>
                <div class="box-content">
                
                    <div class="column one-third"><label><?php esc_html_e('Products Per Page', 'lms');?></label></div>
                    <div class="column two-third last">
                        <input name="mytheme[woo][shop-product-per-page]" type="text" class="small" value="<?php echo trim(stripslashes(dttheme_option('woo','shop-product-per-page')));?>" />
                        <p class="note"><?php esc_html_e('Number of products to show in catalog / shop page', 'lms');?></p>
                    </div>
                    
                    <!-- Layout -->
                    <h6><?php esc_html_e('Layout', 'lms');?></h6>
                    <p class="note no-margin"> <?php esc_html_e("Choose the Product Layout Style in Catalog / Shop ", 'lms');?> </p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                        <ul class="bpanel-post-layout bpanel-layout-set">
                        <?php $posts_layout = array('one-half-column'=>esc_html__("Two products per row.", 'lms'),'one-third-column' => esc_html__("Three products per row.", 'lms'),
													'one-fourth-column' => esc_html__("Four products per row", 'lms'));
                                    $v = dttheme_option('woo',"shop-page-product-layout");
                                    $v = !empty($v) ? $v : "one-half-column";
                                  foreach($posts_layout as $key => $value):
                                    $class = ( $key ==  $v ) ? " class='selected' " :"";                                  
                                    echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' alt='' /></a></li>";
                                 endforeach;?>                        
                        </ul>
                        <input name="mytheme[woo][shop-page-product-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                    </div><!-- .Layout End -->
                    
                </div><!-- SHOP PAGE -->
                
                <!-- Product Page -->
                <div class="box-title"><h3><?php esc_html_e('Product Detail', 'lms');?></h3></div>
                <div class="box-content">
                    <!-- Product Detail Page Layout -->
                    <h6><?php esc_html_e('Layout', 'lms');?></h6>
                    <p class="note no-margin"> <?php esc_html_e("Choose the Product Page Layout", 'lms');?></p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                        <ul class="bpanel-post-layout bpanel-layout-set"  id="woocommerce-product-layout">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar','both-sidebar'=>'both-sidebar');
                              $v =  dttheme_option('woo',"product-layout");
                              $v = !empty($v) ? $v : "content-full-width";
                              
                        foreach($layout as $key => $value):
                            $class = ( $key ==  $v ) ? " class='selected' " : "";
                            echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' alt='' /></a></li>";
                        endforeach; ?>
                        </ul>
                        <input name="mytheme[woo][product-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                    </div><!-- Product Detail Page Layout End-->
                    
					 <?php 
                     $sb_layout = dttheme_option('woo',"product-layout");
                     $sidebar_both = $sidebar_left = $sidebar_right = '';
                     if($sb_layout == 'content-full-width') {
                        $sidebar_both = 'style="display:none;"'; 
                     } elseif($sb_layout == 'with-left-sidebar') {
                        $sidebar_right = 'style="display:none;"'; 
                     } elseif($sb_layout == 'with-right-sidebar') {
                        $sidebar_left = 'style="display:none;"'; 
                     } 
                     ?>
                    <div id="bpanel-widget-area-options" <?php echo 'class="woocommerce-product-layout" '.$sidebar_both;?>>
                        
                        <div id="left-sidebar-container" class="bpanel-page-left-sidebar" <?php echo "{$sidebar_left}"; ?>>
                            <!-- 2. Every Where Sidebar Left Start -->
                            <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                <h6><?php esc_html_e('Disable Shop Every Where Sidebar Left', 'lms');?></label></h6>
                                <?php dttheme_switch("",'woo','disable-shop-everywhere-left-sidebar-for-product-layout'); ?>
                            </div><!-- Every Where Sidebar Left End-->
                        </div>
    
                        <div id="right-sidebar-container" class="bpanel-page-right-sidebar" <?php echo "{$sidebar_right}"; ?>>
                            <!-- 3. Every Where Sidebar Right Start -->
                            <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                <h6><?php esc_html_e('Disable Shop Every Where Sidebar Right', 'lms');?></label></h6>
                                <?php dttheme_switch("",'woo','disable-shop-everywhere-right-sidebar-for-product-layout'); ?>
                            </div><!-- Every Where Sidebar Right End-->
                        </div>
                        
                    </div>                    
                    
                </div><!-- Product Page -->

                <!-- Product Category Page -->
                <div class="box-title"><h3><?php esc_html_e('Product Category', 'lms');?></h3></div>
                <div class="box-content">
                    <!-- Product Detail Page Layout -->
                    <h6><?php esc_html_e('Layout', 'lms');?></h6>
                    <p class="note no-margin"> <?php esc_html_e("Choose the Product category page layout Style", 'lms');?></p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                        <ul class="bpanel-post-layout bpanel-layout-set" id="woocommerce-product-category">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar','both-sidebar'=>'both-sidebar');
                              $v =  dttheme_option('woo',"product-category-layout");
                              $v = !empty($v) ? $v : "content-full-width";
                              
                        foreach($layout as $key => $value):
                            $class = ( $key ==  $v ) ? " class='selected' " : "";
                            echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' alt='' /></a></li>";
                        endforeach; ?>
                        </ul>
                        <input name="mytheme[woo][product-category-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                    </div><!-- Product Detail Page Layout End-->

					 <?php 
                     $sb_layout = dttheme_option('woo',"product-category-layout");
                     $sidebar_both = $sidebar_left = $sidebar_right = '';
                     if($sb_layout == 'content-full-width') {
                        $sidebar_both = 'style="display:none;"'; 
                     } elseif($sb_layout == 'with-left-sidebar') {
                        $sidebar_right = 'style="display:none;"'; 
                     } elseif($sb_layout == 'with-right-sidebar') {
                        $sidebar_left = 'style="display:none;"'; 
                     } 
                     ?>
                    <div id="bpanel-widget-area-options" <?php echo 'class="woocommerce-product-category" '.$sidebar_both;?>>
                        
                        <div id="left-sidebar-container" class="bpanel-page-left-sidebar" <?php echo "{$sidebar_left}"; ?>>
                            <!-- 2. Every Where Sidebar Left Start -->
                            <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                <h6><?php esc_html_e('Disable Shop Every Where Sidebar Left', 'lms');?></label></h6>
                                <?php dttheme_switch("",'woo','disable-shop-everywhere-left-sidebar-for-product-category-layout'); ?>
                            </div><!-- Every Where Sidebar Left End-->
                        </div>
    
                        <div id="right-sidebar-container" class="bpanel-page-right-sidebar" <?php echo "{$sidebar_right}"; ?>>
                            <!-- 3. Every Where Sidebar Right Start -->
                            <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                <h6><?php esc_html_e('Disable Shop Every Where Sidebar Right', 'lms');?></label></h6>
                                <?php dttheme_switch("",'woo','disable-shop-everywhere-right-sidebar-for-product-category-layout'); ?>
                            </div><!-- Every Where Sidebar Right End-->
                        </div>
                        
                    </div>                    

                </div><!-- Product Category Page -->

                <!-- Product Tag Page -->
                <div class="box-title"><h3><?php esc_html_e('Product Tag', 'lms');?></h3></div>
                <div class="box-content">
                    <!-- Product Detail Page Layout -->
                    <h6><?php esc_html_e('Layout', 'lms');?></h6>
                    <p class="note no-margin"> <?php esc_html_e("Choose the Product tag page layout Style", 'lms');?></p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                        <ul class="bpanel-post-layout bpanel-layout-set" id="woocommerce-product-tag">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar','both-sidebar'=>'both-sidebar');
                              $v =  dttheme_option('woo',"product-tag-layout");
                              $v = !empty($v) ? $v : "content-full-width";
                        
                        foreach($layout as $key => $value):
                            $class = ( $key ==   $v ) ? " class='selected' " : "";
                            echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' alt='' /></a></li>";
                        endforeach; ?>
                        </ul>
                        <input name="mytheme[woo][product-tag-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                    </div><!-- Product Detail Page Layout End-->
                    
					 <?php 
                     $sb_layout = dttheme_option('woo',"product-tag-layout");
                     $sidebar_both = $sidebar_left = $sidebar_right = '';
                     if($sb_layout == 'content-full-width') {
                        $sidebar_both = 'style="display:none;"'; 
                     } elseif($sb_layout == 'with-left-sidebar') {
                        $sidebar_right = 'style="display:none;"'; 
                     } elseif($sb_layout == 'with-right-sidebar') {
                        $sidebar_left = 'style="display:none;"'; 
                     } 
                     ?>
                    <div id="bpanel-widget-area-options" <?php echo 'class="woocommerce-product-tag" '.$sidebar_both;?>>
                        
                        <div id="left-sidebar-container" class="bpanel-page-left-sidebar" <?php echo "{$sidebar_left}"; ?>>
                            <!-- 2. Every Where Sidebar Left Start -->
                            <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                <h6><?php esc_html_e('Disable Shop Every Where Sidebar Left', 'lms');?></label></h6>
                                <?php dttheme_switch("",'woo','disable-shop-everywhere-left-sidebar-for-product-tag-layout'); ?>
                            </div><!-- Every Where Sidebar Left End-->
                        </div>
    
                        <div id="right-sidebar-container" class="bpanel-page-right-sidebar" <?php echo "{$sidebar_right}"; ?>>
                            <!-- 3. Every Where Sidebar Right Start -->
                            <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                <h6><?php esc_html_e('Disable Shop Every Where Sidebar Right', 'lms');?></label></h6>
                                <?php dttheme_switch("",'woo','disable-shop-everywhere-right-sidebar-for-product-tag-layout'); ?>
                            </div><!-- Every Where Sidebar Right End-->
                        </div>
                        
                    </div>                    
                    
                </div><!-- Product Tag Page -->
<?php   else: ?>
                <div class="box-title"><h3><?php esc_html_e('Warning', 'lms');?></h3></div>
                <div class="box-content"><p class="note"><?php esc_html_e("You have to install and activate the wooCommerce plugin to use this module ..", 'lms');?></p></div>
<?php   endif;?>                
            </div><!--.bpanel-box End -->
        </div><!-- my-woocommerce ends here -->        

    </div><!-- .bpanel-main-content ends here-->    
</div><!-- woocommerence end-->