jQuery(document).ready(function($){
	  
	$( 'body' ).delegate( '#courses-type, .courses-type', 'change', function(){	
			
		
		var postid = $(this).attr('data-postid'),
			view_type = $('#dt-course-datas').attr('data-view_type'),
			price_type = $('#dt-course-datas').attr('data-price_type'),
			courses_type = $(this).val(),
			courses_category = $('#dt-course-datas').attr('data-courses_category'),
			filter_classes = $('#dt-course-datas').attr('data-filter_classes'),
			offset = 0,
			curr_page = 1;
			
		if(courses_type == 'popular') {
			
			$('.courses-category').removeAttr('checked');
			$('.courses-category-all').attr('checked', 'checked');
			$('.courses-category').attr('disabled', 'disabled');
			
			$('.course-price-sidebar').removeAttr('checked');
			$('.course-price-sidebar-all').attr('checked', 'checked');
			$('.course-price-sidebar').attr('disabled', 'disabled');
			
			$('.filter-classes').removeAttr('checked');
			$('.filter-classes-all').attr('checked', 'checked');
			$('.filter-classes').attr('disabled', 'disabled');
			
			$('#courses-category').attr('disabled', 'disabled');
			$('#filter-classes').attr('disabled', 'disabled');
			$('a.course-price').removeClass('active');
			$('a.course-price').first().addClass('active');
			$('#courses-category').val('all');
			$('#filter-classes').val('all');
			
			courses_category = 'all';
			price_type = 'all';
			filter_classes = '';
			
		} else {
			
			$('.courses-category').removeAttr('disabled');
			$('.filter-classes').removeAttr('disabled');
			$('.course-price-sidebar').removeAttr('disabled');
			$('#courses-category').removeAttr('disabled');
			$('#filter-classes').removeAttr('disabled');
			
		}
		
		loadCourses(postid, view_type, price_type, courses_type, courses_category, filter_classes, offset, curr_page);

		return false;
		
	});
	
	$( 'body' ).delegate( '#courses-category, .courses-category', 'change', function(){	
		
		if($(this).hasClass('courses-category')) {
						
			if($(this).hasClass('courses-category-all')) {
				
				var courses_category_value = 'all';
				$('.courses-category:not(.courses-category-all)').removeAttr('checked');
				
			} else {
				
				$('.courses-category-all').removeAttr('checked');
				
				var courses_category_value = $('.courses-category:checked').map(function(){
					return this.value;
				}).get();
				
				if (courses_category_value.length === 0) {
					$('.courses-category-all').attr('checked', 'checked');
				}
			
			}
			
		} else {
			
			var courses_category_value = $(this).val();
			
		}
		
		var postid = $(this).attr('data-postid'),
			view_type = $('#dt-course-datas').attr('data-view_type'),
			price_type = $('#dt-course-datas').attr('data-price_type'),
			courses_type = $('#dt-course-datas').attr('data-courses_type'),
			courses_category = courses_category_value,
			filter_classes = $('#dt-course-datas').attr('data-filter_classes'),
			offset = 0,
			curr_page = 1;
		
		loadCourses(postid, view_type, price_type, courses_type, courses_category, filter_classes, offset, curr_page);

		return false;
		
	});
	
	$( 'body' ).delegate( '#filter-classes, .filter-classes', 'change', function(){	
		
		if($(this).hasClass('filter-classes')) {
						
			if($(this).hasClass('filter-classes-all')) {
				
				var filter_classes_value = 'all';
				$('.filter-classes:not(.filter-classes-all)').removeAttr('checked');
				
			} else {
				
				$('.filter-classes-all').removeAttr('checked');
				
				var filter_classes_value = $('.filter-classes:checked').map(function(){
					return this.value;
				}).get();
				
				if (filter_classes_value.length === 0) {
					$('.filter-classes-all').attr('checked', 'checked');
				}
			
			}
			
		} else {
			
			var filter_classes_value = $(this).val();
			
		}
		
		var postid = $(this).attr('data-postid'),
			view_type = $('#dt-course-datas').attr('data-view_type'),
			price_type = $('#dt-course-datas').attr('data-price_type'),
			courses_type = $('#dt-course-datas').attr('data-courses_type'),
			courses_category = $('#dt-course-datas').attr('data-courses_category'),
			filter_classes = filter_classes_value,
			offset = 0,
			curr_page = 1;

		loadCourses(postid, view_type, price_type, courses_type, courses_category, filter_classes, offset, curr_page);

		return false;
		
	});
  
	$( 'body' ).delegate( '.course-price', 'click', function(){	
	
		if($('#dt-course-datas').attr('data-courses_type') == 'popular') {
			return false;
		}
			
		$('a.course-price').removeClass('active');
		$(this).addClass('active');
		
		var postid = $(this).attr('data-postid'),
			view_type = $('#dt-course-datas').attr('data-view_type'),
			price_type = $(this).attr('data-price_type'),
			courses_type = $('#dt-course-datas').attr('data-courses_type'),
			courses_category = $('#dt-course-datas').attr('data-courses_category'),
			filter_classes = $('#dt-course-datas').attr('data-filter_classes'),
			offset = 0,
			curr_page = 1;
		
		loadCourses(postid, view_type, price_type, courses_type, courses_category, filter_classes, offset, curr_page);
			
		return false;
		
	});

	$( 'body' ).delegate( '.course-price-sidebar', 'change', function(){	
			
		var postid = $(this).attr('data-postid'),
			view_type = $('#dt-course-datas').attr('data-view_type'),
			price_type = $(this).val(),
			courses_type = $('#dt-course-datas').attr('data-courses_type'),
			courses_category = $('#dt-course-datas').attr('data-courses_category'),
			filter_classes = $('#dt-course-datas').attr('data-filter_classes'),
			offset = 0,
			curr_page = 1;
		
		loadCourses(postid, view_type, price_type, courses_type, courses_category, filter_classes, offset, curr_page);
			
		return false;
		
	});
	
	
	$( 'body' ).delegate( '.course-layout', 'click', function(){	
			
		$('a.course-layout').removeClass('active');
		$(this).addClass('active');
		
		var postid = $(this).attr('data-postid'),
			view_type = $(this).attr('data-view_type'),
			price_type = $('#dt-course-datas').attr('data-price_type'),
			courses_type = $('#dt-course-datas').attr('data-courses_type'),
			courses_category = $('#dt-course-datas').attr('data-courses_category'),
			filter_classes = $('#dt-course-datas').attr('data-filter_classes'),
			offset = $('#dt-course-datas').attr('data-offset'),
			curr_page = $('#dt-course-datas').attr('data-curr_page');
		
		loadCourses(postid, view_type, price_type, courses_type, courses_category, filter_classes, offset, curr_page);
			
		return false;
		
	});

	$( 'body' ).delegate( '#ajax_tpl_course_content .pagination a', 'click', function(){	
			
		var postid = $('#dt-course-datas').attr('data-postid'),
			view_type = $('#dt-course-datas').attr('data-view_type'),
			price_type = $('#dt-course-datas').attr('data-price_type'),
			courses_type = $('#dt-course-datas').attr('data-courses_type'),
			courses_category = $('#dt-course-datas').attr('data-courses_category'),
			filter_classes = $('#dt-course-datas').attr('data-filter_classes'),
			postperpage = $('#dt-course-datas').attr('data-postperpage'),
			curr_page = $(this).text();
			
		if($(this).hasClass('dt-prev')) {
			curr_page = parseInt($(this).attr('cpage'))-1;
		} else if($(this).hasClass('dt-next')) {
			curr_page = parseInt($(this).attr('cpage'))+1;
		}
			
		if(curr_page == 1) { var offset = 0; }
		else if(curr_page > 1) { var offset = ((curr_page-1)*postperpage); }
		
		loadCourses(postid, view_type, price_type, courses_type, courses_category, filter_classes, offset, curr_page);
			
		return false;
			
	});
	
	
	function loadCourses(postid, view_type, price_type, courses_type, courses_category, filter_classes, offset, curr_page) {
	
		if (jQuery('body').hasClass('post-type-archive-dt_courses')) {
			var course_page_type = 'archive';
		} else if (jQuery('body').hasClass('tax-course_category')) {
			var course_page_type = 'tax-archive';
		} else if (jQuery('body').hasClass('page-template page-template-tpl-courses-php')) {
			var course_page_type = 'template';
		}
		
		$.ajax({
			type: "POST",
			url: mytheme_urls.url + '/wp-content/themes/' + mytheme_urls.themeName + '/framework/courses_utils.php',
			data:
			{
				post_id: postid,
				view_type: view_type,
				price_type: price_type,
				courses_type: courses_type,
				courses_category: courses_category,
				filter_classes: filter_classes,
				offset: offset,
				curr_page: curr_page,
				course_page_type: course_page_type,
				lang: mytheme_urls.lang,
				dtLMSAjaxNonce: mytheme_urls.dtLMSAjaxNonce
			},
			beforeSend: function(){
				$('#dt-sc-ajax-load-image').show();
				$('#ajax_tpl_course_content').addClass('dt-sc-ajax-loader');
			},
			error: function (xhr, status, error) {
				$('#ajax_tpl_course_content').html('Something went wrong!');
			},
			success: function (response) {
				$('#ajax_tpl_course_content').html(response);
				  // This script is to load the ratings section in the course listing page.
			},
			complete: function(){
				$('#dt-sc-ajax-load-image').hide();
				$('#ajax_tpl_course_content').removeClass('dt-sc-ajax-loader');
			} 
		});
	
	}
	
	
	// Dashboard 
	
	$( 'body' ).delegate( '#dt-sc-dashboard-user-mycourseslist .pagination a', 'click', function(){
			
		var curr_page = $(this).text();	
		if($(this).hasClass('dt-prev'))
			curr_page = parseInt($(this).attr('cpage'))-1;
		else if($(this).hasClass('dt-next'))
			curr_page = parseInt($(this).attr('cpage'))+1;
		else			
			curr_page = parseInt(curr_page);
			
		jQuery.ajax({
			type: "POST",
			url: mytheme_urls.ajaxurl,
			data:
			{
				action: 'dt_dashboard_user_mycourseslist',
				curr_page: curr_page,
				dtLMSAjaxNonce: mytheme_urls.dtLMSAjaxNonce
			},
			beforeSend: function(){
				$('#dt-sc-ajax-load-image').show();
			},
			error: function (xhr, status, error) {
				$('#dt-sc-dashboard-user-mycourseslist').html('Something went wrong!');
			},
			success: function (response) {
				$('#dt-sc-dashboard-user-mycourseslist').html(response);
				$('.dt-sc-toggle').toggle(function(){ $(this).addClass('active'); },function(){ $(this).removeClass('active'); });
				$('.dt-sc-toggle').on('click',function(){ $(this).next('.dt-sc-toggle-content').slideToggle(); });
			},
			complete: function(){
				$('#dt-sc-ajax-load-image').hide();
			} 
		});

		return false;
		
	});
	
	$( 'body' ).delegate( '.dt-sc-join-group', 'click', function(){
		
		var studentid = $(this).attr('data-studentid'),
			groupid = $(this).attr('data-groupid');	
			
		jQuery.ajax({
			type: "POST",
			url: mytheme_urls.ajaxurl,
			data:
			{
				action: 'dt_user_join_group_request',
				studentid: studentid,
				groupid: groupid,
				dtLMSAjaxNonce: mytheme_urls.dtLMSAjaxNonce
			},
			beforeSend: function(){
				$('#dt-sc-ajax-load-image').show();
			},
			success: function (response) {
				if(response == 1) {
					$( ".dt-sc-join-group" ).replaceWith( '<div class="dt-sc-course-completed"><span class="fa fa-check-circle"></span>' + DtCustomObject.joinedGroup + '</div>' );
				}
			},
			complete: function(){
				$('#dt-sc-ajax-load-image').hide();
			} 
		});

		return false;
		
	});
	
	$( 'body' ).delegate( '#dt-sc-dashboard-user-courses .pagination a', 'click', function(){
			
		var curr_page = $(this).text();	
		if($(this).hasClass('dt-prev'))
			curr_page = parseInt($(this).attr('cpage'))-1;
		else if($(this).hasClass('dt-next'))
			curr_page = parseInt($(this).attr('cpage'))+1;
		else			
			curr_page = parseInt(curr_page);
			
		jQuery.ajax({
			type: "POST",
			url: mytheme_urls.ajaxurl,
			data:
			{
				action: 'dt_dashboard_user_courses',
				curr_page: curr_page,
				dtLMSAjaxNonce: mytheme_urls.dtLMSAjaxNonce
			},
			beforeSend: function(){
				$('#dt-sc-ajax-load-image').show();
			},
			error: function (xhr, status, error) {
				$('#dt-sc-dashboard-user-courses').html('Something went wrong!');
			},
			success: function (response) {
				$('#dt-sc-dashboard-user-courses').html(response);
			},
			complete: function(){
				$('#dt-sc-ajax-load-image').hide();
			} 
		});

		return false;
		
	});
	
	$( 'body' ).delegate( '#dt-sc-dashboard-teacher-courses .pagination a', 'click', function(){
			
		var curr_page = $(this).text();	
		if($(this).hasClass('dt-prev'))
			curr_page = parseInt($(this).attr('cpage'))-1;
		else if($(this).hasClass('dt-next'))
			curr_page = parseInt($(this).attr('cpage'))+1;
		else			
			curr_page = parseInt(curr_page);
			
		jQuery.ajax({
			type: "POST",
			url: mytheme_urls.ajaxurl,
			data:
			{
				action: 'dt_dashboard_teacher_courses',
				curr_page: curr_page,
				dtLMSAjaxNonce: mytheme_urls.dtLMSAjaxNonce
			},
			beforeSend: function(){
				$('#dt-sc-ajax-load-image').show();
			},
			error: function (xhr, status, error) {
				$('#dt-sc-dashboard-teacher-courses').html('Something went wrong!');
			},
			success: function (response) {
				$('#dt-sc-dashboard-teacher-courses').html(response);
			},
			complete: function(){
				$('#dt-sc-ajax-load-image').hide();
			} 
		});

		return false;
		
	});
	
	$( 'body' ).delegate( '#dt-sc-dashboard-user-assignments .pagination a', 'click', function(){
			
		var curr_page = $(this).text();	
		if($(this).hasClass('dt-prev'))
			curr_page = parseInt($(this).attr('cpage'))-1;
		else if($(this).hasClass('dt-next'))
			curr_page = parseInt($(this).attr('cpage'))+1;
		else			
			curr_page = parseInt(curr_page);
			
		jQuery.ajax({
			type: "POST",
			url: mytheme_urls.ajaxurl,
			data:
			{
				action: 'dt_dashboard_user_assignments',
				curr_page: curr_page,
				dtLMSAjaxNonce: mytheme_urls.dtLMSAjaxNonce
			},
			beforeSend: function(){
				$('#dt-sc-ajax-load-image').show();
			},
			error: function (xhr, status, error) {
				$('#dt-sc-dashboard-user-assignments').html('Something went wrong!');
			},
			success: function (response) {
				$('#dt-sc-dashboard-user-assignments').html(response);
			},
			complete: function(){
				$('#dt-sc-ajax-load-image').hide();
			} 
		});

		return false;
		
	});
	
	$( 'body' ).delegate( '#dt-sc-dashboard-teacher-assignments .pagination a', 'click', function(){
			
		var curr_page = $(this).text();	
		if($(this).hasClass('dt-prev'))
			curr_page = parseInt($(this).attr('cpage'))-1;
		else if($(this).hasClass('dt-next'))
			curr_page = parseInt($(this).attr('cpage'))+1;
		else			
			curr_page = parseInt(curr_page);
			
		jQuery.ajax({
			type: "POST",
			url: mytheme_urls.ajaxurl,
			data:
			{
				action: 'dt_dashboard_teacher_assignments',
				curr_page: curr_page,
				dtLMSAjaxNonce: mytheme_urls.dtLMSAjaxNonce
			},
			beforeSend: function(){
				$('#dt-sc-ajax-load-image').show();
			},
			error: function (xhr, status, error) {
				$('#dt-sc-dashboard-teacher-assignments').html('Something went wrong!');
			},
			success: function (response) {
				$('#dt-sc-dashboard-teacher-assignments').html(response);
			},
			complete: function(){
				$('#dt-sc-ajax-load-image').hide();
			} 
		});

		return false;
		
	});
	
	
	// Payments
	
	$( 'body' ).delegate( '.ajax-payment', 'click', function(){	
		
		var paymenttype = $(this).attr('data-paymenttype'),
			level = $(this).attr('data-level'),
			description = $(this).attr('data-description'),
			currency = $(this).attr('data-currency'),
			price = $(this).attr('data-price'),
			period = $(this).attr('data-period'),
			term = $(this).attr('data-term'),
			cbproductno = $(this).attr('data-cbproductno'),
			cbskin = $(this).attr('data-cbskin'),
			cbflowid = $(this).attr('data-cbflowid');
			
		$.ajax({
			type: "POST",
			url: mytheme_urls.url + '/wp-content/themes/' + mytheme_urls.themeName + '/framework/payment_utils.php',
			data:
			{
				paymenttype: paymenttype,
				level: level,
				description: description,
				currency: currency,
				price: price,
				period: period,
				term: term,
				cbproductno: cbproductno,
				cbskin: cbskin,
				cbflowid: cbflowid,
				dtLMSAjaxNonce: mytheme_urls.dtLMSAjaxNonce
			},
			beforeSend: function(){
				$('#dt-sc-ajax-load-image').show();
			},
			error: function (xhr, status, error) {
				$('#payment-ajax-content').html('Something went wrong!');
			},
			success: function (response) {
				$('#payment-ajax-content').html(response);
			},
			complete: function(){
				$('#dt-sc-ajax-load-image').hide();
			} 
		});
			
		return false;
			
	});
  
});