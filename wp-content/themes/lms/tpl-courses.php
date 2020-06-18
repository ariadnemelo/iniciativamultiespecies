<?php /*Template Name: Courses Template*/?>
<?php get_header();

	$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
	$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();

	if($GLOBALS['force_enable'] == true) {
		$page_layout = $GLOBALS['page_layout'];
	} else {
		$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
	}
	
	$courses_layout_type = array_key_exists( "courses-layout-type", $tpl_default_settings ) ? $tpl_default_settings['courses-layout-type'] : '';
	
	$show_sidebar = $show_left_sidebar = $show_right_sidebar =  false;
	$sidebar_class = "";

	switch ( $page_layout ) {
		case 'with-left-sidebar':
			$page_layout = "page-with-sidebar with-left-sidebar";
			$show_sidebar = $show_left_sidebar = true;
			$sidebar_class = "secondary-has-left-sidebar";
		break;

		case 'with-right-sidebar':
			$page_layout = "page-with-sidebar with-right-sidebar";
			$show_sidebar = $show_right_sidebar	= true;
			$sidebar_class = "secondary-has-right-sidebar";
		break;

		case 'both-sidebar':
			$page_layout = "page-with-sidebar page-with-both-sidebar";
			$show_sidebar = $show_right_sidebar	= $show_left_sidebar = true;
			$sidebar_class = "secondary-has-both-sidebar";
		break;

		case 'content-full-width':
		default:
			$page_layout = "content-full-width";
		break;
	}
	
	if ( $show_sidebar ):
		if ( $show_left_sidebar ): ?>
			<!-- Secondary Left -->
			<section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar( 'left' );?></section><?php
		endif;
	endif;?>

	<!-- ** Primary Section ** -->
	<section id="primary" class="<?php echo esc_attr( $page_layout );?>">
    	
        <?php
		if(dttheme_option('general', 'disable-theme-default-courses') != 'true') {
			
			if( have_posts() ):
				while( have_posts() ):
					the_post();
					the_content();
				endwhile;
			endif;
			
			if($courses_layout_type == 'type2') {
				?>
                
                <div class="column dt-sc-one-fourth first">
                
                    <div class="dt-sc-courses-sidebar-sorting courses-sorting">
                    
                        <div class="courses-popular-type">
                            <label> <?php echo esc_html__('Filter by :', 'lms'); ?> </label>
                            <ul>
                                <li><input type="radio" name="courses-type" class="courses-type" value="all" data-postid="<?php echo esc_attr( $post->ID ); ?>" checked="checked" /><?php echo esc_html__('All', 'lms'); ?></li>
                                <li><input type="radio" name="courses-type" class="courses-type" value="featured" data-postid="<?php echo esc_attr( $post->ID ); ?>" /><?php echo esc_html__('Featured Courses', 'lms'); ?></li>
                                <?php if(function_exists('the_ratings')) { ?>
                                    <li><input type="radio" name="courses-type" class="courses-type" value="popular" data-postid="<?php echo esc_attr( $post->ID ); ?>" /><?php echo esc_html__('Popular Courses', 'lms'); ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        
                        <div class="courses-categorywise">
                            <label> <?php echo esc_html__('Choose Category :', 'lms'); ?> </label>
                            <ul>
                                <li><input type="checkbox" name="courses-category" class="courses-category courses-category-all" value="all" data-postid="<?php echo esc_attr( $post->ID ); ?>" checked="checked" /><?php echo esc_html__('All', 'lms'); ?></li>
                                <?php 
                                $cats = get_categories('taxonomy=course_category&hide_empty=1');
                                if(isset($cats)) { 
                                    foreach($cats as $cat) {
                                        ?>
                                        <li><input type="checkbox" name="courses-category" class="courses-category" value="<?php echo esc_attr( $cat->term_id ); ?>" data-postid="<?php echo esc_attr( $post->ID ); ?>" /><?php echo esc_html( $cat->name ); ?></li>
                                        <?php 
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        
                        <div class="courses-classwise">
                            <label> <?php echo esc_html__('Choose Class :', 'lms'); ?> </label>
                            <ul>
                                <li><input type="checkbox" name="filter-classes" class="filter-classes filter-classes-all" value="all" data-postid="<?php echo esc_attr( $post->ID ); ?>" checked="checked" /><?php echo esc_html__('All', 'lms'); ?></li>
                                <?php 
                                $class_args = array('posts_per_page' => -1, 'post_type' => 'dt_classes', 'orderby' => 'title', 'order' => 'DESC');
								$classes = get_posts( $class_args );
                                if(count($classes) > 0) { 
                                    foreach($classes as $class) {
										$class_id = $class->ID;
										$class_title = $class->post_title;
										$class_content_options = get_post_meta($class_id, 'dt-class-content-options', true);
										if($class_content_options == 'course') {
											?>
											<li><input type="checkbox" name="filter-classes" class="filter-classes" value="<?php echo esc_attr( $class_id ); ?>" data-postid="<?php echo esc_attr( $post->ID ); ?>" /><?php echo esc_html( $class_title ); ?></li>
											<?php 
										}
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        
                        <div class="courses-price-type">
                            <label> <?php echo esc_html__('By Cost :', 'lms'); ?> </label>
                            <ul>
                                <li><input type="radio" name="course-price-sidebar" class="course-price-sidebar course-price-sidebar-all" value="all" data-postid="<?php echo esc_attr( $post->ID ); ?>" checked="checked" /><?php echo esc_html__('All', 'lms'); ?></li>
                                <li><input type="radio" name="course-price-sidebar" class="course-price-sidebar" value="paid" data-postid="<?php echo esc_attr( $post->ID ); ?>" /><?php echo esc_html__('Paid', 'lms'); ?></li>
                                <li><input type="radio" name="course-price-sidebar" class="course-price-sidebar" value="free" data-postid="<?php echo esc_attr( $post->ID ); ?>" /><?php echo esc_html__('Free', 'lms'); ?></li>
                            </ul>
                        </div>
                         
                    </div>     
                
                </div>
                
                <div class="column dt-sc-three-fourth">
                
                    <div class="courses-view-type">
                        <a class="course-layout course-grid-type active" data-postid="<?php echo esc_attr( $post->ID ); ?>" data-view_type="grid"> <span> </span><?php esc_html_e('Grid', 'lms');?></a>
                        <a class="course-layout course-list-type" data-postid="<?php echo esc_attr( $post->ID ); ?>" data-view_type="list"> <span> </span><?php esc_html_e('List', 'lms');?></a>
                    </div>
                    
                    <div id="dt-sc-ajax-load-image" style="display:none;"><img src="<?php echo IAMD_BASE_URL."images/loading.gif"; ?>"/></div>
                    <div id="ajax_tpl_course_content"></div>
                    
                    <?php
                    wp_link_pages( array('before' => '<div class="page-link">','after' =>'</div>', 'link_before' => '<span>', 'link_after' => '</span>', 'next_or_number' => 'number', 'pagelink' => '%', 'echo' => 1 ) );
                    edit_post_link( esc_html__( ' Edit ', 'lms' ) );					
                    ?>
                
                </div>

                <?php
			} else {
				?>
			
                <div class="courses-sorting">
                
                    <div class="courses-popular-type">
                        <label> <?php echo esc_html__('Filter by :', 'lms'); ?> </label>
                        <select name="courses-type" id="courses-type" data-postid="<?php echo esc_attr( $post->ID ); ?>">
                            <option value="all"><?php echo esc_html__('All', 'lms'); ?></option>
                            <option value="featured"><?php echo esc_html__('Featured Courses', 'lms'); ?></option>
                            <?php if(function_exists('the_ratings')) { ?>
                                <option value="popular"><?php echo esc_html__('Popular Courses', 'lms'); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="courses-categorywise">
                        <label> <?php echo esc_html__('Choose Category :', 'lms'); ?> </label>
                        <select name="courses-category" id="courses-category" data-postid="<?php echo esc_attr( $post->ID ); ?>">
                            <option value="all"><?php echo esc_html__('All', 'lms'); ?></option>
                            <?php 
                            $cats = get_categories('taxonomy=course_category&hide_empty=1');
                            if(isset($cats)) { 
                                foreach($cats as $cat) {?>
                                    <option value="<?php echo esc_attr( $cat->term_id ); ?>"><?php echo esc_html( $cat->name ); ?></option><?php 
                                }
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="courses-classwise">
                        <label> <?php echo esc_html__('Choose Class :', 'lms'); ?> </label>
                        <select name="filter-classes" id="filter-classes" data-postid="<?php echo esc_attr( $post->ID ); ?>">
                            <option value="all"><?php echo esc_html__('All', 'lms'); ?></option>
                            <?php 
                            $class_args = array('posts_per_page' => -1, 'post_type' => 'dt_classes', 'orderby' => 'title', 'order' => 'DESC');
                            $classes = get_posts( $class_args );
                            if(count($classes) > 0) { 
                                foreach($classes as $class) {
                                    $class_id = $class->ID;
                                    $class_title = $class->post_title;
                                    $class_content_options = get_post_meta($class_id, 'dt-class-content-options', true);
                                    if($class_content_options == 'course') {
										?>
										<option value="<?php echo esc_attr( $class_id ); ?>"><?php echo esc_html( $class_title ); ?></option>
										<?php 
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="courses-price-type">
                        <a class="course-price course-all-price active" data-postid="<?php echo esc_attr( $post->ID ); ?>" data-price_type="all"> <span> </span><?php esc_html_e('All', 'lms');?></a>
                        <a class="course-price course-paid-price" data-postid="<?php echo esc_attr( $post->ID ); ?>" data-price_type="paid"> <span> </span><?php esc_html_e('Paid', 'lms');?></a>
                        <a class="course-price course-free-price" data-postid="<?php echo esc_attr( $post->ID ); ?>" data-price_type="free"> <span> </span><?php esc_html_e('Free', 'lms');?></a>
                    </div>
                     
                </div>     
        
                <div class="courses-view-type">
                    <a class="course-layout course-grid-type active" data-postid="<?php echo esc_attr( $post->ID ); ?>" data-view_type="grid"> <span> </span><?php esc_html_e('Grid', 'lms');?></a>
                    <a class="course-layout course-list-type" data-postid="<?php echo esc_attr( $post->ID ); ?>" data-view_type="list"> <span> </span><?php esc_html_e('List', 'lms');?></a>
                </div>
                
                <div id="dt-sc-ajax-load-image" style="display:none;"><img src="<?php echo IAMD_BASE_URL."images/loading.gif"; ?>"/></div>
                <div id="ajax_tpl_course_content"></div>
                
                <?php
                wp_link_pages( array('before' => '<div class="page-link">','after' =>'</div>', 'link_before' => '<span>', 'link_after' => '</span>', 'next_or_number' => 'number', 'pagelink' => '%', 'echo' => 1 ) );
                edit_post_link( esc_html__( ' Edit ', 'lms' ) );		
							
			}
			?>
        
        <?php
		} else {
			echo '<div class="dt-sc-error-box">'.esc_html__('You have disabled theme default courses in Buddha Panel settings. Please enable it.', 'lms').'</div>';
		}
		?>

	</section><!-- ** Primary Section End ** --><?php

	if ( $show_sidebar ):
		if ( $show_right_sidebar ): ?>
			<!-- Secondary Right -->
			<section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar( 'right' );?></section><?php
		endif;
	endif;?>
<?php get_footer(); ?>