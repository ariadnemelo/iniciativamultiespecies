var dtMetabox = {
	dtInit : function() {
		dtMetabox.dtLayoutSelect();
		dtMetabox.dtCustomSwitch();
		dtMetabox.dtImageUploader();
		dtMetabox.dtImageHolder();
		dtMetabox.dtAddVideo();
		dtMetabox.dtCourses();
		dtMetabox.dtClasses();
		dtMetabox.dtSetGPSLocation();
		dtMetabox.dtImport();
	},

	dtLayoutSelect : function() {
		jQuery(".dt-bpanel-layout-set").each(function() {
			jQuery(this).find("a").click(function(e) {

				var $parent = jQuery(this).parents(".dt-bpanel-layout-set");
				var $input = $parent.next(":input");

				if (jQuery(this).hasClass("selected")) {
					jQuery(this).removeClass("selected");
					$input.val("");
				} else {
					$parent.find("a.selected").removeClass("selected");
					$input.val(jQuery(this).attr("rel"));
					jQuery(this).addClass("selected");
				}

				e.preventDefault();
			});
		});
	},

	dtCustomSwitch : function() {
		jQuery("div.dt-checkbox-switch").each(function() {
			jQuery(this).click(function() {
				
				var $ele = '#' + jQuery(this).attr("data-for");

				jQuery(this).toggleClass('checkbox-switch-off checkbox-switch-on');

				if (jQuery(this).hasClass('checkbox-switch-on')) {
					jQuery($ele).attr("checked", "checked");
				} else {
					jQuery($ele).removeAttr("checked");
				}
			});
		});
	},
	
	dtImageUploader: function(){
		var file_frame = "";
		jQuery(".dt-open-media").live('click',function(e){
			e.preventDefault();
			
			// If the media frame already exists, reopen it.
		    if ( file_frame ) {
		      file_frame.open();
		      return;
		    }
		    
		    file_frame = wp.media.frames.file_frame = wp.media({
		    	multiple: true,
		    	title : "Upload / Select Media",
		    	button :{
		    		text : "Insert Image"
		    	}
		    });
		    
		    // When an image is selected, run a callback.
		    file_frame.on( 'select', function() {
		    	// We set multiple to false so only get one image from the uploader
		        var attachments = file_frame.state().get('selection').toJSON();
		        var  holder = "";
		        jQuery.each( attachments,function(key,value){
					var full = value.sizes.full.url;
					var name = value.name;
					var thumbnail = "";
										 
					if(jQuery.type(value.sizes.thumbnail) != "undefined") {
					   thumbnail =  value.sizes.thumbnail.url;
					} else {
					   thumbnail =  full;
					}
					 
		        	 holder += "<li>" +
		        	 		"<img src='"+thumbnail+"'  alt=''/>" +
		        	 		"<span class='dt-image-name' >"+name+"</span>" +
		        	 		"<input type='hidden' class='dt-image-name' name='items_name[]' value='"+name+"' />" +
		        	 		"<input type='hidden' name='items[]' value='"+full+"' />" +
		        	 		"<input type='hidden' name='items_thumbnail[]' value='"+thumbnail+"' />" +
		        	 		"<span class='my_delete'></span>" +
		        	 		"</li>";
		        });
		        
		        jQuery("ul.dt-items-holder").append(holder);
		        
		    });
		    
		    // Finally, open the modal
		    file_frame.open();
		});
	},
	
	dtImageHolder: function() {
		
		jQuery('ul.dt-items-holder').sortable({
			placeholder: 'sortable-placeholder',
			forcePlaceholderSize: true,
			cancel: '.my_delete, input, textarea, label'
		});
		
		jQuery('body').delegate('span.my_delete','click', function(){
			jQuery(this).parent('li').remove();
		});
		
	},
	
	dtAddVideo : function() {
		
		jQuery(".dt-add-video").click(function(e){
			var $video =  "<li>" +
					"<span class='dt-video'></span>" +
					"<input type='text' name='items[]' value='https://vimeo.com/46926279'/>" +
					"<input type='hidden' class='dt-image-name' name='items_name[]' value='video' />" +
					"<input type='hidden' name='items_thumbnail[]' value='https://vimeo.com/46926279' />" +
					"<span class='my_delete'></span>" +
					"</li>";
			jQuery('ul.dt-items-holder').append($video);
			e.preventDefault();
		});
		
	},
	
	dtCourses : function() {
		
		jQuery("a.dt-add-multichoice-answer").click(function(e){
			
			var wrong_ans_cnt = jQuery("div.dt-multichoice-answer-clone").find('#dt_multichoice_answers_cnt').val();
			wrong_ans_cnt = parseInt(wrong_ans_cnt)+1;
			jQuery("div.dt-multichoice-answer-clone").find('#dt_multichoice_answers_cnt').val(wrong_ans_cnt);
			
			jQuery("div.dt-multichoice-answer-clone").find('#dt-multichoice-correct-answer').val(wrong_ans_cnt);
			
			jQuery("div.dt-multichoice-answer-clone").find('#dt-answer-holder').clone().appendTo( "#dt-multichoice-answers-container" );
			
			e.preventDefault();
			
		});	
		
		jQuery('body').delegate('span.dt-remove-multichoice-answer','click', function(e){	
		
			jQuery(this).parents('#dt-answer-holder').remove();
			
			var wrong_ans_cnt = jQuery("div.dt-multichoice-answer-clone").find('#dt_multichoice_answers_cnt').val();
			wrong_ans_cnt = parseInt(wrong_ans_cnt)-1;
			jQuery("div.dt-multichoice-answer-clone").find('#dt_multichoice_answers_cnt').val(wrong_ans_cnt);
			
			var i = 0;
			jQuery('#dt-multichoice-answers-container #dt-multichoice-correct-answer').each(function() {
				jQuery(this).val(i);
				i++;
			});	
			
			e.preventDefault();
			
		});	
		
		jQuery("#dt-multichoice-answers-container").sortable({
			placeholder: 'sortable-placeholder',
			stop: function(event, ui) {
				var i = 0;
				jQuery(this).find('#dt-multichoice-correct-answer').each(function() {
					jQuery(this).val(i);
					i++;
				});	
			}
		});
				
		jQuery("a.dt-add-multichoice-image-answer").click(function(e){
			
			var wrong_ans_cnt = jQuery("div.dt-multichoice-image-answer-clone").find('#dt_multichoice_image_answers_cnt').val();
			wrong_ans_cnt = parseInt(wrong_ans_cnt)+1;
			jQuery("div.dt-multichoice-image-answer-clone").find('#dt_multichoice_image_answers_cnt').val(wrong_ans_cnt);
			
			jQuery("div.dt-multichoice-image-answer-clone").find('#dt-multichoice_image-correct-answer').val(wrong_ans_cnt);
			
			jQuery("div.dt-multichoice-image-answer-clone").find('#dt-answer-holder').clone().appendTo( "#dt-multichoice-image-answers-container" );
			
			e.preventDefault();
			
		});	
		
		jQuery('body').delegate('span.dt-remove-multichoice-image-answer','click', function(e){	
		
			jQuery(this).parents('#dt-answer-holder').remove();
			
			var wrong_ans_cnt = jQuery("div.dt-multichoice-image-answer-clone").find('#dt_multichoice_image_answers_cnt').val();
			wrong_ans_cnt = parseInt(wrong_ans_cnt)-1;
			jQuery("div.dt-multichoice-image-answer-clone").find('#dt_multichoice_image_answers_cnt').val(wrong_ans_cnt);
			
			var i = 0;
			jQuery('#dt-multichoice-image-answers-container #dt-multichoice-image-correct-answer').each(function() {
				jQuery(this).val(i);
				i++;
			});	
			
			e.preventDefault();
			
		});	
		
		jQuery("#dt-multichoice-image-answers-container").sortable({
			placeholder: 'sortable-placeholder',
			stop: function(event, ui) {
				var i = 0;
				jQuery(this).find('#dt-multichoice-image-correct-answer').each(function() {
					jQuery(this).val(i);
					i++;
				});	
			}
		});
		
		jQuery("a.dt-add-multicorrect-answer").click(function(e){
			
			var wrong_ans_cnt = jQuery("div.dt-multicorrect-answer-clone").find('#dt_multicorrect_answers_cnt').val();
			wrong_ans_cnt = parseInt(wrong_ans_cnt)+1;
			jQuery("div.dt-multicorrect-answer-clone").find('#dt_multicorrect_answers_cnt').val(wrong_ans_cnt);
			
			jQuery("div.dt-multicorrect-answer-clone").find('#dt-multicorrect-correct-answer').val(wrong_ans_cnt);
			
			jQuery("div.dt-multicorrect-answer-clone").find('#dt-answer-holder').clone().appendTo( "#dt-multicorrect-answers-container" );
			
			e.preventDefault();
			
		});	
		
		jQuery('body').delegate('span.dt-remove-multicorrect-answer','click', function(e){	
		
			jQuery(this).parents('#dt-answer-holder').remove();
			
			var wrong_ans_cnt = jQuery("div.dt-multicorrect-answer-clone").find('#dt_multicorrect_answers_cnt').val();
			wrong_ans_cnt = parseInt(wrong_ans_cnt)-1;
			jQuery("div.dt-multicorrect-answer-clone").find('#dt_multicorrect_answers_cnt').val(wrong_ans_cnt);
			
			var i = 0;
			jQuery('#dt-multicorrect-answers-container #dt-multicorrect-correct-answer').each(function() {
				jQuery(this).val(i);
				i++;
			});	
			
			e.preventDefault();
			
		});	
		
		jQuery("#dt-multicorrect-answers-container").sortable({
			placeholder: 'sortable-placeholder',
			stop: function(event, ui) {
				var i = 0;
				jQuery('#dt-multicorrect-answers-container #dt-multicorrect-correct-answer').each(function() {
					jQuery(this).val(i);
					i++;
				});	
			}
		});
			
		jQuery('body').delegate('select#dt-question-type','change', function(e){	
			jQuery('.dt-answers').hide();
			jQuery('.dt-' + jQuery(this).val() + '-answers').show();
			e.preventDefault();
		});

		
		jQuery("a.dt-add-questions").click(function(e){
			
			var clone = jQuery("#dt-questions-to-clone").clone();
			
			clone.attr('id', 'dt-question-box').removeClass('hidden');
			clone.find('select').attr('id', 'dt-quiz-question').attr('name', 'dt-quiz-question[]').attr('class', 'dt-new-chosen-select');
			clone.find('input').attr('id', 'dt-quiz-question-grade').attr('name', 'dt-quiz-question-grade[]');
			
			clone.appendTo('#dt-quiz-questions-container');		
			
			jQuery(".dt-new-chosen-select").chosen({
				no_results_text: object.noResult,
			});
			
			e.preventDefault();
			
		});	
		
		jQuery('body').delegate('span.dt-remove-question','click', function(e){	
		
			jQuery(this).parents('#dt-question-box').remove();
			jQuery( "#dt-quiz-question-grade" ).trigger( "change" );
			
			e.preventDefault();
			
		});	
		
		jQuery('body').delegate('#dt-quiz-question-grade', 'change', function(){
			 
			 var total = parseInt(0);
			 jQuery('#dt-quiz-questions-container #dt-question-box').each(function(){
				var ival = jQuery(this).find('#dt-quiz-question-grade').val();
				if(ival == 'NAN' || ival ==''){
					ival = parseInt(0);
				}
				total = parseInt(total) + parseInt(ival);
			 });
			 
			 jQuery("#dt-total-marks-container").find('span').html(total);
			 jQuery("#dt-total-marks-container").find('input[type="hidden"]').val(total);
			 
		});
		 
		jQuery("#dt-quiz-questions-container").sortable({ placeholder: 'sortable-placeholder' });
		
				
		jQuery("div.answer-switch").each(function(){
		  jQuery(this).click(function(){
			  var $ele = '#'+jQuery(this).attr("data-for");
			  var $quesid = jQuery(this).attr("data-quesid");
			  var $grade = jQuery(this).attr("data-grade");
			  var $marksobtained = jQuery('input#dt-marks-obtained').val();
			  var $totalmarks = jQuery('input#dt-total-marks').val();
			  var $marksobtained_percent = 0;
			  
			  jQuery(this).toggleClass('answer-switch-off answer-switch-on');
			  if(jQuery(this).hasClass('answer-switch-on')){
				  jQuery('tr#dt-row-'+$quesid+' #dt-grade-html').html($grade + ' / ' + $grade);
				  $marksobtained = parseInt($marksobtained)+parseInt($grade);
				  $marksobtained_percent = +(($marksobtained/$totalmarks)*100).toFixed(2);
				  
				  jQuery('input#dt-marks-obtained').val($marksobtained);
				  jQuery('input#dt-marks-obtained-percent').val($marksobtained_percent);
				  jQuery('#dt-marks-obtained-html').html('<label>'+$marksobtained+' ('+$marksobtained_percent+'%) </label>');
				  
				  jQuery(this).html('Right');
				  jQuery($ele).attr("checked","checked");
			  }else{
				  jQuery('tr#dt-row-'+$quesid+' #dt-grade-html').html('0 / ' + $grade);
				  $marksobtained = parseInt($marksobtained)-parseInt($grade);
				  $marksobtained_percent = +(($marksobtained/$totalmarks)*100).toFixed(2);
				  
				  jQuery('input#dt-marks-obtained').val($marksobtained);
				  jQuery('input#dt-marks-obtained-percent').val($marksobtained_percent);
				  jQuery('#dt-marks-obtained-html').html('<label>'+$marksobtained+' ('+$marksobtained_percent+'%) </label>');
	
				  jQuery(this).html('Wrong');
				  jQuery($ele).removeAttr("checked");
			  }
			  
		  });
		});
		
		jQuery("a#dt-reset-grade").click(function(e){
			
			if(confirm(objectL10n.resetGrade)){
				
				jQuery('#dt-marks-obtained-html').html('<label>0 (0%)</label>');
				jQuery('#dt-marks-obtained').val(0);
				jQuery('#dt-marks-obtained-percent').val(0);
				
				jQuery('#dt-grading-table td#dt-grade-html').each(function(){
					var grade = parseInt(jQuery(this).attr('data-grade'));
					jQuery(this).html('0 / ' + grade);
				});
				
				jQuery('#dt-grading-table td#dt-grade-field').each(function(){
					jQuery(this).find('.answer-switch').removeAttr('class').addClass('answer-switch answer-switch-off').html('Wrong');
					jQuery(this).find('input').removeAttr('checked').val(false);
				});
				
			}
			
			e.preventDefault();
			
		});
		
		jQuery("a#dt-auto-grade").click(function(e){
			
			var total_grade = 0, marks_obtained = 0;
			
			jQuery('#dt-grading-table tr:not(#dt-first-row)').each(function(){
				
				var correct_answer = jQuery(this).find('td#dt-correct-answer').html();
				var user_answer = jQuery(this).find('td#dt-user-answer').html();
				var grade = parseInt(jQuery(this).find('td#dt-grade-html').attr('data-grade'));
				
				total_grade = parseInt(total_grade)+grade;
				
				if(correct_answer.toLowerCase().replace(new RegExp(/\r?\n|\r|<br>| /g),"") == user_answer.toLowerCase().replace(new RegExp(/\r?\n|\r|<br>| /g),"")) {
					marks_obtained = parseInt(marks_obtained)+grade;
					jQuery(this).find('td#dt-grade-html').html(grade + ' / ' + grade);
					jQuery(this).find('td#dt-grade-field .answer-switch').removeAttr('class').addClass('answer-switch answer-switch-on').html('Right');
					jQuery(this).find('td#dt-grade-field input').attr('checked','checked').val(true);
				} else {
					jQuery(this).find('td#dt-grade-html').html('0 / ' + grade);
					jQuery(this).find('td#dt-grade-field .answer-switch').removeAttr('class').addClass('answer-switch answer-switch-off').html('Wrong');
					jQuery(this).find('td#dt-grade-field input').removeAttr('checked').val(false);
				}
				
			});
			
			var pass_percentage = parseInt(jQuery('#dt-pass-percentage').val());
			var marks_obtained_percent = +((marks_obtained/total_grade)*100).toFixed(2);
			
			jQuery('input#dt-marks-obtained').val(marks_obtained);
			jQuery('input#dt-marks-obtained-percent').val(marks_obtained_percent);
			jQuery('#dt-marks-obtained-html').html('<label>'+marks_obtained+' ('+marks_obtained_percent+'%) </label>');
			
			e.preventDefault();
			
		});
		
		jQuery( 'body' ).delegate( '#dt-setcom-teacher', 'change', function(){	
		
			var teacher_id = jQuery(this).val();
			if(teacher_id != '') {
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data:
					{
						action: 'dt_set_commission',
						teacher_id: teacher_id
					},
					success: function (response) {
						jQuery('#setcommission-container').html(response);
					},
				
				});
			} else {
				jQuery('#setcommission-container').html(jQuery('#teacher-alert').val());
			}
			
		});
		
		jQuery( 'body' ).delegate( '#dt-paycom-teacher', 'change', function(){
				
			var teacher_id = jQuery(this).val();
			if(teacher_id != '') {
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data:
					{
						action: 'dt_pay_commission',
						teacher_id: teacher_id
					},
					success: function (response) {
						jQuery('#paycommission-container').html(response);
						
					},
				
				});
			} else {
				jQuery('#paycommission-container').html(jQuery('#teacher-alert').val());
			}
						
		});
	
		jQuery( 'body' ).delegate( "div.dt-paycom-checkbox-switch", 'click', function(){  
			var $ele = '#'+jQuery(this).attr("data-for");
			var item_id = $ele.replace('#item-','');
			jQuery(this).toggleClass('checkbox-switch-off checkbox-switch-on');
			if(jQuery(this).hasClass('checkbox-switch-on')){
				jQuery($ele).attr("checked","checked");
				var topay = +jQuery('#hid-topay-'+item_id).val();
				var total = +jQuery('#total-amount').val();
				total = (total+topay).toFixed(1);
				jQuery('#total-amount').val(total);
			}else{
				jQuery($ele).removeAttr("checked");
				 var topay = +jQuery('#hid-topay-'+item_id).val();
				 var total = +jQuery('#total-amount').val();
				 total = (total-topay).toFixed(1);
				 jQuery('#total-amount').val(total);
			}
		});
		
		jQuery(".dt-chosen-select").chosen({
			no_results_text: object.noResult,
		});
		
		jQuery('body').delegate('#dt-marks-obtained', 'change', function(){
			 
			 var user_mark = jQuery(this).val();
			 var max_mark = jQuery('#dt-assignment-maximum-mark').val();
			 
			 var percentage = (parseInt(user_mark)/parseInt(max_mark))*100;
			 if(isNaN(percentage)) percentage = 0;
			 percentage = +percentage.toFixed(2);
			 
			 jQuery('#dt-marks-obtained-percentage-html').html('<label>'+percentage+'%</label>');
			 jQuery('#dt-marks-obtained-percent').val(percentage);
			 
		});
		
		jQuery( 'body' ).delegate( "#dt-statistics-courses-container .pagination a", 'click', function(){  
			
			var curr_page = jQuery(this).text();	
			if(jQuery(this).hasClass('dt-prev'))
				curr_page = parseInt(jQuery(this).attr('cpage'))-1;
			else if(jQuery(this).hasClass('dt-next'))
				curr_page = parseInt(jQuery(this).attr('cpage'))+1;
			else			
				curr_page = parseInt(curr_page);
				
				
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data:
				{
					action: 'dt_statistics_courses_pagination',
					curr_page: curr_page
				},
				beforeSend: function(){
					jQuery('#dt-sc-ajax-load-image').show();
				},
				error: function (xhr, status, error) {
					jQuery('#dt-statistics-courses-container').html('Something went wrong!');
				},
				success: function (response) {
					jQuery('#dt-statistics-courses-container').html(response);
				},
				complete: function(){
					jQuery('#dt-sc-ajax-load-image').hide();
				} 
			});
				
			
		});
		
		jQuery( 'body' ).delegate( "#dt-statistics-students-container .pagination a", 'click', function(){  
			
			var curr_page = jQuery(this).text();	
			if(jQuery(this).hasClass('dt-prev'))
				curr_page = parseInt(jQuery(this).attr('cpage'))-1;
			else if(jQuery(this).hasClass('dt-next'))
				curr_page = parseInt(jQuery(this).attr('cpage'))+1;
			else			
				curr_page = parseInt(curr_page);
				
				
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data:
				{
					action: 'dt_statistics_students_pagination',
					curr_page: curr_page
				},
				beforeSend: function(){
					jQuery('#dt-sc-ajax-load-image').show();
				},
				error: function (xhr, status, error) {
					jQuery('#dt-statistics-students-container').html('Something went wrong!');
				},
				success: function (response) {
					jQuery('#dt-statistics-students-container').html(response);
				},
				complete: function(){
					jQuery('#dt-sc-ajax-load-image').hide();
				} 
			});
				
			
		});
		
		jQuery( 'body' ).delegate( "#dt-statistics-teachers-container .pagination a", 'click', function(){  
			
			var curr_page = jQuery(this).text();	
			if(jQuery(this).hasClass('dt-prev'))
				curr_page = parseInt(jQuery(this).attr('cpage'))-1;
			else if(jQuery(this).hasClass('dt-next'))
				curr_page = parseInt(jQuery(this).attr('cpage'))+1;
			else			
				curr_page = parseInt(curr_page);
				
				
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data:
				{
					action: 'dt_statistics_teachers_pagination',
					curr_page: curr_page
				},
				beforeSend: function(){
					jQuery('#dt-sc-ajax-load-image').show();
				},
				error: function (xhr, status, error) {
					jQuery('#dt-statistics-teachers-container').html('Something went wrong!');
				},
				success: function (response) {
					jQuery('#dt-statistics-teachers-container').html(response);
				},
				complete: function(){
					jQuery('#dt-sc-ajax-load-image').hide();
				} 
			});
			
		});
		
		jQuery('.dt-graph-option').hide();
		jQuery('.dt-course-graph').show();
		
		jQuery('body').delegate('#dt-graph-type', 'change', function(){
			
			jQuery('#dt-include-zero-course, #dt-include-zero-teacher, #dt-include-zero-student').removeAttr('checked');
			
			jQuery('.dt-graph-option').hide();
			if(jQuery(this).val() == 'course') jQuery('.dt-course-graph').show();
			else if(jQuery(this).val() == 'teacher') jQuery('.dt-teacher-graph').show();
			else if(jQuery(this).val() == 'student') jQuery('.dt-student-graph').show();
			jQuery( "#dt-statistics-graph-options #dt-graph-generate" ).trigger( "click" );
			
		});
		
		jQuery( 'body' ).delegate( "#dt-statistics-graph-options #dt-graph-generate", 'click', function(){  
		
			if(jQuery('#dt-include-zero-course').attr('checked') == 'checked' || jQuery('#dt-include-zero-teacher').attr('checked') == 'checked' || jQuery('#dt-include-zero-student').attr('checked') == 'checked') var include_zero_sales = 1;
			else var include_zero_sales = 0;
			
			var	graph_type = jQuery('#dt-graph-type').val();

			if(graph_type == 'course') var selectedItems = jQuery('#dt-select-course').val();
			else if(graph_type == 'teacher') var selectedItems = jQuery('#dt-select-teacher').val();
			else if(graph_type == 'student') var selectedItems = jQuery('#dt-select-student').val();
			else  var selectedItems = '';
			
			
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data:
				{
					action: 'dt_statistics_statistics_graph_ajax',
					include_zero_sales: include_zero_sales,
					selectedItems: selectedItems,
					graph_type: graph_type
				},
				beforeSend: function(){
					jQuery('#dt-sc-ajax-load-image').show();
				},
				error: function (xhr, status, error) {
					jQuery('#dt-statistics-graph-container').html('Something went wrong!');
				},
				success: function (response) {
					
					if(response == 'NoData') {
						jQuery('#dt-statistics-graph-container').html(object.noGraph);
					} else {
						
						jQuery('#dt-statistics-graph-container').html(response);
						var dtChart = document.getElementById("dt-chart").getContext("2d");
						window.dtBar = new Chart(dtChart).Bar(dtChartData, {
								responsive : true,
							});
						
					}
						
				},
				complete: function(){
					jQuery('#dt-sc-ajax-load-image').hide();
				} 
			});
			
		});
		
		jQuery("a.dt-add-attachments").click(function(e){
			
			var clone = jQuery("#dt-attachments-clone").clone();
			
			clone.attr('id', 'dt-attachments-holder').attr('class', 'file-upload-container').find('input[type="text"]').attr('name', 'media-attachments[]');
			clone.appendTo('#dt-attachments-container');		
			
			e.preventDefault();
			
		});	
		
		jQuery('body').delegate('span.dt-remove-attacment','click', function(e){	
		
			jQuery(this).parents('#dt-attachments-holder').remove();
			e.preventDefault();
			
		});	
		
		jQuery("#dt-attachments-container").sortable({ placeholder: 'sortable-placeholder' });
		
		
		
		// Script for Settings menu
		jQuery( 'body' ).delegate( "div.dt-settings-checkbox-switch", 'click', function(){  
			var $ele = '#'+jQuery(this).attr("data-for");
			var item_id = $ele.replace('#item-','');
			jQuery(this).toggleClass('checkbox-switch-off checkbox-switch-on');
			if(jQuery(this).hasClass('checkbox-switch-on')) {
				jQuery($ele).attr("checked","checked");
			} else {
				jQuery($ele).removeAttr("checked");
			}
		});
		
		
		// Assign students to course
		jQuery( 'body' ).delegate( '#dt-settings-course', 'change', function(){
				
			var course_id = jQuery(this).val();
			if(course_id != '') {
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data:
					{
						action: 'dt_assign_students',
						course_id: course_id,
						post_per_page: 10,
						curr_page: 1
					},
					beforeSend: function(){
						jQuery('#dt-sc-ajax-load-image').show();
					},
					error: function (xhr, status, error) {
						jQuery('#assignstudent-settings-container').html('Something went wrong!');
					},
					success: function (response) {
						jQuery('#assignstudent-settings-container').html(response);
					},
					complete: function(){
						jQuery('#dt-sc-ajax-load-image').hide();
					} 
				});
			} else {
				jQuery('#assignstudent-settings-container').html(jQuery('#course-alert').val());
			}
						
		});
		
		jQuery( 'body' ).delegate( "#assignstudent-settings-container .pagination a", 'click', function(){  
		
			var course_id = jQuery('#dt-settings-course').val();
			
			var curr_page = jQuery(this).text();	
			if(jQuery(this).hasClass('dt-prev')) {
				curr_page = parseInt(jQuery(this).attr('cpage'))-1;
			} else if(jQuery(this).hasClass('dt-next')) {
				curr_page = parseInt(jQuery(this).attr('cpage'))+1;
			} else {		
				curr_page = parseInt(curr_page);
			}
				
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data:
				{
					action: 'dt_assign_students',
					course_id: course_id,
					post_per_page: 10,
					curr_page: curr_page
				},
				beforeSend: function(){
					jQuery('#dt-sc-ajax-load-image').show();
				},
				error: function (xhr, status, error) {
					jQuery('#assignstudent-settings-container').html('Something went wrong!');
				},
				success: function (response) {
					jQuery('#assignstudent-settings-container').html(response);
				},
				complete: function(){
					jQuery('#dt-sc-ajax-load-image').hide();
				} 
			});
			
		});
		
		// Assign courses to student
		jQuery( 'body' ).delegate( '#dt-settings-student', 'change', function(){
				
			var student_id = jQuery(this).val();
			if(student_id != '') {
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data:
					{
						action: 'dt_assign_courses',
						student_id: student_id,
						post_per_page: 10,
						curr_page: 1
					},
					beforeSend: function(){
						jQuery('#dt-sc-ajax-load-image').show();
					},
					error: function (xhr, status, error) {
						jQuery('#assigncourses-settings-container').html('Something went wrong!');
					},
					success: function (response) {
						jQuery('#assigncourses-settings-container').html(response);
					},
					complete: function(){
						jQuery('#dt-sc-ajax-load-image').hide();
					} 
				});
			} else {
				jQuery('#assigncourses-settings-container').html(jQuery('#student-alert').val());
			}
						
		});
		
		jQuery( 'body' ).delegate( "#assigncourses-settings-container .pagination a", 'click', function(){  
		
			var student_id = jQuery('#dt-settings-student').val();
			
			var curr_page = jQuery(this).text();	
			if(jQuery(this).hasClass('dt-prev')) {
				curr_page = parseInt(jQuery(this).attr('cpage'))-1;
			} else if(jQuery(this).hasClass('dt-next')) {
				curr_page = parseInt(jQuery(this).attr('cpage'))+1;
			} else {		
				curr_page = parseInt(curr_page);
			}
				
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data:
				{
					action: 'dt_assign_courses',
					student_id: student_id,
					post_per_page: 10,
					curr_page: curr_page
				},
				beforeSend: function(){
					jQuery('#dt-sc-ajax-load-image').show();
				},
				error: function (xhr, status, error) {
					jQuery('#assigncourses-settings-container').html('Something went wrong!');
				},
				success: function (response) {
					jQuery('#assigncourses-settings-container').html(response);
				},
				complete: function(){
					jQuery('#dt-sc-ajax-load-image').hide();
				} 
			});
			
		});

		
	},
	
	dtClasses : function() {

		// Adding courses
		jQuery("a.dt-add-course").click(function(e){
			
			var clone = jQuery("#dt-course-to-clone").clone();
			
			clone.attr('id', 'dt-course-box').removeClass('hidden');
			clone.find('select').attr('id', 'dt-class-courses').attr('name', 'dt-class-courses[]').attr('class', 'dt-new-chosen-select');

			clone.appendTo('#dt-class-courses-container');		
			
			jQuery(".dt-new-chosen-select").chosen({
				no_results_text: object.noResult,
			});
			
			e.preventDefault();
			
		});	
		
		jQuery('body').delegate('span.dt-remove-course','click', function(e){	
		
			jQuery(this).parents('#dt-course-box').remove();
			
			e.preventDefault();
			
		});	
		
		jQuery("#dt-class-courses-container").sortable({ placeholder: 'sortable-placeholder' });
		
		
		// Start Date
		jQuery('#dt-class-start-date').datetimepicker({
			showTimepicker : 0,
			dateFormat : 'mm/dd/yy',
			minDate : 0
		});
		
		// Adding accessories
		jQuery("a.dt-add-accessory").click(function(e){
			
			var clone = jQuery("#dt-accessory-to-clone").clone();
			clone.attr('id', 'dt-accessory-box').removeClass('hidden');
			clone.appendTo('#dt-class-accessories-container');		
			
			e.preventDefault();
			
		});	
		
		jQuery('body').delegate('span.dt-remove-accessory','click', function(e){	
		
			jQuery(this).parents('#dt-accessory-box').remove();
			e.preventDefault();
			
		});	
		
		jQuery("#dt-class-accessories-container").sortable({ placeholder: 'sortable-placeholder' });
		
		
		// Switch options between onsite and online
		jQuery('body').delegate('select#dt-class-type','change', function(e){
			
			jQuery('.dt-sc-online-items').slideDown();
			jQuery('.dt-sc-onsite-items').slideUp();
			if(jQuery(this).val() == 'onsite') {
				jQuery('.dt-sc-online-items').slideUp();
				jQuery('.dt-sc-onsite-items').slideDown();
			}
			e.preventDefault();
			
		});
		
		
		// Adding tabs
		jQuery("a.dt-add-tab").click(function(e){
			
			var clone = jQuery("#dt-tab-to-clone").clone();
			clone.attr('id', 'dt-tab-box').removeClass('hidden');
			clone.appendTo('#dt-class-tabs-container');		
			
			e.preventDefault();
			
		});	
		
		jQuery('body').delegate('span.dt-remove-tab','click', function(e){	
		
			jQuery(this).parents('#dt-tab-box').remove();
			e.preventDefault();
			
		});	
		
		jQuery("#dt-class-tabs-container").sortable({ placeholder: 'sortable-placeholder' });
		
		
		// Choose class for class registration details page
		jQuery( 'body' ).delegate( '#dt-settings-class', 'change', function(){
				
			var class_id = jQuery(this).val();
			if(class_id != '') {
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data:
					{
						action: 'dt_class_registration_details',
						class_id: class_id,
						post_per_page: 10,
						curr_page: 1
					},
					beforeSend: function(){
						jQuery('#dt-sc-ajax-load-image').show();
					},
					error: function (xhr, status, error) {
						jQuery('#dt-sc-class-registration-details-container').html('Something went wrong!');
					},
					success: function (response) {
						jQuery('#dt-sc-class-registration-details-container').html(response);
					},
					complete: function(){
						jQuery('#dt-sc-ajax-load-image').hide();
					} 
				});
			} else {
				jQuery('#dt-sc-class-registration-details-container').html(jQuery('#class-alert').val());
			}
						
		});
		
		// Class registration pagination
		jQuery( 'body' ).delegate( "#dt-sc-class-registration-details-container .pagination a", 'click', function(){  
		
			var class_id = jQuery('#dt-settings-class').val();
			
			var curr_page = jQuery(this).text();	
			if(jQuery(this).hasClass('dt-prev')) {
				curr_page = parseInt(jQuery(this).attr('cpage'))-1;
			} else if(jQuery(this).hasClass('dt-next')) {
				curr_page = parseInt(jQuery(this).attr('cpage'))+1;
			} else {		
				curr_page = parseInt(curr_page);
			}
				
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data:
				{
					action: 'dt_class_registration_details',
					class_id: class_id,
					post_per_page: 10,
					curr_page: curr_page
				},
				beforeSend: function(){
					jQuery('#dt-sc-ajax-load-image').show();
				},
				error: function (xhr, status, error) {
					jQuery('#dt-sc-class-registration-details-container').html('Something went wrong!');
				},
				success: function (response) {
					jQuery('#dt-sc-class-registration-details-container').html(response);
				},
				complete: function(){
					jQuery('#dt-sc-ajax-load-image').hide();
				} 
			});
			
		});
		
		// Switch options between course content and timetable content
		jQuery('body').delegate('select#dt-class-content-options','change', function(e){
			
			jQuery('.dt-sc-course-content').slideUp();
			jQuery('.dt-sc-timetable-content').slideDown();

			if(jQuery(this).val() == 'course') {
				jQuery('.dt-sc-course-content').slideDown();
				jQuery('.dt-sc-timetable-content').slideUp();
				jQuery(".chosen-container").attr('style', 'width:80%');
			}
			
			e.preventDefault();
			
		});

	},
	
	dtSetGPSLocation : function(){
		jQuery(".dt-set-gps").click(function(e){
			
			var $address = jQuery('#dt-class-address').val();

			if( jQuery.trim($address).length <= 0 ){
				alert(object.locationAlert1);
			} else {
				var geocoder = new google.maps.Geocoder();
				geocoder.geocode({ 'address': jQuery.trim($address) }, function (results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						jQuery('#dt-class-latitude').attr('value', results[0].geometry.location.lat());
						jQuery('#dt-class-longitude').attr('value', results[0].geometry.location.lng());
					} else {
						alert(object.locationAlert2);
					}
				});
			}
			
			e.preventDefault();
			
		});
	},

	dtImport : function(){

		var file_frame = attachments_url = '';

		jQuery('#chooseupload-file-button').live('click', function(e){

		    if ( file_frame ) {
		      file_frame.open();
		      return;
		    }
		    
		    file_frame = wp.media.frames.file_frame = wp.media({
		    	multiple: false,
		    	title : "Upload / Select CSV Files",
		    	button :{
		    		text : "Insert File"
		    	}
		    });
		    
		    file_frame.on( 'select', function() {

		        var attachments = file_frame.state().get('selection').toJSON();	
		        var attachments_url	= attachments[0].url;  

		        jQuery('#import-file').val(attachments_url);  
		        
		    });
		    
		    file_frame.open();


		});

		jQuery('#import-file-button').live('click', function(e){
		    
		    // Ajax call to read csv file
		    var attachments_url = jQuery('#import-file').val();
		    var import_type = jQuery('#import-type').val();      
		    if(attachments_url != '') {
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data:
					{
						action: 'dt_process_imported_file',
						import_file: attachments_url,
						import_type: import_type,
					},
					beforeSend: function(){
						jQuery('#dt-sc-ajax-load-image').show();
					},
					error: function (xhr, status, error) {
						jQuery('.dt-settings-output-container').html('Something went wrong!');
					},
					success: function (response) {
						jQuery('.dt-settings-output-container').html(response);
					},
					complete: function(){
						jQuery('#dt-sc-ajax-load-image').hide();
					} 
				});
		    } else {
		    	jQuery('.dt-settings-output-container').html('Invalid File!');
		    }

		    e.preventDefault();

		});		

	}	
	
};

jQuery(document).ready(function() {

	dtMetabox.dtInit();
	
});