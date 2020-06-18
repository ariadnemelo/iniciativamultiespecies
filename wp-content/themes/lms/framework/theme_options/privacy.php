<!-- privacy -->
<div id="privacy" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">

        <ul class="sub-panel"> 
            <li><a href="#tab1"><?php esc_html_e('Privacy & Cookies', 'lms');?></a></li>
            <li><a href="#tab2"><?php esc_html_e('Cookie Consent Message', 'lms');?></a></li>
            <li><a href="#tab3"><?php esc_html_e('Modal Window', 'lms');?></a></li>
        </ul>

        <!-- tab1 - Privacy & Cookies -->
        <div id="tab1" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
              <div class="box-title"><h3><?php esc_html_e('Privacy Policy', 'lms');?></h3></div>

              <div class="box-content">
                  <p class="note"><?php esc_html_e('In case you deal with any EU customers/visitors these options allow you to make your site GDPR compliant.', 'lms');?></p>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  <h6><?php esc_html_e('Append a privacy policy message to your comment form?', 'lms');?></h6>
                  <div class="column one-fifth">
                      <?php $checked = ( "true" ==  dttheme_option('privacy','enable-commentfrm-msg') ) ? ' checked="checked"' : ''; ?>
                      <?php $switchclass = ( "true" ==  dttheme_option('privacy','enable-commentfrm-msg') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                      <div data-for="privacy-commentfrm-msg" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                      <input class="hidden" id="privacy-commentfrm-msg" name="mytheme[privacy][enable-commentfrm-msg]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                  </div>
                  <div class="column four-fifth last">
                      <p class="note no-margin"><?php esc_html_e('Check to append a message to the comment form for unregistered users. Commenting without consent is no longer possible.', 'lms');?></p>
                  </div>
                  <div class="clear"></div>
                  <div class="hr_invisible_large"></div>
                  <h6><?php esc_html_e('Message below comment form', 'lms');?></h6>
                  <?php $value = dttheme_option('privacy', 'commentfrm-msg'); 
                  if ( empty ($value) ) :

                    $value = "I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]";

                 endif;

                  ?>
                  <textarea id="mytheme[privacy][commentfrm-msg]" name="mytheme[privacy][commentfrm-msg]"><?php echo esc_html($value);?></textarea>
                  <p class="note"><?php esc_html_e('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'lms');?></p>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  <h6><?php esc_html_e('Append a privacy policy message to mailchimp contact forms?', 'lms');?></h6>
                  <div class="column one-fifth">
                      <?php $checked = ( "true" ==  dttheme_option('privacy','enable-mailchimpfrm-msg') ) ? ' checked="checked"' : ''; ?>
                      <?php $switchclass = ( "true" ==  dttheme_option('privacy','enable-mailchimpfrm-msg') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                      <div data-for="privacy-mailchimpfrm-msg" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                      <input class="hidden" id="privacy-mailchimpfrm-msg" name="mytheme[privacy][enable-mailchimpfrm-msg]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                  </div>
                  <div class="column four-fifth last">
                      <p class="note"><?php esc_html_e('Check to append a message to all of your mailchimp forms.', 'lms');?></p>
                  </div>
                  <div class="clear"></div>
                  <div class="hr_invisible_large"></div>
                  <h6><?php esc_html_e('Message below mailchimp subscription forms', 'lms');?></h6>
                  <?php $value = dttheme_option('privacy', 'mailchimpfrm-msg'); 
                  if ( empty ($value) ) :

                    $value = "I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]";

                 endif;

                  ?>
                  <textarea id="mytheme[privacy][mailchimpfrm-msg]" name="mytheme[privacy][mailchimpfrm-msg]"><?php echo esc_html($value);?></textarea>
                  <p class="note"><?php esc_html_e('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'lms');?></p>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  
                  <h6><?php esc_html_e('Append a privacy policy message to your login forms?', 'lms');?></h6>
                  <div class="column one-fifth">
                      <?php $checked = ( "true" ==  dttheme_option('privacy','enable-loginfrm-msg') ) ? ' checked="checked"' : ''; ?>
                      <?php $switchclass = ( "true" ==  dttheme_option('privacy','enable-loginfrm-msg') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                      <div data-for="privacy-loginfrm-msg" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                      <input class="hidden" id="privacy-loginfrm-msg" name="mytheme[privacy][enable-loginfrm-msg]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                  </div>
                  <div class="column four-fifth last">
                      <p class="note"><?php esc_html_e('Check to append a message to the default login and registrations forms.', 'lms');?></p>
                  </div>
                  <div class="clear"></div>
                  <div class="hr_invisible_large"></div>
                  <h6><?php esc_html_e('Message below login forms', 'lms');?></h6>
                  <?php $value = dttheme_option('privacy', 'loginfrm-msg'); 
                  if ( empty ($value) ) :

                    $value = "I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]";

                 endif;

                  ?>
                  
                  <textarea id="mytheme[privacy][loginfrm-msg]" name="mytheme[privacy][loginfrm-msg]" ><?php echo esc_html($value);?></textarea>
                  <p class="note"><?php esc_html_e('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'lms');?></p>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  
                  <h6><?php esc_html_e('Append a privacy policy message to your register forms?', 'lms');?></h6>
                  <div class="column one-fifth">
                      <?php $checked = ( "true" ==  dttheme_option('privacy','enable-regfrm-msg') ) ? ' checked="checked"' : ''; ?>
                      <?php $switchclass = ( "true" ==  dttheme_option('privacy','enable-regfrm-msg') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                      <div data-for="privacy-regfrm-msg" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                      <input class="hidden" id="privacy-regfrm-msg" name="mytheme[privacy][enable-regfrm-msg]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                  </div>
                  <div class="column four-fifth last">
                      <p class="note"><?php esc_html_e('Check to append a message to the default login and registrations forms.', 'lms');?></p>
                  </div>
                  <div class="clear"></div>
                  <div class="hr_invisible_large"></div>
                  <h6><?php esc_html_e('Message below Register forms', 'lms');?></h6>
                  <?php $value = dttheme_option('privacy', 'regfrm-msg'); 
                  if ( empty ($value) ) :

                    $value = "I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]";

                 endif;

                  ?>
                  
                  <textarea id="mytheme[privacy][regfrm-msg]" name="mytheme[privacy][regfrm-msg]" ><?php echo esc_html($value);?></textarea>
                  <p class="note"><?php esc_html_e('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'lms');?></p>


                  <div class="hr"></div>
                  <div class="clear"></div>

                  
                  <h6><?php esc_html_e('Append a privacy policy message to visit contact forms?', 'lms');?></h6>
                  <div class="column one-fifth">
                      <?php $checked = ( "true" ==  dttheme_option('privacy','enable-visitfrm-msg') ) ? ' checked="checked"' : ''; ?>
                      <?php $switchclass = ( "true" ==  dttheme_option('privacy','enable-visitfrm-msg') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                      <div data-for="privacy-visitfrm-msg" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                      <input class="hidden" id="privacy-visitfrm-msg" name="mytheme[privacy][enable-visitfrm-msg]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                  </div>
                  <div class="column four-fifth last">
                      <p class="note"><?php esc_html_e('Check to append a message to all of your visit forms.', 'lms');?></p>
                  </div>
                  <div class="clear"></div>
                  <div class="hr_invisible_large"></div>
                  <h6><?php esc_html_e('Message below visit form', 'lms');?></h6>
                  <?php $value = dttheme_option('privacy', 'visitfrm-msg'); 
                  if ( empty ($value) ) :

                    $value = "I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]";

                 endif;
                 ?>
                  <textarea id="mytheme[privacy][visitfrm-msg]" name="mytheme[privacy][visitfrm-msg]"><?php echo esc_html($value);?></textarea>
                  <p class="note"><?php esc_html_e('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'lms');?></p>

              </div><!-- .box-content -->
            </div><!-- .bpanel-box end -->

        </div><!-- tab1 End -->

        <!-- tab2 - Cookie Consent Message -->
        <div id="tab2" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
              <div class="box-title">
                  <h3><?php esc_html_e('Cookie Consent Message', 'lms');?></h3>
              </div>

              <div class="box-content">
                  <p class="note"><?php echo sprintf( esc_html__("Make your site comply with the %sEU cookie law%s by informing users that your site uses cookies. %s You can also use the field to display a one time message not related to cookies if you are using a plugin for this purpose or do not need to inform your customers about the use of cookies.",'lms'), "<a target='_blank' href='https://ec.europa.eu/ipg/basics/legal/cookies/index_en.htm'>", '</a>', '<br><br>');?></p>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  <h6><?php esc_html_e('Cookie Message Bar', 'lms');?></h6>
                  <div class="column one-fifth">
                      <?php $checked = ( "true" ==  dttheme_option('privacy','enable-cookie-msgbar') ) ? ' checked="checked"' : ''; ?>
                      <?php $switchclass = ( "true" ==  dttheme_option('privacy','enable-cookie-msgbar') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                      <div data-for="privacy-cookie-msgbar" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                      <input class="hidden" id="privacy-cookie-msgbar" name="mytheme[privacy][enable-cookie-msgbar]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                  </div>
                  <div class="column four-fifth last">
                      <p class="note"><?php esc_html_e('Enable cookie consent message bar', 'lms');?></p>
                  </div>
                  <div class="clear"></div>
                  <div class="hr_invisible_large"></div>
                  <h6><?php esc_html_e('Message', 'lms');?></h6>

                  <?php $value = dttheme_option('privacy', 'cookiebar-msg'); 
                  if ( empty ($value) ) :

                    $value = "This site uses cookies. By continuing to browse the site, you are agreeing to our use of cookies";

                 endif;?>

                  <textarea id="mytheme[privacy][cookiebar-msg]" name="mytheme[privacy][cookiebar-msg]"><?php echo esc_html($value);?></textarea>
                  <p class="note"><?php esc_html_e('Provide a message which indicates that your site uses cookies.', 'lms');?></p>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  <div class="column one-third">
                      <label><?php esc_html_e('Message Bar Position', 'lms');?></label>
                  </div>
                  <div class="column two-third last">
                      <select name="mytheme[privacy][cookiebar-position]" class="dt-chosen-select"><?php
              $selected =   dttheme_option('privacy','cookiebar-position');
              $bar_poss =  array(
              'bottom'     => esc_html__('Bottom','lms'),
              'top'        => esc_html__('Top','lms'),
              'top-left'     => esc_html__('Top Left Corner','lms'),
              'top-right'    => esc_html__('Top Right Corner','lms'),
              'bottom-left'  => esc_html__('Bottom Left Corner','lms'),
              'bottom-right' => esc_html__('Bottom Right Corner','lms'),
              );
              foreach( $bar_poss as $bs => $bv ):
               echo "<option value='{$bs}'".selected($selected,$bs,false).">{$bv}</option>";
              endforeach;?>
                      </select>
                      <p class="note"><?php esc_html_e('Where on the page should the message bar appear?', 'lms');?></p>
                  </div>

              </div><!-- .box-content -->

              <div class="box-title">
                  <h3><?php esc_html_e('Buttons', 'lms');?></h3>
              </div>

              <div class="box-content">
                  <div class="bpanel-option-set">
                      <div class="column one-fifth">
                        <h6><?php esc_html_e('Buttons', 'lms');?></h6>
                      </div>

                      <input type="button" value="<?php esc_attr_e('Add New Button', 'lms');?>" class="black mytheme_add_group_item" />
                      <div class="column four-fifth last">
                         <p class="note"><?php esc_html_e('You can create any number of buttons/links for your message bar here:', 'lms');?></p>
                      </div>
                      <div class="hr_invisible"></div>
                  </div>

                  <div class="bpanel-option-set">
                      <ul class="menu-to-edit">
                      <?php $buttons = dttheme_option('privacy-bar');
                            if(is_array($buttons)):
                              $keys = array_keys($buttons);
                              $i=0;

                            foreach($buttons as $b):?>
                                <li id="<?php echo esc_attr($keys[$i]);?>">
                                  <div class="item-bar">
                                      <span class="item-title"><?php $n = $b['label']; $n = ucwords($n); echo "{$n}";?></span>
                                      <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'lms');?></a></span>
                                  </div>
                                  <div class="item-content" style="display: none;">
                                      <span><label><small><?php esc_html_e('Button Label', 'lms');?></small></label>
                                         <input type="text" class="button-label" name="mytheme[privacy-bar][<?php echo esc_attr( $keys[$i] );?>][label]" value="<?php echo esc_attr($b['label']);?>"/></span>
                                      <span><label><small><?php esc_html_e('Button Action', 'lms');?></small></label>
                                         <?php echo dt_theme_privacy_btnaction_selection($keys[$i],$b['action']);?></span>
                                      <span><label><small><?php esc_html_e('Button Link', 'lms');?></small></label>
                                         <input type="text" class="button-link" name="mytheme[privacy-bar][<?php echo esc_attr( $keys[$i] );?>][link]" value="<?php echo esc_attr($b['link']);?>"/></span>                                    
                                      <div class="remove-cancel-links">
                                          <span class="remove-item"><?php esc_html_e('Remove', 'lms');?></span>
                                          <span class="meta-sep"> | </span>
                                          <span class="cancel-item"><?php esc_html_e('Cancel', 'lms');?></span>
                                      </div>
                                  </div>
                                </li>
                      <?php $i++; endforeach; endif;?>
                      </ul>

                      <ul class="sample-to-edit" style="display:none;">
                          <li><!-- Social Item -->
                              <div class="item-bar"><!-- .item-bar -->
                                  <span class="item-title"><?php esc_html_e('Button', 'lms');?></span>
                                  <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'lms');?></a></span>
                              </div><!-- .item-bar -->
                              <div class="item-content"><!-- .item-content -->
                                  <span><label><small><?php esc_html_e('Button Label', 'lms');?></small></label><input type="text" class="button-label" /></span>
                                  <span><label><small><?php esc_html_e('Button Action', 'lms');?></small></label><?php echo dt_theme_privacy_btnaction_selection();?></span>
                                  <span><label><small><?php esc_html_e('Button Link', 'lms');?></small></label><input type="text" class="button-link" /></span>                                  <div class="remove-cancel-links">
                                      <span class="remove-item"><?php esc_html_e('Remove', 'lms');?></span>
                                      <span class="meta-sep"> | </span>
                                      <span class="cancel-item"><?php esc_html_e('Cancel', 'lms');?></span>
                                  </div>
                              </div><!-- .item-content end -->
                          </li><!-- Social Item End-->
                      </ul>
                  </div>
              </div><!-- .box-content -->
            </div><!-- .bpanel-box end -->

        </div><!-- tab2 End -->
        
        <!-- tab3 - Cookie Consent Message -->
        <div id="tab3" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
              <div class="box-title">
                  <h3><?php esc_html_e('Modal Window with privacy and cookie info', 'lms');?></h3>
              </div>

              <div class="box-content">

                  <h6><?php esc_html_e('Model Window Custom Content', 'lms');?></h6>
                  <div class="column one-fifth">
                      <?php $checked = ( "true" ==  dttheme_option('privacy','enable-custom-model') ) ? ' checked="checked"' : ''; ?>
                      <?php $switchclass = ( "true" ==  dttheme_option('privacy','enable-custom-model') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                      <div data-for="privacy-custom-model" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                      <input class="hidden" id="privacy-custom-model" name="mytheme[privacy][enable-custom-model]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                  </div>
                  <div class="column four-fifth last">
                      <p class="note"><?php esc_html_e('Instead of displaying the default content set custom content yourself', 'lms');?></p>
                  </div>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  <div class="column one-third"><label><?php esc_html_e('Main Heading', 'lms');?></label></div>
                  <div class="column two-third last">

                     <?php $value = dttheme_option('privacy', 'custom-model-title'); 
                      if ( empty ($value) ) :

                        $value = "Cookie and Privacy Settings";

                     endif;?>

                     <input name="mytheme[privacy][custom-model-title]" type="text" class="large" value="<?php echo esc_html($value);?>" />
                  </div>

              </div><!-- .box-content -->
              
              <div class="box-title">
                  <h3><?php esc_html_e('Model Window Tabs', 'lms');?></h3>
              </div>

              <div class="box-content">
                  <div class="bpanel-option-set">
                      <div class="column one-third">
                        <h6><?php esc_html_e('Model Window Tabs', 'lms');?></h6>
                      </div>

                      <input type="button" value="<?php esc_attr_e('Add New Tab', 'lms');?>" class="black mytheme_add_tab_item" />
                      <div class="column two-third last">
                         <p class="note"><?php esc_html_e('You can create any number of tabs for your model window here:', 'lms');?></p>
                      </div>
                      <div class="hr_invisible"></div>
                  </div>

                  <div class="bpanel-option-set">
                      <ul class="menu-to-edit">
                      <?php $tabs = dttheme_option('privacy-model');

                            if(is_array($tabs)):
                              $keys = array_keys($tabs);
                              $i=0;

                            foreach($tabs as $t):?>
                                <li id="<?php echo esc_attr($keys[$i]);?>">
                                  <div class="item-bar">
                                      <span class="item-title"><?php $n = $t['label']; $n = ucwords($n); echo "{$n}";?></span>
                                      <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'lms');?></a></span>
                                  </div>
                                  <div class="item-content" style="display: none;">
                                      <span><label><small><?php esc_html_e('Tab Label', 'lms');?></small></label>
                                         <input type="text" class="tab-label" name="mytheme[privacy-model][<?php echo esc_attr($keys[$i]);?>][label]" value="<?php echo esc_attr($t['label']);?>"/></span>
                                      <span><label><small><?php esc_html_e('Tab Content', 'lms');?></small></label>
                                         <textarea class="tab-content" name="mytheme[privacy-model][<?php echo esc_attr($keys[$i]);?>][content]"><?php echo stripslashes($t['content']);?></textarea>
                                      </span>
                                      <div class="remove-cancel-links">
                                          <span class="remove-item"><?php esc_html_e('Remove', 'lms');?></span>
                                          <span class="meta-sep"> | </span>
                                          <span class="cancel-item"><?php esc_html_e('Cancel', 'lms');?></span>
                                      </div>
                                  </div>
                                </li>
                      <?php $i++; endforeach; endif;?>
                      </ul>

                      <ul class="sample-to-edit" style="display:none;">
                          <li><!-- Social Item -->
                              <div class="item-bar"><!-- .item-bar -->
                                  <span class="item-title"><?php esc_html_e('Tab', 'lms');?></span>
                                  <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'lms');?></a></span>
                              </div><!-- .item-bar -->
                              <div class="item-content"><!-- .item-content -->
                                  <span><label><small><?php esc_html_e('Tab Label', 'lms');?></small></label><input type="text" class="tab-label" /></span>
                                  <span><label><small><?php esc_html_e('Tab Content', 'lms');?></small></label><textarea class="tab-content"></textarea></span>
                                  <div class="remove-cancel-links">
                                      <span class="remove-item"><?php esc_html_e('Remove', 'lms');?></span>
                                      <span class="meta-sep"> | </span>
                                      <span class="cancel-item"><?php esc_html_e('Cancel', 'lms');?></span>
                                  </div>
                              </div><!-- .item-content end -->
                          </li><!-- Social Item End-->
                      </ul>
                  </div>
              </div><!-- .box-content -->

            </div><!-- .bpanel-box end -->
        </div><!-- tab3 End -->

    </div><!-- .bpanel-main-content end-->
</div><!-- privacy options end-->