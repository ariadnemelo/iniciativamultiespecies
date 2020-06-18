<?php

    #if Buddypress exists
    if (class_exists('BP_Core_user') && !bp_is_blog_page() ):
        dttheme_bpress_subtitle();
    #If bbPress is installed and we're on a bbPress page.
    elseif ( function_exists( 'is_bbpress' ) && is_bbpress() ):
        dttheme_bpress_subtitle();
    elseif ( is_page() ):
        global $post;
        dttheme_subtitle_section( $post->ID, 'page' );
	elseif( is_post_type_archive('tribe_events') ):
		dttheme_custom_subtitle_section( '', "events-bg");
    elseif( is_post_type_archive('product') ):
        dttheme_subtitle_section( get_option('woocommerce_shop_page_id'), 'page' );
    elseif( is_post_type_archive('dt_portfolios') ):
        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
        $title = esc_html__("Portfolio Archives", 'lms');
        dttheme_custom_subtitle_section( $title, " subtitle-for-archive-term");
    elseif( is_post_type_archive('lesson') ):
		$title = esc_html__("Lesson Archives", 'lms');
		dttheme_custom_subtitle_section( $title, "courses-bg");
    elseif( is_post_type_archive('course') ):
		$title = esc_html__("Course Archives", 'lms');
		dttheme_custom_subtitle_section( $title, "courses-bg");
    elseif( is_post_type_archive('sensei_message') ):
		$title = esc_html__("Message Archives", 'lms');
		dttheme_custom_subtitle_section( $title, "courses-bg");
    elseif( is_post_type_archive('dt_classes') ):
		$title = esc_html__("Classes Archives", 'lms');
		dttheme_custom_subtitle_section( $title, "courses-bg");
    elseif( is_post_type_archive('dt_courses') ):
		$title = esc_html__("Course Archives", 'lms');
		dttheme_custom_subtitle_section( $title, "courses-bg");
    elseif( is_post_type_archive('dt_lessons') ):
		$title = esc_html__("Lesson Archives", 'lms');
		dttheme_custom_subtitle_section( $title, "courses-bg");
    elseif( is_post_type_archive('dt_quizes') ):
		$title = esc_html__("Quizes Archives", 'lms');
		dttheme_custom_subtitle_section( $title, "courses-bg");
    elseif( is_post_type_archive('dt_questions') ):
		$title = esc_html__("Questions Archives", 'lms');
		dttheme_custom_subtitle_section( $title, "courses-bg");
    elseif( is_post_type_archive('dt_assignments') ):
		$title = esc_html__("Assignments Archives", 'lms');
		dttheme_custom_subtitle_section( $title, "courses-bg");
    elseif( is_post_type_archive('dt_gradings') ):
		$title = esc_html__("Gradings Archives", 'lms');
		dttheme_custom_subtitle_section( $title, "courses-bg");
    elseif( is_post_type_archive('dt_certificates') ):
		$title = esc_html__("Certificates Archives", 'lms');
		dttheme_custom_subtitle_section( $title, "courses-bg");
    elseif( is_post_type_archive('dt_teachers') ):
		$title = sprintf(esc_html__('%s Archives', 'lms'), $GLOBALS['teachers-singular-label']);
		dttheme_custom_subtitle_section( $title, 'dark-bg');
    elseif( is_single() ):
        if( is_attachment() ):
        else:
            $post_type = get_post_type();
            if( $post_type === 'post' )   {
                dttheme_subtitle_section( $post->ID, 'post' );
            }elseif(  $post_type === "dt_teachers"  ) {
                dttheme_subtitle_section( $post->ID, 'dt_teachers' );
            }elseif(  $post_type === "dt_classes"  ) {
                $title = get_the_title($post->ID);
                dttheme_custom_subtitle_section( $title, 'classes-subtitle' );
            }elseif(  $post_type === "dt_courses"  ) {
                dttheme_subtitle_section( $post->ID, 'dt_courses' );
            }elseif(  $post_type === "dt_lessons"  ) {
                dttheme_subtitle_section( $post->ID, 'dt_lessons' );
            }elseif(  $post_type === "dt_quizes"  ) {
                $title = get_the_title($post->ID);
                dttheme_custom_subtitle_section( $title, 'quizzes-subtitle' );                
            }elseif(  $post_type === "dt_questions"  ) {
                $title = get_the_title($post->ID);
                dttheme_custom_subtitle_section( $title, 'questions-subtitle' );
            }elseif(  $post_type === "dt_assignments"  ) {
                $title = get_the_title($post->ID);
                dttheme_custom_subtitle_section( $title, 'assignments-subtitle' );                
            }elseif(  $post_type === "dt_gradings"  ) {
                $title = get_the_title($post->ID);
                dttheme_custom_subtitle_section( $title, 'gradings-subtitle' );                
            }elseif(  $post_type === "dt_certificates"  ) {
                $title = get_the_title($post->ID);
                dttheme_custom_subtitle_section( $title, 'certificates-subtitle' );                 
            }elseif(  $post_type === "course"  ) {
                $title = get_the_title($post->ID);
                dttheme_custom_subtitle_section( $title, 'course' );                 
            }elseif(  $post_type === "lesson"  ) {
                $title = get_the_title($post->ID);
                dttheme_custom_subtitle_section( $title, 'lesson' );
            }elseif(  $post_type === "quiz"  ) {
                $title = get_the_title($post->ID);
                dttheme_custom_subtitle_section( $title, 'quiz' );                
            }elseif(  $post_type === "dt_portfolios"  ) {
                dttheme_subtitle_section( $post->ID, 'dt_portfolios' );
			} elseif( in_array('events-single', get_body_class()) ) {
				dttheme_custom_subtitle_section( '', "events-bg");
			} elseif( in_array('single-tribe_venue', get_body_class()) ) {
				dttheme_custom_subtitle_section( '', "events-bg");
			} elseif( in_array('single-tribe_organizer', get_body_class()) ) {
				dttheme_custom_subtitle_section( '', "events-bg");
            } elseif( $post_type === "product" ) {
                $title = get_the_title($post->ID);
                $subtitle = esc_html__("Shop", 'lms');
                $icon = "fa-shopping-cart";
                dttheme_custom_subtitle_section( $title, " subtitle-for-single-product");
			}
        endif; 
    elseif( is_tax() ):
        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
        $title = esc_html__("Term Archives", 'lms');
        dttheme_custom_subtitle_section( $title, " subtitle-for-archive-term");
    elseif( is_category( ) ):
        $title = esc_html__("Category Archives", 'lms');
        dttheme_custom_subtitle_section( $title, " subtitle-for-archive-categories");
    elseif( is_tag() ):
        $title = esc_html__("Tag Archives", 'lms');
        dttheme_custom_subtitle_section( $title, " subtitle-for-archive-tags");
    elseif( is_month() ):
        $title = esc_html__("Monthly Archives", 'lms');
        dttheme_custom_subtitle_section( $title, " subtitle-for-archive-month");
    elseif( is_year() ):
        $title = esc_html__("Yearly Archives", 'lms');
        dttheme_custom_subtitle_section( $title, " subtitle-for-archive-year");
    elseif(is_day() || is_time()):
    elseif( is_author() ):
        $curauth = get_user_by('slug',get_query_var('author_name')) ;
        $title  = esc_html__("Author Archives", 'lms');
        dttheme_custom_subtitle_section( $title, " subtitle-for-archive-author");
	elseif(in_array('events-archive', get_body_class())):
		dttheme_custom_subtitle_section( '', "events-bg");
    elseif( is_search() ):
        $title  = esc_html__("Search Result for ", 'lms').get_search_query();
        dttheme_custom_subtitle_section( $title, " subtitle-for-search");
    elseif( is_404() ):
        $title  = esc_html__("Lost ", 'lms');
        dttheme_custom_subtitle_section( $title, " subtitle-for-404");
	elseif(in_array('learner-profile', get_body_class())):
        $title  = esc_html__("Learner Profile ", 'lms');
        dttheme_custom_subtitle_section( $title, " learner-profile");
	elseif(in_array('course-results', get_body_class())):
        $title  = esc_html__("Course Results ", 'lms');
        dttheme_custom_subtitle_section( $title, " course-results");
    endif; ?>