<!-- sensei starts here-->
<div id="courses" class="bpanel-content">
  	<!-- .bpanel-main-content starts here-->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
        	<li><a href="#s2member-settings"><?php esc_html_e("s2Member Settings", 'lms');?></a></li>
            <li><a href="#default-class"><?php esc_html_e("Theme Class", 'lms');?></a></li>
        	<li><a href="#default-course"><?php esc_html_e("Theme Course", 'lms');?></a></li>
        </ul>
        
        <!-- s2member-settings starts here --> 
        <div id="s2member-settings" class="tab-content">

			<?php 
			if(dttheme_option('general', 'disable-theme-default-courses') != 'true') { ?>
                <div class="bpanel-box">
                    <div class="box-title">
                        <h3><?php esc_html_e('General', 'lms');?></h3>
                    </div>
                    <div class="box-content">
                        
                        <div class="column one-third"><label><?php esc_html_e('Currency Symbol', 'lms');?></label></div>
                        <div class="column two-third last">
                            <input name="mytheme[dt_course][currency]" type="text" class="small" value="<?php echo trim(stripslashes(dttheme_wp_kses(dttheme_option('dt_course','currency'))));?>" />
                            <p class="note"><?php esc_html_e('Please set default currency symbol which will be used in front end display', 'lms');?></p>
                        </div>
                        
                        <div class="hr_invisible"> </div>
     
                        <div class="column one-third"><label><?php esc_html_e('Currency Symbol Position', 'lms');?></label></div>
                        <div class="column two-third last">
                            <?php $position_options = array('before-price' => 'Before Price', 'after-price' => 'After Price'); ?>
                            <select id="mytheme-currency-position" name="mytheme[dt_course][currency-position]">
                            <?php 
                            $currency_position = dttheme_option('dt_course','currency-position') != '' ? dttheme_option('dt_course','currency-position') : 'before-price';
                            foreach ($position_options as $key => $value):
                                $selected = ( $currency_position == $key ) ? ' selected="selected" ' : '';
                                echo "<option $selected value='$key'>$value</option>";
                             endforeach;
                             ?>
                            </select>                         
                            <p class="note"><?php esc_html_e('Please select curreny position to display in front end', 'lms');?></p>
                        </div>
                        
                        <div class="hr_invisible"> </div>
     
                        <div class="column one-third"><label><?php esc_html_e('Currency', 'lms');?></label></div>
                        <div class="column two-third last">
                            <?php
                            $currency_options = array('ADF', 'ADP', 'AED', 'AFA', 'AFN', 'ALL', 'AMD', 'ANG', 'AOA', 'AON', 'ARS', 'ATS', 'AUD', 'AWG', 'AZN', 'BAM', 'BBD', 'BDT', 'BEF', 'BGN', 'BHD', 'BIF', 'BMD', 'BND', 'BOB', 'BRL', 'BSD', 'BTN', 'BWP', 'BYR', 'BZD', 'CAD', 'CDF', 'CFP', 'CHF', 'CLP', 'CNY', 'COP', 'CRC', 'CSK', 'CUC', 'CUP', 'CVE', 'CYP', 'CZK', 'DEM', 'DJF', 'DKK', 'DOP', 'DZD', 'ECS', 'EEK', 'EGP', 'ESP', 'ETB', 'EUR', 'FIM', 'FJD', 'FKP', 'FRF', 'GBP', 'GEL', 'GHC', 'GHS', 'GIP', 'GMD', 'GNF', 'GRD', 'GTQ', 'GYD', 'HKD', 'HNL', 'HRK', 'HTG', 'HUF', 'IDR', 'IEP', 'ILS', 'INR', 'IQD', 'IRR', 'ISK', 'ITL', 'JMD', 'JOD', 'JPY', 'KES', 'KGS', 'KHR', 'KMF', 'KPW', 'KRW', 'KWD', 'KYD', 'KZT', 'LAK', 'LBP', 'LKR', 'LRD', 'LSL', 'LTL', 'LUF', 'LVL', 'LYD', 'MAD', 'MDL', 'MGF', 'MKD', 'MMK', 'MNT', 'MOP', 'MRO', 'MTL', 'MUR', 'MVR', 'MWK', 'MXN', 'MYR', 'MZM', 'MZN', 'NAD', 'NGN', 'NIO', 'NLG', 'NOK', 'NPR', 'NZD', 'OMR', 'PAB', 'PEN', 'PGK', 'PHP', 'PKR', 'PLN', 'PTE', 'PYG', 'QAR', 'ROL', 'RON', 'RSD', 'RUB', 'SAR', 'SBD', 'SCR', 'SDD', 'SDG', 'SDP', 'SEK', 'SGD', 'SHP', 'SIT', 'SKK', 'SLL', 'SOS', 'SRD', 'SRG', 'STD', 'SVC', 'SYP', 'SZL', 'THB', 'TMM', 'TND', 'TOP', 'TRL', 'TRY', 'TTD', 'TWD', 'TZS', 'UAH', 'UGS', 'USD', 'UYU', 'UZS', 'VEF', 'VND', 'VUV', 'WST', 'XAF', 'XCD', 'XOF', 'XPF', 'YER', 'YUN', 'ZAR', 'ZMK', 'ZWD');
                            $currency_s2member = dttheme_option('dt_course','currency-s2member') != '' ? dttheme_option('dt_course','currency-s2member') : 'USD';
                             ?>
                            <select id="mytheme-currency-s2member" name="mytheme[dt_course][currency-s2member]">
                            <?php 
                            foreach ($currency_options as $value):
                                $selected = ( $value == $currency_s2member ) ? ' selected="selected" ' : '';
                                echo "<option $selected value='$value'>$value</option>";
                             endforeach;
                             ?>
                            </select>                         
                            <p class="note"><?php esc_html_e('Please select your curreny symbol which will be used in s2member for payment.', 'lms');?></p>
                         </div>
                        
                    </div>
                </div>
                
                <div class="bpanel-box">
                    <div class="box-title">
                        <h3><?php esc_html_e('Advanced', 'lms');?></h3>
                    </div>
                    <div class="box-content">
    
                        <?php 
                        if( defined('WS_PLUGIN__S2MEMBER_VERSION') ) {
                            
                            if($GLOBALS["WS_PLUGIN__"]["s2member"]["o"]["pro_gateways_seen"] == 1) {
                                echo '<h6><strong>'.esc_html__('Choose Payment Types', 'lms').'</strong></h6><div class="clear"></div>';
                                $payments = $GLOBALS["WS_PLUGIN__"]["s2member"]["o"]["pro_gateways_enabled"];

                                foreach($payments as $payment_key => $payment_val) {
                                    if($payment_val == 'unconfigured') {
                                        unset($payments[$payment_key]);
                                    }
                                    if($payment_val == 'paypal') {
                                        $payments[$payment_key] = 'paypal-default';
                                    }
                               }

                                $payments_selected = dttheme_option('dt_course', 'payments-selected');
                                $payments_selected = !empty($payments_selected) ? $payments_selected : array();
                                foreach($payments as $payment_key => $payment) {
                                    $checked = (in_array(trim($payment), $payments_selected)) ? 'checked="checked"' : '';
                                    //echo '<label><input type="checkbox" name="mytheme[dt_course][payments-selected][]" value="'.$payment.'" '.$checked.' />'.ucfirst($payment).'</label>';

                                    echo '<label><input type="checkbox" name="mytheme[dt_course][payments-selected][]" value="'.$payment.'" '.$checked.' />'.$payment.'</label>';
                                }
                                echo '<div class="hr_invisible"></div><div class="hr_invisible"></div><h6><strong>'.esc_html__('Click Bank Settings', 'lms').'</strong></h6><div class="clear"></div>';
                                echo '<div class="column one-half">
                                        <label>'.esc_html__('Product Item No', 'lms').'</label>
                                      </div>
                                      <div class="column one-half last">
                                        <input name="mytheme[dt_course][s2member-cb-productno]" type="text" class="medium" value="'.trim(stripslashes(dttheme_wp_kses(dttheme_option('dt_course','s2member-cb-productno')))).'" />
                                      </div>
                                      <div class="hr_invisible"></div>';
                                echo '<div class="column one-half">
                                        <label>'.esc_html__('Order Form Template (Skin)', 'lms').'</label>
                                      </div>
                                      <div class="column one-half last">
                                        <input name="mytheme[dt_course][s2member-cb-skin]" type="text" class="medium" value="'.trim(stripslashes(dttheme_wp_kses(dttheme_option('dt_course','s2member-cb-skin')))).'" />
                                      </div>
                                      <div class="hr_invisible"></div>';
                                echo '<div class="column one-half">
                                        <label>'.esc_html__('PitchPlus Upsell Flow ID', 'lms').'</label>
                                      </div>
                                      <div class="column one-half last">
                                        <input name="mytheme[dt_course][s2member-cb-flowid]" type="text" class="medium" value="'.trim(stripslashes(dttheme_wp_kses(dttheme_option('dt_course','s2member-cb-flowid')))).'" />
                                      </div>
                                      <div class="hr_invisible"></div><div class="hr_invisible"></div><div class="hr_invisible"></div>';
                            }

                            for ($n = 2; $n <= $GLOBALS["WS_PLUGIN__"]["s2member"]["c"]["levels"]; $n++) { 
        
                                echo '<h6><strong>'.do_shortcode("[s2Get constant='S2MEMBER_LEVEL{$n}_LABEL'/]").' ('.esc_html__('s2Member Level', 'lms').' '.$n.')</strong></h6><div class="clear"></div>';
                                echo '<div class="column one-third">
                                        <label>'.esc_html__('Description', 'lms').'</label>
                                      </div>
                                      <div class="column two-third last">
                                        <input name="mytheme[dt_course][s2member-'.$n.'-description]" type="text" class="large" value="'.trim(stripslashes(dttheme_wp_kses(dttheme_option('dt_course','s2member-'.$n.'-description')))).'" />
                                      </div>
                                      <div class="hr_invisible"></div>';
                                echo '<div class="column one-third">
                                        <label>'.esc_html__('Period', 'lms').'</label>
                                      </div>
                                      <div class="column two-third last">
                                        <input name="mytheme[dt_course][s2member-'.$n.'-period]" type="text" class="medium" value="'.trim(stripslashes(dttheme_wp_kses(dttheme_option('dt_course','s2member-'.$n.'-period')))).'" />
                                      </div>
                                      <div class="hr_invisible"></div>';
                                echo '<div class="column one-third">
                                        <label>'.esc_html__('Term', 'lms').'</label>
                                      </div>
                                      <div class="column two-third last">
                                        <select name="mytheme[dt_course][s2member-'.$n.'-term]">';
                                            $terms = array('', 'D' => 'Day(s)', 'W' => 'Week(s)', 'M' => 'Month(s)', 'Y' => 'Year(s)', 'L' => 'Lifetime');
                                            foreach($terms as $term_key => $term){
                                                $selected = selected(dttheme_option('dt_course','s2member-'.$n.'-term'), $term_key, false );
                                                echo '<option value="'.$term_key.'" '.$selected.'>'.$term.'</option>';
                                            }
                                    echo '</select>
                                      </div>';
                                
                                if($n > 1) {	  
                                    echo '<div class="hr_invisible"></div>
                                          <div class="column one-third">
                                            <label>'.esc_html__('Price', 'lms').'</label>
                                          </div>
                                          <div class="column two-third last">
                                            <input name="mytheme[dt_course][s2member-'.$n.'-price]" type="text" class="medium" value="'.trim(stripslashes(dttheme_wp_kses(dttheme_option('dt_course','s2member-'.$n.'-price')))).'" />
                                          </div>';
                                }
                                
                                echo '<div class="hr_invisible"></div><div class="hr_invisible"></div>';
                                
                            }
                            
                            echo '<h6><strong>'.esc_html__('Notes:', 'lms').'</strong></h6>';
                            echo '<ul class="s2member-notes">';
                                echo '<li><strong>'.esc_html__('s2Member Level 1', 'lms').'</strong> - '.esc_html__('These are users who are going to purchase only particular course or class, which you can be find under their corresponding tab.', 'lms').'</li>';
                                echo '<li><strong>'.esc_html__('s2Member Level 2, s2Member Level 3, s2Member Level 4,...', 'lms').'</strong> - '.esc_html__('Users will have access to all courses and classes for specified period and term. Price have to be mentioned here.', 'lms').'</li>';
                                echo '<li><strong>'.esc_html__('Description', 'lms').'</strong> - '.esc_html__('Will appear in the purchase page.', 'lms').'</li>';
                                echo '<li><strong>'.esc_html__('Period', 'lms').'</strong> - '.esc_html__('Must be >= 1. (ex: 1 Week, 2 Months, 1 Month, 3 Days).', 'lms').'</li>';
                                echo '<li><strong>'.esc_html__('Term', 'lms').'</strong> - '.esc_html__('Regular Term. Days, Weeks, Months, Years, Lifetime.', 'lms').'</li>';
                                echo '<li><strong>'.esc_html__('Price', 'lms').'</strong> - '.esc_html__('Price for the package. Applicable only for s2Member Level 2, s2Member Level 3, s2Member Level 4,...', 'lms').'</li>';
                            echo '</ul>';
                        
                        } else {
                            echo esc_html__('Please activate s2Member plugin in order to continue!', 'lms');	
                        }
                        
                        ?>
                        
                    </div>
                </div>
                
           <?php } else { ?>
           		<div class="bpanel-box">
                    <div class="box-title">
                        <h3><?php esc_html_e('Warning', 'lms');?></h3>
                    </div>
                    <div class="box-content">
                        <p class="note"><?php esc_html_e("You have disabled theme default courses in Buddha Panel settings. Please enable it.", 'lms');?></p>
                    </div>
                </div>
           <?php } ?>          
		
        </div>        
        
        <!-- default-class starts here --> 
        <div id="default-class" class="tab-content">

			<?php 
			if(dttheme_option('general', 'disable-theme-default-courses') != 'true') { ?>
                
                <div class="bpanel-box">
                    <div class="box-title">
                        <h3><?php esc_html_e('s2Member Settings', 'lms');?></h3>
                    </div>
                    <div class="box-content">
    
                        <?php 
                        if( defined('WS_PLUGIN__S2MEMBER_VERSION') ) {
                            
							echo '<h6><strong>'.do_shortcode("[s2Get constant='S2MEMBER_LEVEL1_LABEL'/]").' ('.esc_html__('s2Member Level', 'lms').' 1)</strong></h6><div class="clear"></div>';
							echo '<div class="column one-third">
									<label>'.esc_html__('Description', 'lms').'</label>
								  </div>
								  <div class="column two-third last">
									<input name="mytheme[dt_class][s2member-1-description]" type="text" class="large" value="'.trim(stripslashes(dttheme_wp_kses(dttheme_option('dt_class','s2member-1-description')))).'" />
								  </div>
								  <div class="hr_invisible"></div>';
							echo '<div class="column one-third">
									<label>'.esc_html__('Period', 'lms').'</label>
								  </div>
								  <div class="column two-third last">
									<input name="mytheme[dt_class][s2member-1-period]" type="text" class="medium" value="'.trim(stripslashes(dttheme_wp_kses(dttheme_option('dt_class','s2member-1-period')))).'" />
								  </div>
								  <div class="hr_invisible"></div>';
							echo '<div class="column one-third">
									<label>'.esc_html__('Term', 'lms').'</label>
								  </div>
								  <div class="column two-third last">
									<select name="mytheme[dt_class][s2member-1-term]">';
										$terms = array('', 'D' => 'Day(s)', 'W' => 'Week(s)', 'M' => 'Month(s)', 'Y' => 'Year(s)', 'L' => 'Lifetime');
										foreach($terms as $term_key => $term){
											$selected = selected(dttheme_option('dt_class','s2member-1-term'), $term_key, false );
											echo '<option value="'.$term_key.'" '.$selected.'>'.$term.'</option>';
										}
								echo '</select>
								  </div>';
							
							echo '<div class="hr_invisible"></div><div class="hr_invisible"></div>';
                            
                            echo '<h6><strong>'.esc_html__('Notes:', 'lms').'</strong></h6>';
                            echo '<ul class="s2member-notes">';
                                echo '<li>'.esc_html__('You can configure s2member level 1 settings for classes here.', 'lms').'</li>';
                            echo '</ul>';
                        
                        } else {
                            echo esc_html__('Please activate s2Member plugin in order to continue!', 'lms');	
                        }
                        
                        ?>
                        
                    </div>
                </div>
              
                <div class="bpanel-box">
                    <div class="box-title">
                        <h3><?php esc_html_e('Archive Page', 'lms');?></h3>
                    </div>
                    <div class="box-content">
    
                        <!-- Layout -->
                        <h6><?php esc_html_e('Post Layout', 'lms');?></h6>
                        <p class="note no-margin"> <?php esc_html_e("Choose the Class Archive page layout ", 'lms');?> </p>
                        <div class="hr_invisible"> </div>
                        <div class="bpanel-option-set">
                            <ul class="bpanel-post-layout bpanel-layout-set">
                            <?php $posts_layout = array('one-half-column'=>esc_html__("Two products per row.", 'lms'),'one-third-column' => esc_html__("Three products per row.", 'lms'));
                                        $v = dttheme_option('dt_class',"archives-post-layout");
                                        $v = !empty($v) ? $v : "one-half-column";
                                      foreach($posts_layout as $key => $value):
                                        $class = ( $key ==  $v ) ? " class='selected' " :"";                                  
                                        echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png'/></a></li>";
                                     endforeach;?>                        
                            </ul>
                            <input name="mytheme[dt_class][archives-post-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                        </div><!-- .Layout End -->
    
                        <div class="hr_invisible"> </div>
                        
                        <!-- Course Page Layout -->
                        <h6><?php esc_html_e('Page Layout', 'lms');?></h6>
                        <p class="note no-margin"> <?php esc_html_e("Choose the Class page layout", 'lms');?></p>
                        <div class="hr_invisible"> </div>
                        <div class="bpanel-option-set">
                            <ul class="bpanel-post-layout bpanel-layout-set" id="archives-layout">
                            <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar','both-sidebar'=>'both-sidebar');
                                  $v = 	dttheme_option('dt_class',"archives-layout");
                                  $v = !empty($v) ? $v : "content-full-width";
                                  
                            foreach($layout as $key => $value):
                                $class = ( $key ==  $v ) ? " class='selected' " : "";
                                echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png'/></a></li>";
                            endforeach; ?>
                            </ul>
                            <input name="mytheme[dt_class][archives-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                        </div><!-- Course Page Layout End-->
                        
                         <?php 
                         $sb_layout = dttheme_option('dt_class',"archives-layout");
                         $sidebar_both = $sidebar_left = $sidebar_right = '';
                         if($sb_layout == 'content-full-width') {
                            $sidebar_both = 'style="display:none;"'; 
                         } elseif($sb_layout == 'with-left-sidebar') {
                            $sidebar_right = 'style="display:none;"'; 
                         } elseif($sb_layout == 'with-right-sidebar') {
                            $sidebar_left = 'style="display:none;"'; 
                         } 
                         ?>
                        <div id="bpanel-widget-area-options" <?php echo 'class="archives-layout" '.$sidebar_both;?>>
                            
                            <div id="left-sidebar-container" class="bpanel-page-left-sidebar" <?php echo "{$sidebar_left}"; ?>>
                                <!-- 2. Every Where Sidebar Left Start -->
                                <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                    <h6><?php esc_html_e('Disable Every Where Sidebar Left', 'lms');?></label></h6>
                                    <?php dttheme_switch("",'dt_class','disable-everywhere-left-sidebar-for-class-archive'); ?>
                                </div><!-- Every Where Sidebar Left End-->
                            </div>
        
                            <div id="right-sidebar-container" class="bpanel-page-right-sidebar" <?php echo "{$sidebar_right}"; ?>>
                                <!-- 3. Every Where Sidebar Right Start -->
                                <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                    <h6><?php esc_html_e('Disable Every Where Sidebar Right', 'lms');?></label></h6>
                                    <?php dttheme_switch("",'dt_class','disable-everywhere-right-sidebar-for-class-archive'); ?>
                                </div><!-- Every Where Sidebar Right End-->
                            </div>
                            
                        </div>                    
    
                    </div>
                </div>
                
                <div class="bpanel-box">
                    <div class="box-title">
                        <h3><?php esc_html_e('Permalink Settings', 'lms');?></h3>
                    </div>
                    <div class="box-content">
    
                        <div class="column one-third"><label><?php esc_html_e('Single Class slug', 'lms');?></label></div>
                        <div class="column two-third last">
                            <input name="mytheme[dt_class][single-class-slug]" type="text" class="medium" value="<?php echo trim(stripslashes(dttheme_option('dt_class','single-class-slug')));?>" />
                            <p class="note"><?php esc_html_e('Do not use characters not allowed in links. Use, eg. classes <br> <b>After change go to Settings > Permalinks and click Save changes.</b>', 'lms');?></p>
                        </div>
                        
                    </div>
                </div>  
           <?php } else { ?>
           		<div class="bpanel-box">
                    <div class="box-title">
                        <h3><?php esc_html_e('Warning', 'lms');?></h3>
                    </div>
                    <div class="box-content">
                        <p class="note"><?php esc_html_e("You have disabled theme default courses in Buddha Panel settings. Please enable it.", 'lms');?></p>
                    </div>
                </div>
           <?php } ?>          
            
		</div><!-- default-class ends here --> 
        
        <!-- default-course starts here --> 
        <div id="default-course" class="tab-content">

			<?php 
			if(dttheme_option('general', 'disable-theme-default-courses') != 'true') { ?>
                <div class="bpanel-box">
                    <div class="box-title">
                        <h3><?php esc_html_e('General', 'lms');?></h3>
                    </div>
                    <div class="box-content">
                                                                             
                        <div class="column one-third"><label><?php esc_html_e('Hide Contents', 'lms');?></label></div>
                        <div class="column two-third last">
                            
                            <?php $checked = ( "true" ==  dttheme_option('dt_course','hide-contents') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('dt_course','hide-contents') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="hide-contents" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="hide-contents" name="mytheme[dt_course][hide-contents]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                            <p class="note"><?php esc_html_e('Hides course content, video, attachments, etc., if course is not free', 'lms');?></p>
                            
                        </div>
                        
                        <div class="hr_invisible"> </div>
                        <div class="column one-third"><label><?php esc_html_e('Enable Email Notifications', 'lms');?></label></div>
                        <div class="column two-third last">
                            
                            <?php $checked = ( "true" ==  dttheme_option('dt_course','enable-email-notifications') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('dt_course','enable-email-notifications') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="enable-email-notifications" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="enable-email-notifications" name="mytheme[dt_course][enable-email-notifications]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                            <p class="note"><?php esc_html_e('Enable email notifications here. Notifications will be received for following criteria.', 'lms');?></p>
                            <p class="note"><?php esc_html_e('Student will receive email notifications when their quiz is graded ( both auto and manual grading ).', 'lms');?></p>
                            <p class="note"><?php echo sprintf(esc_html__('%s will receive email notifications when student submitted quiz for grading. ( quiz should with manual grading only )', 'lms'), $GLOBALS['teachers-singular-label']); ?></p>
                            
                        </div>

                        <div class="hr_invisible"> </div>
                        <div class="column one-third"><label><?php esc_html_e('Enable Email Notifications For New Lessons', 'lms');?></label></div>
                        <div class="column two-third last">
                            
                            <?php $checked = ( "true" ==  dttheme_option('dt_course','enable-email-notifications-newlessons') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('dt_course','enable-email-notifications-newlessons') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="enable-email-notifications-newlessons" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="enable-email-notifications-newlessons" name="mytheme[dt_course][enable-email-notifications-newlessons]" type="checkbox" value="true" <?php echo "{$checked}";?> />

                            <p class="note"><?php esc_html_e('If you wish you can enable email notifications for new lessons to student.', 'lms');?></p>
                            
                        </div>

                        <div class="hr_invisible"> </div>
                        <div class="column one-third"><label><?php esc_html_e('Enable Email Notifications For New Lessons - Content', 'lms');?></label></div>
                        <div class="column two-third last">
                            
                            <textarea id="mytheme[dt_course][enable-email-notifications-newlessons-content]" 
                          name="mytheme[dt_course][enable-email-notifications-newlessons-content]"><?php echo stripslashes(dttheme_option('dt_course','enable-email-notifications-newlessons-content'));?></textarea>

                            <p class="note"><?php esc_html_e('Add content for your new lesson notification. To add the lesson and course content dynamically use below shortcodes.', 'lms');?></p>
                            <p class="note"><strong><?php echo '[dt_notification_lesson_title] : '; ?></strong><?php esc_html_e('Adds current lesson title.', 'lms');?></p>
                            <p class="note"><strong><?php echo '[dt_notification_course_title] : '; ?></strong><?php esc_html_e('Adds current course title.', 'lms');?></p>
                            
                        </div>
                        
                        <div class="hr_invisible"> </div>   
                                                     
                        <div class="column one-third"><label><?php esc_html_e('Enable Course Widget - Left Sidebar', 'lms');?></label></div>
                        <div class="column two-third last">
                            
                            <?php $checked = ( "true" ==  dttheme_option('dt_course','enable-course-widget-left') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('dt_course','enable-course-widget-left') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="enable-course-widget-left" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="enable-course-widget-left" name="mytheme[dt_course][enable-course-widget-left]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                            <p class="note"><?php esc_html_e('If you wish you can enable course widget in left sidebar here for course single page, which consists of enrolled students details, course group details, course events, etc.,', 'lms');?></p>
                            
                        </div>
                        
                        <div class="hr_invisible"> </div>   
                                                     
                        <div class="column one-third"><label><?php esc_html_e('Enable Course Widget - Right Sidebar', 'lms');?></label></div>
                        <div class="column two-third last">
                            
                            <?php $checked = ( "true" ==  dttheme_option('dt_course','enable-course-widget-right') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('dt_course','enable-course-widget-right') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="enable-course-widget-right" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="enable-course-widget-right" name="mytheme[dt_course][enable-course-widget-right]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                            <p class="note"><?php esc_html_e('If you wish you can enable course widget in right sidebar here for course single page, which consists of enrolled students details, course group details, course events, etc.,', 'lms');?></p>
                            
                        </div>
                        
                        <div class="hr_invisible"> </div>   
                                                     
                        <div class="column one-third"><label><?php esc_html_e('Enable All Course Widget - Either In Left / Right Sidebar', 'lms');?></label></div>
                        <div class="column two-third last">
                            
                            <?php $checked = ( "true" ==  dttheme_option('dt_course','enable-all-course-widgets') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('dt_course','enable-all-course-widgets') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="enable-all-course-widgets" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="enable-all-course-widgets" name="mytheme[dt_course][enable-all-course-widgets]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                            <p class="note"><?php esc_html_e('Check this to enable all course widgets in either left or right sidebar for course single page, which consists of ratings, enrolled students details, course group details, course events, etc.,', 'lms');?></p>
                            <p class="note"><?php esc_html_e('Applicable only when you choose Left sidebar or Right Sidebar in course single page', 'lms');?></p>
                        </div>
                        
                    </div>
                </div>
                
                <div class="bpanel-box">
                    <div class="box-title">
                        <h3><?php esc_html_e('s2Member Settings', 'lms');?></h3>
                    </div>
                    <div class="box-content">
    
                        <?php 
                        if( defined('WS_PLUGIN__S2MEMBER_VERSION') ) {
                            
							echo '<h6><strong>'.do_shortcode("[s2Get constant='S2MEMBER_LEVEL1_LABEL'/]").' ('.esc_html__('s2Member Level', 'lms').' 1)</strong></h6><div class="clear"></div>';
							echo '<div class="column one-third">
									<label>'.esc_html__('Description', 'lms').'</label>
								  </div>
								  <div class="column two-third last">
									<input name="mytheme[dt_course][s2member-1-description]" type="text" class="large" value="'.trim(stripslashes(dttheme_wp_kses(dttheme_option('dt_course','s2member-1-description')))).'" />
								  </div>
								  <div class="hr_invisible"></div>';
							echo '<div class="column one-third">
									<label>'.esc_html__('Period', 'lms').'</label>
								  </div>
								  <div class="column two-third last">
									<input name="mytheme[dt_course][s2member-1-period]" type="text" class="medium" value="'.trim(stripslashes(dttheme_wp_kses(dttheme_option('dt_course','s2member-1-period')))).'" />
								  </div>
								  <div class="hr_invisible"></div>';
							echo '<div class="column one-third">
									<label>'.esc_html__('Term', 'lms').'</label>
								  </div>
								  <div class="column two-third last">
									<select name="mytheme[dt_course][s2member-1-term]">';
										$terms = array('', 'D' => 'Day(s)', 'W' => 'Week(s)', 'M' => 'Month(s)', 'Y' => 'Year(s)', 'L' => 'Lifetime');
										foreach($terms as $term_key => $term){
											$selected = selected(dttheme_option('dt_course','s2member-1-term'), $term_key, false );
											echo '<option value="'.$term_key.'" '.$selected.'>'.$term.'</option>';
										}
								echo '</select>
								  </div>';
							
							echo '<div class="hr_invisible"></div><div class="hr_invisible"></div>';
                            
                            echo '<h6><strong>'.esc_html__('Notes:', 'lms').'</strong></h6>';
                            echo '<ul class="s2member-notes">';
                                echo '<li>'.esc_html__('You can configure s2member level 1 settings for courses here.', 'lms').'</li>';
                            echo '</ul>';
                        
                        } else {
                            echo esc_html__('Please activate s2Member plugin in order to continue!', 'lms');	
                        }
                        
                        ?>
                        
                    </div>
                </div>
              
                <div class="bpanel-box">
                    <div class="box-title">
                        <h3><?php esc_html_e('Archive Page', 'lms');?></h3>
                    </div>
                    <div class="box-content">
         
                        <div class="column one-third"><label><?php esc_html_e('Layout Type', 'lms');?></label></div>
                        <div class="column two-third last">
                            <select id="mytheme-archives-layout-type" name="mytheme[dt_course][archives-layout-type]">
                            <?php 
                            $selected = dttheme_option('dt_course','archives-layout-type') != '' ? dttheme_option('dt_course','archives-layout-type') : '';
							$courses_layouts = array('' => 'Default', 'type2' => 'Type 2');
                            foreach ($courses_layouts as $courses_layout_key => $courses_layout ) {
								echo '<option value="'.$courses_layout_key.'" '.selected($selected,$courses_layout_key,false).'>'.$courses_layout.'</option>';
							}
                            ?>
                            </select>                         
                            <p class="note"><?php esc_html_e('You can choose any one of the available layout types', 'lms');?></p>
                        </div>
                        
                        <div class="hr_invisible"> </div>
    
                        <!-- Layout -->
                        <h6><?php esc_html_e('Post Layout', 'lms');?></h6>
                        <p class="note no-margin"> <?php esc_html_e("Choose the Course Archive page layout ", 'lms');?> </p>
                        <div class="hr_invisible"> </div>
                        <div class="bpanel-option-set">
                            <ul class="bpanel-post-layout bpanel-layout-set">
                            <?php $posts_layout = array('one-half-column'=>esc_html__("Two products per row.", 'lms'),'one-third-column' => esc_html__("Three products per row.", 'lms'));
                                        $v = dttheme_option('dt_course',"archives-post-layout");
                                        $v = !empty($v) ? $v : "one-half-column";
                                      foreach($posts_layout as $key => $value):
                                        $class = ( $key ==  $v ) ? " class='selected' " :"";                                  
                                        echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png'/></a></li>";
                                     endforeach;?>                        
                            </ul>
                            <input name="mytheme[dt_course][archives-post-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                        </div><!-- .Layout End -->
    
                        <div class="hr_invisible"> </div>
                        
                        <!-- Course Page Layout -->
                        <h6><?php esc_html_e('Page Layout', 'lms');?></h6>
                        <p class="note no-margin"> <?php esc_html_e("Choose the Course page layout", 'lms');?></p>
                        <div class="hr_invisible"> </div>
                        <div class="bpanel-option-set">
                            <ul class="bpanel-post-layout bpanel-layout-set" id="archives-layout">
                            <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar','both-sidebar'=>'both-sidebar');
                                  $v = 	dttheme_option('dt_course',"archives-layout");
                                  $v = !empty($v) ? $v : "content-full-width";
                                  
                            foreach($layout as $key => $value):
                                $class = ( $key ==  $v ) ? " class='selected' " : "";
                                echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png'/></a></li>";
                            endforeach; ?>
                            </ul>
                            <input name="mytheme[dt_course][archives-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                        </div><!-- Course Page Layout End-->
                        
                         <?php 
                         $sb_layout = dttheme_option('dt_course',"archives-layout");
                         $sidebar_both = $sidebar_left = $sidebar_right = '';
                         if($sb_layout == 'content-full-width') {
                            $sidebar_both = 'style="display:none;"'; 
                         } elseif($sb_layout == 'with-left-sidebar') {
                            $sidebar_right = 'style="display:none;"'; 
                         } elseif($sb_layout == 'with-right-sidebar') {
                            $sidebar_left = 'style="display:none;"'; 
                         } 
                         ?>
                        <div id="bpanel-widget-area-options" <?php echo 'class="archives-layout" '.$sidebar_both;?>>
                            
                            <div id="left-sidebar-container" class="bpanel-page-left-sidebar" <?php echo "{$sidebar_left}"; ?>>
                                <!-- 2. Every Where Sidebar Left Start -->
                                <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                    <h6><?php esc_html_e('Disable Every Where Sidebar Left', 'lms');?></label></h6>
                                    <?php dttheme_switch("",'dt_course','disable-everywhere-left-sidebar-for-course-archive'); ?>
                                </div><!-- Every Where Sidebar Left End-->
                            </div>
        
                            <div id="right-sidebar-container" class="bpanel-page-right-sidebar" <?php echo "{$sidebar_right}"; ?>>
                                <!-- 3. Every Where Sidebar Right Start -->
                                <div id="page-commom-sidebar" class="bpanel-sidebar-section custom-box">
                                    <h6><?php esc_html_e('Disable Every Where Sidebar Right', 'lms');?></label></h6>
                                    <?php dttheme_switch("",'dt_course','disable-everywhere-right-sidebar-for-course-archive'); ?>
                                </div><!-- Every Where Sidebar Right End-->
                            </div>
                            
                        </div>                    
    
                    </div>
                </div>
                
                <div class="bpanel-box">
                    <div class="box-title">
                        <h3><?php esc_html_e('Permalink Settings', 'lms');?></h3>
                    </div>
                    <div class="box-content">
    
                        <div class="column one-third"><label><?php esc_html_e('Single Course slug', 'lms');?></label></div>
                        <div class="column two-third last">
                            <input name="mytheme[dt_course][single-course-slug]" type="text" class="medium" value="<?php echo trim(stripslashes(dttheme_option('dt_course','single-course-slug')));?>" />
                            <p class="note"><?php esc_html_e('Do not use characters not allowed in links. Use, eg. courses <br> <b>After change go to Settings > Permalinks and click Save changes.</b>', 'lms');?></p>
                        </div>
                        <div class="hr"></div>
    
                        <div class="column one-third"><label><?php esc_html_e('Course Category slug', 'lms');?></label></div>
                        <div class="column two-third last">
                            <input name="mytheme[dt_course][course-category-slug]" type="text" class="medium" value="<?php echo trim(stripslashes(dttheme_option('dt_course','course-category-slug')));?>" />
                            <p class="note"><?php esc_html_e('Do not use characters not allowed in links. Use, eg. coursecategory <br> <b>After change go to Settings > Permalinks and click Save changes.</b>', 'lms');?></p>
                        </div>
                        <div class="hr"></div>
                        
                        <div class="column one-third"><label><?php esc_html_e('Single Lesson slug', 'lms');?></label></div>
                        <div class="column two-third last">
                            <input name="mytheme[dt_course][single-lesson-slug]" type="text" class="medium" value="<?php echo trim(stripslashes(dttheme_option('dt_course','single-lesson-slug')));?>" />
                            <p class="note"><?php esc_html_e('Do not use characters not allowed in links. Use, eg. lessons <br> <b>After change go to Settings > Permalinks and click Save changes.</b>', 'lms');?></p>
                        </div>
                        <div class="hr"></div>
    
                        <div class="column one-third"><label><?php esc_html_e('Lesson Category slug', 'lms');?></label></div>
                        <div class="column two-third last">
                            <input name="mytheme[dt_course][lesson-category-slug]" type="text" class="medium" value="<?php echo trim(stripslashes(dttheme_option('dt_course','lesson-category-slug')));?>" />
                            <p class="note"><?php esc_html_e('Do not use characters not allowed in links. Use, eg. lesson-complexity <br> <b>After change go to Settings > Permalinks and click Save changes.</b>', 'lms');?></p>
                        </div>
                        <div class="hr"></div>
    
                        <div class="column one-third"><label><?php esc_html_e('Single Question slug', 'lms');?></label></div>
                        <div class="column two-third last">
                            <input name="mytheme[dt_course][single-question-slug]" type="text" class="medium" value="<?php echo trim(stripslashes(dttheme_option('dt_course','single-question-slug')));?>" />
                            <p class="note"><?php esc_html_e('Do not use characters not allowed in links. Use, eg. questions <br> <b>After change go to Settings > Permalinks and click Save changes.</b>', 'lms');?></p>
                        </div>
                        <div class="hr"></div>
    
                        <div class="column one-third"><label><?php esc_html_e('Single Quiz slug', 'lms');?></label></div>
                        <div class="column two-third last">
                            <input name="mytheme[dt_course][single-quiz-slug]" type="text" class="medium" value="<?php echo trim(stripslashes(dttheme_option('dt_course','single-quiz-slug')));?>" />
                            <p class="note"><?php esc_html_e('Do not use characters not allowed in links. Use, eg. quizes <br> <b>After change go to Settings > Permalinks and click Save changes.</b>', 'lms');?></p>
                        </div>
                        <div class="hr"></div>
    
                        <div class="column one-third"><label><?php esc_html_e('Single Assignment slug', 'lms');?></label></div>
                        <div class="column two-third last">
                            <input name="mytheme[dt_course][single-assignment-slug]" type="text" class="medium" value="<?php echo trim(stripslashes(dttheme_option('dt_course','single-assignment-slug')));?>" />
                            <p class="note"><?php esc_html_e('Do not use characters not allowed in links. Use, eg. assignments <br> <b>After change go to Settings > Permalinks and click Save changes.</b>', 'lms');?></p>
                        </div>
                        
                    </div>
                </div>  
           <?php } else { ?>
           		<div class="bpanel-box">
                    <div class="box-title">
                        <h3><?php esc_html_e('Warning', 'lms');?></h3>
                    </div>
                    <div class="box-content">
                        <p class="note"><?php esc_html_e("You have disabled theme default courses in Buddha Panel settings. Please enable it.", 'lms');?></p>
                    </div>
                </div>
           <?php } ?>          
            
		</div><!-- default-course ends here --> 

    </div><!-- .bpanel-main-content ends here-->    
</div><!-- sensei end-->