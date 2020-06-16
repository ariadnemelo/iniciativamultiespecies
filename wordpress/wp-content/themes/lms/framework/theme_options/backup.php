<!-- backup -->
<div id="backup" class="bpanel-content">
  <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-backup"><?php esc_html_e("Backup", 'lms');?></a></li>        
        </ul>
        
        <!-- my-responsive start --> 
        <div id="my-backup" class="tab-content">
        	<div class="bpanel-box">
                
                <div class="box-title"><h3><?php esc_html_e('Backup and Restore Options', 'lms');?></h3></div>
                <div class="box-content">
                	<div><?php esc_html_e('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.', 'lms');?></div>
                    <?php $backup = get_option('mytheme_backup');
						  $log = ( is_array( $backup) && array_key_exists('backup',$backup) ) ? $backup['backup'] : esc_html__('No backups yet', 'lms');?>
                    <p><strong><?php  esc_html_e('Last Backup : ', 'lms'); ?><span class="backup-log"><?php echo esc_html( $log ); ?></span></strong></p>
                    
                    <div class="clar"></div>
                    <div class="hr_invisible"></div>
                    <a href="#" id="mytheme_backup_button" class="bpanel-button black-btn" title="<?php esc_attr_e('Backup Options', 'lms');?>"><?php esc_html_e('Backup Options', 'lms');?></a>
                    <a href="#" id="mytheme_restore_button" class="bpanel-button black-btn" title="<?php esc_attr_e('Restore Options', 'lms');?>"><?php esc_html_e('Restore Options', 'lms');?></a>
                </div>
            
            </div>
        </div><!-- my-responsive end -->
        
     </div><!-- .bpanel-main-content end-->   
</div><!-- mobile end -->