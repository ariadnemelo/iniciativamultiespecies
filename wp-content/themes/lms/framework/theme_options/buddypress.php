<!-- buddypress-pages starts here-->
<div id="buddypress-pages" class="bpanel-content">

    <!-- .bpanel-main-content starts here-->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-buddypress"><?php esc_html_e("BuddyPress Settings", 'lms');?></a></li>
        </ul>

        <!-- my-buddypress starts here -->
        <div id="my-buddypress" class="tab-content">
            <div class="bpanel-box">
            <?php if( function_exists('bp_is_active') ):?>
                <!-- Members List Starts Here -->
                <div class="box-title">
                    <h3><?php esc_html_e('Members List', 'lms');?></h3>
                </div>
                <div class="box-content">

                    <!-- Members Per Page -->
                    <div class="column one-third">
                        <label><?php esc_html_e('Members Per Page', 'lms');?></label>
                    </div>
                    <div class="column two-third last">
                        <input name="mytheme[bp][members-per-page]" type="text" class="small" value="<?php echo trim(stripslashes(dttheme_option('bp','members-per-page')));?>" />
                        <p class="note"><?php esc_html_e('Number of members to show in members list page', 'lms');?></p>
                    </div><!-- Members Per Page -->

                    <!-- Layout  -->
                    <h6><?php esc_html_e('Layout', 'lms');?></h6>
                    <p class="note no-margin"> <?php esc_html_e("Choose the Members Layout Style in Members list ", 'lms');?> </p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                        <ul class="bpanel-post-layout bpanel-layout-set"><?php 
                            $posts_layout = array('one-half-column'=>esc_html__("Two Members per row.", 'lms'),'one-third-column' => esc_html__("Three Members per row.", 'lms'),'one-fourth-column' => esc_html__("Four Members per row", 'lms'));
                            $v = dttheme_option('bp',"members-page-layout");
                            $v = !empty($v) ? $v : "one-third-column";

                            foreach($posts_layout as $key => $value):
                                $class = ( $key ==  $v ) ? " class='selected' " :"";
                                echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png'/></a></li>";
                            endforeach;?>
                        </ul>
                        <input name="mytheme[bp][members-page-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                    </div><!-- Layout  -->

                </div>
                <!-- Members Lists Ends Here -->
            <?php else: ?>
                <div class="box-title">
                    <h3><?php esc_html_e('Warning', 'lms');?></h3>
                </div>
                <div class="box-content">
                    <p class="note"><?php esc_html_e("You have to install and activate the BuddyPress plugin to use this module ..", 'lms');?></p>
                </div>
            <?php endif; ?>
            </div>
        </div><!-- my-buddypress ends here -->    
    </div><!-- .bpanel-main-content ENDS here-->

</div><!-- buddypress-pages ends here-->