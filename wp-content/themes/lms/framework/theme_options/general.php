<!-- general -->
<div id="general" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel"> 
            <li><a href="#my-general"><?php esc_html_e("General", 'lms');?></a></li>
            <li><a href="#my-sociable"><?php esc_html_e("Sociable", 'lms');?></a></li>
            <li><a href="#my-global"><?php esc_html_e("Advanced", 'lms');?></a></li>
        </ul>
        
        <!-- my-general-->
        <div id="my-general" class="tab-content">
        
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                    <!-- Logo -->
                    <div class="box-title"><h3><?php esc_html_e('Logo', 'lms');?></h3></div>
                    <div class="box-content">
                    
                    
                    	<div class="column three-fifth">
                            <div class="bpanel-option-set">
                                <?php $logo = array(
                                        'id'=>		'logo',
                                        'options'=>		array(
                                                            'true'	=> esc_html__('Custom Image Logo', 'lms'),
                                                             ''=> 	sprintf( esc_html__('Display Site Title %s(click here to edit site title)%s', 'lms'), '<small><a href="options-general.php">', '</a></small>')
                                                            )
                                        );
                                             
                                        $output = "";
                                        $i = 0;
                                        foreach($logo['options'] as $key => $option):
                                            $checked = ( $key ==  dttheme_option('general',$logo['id']) ) ? ' checked="checked"' : '';
                                            $output .= "<label><input type='radio' name='mytheme[general][$logo[id]]' value='{$key}'  $checked />$option</label>";
                                            if($i == 0):
                                                $output .='<div class="clear"></div>';
                                            endif;
                                        $i++;
                                        endforeach;
                                        echo "{$output}";?>
                          </div><!-- .bpanel-option-set end-->
                      
                        </div>
                        
                        <div class="column two-fifth last">
                            <p class="note"><?php esc_html_e('You can choose whether you wish to display a custom logo or your site title.', 'lms');?></p>
                        </div>  
                        
                        <div class="hr"> </div>

                        <h6><?php esc_html_e('Logo', 'lms');?></h6>  
                        <div class="image-preview-container">
                            <input id="mytheme-logo" name="mytheme[general][logo-url]" type="text" class="uploadfield" readonly="readonly"
                                    value="<?php echo  dttheme_option('general','logo-url');?>" />
                            <input type="button" value="<?php esc_attr_e('Upload', 'lms');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php esc_attr_e('Remove', 'lms');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','logo-url'),false,'logo.png');?>
                        </div>
                        
                        <p class="note"> <?php esc_html_e('Upload a logo for your theme, or specify the image address of your online logo.', 'lms');?> </p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php esc_html_e('Retina Logo', 'lms');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-retina-logo" type="text" name="mytheme[general][retina-logo-url]" class="uploadfield" readonly="readonly" 
                            value="<?php echo dttheme_option('general','retina-logo-url');?>"/>
                          <input type="button" value="<?php esc_attr_e('Upload', 'lms');?>" class="upload_image_button show_preview" />
                          <input type="button" value="<?php esc_attr_e('Remove', 'lms');?>" class="upload_image_reset" />
                          <?php dttheme_adminpanel_image_preview(dttheme_option('general','retina-logo-url'),false,'logo@2x.png');?>
                        </div>

                        <p class="note"><?php esc_html_e('Upload a retina logo for your theme, or specify the image address of your online logo.', 'lms');?></p>
                        
                        <div class="clear"></div>
                        
                        <div class="one-half-content">
                        	<h6><?php esc_html_e('Width', 'lms');?></h6>
                            <input type="text" class="medium" name="mytheme[general][retina-logo-width]" value="<?php echo dttheme_option('general','retina-logo-width');?>" />
							<?php esc_html_e('px', 'lms');?>
                        </div>    

                        <div class="one-half-content last">
                        	<h6><?php esc_html_e('Height', 'lms');?></h6>
                            <input type="text" class="medium" name="mytheme[general][retina-logo-height]" value="<?php echo dttheme_option('general','retina-logo-height');?>"/>
                            <?php esc_html_e('px', 'lms');?>
                        </div>    
                        <p class="note"><?php esc_html_e('If retina logo is uploaded, enter the standard logo width and height in above respective boxes.', 'lms');?></p>
                        <div class="clear"></div>
                          

                        <div class="hr"></div>
                        <div class="clear"></div>
                        
                        <h6><?php esc_html_e('Footer Logo', 'lms');?></h6>  
                        <div class="image-preview-container">
                            <input id="mytheme-footer-logo" name="mytheme[general][footer-logo-url]" type="text" class="uploadfield" readonly="readonly"
                                    value="<?php echo  dttheme_option('general','footer-logo-url');?>" />
                            <input type="button" value="<?php esc_attr_e('Upload', 'lms');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php esc_attr_e('Remove', 'lms');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','footer-logo-url'),false,'footer-logo.png');?>
                        </div>
                        
                        <p class="note"> <?php esc_html_e('Upload a footer logo for your theme, or specify the image address of your online footer logo.', 'lms');?> </p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        
                        <h6><?php esc_html_e('Footer Retina Logo', 'lms');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-retina-footer-logo" type="text" name="mytheme[general][retina-footer-logo-url]" class="uploadfield" readonly="readonly" 
                            value="<?php echo dttheme_option('general','retina-footer-logo-url');?>"/>
                          <input type="button" value="<?php esc_attr_e('Upload', 'lms');?>" class="upload_image_button show_preview" />
                          <input type="button" value="<?php esc_attr_e('Remove', 'lms');?>" class="upload_image_reset" />
                          <?php dttheme_adminpanel_image_preview(dttheme_option('general','retina-footer-logo-url'),false,'footer-logo@2x.png');?>
                        </div>

                        <p class="note"><?php esc_html_e('Upload a retina footer logo for your theme, or specify the image address of your online footer logo.', 'lms');?></p>
                        
                        <div class="clear"></div>
                        
                        <div class="one-half-content">
                        	<h6><?php esc_html_e('Width', 'lms');?></h6>
                            <input type="text" class="medium" name="mytheme[general][retina-footer-logo-width]" 
                            	value="<?php echo dttheme_option('general','retina-footer-logo-width');?>" /><?php esc_html_e('px', 'lms');?>
                        </div>    

                        <div class="one-half-content last">
                        	<h6><?php esc_html_e('Height', 'lms');?></h6>
                            <input type="text" class="medium" name="mytheme[general][retina-footer-logo-height]" 
                            	value="<?php echo dttheme_option('general','retina-footer-logo-height');?>"/><?php esc_html_e('px', 'lms');?>
                        </div>    
                        <p class="note"><?php esc_html_e('If footer retina logo is uploaded, enter the standard footer logo width and height in above respective boxes.', 'lms');?></p>
                        
                    </div> <!-- Logo End -->

                    <!-- Favicon -->
                    <div class="box-title">
                        <h3><?php esc_html_e('Favicon', 'lms');?></h3>
                    </div>
                    <div class="box-content">
                    	<h6> <?php esc_html_e('Enable Favicon', 'lms');?> </h6> 
                        
                        <div class="column one-fifth">
                        <?php $checked = ( "true" ==  dttheme_option('general','enable-favicon') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','enable-favicon') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="enable-favicon" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="enable-favicon" name="mytheme[general][enable-favicon]" type="checkbox" 
                            value="true" <?php echo "{$checked}";?> />
                        </div>
                        <div class="column four-fifth last"></div>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php esc_html_e('Custom Favicon', 'lms');?></h6>
                          <div class="image-preview-container">
                            <input id="mytheme-favicon" name="mytheme[general][favicon-url]" type="text" class="uploadfield"  readonly="readonly"
                                value="<?php echo  dttheme_option('general','favicon-url');?>" />
                            <input type="button" value="<?php esc_attr_e('Upload', 'lms');?>" class="upload_image_button" />
                            <input type="button" value="<?php esc_attr_e('Remove', 'lms');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','favicon-url'),false,'favicon.png');?>
                          </div>
                          <p class="note"> <?php esc_html_e('Upload a favicon for your theme, or specify the oneline URL for favicon', 'lms');?>  </p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php esc_html_e('Apple iPhone Icon', 'lms');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-apple-icon" name="mytheme[general][apple-favicon]" type="text" class="uploadfield" readonly="readonly"
                            value="<?php echo dttheme_option('general','apple-favicon');?>"/>
                            <input type="button" value="<?php esc_attr_e('Upload', 'lms');?>" class="upload_image_button" />
                            <input type="button" value="<?php esc_attr_e('Remove', 'lms');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','apple-favicon'),false,'apple-touch-icon.png');?>
                        </div>
                        <p class="note"> <?php esc_html_e('Upload your custom iPhone icon (57px by 57px), or specify the oneline URL for favicon', 'lms');?>  </p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php esc_html_e('Apple iPhone Retina Icon', 'lms');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-apple-icon" name="mytheme[general][apple-retina-favicon]" type="text" class="uploadfield" readonly="readonly"
                            value="<?php echo dttheme_option('general','apple-retina-favicon');?>"/>
                            <input type="button" value="<?php esc_attr_e('Upload', 'lms');?>" class="upload_image_button" />
                            <input type="button" value="<?php esc_attr_e('Remove', 'lms');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','apple-retina-favicon'),false,'apple-touch-icon-114x114.png');?>
                        </div>
                        <p class="note"><?php esc_html_e('Upload your custom iPhone retina icon (114px by 114px), or specify the oneline URL for favicon', 'lms');?></p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php esc_html_e('Apple iPad Icon', 'lms');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-apple-icon" name="mytheme[general][apple-ipad-favicon]" type="text" class="uploadfield" readonly="readonly"
                            value="<?php echo dttheme_option('general','apple-ipad-favicon');?>"/>
                            <input type="button" value="<?php esc_attr_e('Upload', 'lms');?>" class="upload_image_button" />
                            <input type="button" value="<?php esc_attr_e('Remove', 'lms');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','apple-ipad-favicon'),false,'apple-touch-icon-72x72.png');?>
                        </div>
                        <p class="note"> <?php esc_html_e('Upload your custom iPad icon (72px by 72px), or specify the oneline URL for favicon', 'lms');?>  </p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php esc_html_e('Apple iPad Retina Icon', 'lms');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-apple-icon" name="mytheme[general][apple-ipad-retina-favicon]" type="text" class="uploadfield" readonly="readonly"
                            value="<?php echo dttheme_option('general','apple-ipad-retina-favicon');?>"/>
                            <input type="button" value="<?php esc_attr_e('Upload', 'lms');?>" class="upload_image_button" />
                            <input type="button" value="<?php esc_attr_e('Remove', 'lms');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','apple-ipad-retina-favicon'),false,'apple-touch-icon-144x144.png');?>
                        </div>
                        <p class="note"><?php esc_html_e('Upload your custom iPad retina icon (144px by 144px), or specify the oneline URL for favicon', 'lms');?></p>

                    </div> <!-- Favicon End -->

                    <!-- Others -->
                    <div class="box-title"><h3><?php esc_html_e('Others', 'lms');?></h3></div>
                    <div class="box-content">

                      <h6><?php esc_html_e('Enable Retina Support', 'lms');?></h6>
                      <div class="column one-fifth">
                        <?php $checked = ( "true" ==  dttheme_option('general','enable-retina') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','enable-retina') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-enable-retina" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-enable-retina" name="mytheme[general][enable-retina]" type="checkbox" value="true" <?php echo "{$checked}";?>/>
                      </div>
                      <div class="column four-fifth last">
                        <p class="note"><?php esc_html_e('YES! to enable retina support, and the retina.js library would automatically try and find with @2x.png extension ', 'lms');?></p>
                      </div>
                      <div class="clear"> </div>
                      <div class="hr"></div>

                      <h6> <?php esc_html_e('Enable Sticky Navigation', 'lms'); ?></h6>
                    
                      <div class="column one-fifth">
                        	<?php $checked = ( "true" ==  dttheme_option('general','enable-sticky-nav') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','enable-sticky-nav') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-enable-sticky-nav" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-enable-sticky-nav" name="mytheme[general][enable-sticky-nav]" type="checkbox" 
                            value="true" <?php echo "{$checked}";?> />
                        </div>
                        
                        <div class="column four-fifth last">
                            <p class="note"><?php esc_html_e('YES! to enable sticky navigation.', 'lms');?> </p>
                        </div>
                        
                        <div class="clear"> </div>
                        <div class="hr"></div>

                      <h6> <?php esc_html_e('Enable Sticky Navigation For Landing Page', 'lms'); ?></h6>
                    
                      <div class="column one-fifth">
                          <?php $checked = ( "true" ==  dttheme_option('general','enable-landingpage-sticky-nav') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','enable-landingpage-sticky-nav') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-enable-landingpage-sticky-nav" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-enable-landingpage-sticky-nav" name="mytheme[general][enable-landingpage-sticky-nav]" type="checkbox" 
                            value="true" <?php echo "{$checked}";?> />
                        </div>
                        
                        <div class="column four-fifth last">
                            <p class="note"><?php esc_html_e('YES! to enable sticky navigation in landing page.', 'lms');?> </p>
                        </div>
                        
                        <div class="clear"> </div>
                        <div class="hr"></div>


                      <h6> <?php esc_html_e('Globally Disable Comments on Pages', 'lms');?> </h6>
                      <div class="column one-fifth">
                      	<?php $checked = ( "true" ==  dttheme_option('general','disable-page-comment') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','disable-page-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-page-comment" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-global-page-comment" name="mytheme[general][disable-page-comment]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note no-margin"><?php 
							esc_html_e('YES! to disable comments on all the pages. This will globally override your "Allow comments" option under your page "Discussion" settings. ', 'lms');?> </p>
                      </div>
                      <div class="hr"></div>
                      
                      
                        
                      <h6><?php esc_html_e('Globally Disable Comments on Posts', 'lms');?></h6>
                      <div class="column one-fifth">
                      	<?php $checked = ( "true" ==  dttheme_option('general','global-post-comment') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','global-post-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-post-comment" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-global-post-comment" name="mytheme[general][global-post-comment]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note no-margin"><?php 
							esc_html_e('YES! to disable comments on all the posts. This will globally override your "Allow comments" option under your post "Discussion" settings. ', 'lms');?> </p>
                      </div>
                      <div class="hr"></div>
                      

                      <h6><?php esc_html_e('Globally Disable Comments on Portfolios', 'lms');?></h6>
                      <div class="column one-fifth">
                      	<?php $checked = ( "true" ==  dttheme_option('general','disable-portfolio-comment') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','disable-portfolio-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-portfolio-comment" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-global-portfolio-comment" name="mytheme[general][disable-portfolio-comment]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                      </div>
                      
                      <div class="column four-fifth last">
                      	<p class="note"><?php esc_html_e('Enable/ Disable comments on portfolio pages.', 'lms');?> </p>
                      </div>
                      <div class="hr"></div>


                      <h6><?php echo sprintf(esc_html__('Globally Disable Comments on %s', 'lms'), $GLOBALS['teachers-plural-label']); ?></h6>
                      <div class="column one-fifth">
                        	<?php $checked = ( "true" ==  dttheme_option('general','disable-teacher-comment') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','disable-teacher-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-teacher-comment" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-global-teacher-comment" name="mytheme[general][disable-teacher-comment]" type="checkbox" 
                            value="true" <?php echo "{$checked}";?> />
                        </div>
                        <div class="column four-fifth last">
                        	<p class="note"><?php echo sprintf(esc_html__('Enable/ Disable comments on %s pages.', 'lms'), strtolower($GLOBALS['teachers-singular-label'])); ?> </p>
                        </div>
                        <div class="hr"></div>
                        
                        
                      <h6><?php esc_html_e('Globally Disable Comments on Courses', 'lms');?></h6>
                      <div class="column one-fifth">
                        	<?php $checked = ( "true" ==  dttheme_option('general','disable-courses-comment') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','disable-courses-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-courses-comment" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-global-courses-comment" name="mytheme[general][disable-courses-comment]" type="checkbox" 
                            value="true" <?php echo "{$checked}";?> />
                        </div>
                        <div class="column four-fifth last">
                        	<p class="note"><?php esc_html_e('Enable/ Disable comments on course pages.', 'lms');?> </p>
                        </div>
                        <div class="hr"></div>

                      <h6><?php esc_html_e('Globally Disable Comments on Lessons', 'lms');?></h6>
                      <div class="column one-fifth">
                        	<?php $checked = ( "true" ==  dttheme_option('general','disable-lessons-comment') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','disable-lessons-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-lessons-comment" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-global-lessons-comment" name="mytheme[general][disable-lessons-comment]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                        </div>
                        <div class="column four-fifth last">
                        	<p class="note"><?php esc_html_e('Enable/ Disable comments on lessons pages.', 'lms');?> </p>
                        </div>
                        <div class="hr"></div>

                      <h6><?php esc_html_e('Globally Disable Ratings on Courses', 'lms');?></h6>
                      <div class="column one-fifth">
                        	<?php $checked = ( "true" ==  dttheme_option('general','disable-ratings-courses') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','disable-ratings-courses') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-ratings-courses" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-global-ratings-courses" name="mytheme[general][disable-ratings-courses]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                        </div>
                        <div class="column four-fifth last">
                        	<p class="note"><?php esc_html_e('Enable/ Disable ratings on courses pages.', 'lms');?> </p>
                        </div>
                        <div class="hr"></div>
                        
                      <h6><?php esc_html_e('Globally Disable Ratings on Classes', 'lms');?></h6>
                      <div class="column one-fifth">
                        	<?php $checked = ( "true" ==  dttheme_option('general','disable-ratings-classes') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','disable-ratings-classes') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-ratings-classes" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-global-ratings-classes" name="mytheme[general][disable-ratings-classes]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                        </div>
                        <div class="column four-fifth last">
                        	<p class="note"><?php esc_html_e('Enable/ Disable ratings on classes pages.', 'lms');?> </p>
                        </div>
                        <div class="hr"></div>
                        
                      <h6><?php esc_html_e('Globally Disable Breadcrumb Section', 'lms');?></h6>
                      <div class="column one-fifth">
                        	<?php $checked = ( "true" ==  dttheme_option('general','disable-breadcrumb-section-globally') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','disable-breadcrumb-section-globally') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-disable-breadcrumb-section-globally" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-disable-breadcrumb-section-globally" name="mytheme[general][disable-breadcrumb-section-globally]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                        </div>
                        <div class="column four-fifth last">
                        	<p class="note"><?php esc_html_e('Enable/ Disable breadcrumbs section completely for all pages here.', 'lms');?> </p>
                        </div>
                        <div class="hr"></div>

                      <h6><?php esc_html_e('Globally Disable Breadcrumb', 'lms');?></h6>
                      <div class="column one-fifth">
                        	<?php $checked = ( "true" ==  dttheme_option('general','disable-breadcrumb-globally') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','disable-breadcrumb-globally') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-disable-breadcrumb-globally" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-disable-breadcrumb-globally" name="mytheme[general][disable-breadcrumb-globally]" type="checkbox" value="true" <?php echo "{$checked}";?> />
                        </div>
                        <div class="column four-fifth last">
                        	<p class="note"><?php esc_html_e('Enable/ Disable breadcrumbs for all pages here.', 'lms');?> </p>
                        </div>
                        <div class="hr"></div>

                      <!-- Breadcrumb -->
                      <h6><?php esc_html_e('Breadcrumb Delimiter', 'lms');?></h6>
                      <select id="mytheme-breadcrumb-delimiter" name="mytheme[general][breadcrumb-delimiter]"><?php 
                        $breadcrumb_icons = array('default','fa-angle-double-right','fa-sort','fa-angle-right','fa-caret-right','fa-arrow-right','fa-chevron-right','fa-plus','fa-hand-o-right','fa-arrow-circle-right');
                            foreach($breadcrumb_icons as $breadcrumb_icon):
                                $s = selected(dttheme_option('general','breadcrumb-delimiter'),$breadcrumb_icon,false);
                                echo "<option $s >$breadcrumb_icon</option>";
                            endforeach;?></select>
                            <p class="note"><?php esc_html_e('This is the symbol that will appear in between your breadcrumbs', 'lms');?></p>
                      <div class="hr"></div>
                      <!-- Breadcrumb -->

                      <!-- Breadcrumb Search Box -->
                      <h6><?php esc_html_e('Disable Breadcrumb Search Box', 'lms');?></h6>
                      <div class="column one-fifth">
                        <?php $switchclass = ( "on" ==  dttheme_option('general','disable-breadcrumb-searchbox') ) ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                        <div data-for="mytheme-disable-breadcrumb-searchbox" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-disable-breadcrumb-searchbox" name="mytheme[general][disable-breadcrumb-searchbox]" type="checkbox"<?php checked(dttheme_option('general','disable-breadcrumb-searchbox'),'on');?>/>
                      </div>
                      <div class="column four-fifth last">
                        <p class="note"><?php esc_html_e('Check if you want to disable search box in the breadcrumb :)', 'lms');?> </p>
                      </div>
                      <div class="hr"></div>
                      <!-- Breadcrumb Search Box -->

                      <!-- Browser Scroll -->
                      <h6><?php esc_html_e('Disable browser custom scroll', 'lms');?></h6>
                      <div class="column one-fifth">
                        <?php $switchclass = ( "on" ==  dttheme_option('general','disable-custom-scroll') ) ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                        <div data-for="mytheme-browesr-scroll-disable" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-browesr-scroll-disable" name="mytheme[general][disable-custom-scroll]" type="checkbox"<?php checked(dttheme_option('general','disable-custom-scroll'),'on');?>/>
                      </div>
                      <div class="column four-fifth last">
                        <p class="note"><?php esc_html_e('Check if you do not want disable the browser custom scrollbar :)', 'lms');?> </p>
                      </div>
                      <div class="hr"></div>
                      <!-- Browser Scroll -->
                      
                      <h6><?php esc_html_e('Disable Style Picker', 'lms');?></h6>
                      <div class="column one-fifth">
                      	<?php $switchclass = ( "on" ==  dttheme_option('general','disable-picker') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-disable-picker" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-global-disable-picker" name="mytheme[general][disable-picker]" type="checkbox" <?php checked(dttheme_option('general','disable-picker'),'on');?>/>                      </div>
                      <div class="column four-fifth last">
                      	<p class="note"><?php esc_html_e('YES! to hide the front end style picker', 'lms');?> </p>
                      </div>
                      <div class="hr"></div>

                      <!-- Disable placeholder images -->
                      <h6><?php esc_html_e('Globally disable placeholder images', 'lms');?></h6>
                      <div class="column one-fifth">
                        <?php $switchclass = ( "on" ==  dttheme_option('general','disable-placeholder-images') ) ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                        <div data-for="mytheme-disable-placeholder-images" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-disable-placeholder-images" name="mytheme[general][disable-placeholder-images]" type="checkbox" <?php checked(dttheme_option('general','disable-placeholder-images'),'on');?>/>
                      </div>
                      <div class="column four-fifth last">
                        <p class="note"><?php esc_html_e('Check if you do not want to diaplay placeholder images', 'lms');?> </p>
                      </div>
                      <div class="hr"></div>
                      <!-- Disable placeholder images -->

                      <h6><?php esc_html_e('Phone Number', 'lms');?></h6>
                      <div class="column one-half">
                        <input id="mytheme-google-font-subset" name="mytheme[general][h4-phoneno]" type="text" value="<?php echo dttheme_option('general','h4-phoneno');?>"/>
                      </div>
                      
                      <div class="column one-half last">
                        <p class="note no-margin"><?php esc_html_e('Specify phone number which is shown at top of header style 3', 'lms'); ?></p>
                      </div>

                      <h6><?php esc_html_e('Email id', 'lms');?></h6>
                      <div class="column one-half">
                        <input id="mytheme-google-font-subset" name="mytheme[general][h4-emailid]" type="text" value="<?php echo dttheme_option('general','h4-emailid');?>"/>
                      </div>
                      
                      <div class="column one-half last">
                        <p class="note no-margin"><?php esc_html_e('Specify email id which is shown at top of header style 3', 'lms'); ?></p>
                      </div>
                      <div class="hr"></div>
                      <h6><?php esc_html_e('Google Font Subset', 'lms');?></h6>
                      <div class="column one-half">
                      	<input id="mytheme-google-font-subset" name="mytheme[general][google-font-subset]" type="text" value="<?php echo dttheme_option('general','google-font-subset');?>"/>
                      </div>
                      
                      <div class="column one-half last">
                      	<p class="note no-margin"><?php esc_html_e('Specify which subsets should be downloaded. Multiple subsets should be separated with coma', 'lms'); ?></p>
                      </div>
                      
                      <div class="clear"> </div>
                      <div class="hr-invisible-small"> </div>
                      <p class="note"><?php esc_html_e('Some of the fonts in the Google Font Directory supports multiple scripts (like Latin and Cyrillic for example). In order to specify which subsets should be downloaded the subset parameter should be appended to the URL. For a complete list of available fonts and font subsets please see', 'lms'); 
							echo " <a href='http://www.google.com/webfonts'>Google Web Fonts</a>";?> </p>
                      <div class="hr"></div>
                      <div class="clear"> </div>
                      
                      <h6><?php esc_html_e('Mailchimp API KEY', 'lms');?></h6>
                      <div class="column one-half">
                      	<input id="mytheme-mailchimp-key" name="mytheme[general][mailchimp-key]" type="text" value="<?php echo dttheme_option('general','mailchimp-key'); ?>" />
                      </div>
                      
                      <div class="column one-half last">
                      	<p class="note no-margin"><?php esc_html_e('Paste your mailchimp api key that will be used by the mailchimp widget.', 'lms'); ?></p>
                      </div>
                       
						<?php 
                        if(dttheme_option('general','mailchimp-key') != '') { 
                            ?>
                        
                            <div class="hr"></div>
                            <div class="clear"> </div>
        
                            <h6><?php esc_html_e('Mailchimp List Id', 'lms');?></h6>
                            <div class="column one-half">
								<?php
                                
                                $list_id = (dttheme_option('general','mailchimp-listid') != '') ? dttheme_option('general','mailchimp-listid') : '';
                                
                                $apiKey = dttheme_option('general','mailchimp-key');						
                                $mailchimp_lists = function_exists('dttheme_mailchimp_list_ids') ? dttheme_mailchimp_list_ids($apiKey) : '';
                                
                                echo '<select id="mytheme-mailchimp-listid" name="mytheme[general][mailchimp-listid]">';
                                foreach ($mailchimp_lists as $key => $value):
                                    $id = $value['id'];
                                    $name = $value['name'];
                                    $selected = ( $list_id == $id ) ? ' selected="selected" ' : '';
                                    echo '<option '.$selected.' value="'.$id.'">'.$name.'</option>';
                                endforeach;
                                echo '</select>';
                                
                                ?>
                            </div>
                            <div class="column one-half last">
                                <p class="note no-margin"><?php esc_html_e('Select your mailchip list id, which will be used in newsletter shortcodes.', 'lms'); ?></p>
                            </div>
                    
                            <?php 
                        } 
                        ?>
                      
                      <div class="hr"></div>
                      <div class="clear"> </div>
                      
                      <h6><?php esc_html_e('Google Map API KEY', 'lms');?></h6>
                      <div class="column one-half">
                      	<input id="mytheme-googlemap-api-key" name="mytheme[general][googlemap-api-key]" type="text" value="<?php echo dttheme_option('general','googlemap-api-key'); ?>" />
                      </div>
                      
                      <div class="column one-half last">
                      	<p class="note no-margin"><?php esc_html_e('Paste your google map api key here.', 'lms'); ?></p>
                      </div>
                        
                    </div>                                            
                    
            </div><!-- .bpanel-box end-->
        </div><!--my-general end-->
        
        
        <!-- my-sociable-->
        <div id="my-sociable" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
            
                <div class="box-title">
                	<h3><?php esc_html_e('Sociable', 'lms');?></h3>
                </div><!-- .box-title -->

                <div class="box-content">
                    <div class="bpanel-option-set">
                         <h6><?php esc_html_e('Show Sociable', 'lms');?></h6>
                         
                         <div class="column one-fifth">
							 <?php $switchclass = ( "on" ==  dttheme_option('general','show-sociables') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                             <div data-for="mytheme-show-sociables" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                             <input class="hidden" id="mytheme-show-sociables" name="mytheme[general][show-sociables]" type="checkbox" 
                             <?php checked(dttheme_option('general','show-sociables'),'on');?>/>
                         </div>
                         
                         <input type="button" value="<?php esc_attr_e('Add New Sociable', 'lms');?>" class="black mytheme_add_item" />
                         
                         <div class="column four-fifth last">
                             <p class="note"> <?php esc_html_e('Manage Social Icons here which will be displayed in footer', 'lms');?> </p>
                         </div>
                         
                         <div class="hr_invisible"></div>
                    </div>
                    
                    <div class="bpanel-option-set">
                        <ul class="menu-to-edit disable-sorting">
                        <?php $socials = dttheme_option('social');
        						      if(is_array($socials)): 
        							  	$keys = array_keys($socials);

        								$i=0;
        						 	  foreach($socials as $s):?>
                          <li id="<?php echo esc_attr( $keys[$i] );?>">
                            <div class="item-bar">
                              <span class="item-title"><?php
                               if( array_key_exists('icon', $s)) {
									$n = $s['icon']; 
									$n = explode('-',$n);

									$k = 0; $title = '';
									foreach($n as $x) {
										if($k != 0) $title .= ' '.ucfirst($x); 	
										$k++;
									}
									echo "{$title}";
							   }
								?></span>

                                <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'lms');?></a></span>
                            </div>

                            <div class="item-content" style="display: none;">
                              <span><label><?php esc_html_e('Sociable Icon', 'lms');?></label>
                              <?php echo dttheme_sociables_selection($keys[$i],$s['icon']);?></span>
                              <span>
                                <label><?php esc_html_e('Sociable Link', 'lms');?></label>
                                <input type="text" class="social-link" name="mytheme[social][<?php echo esc_attr( $keys[$i] );?>][link]" value="<?php echo esc_attr( $s['link'] );?>"/>
                              </span>

                              <div class="remove-cancel-links">
                                <span class="remove-item"><?php esc_html_e('Remove', 'lms');?></span>
                                <span class="meta-sep"> | </span>
                                <span class="cancel-item"><?php esc_html_e('Cancel', 'lms');?></span>
                              </div>
                            </div>
                          </li>
                        <?php $i++;endforeach; endif;?> 
                        </ul>
                        
                        <ul class="sample-to-edit" style="display:none;">
                        	<!-- Social Item -->
                            <li>
                            	<!-- .item-bar -->
                            	<div class="item-bar">
                                	<span class="item-title"><?php esc_html_e('Sociable', 'lms');?></span>
                                    <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'lms');?></a></span>
                                </div><!-- .item-bar -->
                                <!-- .item-content -->
                                <div class="item-content">                                
                                	<span><label><?php esc_html_e('Sociable Icon', 'lms');?></label><?php echo dttheme_sociables_selection();?></span>
                                    <span><label><?php esc_html_e('Sociable Link', 'lms');?></label><input type="text" class="social-link" /></span>
                                    
                                    <div class="remove-cancel-links">
                                        <span class="remove-item"><?php esc_html_e('Remove', 'lms');?></span>
                                        <span class="meta-sep"> | </span>
                                        <span class="cancel-item"><?php esc_html_e('Cancel', 'lms');?></span>
                                    </div>
                                </div><!-- .item-content end -->
                            </li><!-- Social Item End-->
                        </ul>
                        
                    </div>
                </div> <!-- .box-content -->    
            </div><!-- .bpanel-box end -->
        </div><!--my-sociable end-->
        
       
        <!-- my-global-->
        <div id="my-global" class="tab-content">
            <div class="bpanel-box">
                <div class="box-title">
                	<h3><?php esc_html_e('Global Settings', 'lms');?></h3>
                </div>
                <div class="box-content">
                
                    <div class="bpanel-option-set">
                        <h6><?php esc_html_e('Disable Theme Default Courses', 'lms');?></h6>
                        <?php dttheme_switch("",'general','disable-theme-default-courses');?>
                        <p class="note"> <?php esc_html_e('If you wish you can disable theme default courses.', 'lms');?>  </p>
                    </div>
                    
                    <div class="hr_invisible"> </div>
                    
                    <div class="bpanel-option-set">
                        <div class="column one-third"><label><?php esc_html_e('Payment Method', 'lms');?></label></div>
                        <div class="column two-third last">
                            <?php
                            $payment_options = array('s2member' => 's2Member');
							if( function_exists( 'is_woocommerce' ) ) {
								$payment_options['woocommerce'] = 'WooCommerce';
							}
                            $payment_method = dttheme_option('general','payment-method') != '' ? dttheme_option('general','payment-method') : 's2member';
                             ?>
                            <select id="mytheme-payment-method" name="mytheme[general][payment-method]">
                            <?php 
                            foreach ($payment_options as $key => $value):
                                $selected = ( $key == $payment_method ) ? ' selected="selected" ' : '';
                                echo '<option '.$selected.' value="'.$key.'">'.$value.'</option>';
                             endforeach;
                             ?>
                            </select>                         
                            <p class="note"><?php esc_html_e('Please choose payment method you like to use theme default courses.', 'lms');?></p>
                            <p class="note"><strong><?php esc_html_e('Please make sure you have activated corresponding plugins before choosing option here.', 'lms');?></strong></p>
                         </div>
                    </div>   

                    <div class="hr_invisible"> </div>

                    <div class="bpanel-option-set">
                        <h6><?php esc_html_e('Filter Items', 'lms');?></h6>
                        <?php dttheme_switch("",'general','filter-items');?>
                        <p class="note"> <?php esc_html_e('Will allow teachers to view only their courses, lessons,... ( in dropdown ) while adding content.', 'lms');?>  </p>
                    </div> 
                </div> 
            </div>
        
        
            <div class="bpanel-box">
                <div class="box-title">
                	<h3><?php esc_html_e('Global Page Layouts', 'lms');?></h3>
                </div>
                <div class="box-content">
                
                    <div class="bpanel-option-set">
                        <h6><?php esc_html_e('Force to Enable Global Page Layout', 'lms');?></h6>
                        <?php dttheme_switch("",'general','force-enable-global-layout');?>
                        <p class="note"> <?php esc_html_e('Enable or Disable global page layout ("Disaplay Everywhere" sidebar) for all pages, posts, archive pages.', 'lms');?>  </p>
                    </div>
                    <div class="clear"> </div>
                    <div class="hr"> </div>
                
                    <div class="bpanel-option-set">
                        <ul class="bpanel-post-layout bpanel-layout-set" id="dt-global-page">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar','both-sidebar'=>'both-sidebar');
                        foreach($layout as $key => $value):
                            $class = ( $key ==  dttheme_option('general',"global-page-layout")) ? " class='selected' " : "";
                            echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
                        endforeach; ?>
                        </ul>
                        <input id="mytheme[general][global-page-layout]" name="mytheme[general][global-page-layout]" type="hidden" value="<?php echo dttheme_option('general',"global-page-layout");?>"/>
                    </div>
                        
                </div> 
            </div>
            
            <div class="bpanel-box">
                <div class="box-title">
                	<h3><?php esc_html_e('Login & Registration Pages', 'lms');?></h3>
                </div>
                <div class="box-content">
                
                    <div class="bpanel-option-set">
                        <h6><?php esc_html_e('Login & Registration Pages Option', 'lms');?></h6>
                        <?php
						$login_reg_arr = array('default' => 'WordPress Default', 'lms-default-profile' => 'LMS Theme - Default Profile');
						if(function_exists('bp_is_active')) {
							$login_reg_arr['lms-buddypress-profile'] = 'LMS Theme - BuddyPress Profile';
						}
						if( function_exists( 'is_woocommerce' ) ) {
							$login_reg_arr['woocommerce'] = 'WooCommerce Plugin';
						}
						if( defined('WS_PLUGIN__S2MEMBER_VERSION') ) {
							$login_reg_arr['s2member'] = 's2Member Plugin';
						}
						$loginreg_page = (dttheme_option('general','login-registration-page') != '') ? dttheme_option('general','login-registration-page') : '';
						?>
                        <select id="mytheme-login-registration-page" name="mytheme[general][login-registration-page]">
                        	<?php 
							foreach ($login_reg_arr as $key => $value):
                                $selected = ($loginreg_page == $key) ? 'selected="selected"' : '';
                                echo '<option '.$selected.' value="'.$key.'">'.$value.'</option>';
                             endforeach;
							 ?>
                        </select>                         
                        <p class="note"> <?php esc_html_e('Choose which login and registration pages to use.', 'lms');?> </p>
                        <p class="note"> <strong><?php esc_html_e('Notes', 'lms');?></strong> </p>
                        <p class="note"> <strong>1. </strong><?php esc_html_e('If you are going to use "LMS Theme - Default Profile" Login & Registration pages you need to create 2 pages one by choosing "Login Template" and another by choosing "Welcome Template".', 'lms');?> </p>
                        <p class="note"> <strong>2. </strong><?php esc_html_e('If you are going to use "LMS Theme - BuddyPress Profile" Login & Registration pages you need to create a page by choosing "Login Template" and BuddyPress profile page will act as welcome page.', 'lms');?> </p>
                        <p class="note"> <strong>3. </strong><?php esc_html_e('If you are going to use "WooCommerce Plugin" Login & Registration pages make sure you have selected "My Account Page" in Dashboard -> WooCommerce -> Settings -> Accounts -> Account Pages.', 'lms');?> </p>
                        <p class="note"> <strong>4. </strong><?php esc_html_e('If you are going to use "s2Member Plugin" Login & Registration pages you need set following options in s2Member settings.', 'lms');?> </p>
                        <p class="note"> <strong>4. a) </strong><?php esc_html_e('Dashboard -> s2Member -> General Options -> Login/Registration Design -> Enable This Functionality? -> Yes (customize Login/Registration with s2Member).', 'lms');?> </p>
                        <p class="note"> <strong>4. b) </strong><?php esc_html_e('Dashboard -> s2Member -> General Options -> Login Welcome Page -> choose login welcome page here.', 'lms');?> </p>
                        <p class="note"> <strong>5. </strong><?php esc_html_e('Also its necessary to disable s2Member settings mentioned above, than only "WordPress Default", "LMS Theme - Default Profile" and "LMS Theme - BuddyPress Profile" options will take effect. ', 'lms');?> </p>


                    </div>
                
                </div> 
            </div>
            
            <div class="bpanel-box">
                <div class="box-title">
                	<h3><?php esc_html_e('Teachers', 'lms');?></h3>
                </div>
                <div class="box-content">
                
                    <div class="column one-third"><label><?php esc_html_e('Teachers Singular Label', 'lms');?></label></div>
                    <div class="column two-third last">
                        <input name="mytheme[general][teachers-singular-label]" type="text" class="medium" value="<?php echo trim(stripslashes(dttheme_option('general','teachers-singular-label')));?>" />
                        <p class="note"><?php esc_html_e('Provide teachers singular label here.', 'lms');?></p>
                    </div>
                    <div class="hr"></div>
                    
                    <div class="column one-third"><label><?php esc_html_e('Teachers Plural Label', 'lms');?></label></div>
                    <div class="column two-third last">
                        <input name="mytheme[general][teachers-plural-label]" type="text" class="medium" value="<?php echo trim(stripslashes(dttheme_option('general','teachers-plural-label')));?>" />
                        <p class="note"><?php esc_html_e('Provide teachers plural label here.', 'lms');?></p>
                    </div>
                    <div class="hr"></div>
                    
                    <div class="column one-third"><label><?php esc_html_e('Single Teachers slug', 'lms');?></label></div>
                    <div class="column two-third last">
                        <input name="mytheme[general][single-teachers-slug]" type="text" class="medium" value="<?php echo trim(stripslashes(dttheme_option('general','single-teachers-slug')));?>" />
                        <p class="note"><?php esc_html_e('Do not use characters not allowed in links. Use, eg. classes <br> <b>After change go to Settings > Permalinks and click Save changes.</b>', 'lms');?></p>
                    </div>
                
                </div> 
            </div>
            
            <div class="bpanel-box">
                <div class="box-title">
                	<h3><?php esc_html_e('Social Logins', 'lms');?></h3>
                </div>
                <div class="box-content">
                
                    <div class="bpanel-option-set">
                        <h6><?php esc_html_e('Enable Social Logins', 'lms');?></h6>
                        <?php dttheme_switch("",'general','enable-social-logins');?>
                        <p class="note"> <?php esc_html_e('To enable social login for your site.', 'lms');?>  </p>
                    </div>
                    
                    <div class="hr"></div>
                    
                    <div class="column one-third"><label><?php esc_html_e('Enable Facebook Login', 'lms');?></label></div>
                    <div class="column two-third last">
                        <?php dttheme_switch("",'general','enable-facebook-login');?>
                        <p class="note"> <?php esc_html_e('If you wish you can enable facebook login.', 'lms');?>  </p>
                    </div>
                    
                    <div class="column one-third"><label><?php esc_html_e('App Id', 'lms');?></label></div>
                    <div class="column two-third last">
                        <input name="mytheme[general][facebook-app-id]" type="text" class="large" value="<?php echo trim(stripslashes(dttheme_option('general','facebook-app-id')));?>" />
                        <p class="note"><?php esc_html_e('Add facebook app id here.', 'lms');?></p>
                    </div>
                    
                    <div class="column one-third"><label><?php esc_html_e('App Secret', 'lms');?></label></div>
                    <div class="column two-third last">
                        <input name="mytheme[general][facebook-app-secret]" type="text" class="large" value="<?php echo trim(stripslashes(dttheme_option('general','facebook-app-secret')));?>" />
                        <p class="note"><?php esc_html_e('Add facebook app secret here.', 'lms');?></p>
                    </div>
                    
                    <p class="note"><?php echo sprintf(esc_html__('Add %s as "Site URL" in your facebook app credentials', 'lms'), '<strong>'.site_url().'</strong>'); ?></p>
                    
                    <div class="hr"></div>
                    
                    <div class="column one-third"><label><?php esc_html_e('Enable Google Plus Login', 'lms');?></label></div>
                    <div class="column two-third last">
                        <?php dttheme_switch("",'general','enable-googleplus-login');?>
                        <p class="note"> <?php esc_html_e('If you wish you can enable google plus login.', 'lms');?>  </p>
                    </div>
                    
                    <div class="column one-third"><label><?php esc_html_e('Client Id', 'lms');?></label></div>
                    <div class="column two-third last">
                        <input name="mytheme[general][google-client-id]" type="text" class="large" value="<?php echo trim(stripslashes(dttheme_option('general','google-client-id')));?>" />
                        <p class="note"><?php esc_html_e('Add google client id here.', 'lms');?></p>
                    </div>
                    
                    <div class="column one-third"><label><?php esc_html_e('Client Secret', 'lms');?></label></div>
                    <div class="column two-third last">
                        <input name="mytheme[general][google-client-secret]" type="text" class="large" value="<?php echo trim(stripslashes(dttheme_option('general','google-client-secret')));?>" />
                        <p class="note"><?php esc_html_e('Add google client secret here.', 'lms');?></p>
                    </div>
                    
                    <p class="note"><?php echo sprintf(esc_html__('Add %s as "Authorized redirect URIs" in your google app credentials', 'lms'), '<strong>'.site_url('wp-login.php') . '?dtLMSGoogleLogin=1'.'</strong>'); ?></p>

                </div> 
            </div>
            
                        
        </div>
        <!--my-global end-->
        
        
   </div><!-- .bpanel-main-content end-->
</div><!-- general end