<!-- widgetarea -->
<div id="widgetarea" class="bpanel-content">

  <!-- .bpanel-main-content -->
  <div class="bpanel-main-content">
    <ul class="sub-panel widget-area-nav">
      <li><a href="#custom-widget-area-sidebars"><?php esc_html_e("For Sidebars", 'lms');?></a></li>
      <li><a href="#custom-widget-area-mega-menu"><?php esc_html_e("For Mega Menu", 'lms');?></a></li>
    </ul>

    <!-- Sidebar -->
    <div id="custom-widget-area-sidebars" class="tab-content">
      <div class="bpanel-box">
        <div class="box-title"><h3><?php esc_html_e('Create New Widget Area', 'lms');?></h3></div>
        <div class="box-content">

          <p class="note"><?php esc_html_e("You can create widget areas here, and assign them in individual page/post for left, right or both sidebars", 'lms');?></p>
          <div class="bpanel-option-set">
            <input type="button" value="<?php esc_attr_e('Add New Widget Area', 'lms');?>" id="sidebars" class="black mytheme_add_widgetarea" />
            <div class="hr_invisible"></div><?php
              $widgets = dttheme_option('widgetarea','sidebars');
              $widgets = is_array($widgets) ? array_unique($widgets) : array();
              $widgets = array_filter($widgets);?>
          </div>
          <div class="bpanel-option-set">    
            <ul class="added-menu"><?php
                foreach( $widgets as $k => $v){?>
                    <li>
                      <div class="item-bar">
                        <span class="item-title"><?php esc_html_e('Widget Area:', 'lms'); echo" $v";?></span>
                        <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'lms');?></a></span>
                      </div>
                      <div class="item-content" style="display: none;">
                        <span><label><?php esc_html_e('Name', 'lms');?></label><input type="text" name="mytheme[widgetarea][sidebars][]" class="social-link" value="<?php echo esc_attr( $v );?>" /></span>
                        <div class="remove-cancel-links">
                          <span class="remove-item"><?php esc_html_e('Remove', 'lms');?></span>
                          <span class="meta-sep"> | </span>
                          <span class="cancel-item"><?php esc_html_e('Cancel', 'lms');?></span>
                        </div>
                      </div>
                    </li><?php
                }?>
            </ul>

            <ul class="sample-to-edit" style="display:none;">
              <li>
                <div class="item-bar">
                  <span class="item-title"><?php esc_html_e('Widget Area', 'lms');?></span>
                  <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'lms');?></a></span>
                </div>

                <div class="item-content">
                  <span><label><?php esc_html_e('Name', 'lms');?></label><input type="text" class="social-link" /></span>
                  <div class="remove-cancel-links">
                    <span class="remove-item"><?php esc_html_e('Remove', 'lms');?></span>
                    <span class="meta-sep"> | </span>
                    <span class="cancel-item"><?php esc_html_e('Cancel', 'lms');?></span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div><!-- Sidebar End -->
 

    <!-- Mega Menu -->
    <div id="custom-widget-area-mega-menu" class="tab-content">
      <div class="bpanel-box">
        <div class="box-title"><h3><?php esc_html_e('Create New Widget Area', 'lms');?></h3></div>
        <div class="box-content">

          <p class="note"><?php esc_html_e("You can create widget areas here, and assign them in mega menu", 'lms');?></p>
          <div class="bpanel-option-set">
            <input type="button" value="<?php esc_attr_e('Add New Widget Area', 'lms');?>" id="megamenu" class="black mytheme_add_widgetarea" />
            <div class="hr_invisible"></div><?php
              $widgets = dttheme_option('widgetarea','megamenu');
              $widgets = is_array($widgets) ? array_unique($widgets) : array();
              $widgets = array_filter($widgets);?>
          </div>
          <div class="bpanel-option-set">    
            <ul class="added-menu"><?php
                foreach( $widgets as $k => $v){?>
                    <li>
                      <div class="item-bar">
                        <span class="item-title"><?php esc_html_e('Widget Area:', 'lms'); echo" $v";?></span>
                        <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'lms');?></a></span>
                      </div>
                      <div class="item-content" style="display: none;">
                        <span><label><?php esc_html_e('Name', 'lms');?></label><input type="text" name="mytheme[widgetarea][megamenu][]" class="social-link" value="<?php echo esc_attr( $v );?>" /></span>
                        <div class="remove-cancel-links">
                          <span class="remove-item"><?php esc_html_e('Remove', 'lms');?></span>
                          <span class="meta-sep"> | </span>
                          <span class="cancel-item"><?php esc_html_e('Cancel', 'lms');?></span>
                        </div>
                      </div>
                    </li><?php
                }?>
            </ul>

            <ul class="sample-to-edit" style="display:none;">
              <li>
                <div class="item-bar">
                  <span class="item-title"><?php esc_html_e('Widget Area', 'lms');?></span>
                  <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'lms');?></a></span>
                </div>

                <div class="item-content">
                  <span><label><?php esc_html_e('Name', 'lms');?></label><input type="text" class="social-link" /></span>
                  <div class="remove-cancel-links">
                    <span class="remove-item"><?php esc_html_e('Remove', 'lms');?></span>
                    <span class="meta-sep"> | </span>
                    <span class="cancel-item"><?php esc_html_e('Cancel', 'lms');?></span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div><!-- Mega Menu End -->
    
    
  </div><!-- .bpanel-main-content end-->
  
</div><!-- widgetarea end -->