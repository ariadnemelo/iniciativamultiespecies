<?php

function dt_import_options() {

	$current = isset( $_GET['tab'] ) ? $_GET['tab'] : 'dt_import_settings';
	
	dt_get_import_settings($current);
	dt_get_import_settings_tab($current);
	
}		

function dt_get_import_settings($current){

    $tabs = array( 
				'dt_import_settings' => __('Import', 'dt_themes'), 
    		);
			
    echo '<h2 class="nav-tab-wrapper">';
		foreach( $tabs as $key => $tab ){
			$class = ( $key == $current ) ? 'nav-tab-active' : '';
			echo '<a class="nav-tab '.$class.'" href="?page=dt-import-options&tab='.$key.'">'.$tab.'</a>';
	
		}
    echo '</h2>';

}

function dt_get_import_settings_tab($current){
	
	switch($current){
		case 'dt_import_settings': 
			dt_import_settings_holder();
		break;
		default:
			dt_import_settings_holder();
		break;
	}
	
}


// Import Settings
function dt_import_settings_holder(){
		
	$out = '';
	
	$out .= '<div class="dt-settings-option-container">';
		
		$out .= '<p>';
		$out .= '<label>'.esc_html__('Import Option', 'dt_themes').'</label>';
		$out .= '<select id="import-type" name="import-type" class="import-type">';

				$import_types = array('question' => 'Question', 'quiz' => 'Quiz');
				foreach ($import_types as $import_type => $import_type_label){
					$out .= '<option value="'.$import_type.'">'.$import_type_label.'</option>';
				}

		$out .= '</select>';
		$out .= '</p>';

		$out .= '<input type="button" name="chooseupload-file-button" id="chooseupload-file-button" value="'.esc_html__('Choose / Upload File', 'dt_themes').'">';

		$out .= '<input type="text" name="import-file" id="import-file" style="width:30%;" value="">';

		$out .= '<input type="button" name="import-file-button" id="import-file-button" value="'.esc_html__('Import', 'dt_themes').'">';
	
	$out .= '</div>';

	$out .= '<div id="dt-sc-ajax-load-image" style="display:none;"><img src="'.IAMD_BASE_URL."images/loading.png".'" alt="" /></div>';

	$out .= '<div class="dt-settings-output-container">';
	$out .= '</div>';

	$out .= '<div class="hr_invisible" style="margin:40px 0px 0px;"></div>';

	$out .= '<label>'.esc_html__('Question CSV Sample File Format', 'dt_themes').'</label>';
	$out .= '<div class="dt-overallstatistics-container lowercase">';
	$out .= '<table style="width:100%">
			  <tr>
			    <th>'.esc_html__('Title', 'dt_themes').'</th>
			    <th>'.esc_html__('Question', 'dt_themes').'</th>
			    <th>'.esc_html__('Question Type', 'dt_themes').' (gap-fill,multiple-choice,multiple-correct,multiple-choice-image,multi-line,boolean,single-line)</th>
			    <th>'.esc_html__('Answers', 'dt_themes').' ( Separate answers with "|" )</th>
			    <th>'.esc_html__('Correct Answer', 'dt_themes').' ( Separate answers with "|" )</th>
			    <th>'.esc_html__('Answer Explanation', 'dt_themes').'</th>
			  </tr>
			  <tr>
			    <td>Question 1</td>
			    <td><h4>In this problem, what is 6?</h4>2 X 6 = 12</td>
			    <td>multiple-choice</td>
			    <td>Sum|Addend|Factor|Product</td>
			    <td>Product</td>
			    <td><p>In this problem, <b>6 is an product.</b></p></td>			    
			  </tr>
			  <tr>
			    <td>Question 2</td>
			    <td>Out of which are all contients?</td>
			    <td>multiple-correct</td>
			    <td>Asia|India|Africa|Mexico|America</td>
			    <td>Asia|Africa|America</td>
			    <td>Africa, the Americas, Antarctica, Asia, Australia together with Oceania, and Europe are considered to be Continents.</td>			    
			  </tr>
			</table>';
	$out .= '</div>';

	$out .= '<div class="hr_invisible" style="margin:20px 0px 0px;"></div>';

	$out .= '<label style="width:100%; float:left;">'.esc_html__('Quiz CSV Sample File Format', 'dt_themes').'</label>';
	$out .= '<div class="dt-overallstatistics-container lowercase">';
	$out .= '<table style="width:100%">
			  <tr>
			    <th>'.esc_html__('Title', 'dt_themes').'</th>
			    <th>'.esc_html__('Content', 'dt_themes').'</th>
			    <th>'.esc_html__('Layout', 'dt_themes').'  (content-full-width,with-left-sidebar,with-right-sidebar,both-sidebar)</th>
			    <th>'.esc_html__('Subttile', 'dt_themes').'</th>
			    <th>'.esc_html__('Duration', 'dt_themes').' (Number )</th>
			    <th>'.esc_html__('Number of Retakes', 'dt_themes').' (Number )</th>
			    <th>'.esc_html__('Post Quiz Message', 'dt_themes').'</th>
			    <th>'.esc_html__('Randomize Questions', 'dt_themes').' ( True / False )</th>
			    <th>'.esc_html__('Enable Auto Evaluation', 'dt_themes').' ( True / False )</th>
			    <th>'.esc_html__('Questions', 'dt_themes').' (questionno|questionno#questionmark|questionmark)</th>
			    <th>'.esc_html__('Pass Percentage', 'dt_themes').' ( Number )</th>
			    <th>'.esc_html__('Show Questions One By One', 'dt_themes').' ( True / False )</th>
			    <th>'.esc_html__('Show Correct Answer and Answer Explanation', 'dt_themes').' ( True / False )</th>
			    <th>'.esc_html__('Show Question Counter', 'dt_themes').' ( True / False )</th>
			    <th>'.esc_html__('Show Question Navigator', 'dt_themes').' ( True / False )</th>
			    <th>'.esc_html__('Public Quiz', 'dt_themes').' ( True / False )</th>
			    <th>'.esc_html__('Disable Grading', 'dt_themes').' ( True / False )</th>
			  </tr>
			  <tr>
			    <td>Quiz 1</td>
			    <td>Consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</td>
			    <td>with-left-sidebar</td>
			    <td>Porttitor eu 123</td>
			    <td>45</td>
			    <td>10</td>
			    <td>Aenean leo ligula, porttitor eu</td>
			    <td>true</td>
			    <td>true</td>
			    <td>7221|6827#10|10</td>
			    <td>90</td>
			    <td>true</td>
			    <td>true</td>
			    <td>true</td>
			    <td>true</td>
			    <td>true</td>
			    <td>true</td>
			  </tr>
			  <tr>
			    <td>Quiz 2</td>
			    <td>Consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in.</td>
			    <td>with-right-sidebar</td>
			    <td>Raoptab wert</td>
			    <td>30</td>
			    <td>8</td>
			    <td>Porttitor eu Aenean leo ligula</td>
			    <td>true</td>
			    <td>false</td>
			    <td>7221|6827#10|10</td>
			    <td>85</td>		    
			    <td>False</td>
			    <td>True</td>
			    <td>True</td>
			    <td>False</td>
			    <td>True</td>
			    <td>True</td>
			  </tr>
			</table>';
	$out .= '</div>';	
	
	echo $out;
	
}

add_action( 'wp_ajax_dt_process_imported_file', 'dt_process_imported_file' );
add_action( 'wp_ajax_nopriv_dt_process_imported_file', 'dt_process_imported_file' );
function dt_process_imported_file() {
	
	$import_type = $_REQUEST['import_type'];
	$import_file = $_REQUEST['import_file'];

	if(( $fh = @fopen($import_file, 'r')) !== false) {
		
		$i = 0;
		
		while(( $row = fgetcsv($fh)) !== false) { 

			if($i > 0) {

				// Question
				if($import_type == 'question') {

					$title = $row[0];
					$content = $row[1];
					$question_type = $row[2];
					$answers = $row[3];
					$correct_answer = $row[4];
					$answer_explanation = $row[5];

					$question_post = array(
						'post_title' => $title,
						'post_content'  => $content,
						'post_status' => 'publish',
						'post_type' => 'dt_questions',
						'post_author' => 1,
					);
					$question_id = wp_insert_post($question_post);
					
					update_post_meta ( $question_id, 'question-type', dttheme_wp_kses($question_type) );

					if($question_type == 'multiple-choice') {

						$answers = explode('|', $answers);
						update_post_meta ( $question_id, 'multichoice-answers', array_filter($answers) );

						update_post_meta ( $question_id, 'multichoice-correct-answer', dttheme_wp_kses($correct_answer) );

					} else if($question_type == 'multiple-choice-image') {

						$answers = explode('|', $answers);
						update_post_meta ( $question_id, 'multichoice-image-answers', array_filter($answers) );

						update_post_meta ( $question_id, 'multichoice-image-correct-answer', dttheme_wp_kses($correct_answer) );

					} else if($question_type == 'multiple-correct') {

						$answers = explode('|', $answers);
						update_post_meta ( $question_id, 'multicorrect-answers', array_filter($answers) );	

						$correct_answer = explode('|', $correct_answer);
						update_post_meta ( $question_id, 'multicorrect-correct-answer', array_filter($correct_answer) );	

					} else if($question_type == 'boolean') {

						update_post_meta ( $question_id, 'boolean-answer', dttheme_wp_kses(strtolower($correct_answer)) );

					} else if($question_type == 'gap-fill') {

						$answers = explode('|', $answers);

						update_post_meta ( $question_id, 'text-before-gap', dttheme_wp_kses($answers[0]) );
						update_post_meta ( $question_id, 'text-after-gap', dttheme_wp_kses($answers[1]) );

						update_post_meta ( $question_id, 'gap', dttheme_wp_kses($correct_answer) );

					} else if($question_type == 'single-line') {

						update_post_meta ( $question_id, 'singleline-answer', dttheme_wp_kses($correct_answer) );

					} else if($question_type == 'multi-line') {

						update_post_meta ( $question_id, 'multiline-answer', dttheme_wp_kses($correct_answer) );

					}

					update_post_meta ( $question_id, 'answer-explanation', dttheme_wp_kses($answer_explanation) );

				}

				// Quiz
				if($import_type == 'quiz') {
					
					$title = $row[0];
					$content = $row[1];
					$layout = $row[2];
					$subtitle = $row[3];
					$duration = $row[4];
					$number_of_retakes = $row[5];
					$post_quiz_message = $row[6];
					$randomize_question = $row[7];
					$enable_auto_evaluation = $row[8];
					$questions_and_grade = $row[9];
					$pass_percentage = $row[10];
					$show_questions_onebyone = $row[11];
					$show_correct_answer_explanation = $row[12];
					$show_question_counter = $row[13];
					$show_question_navigator = $row[14];
					$public_quiz = $row[15];
					$disable_grading = $row[16];

					$quiz_post = array(
						'post_title' => $title,
						'post_content'  => $content,
						'post_status' => 'publish',
						'post_type' => 'dt_quizes',
						'post_author' => 1,
					);
					$quiz_id = wp_insert_post($quiz_post);

					if($questions_and_grade != '') {
						$questions_and_grade = explode('#', $questions_and_grade);
						$questions = explode('|', $questions_and_grade[0]);
						$grade = explode('|', $questions_and_grade[1]);
					}

					$total_grade = array_sum($grade);

					$settings = array ();
					$settings['layout'] = $layout;				
					update_post_meta ( $quiz_id, '_quiz_settings', array_filter ( $settings ) );	
					
					update_post_meta ( $quiz_id, 'quiz-subtitle', dttheme_wp_kses($subtitle) );
					update_post_meta ( $quiz_id, 'quiz-duration', dttheme_wp_kses($duration) );
					update_post_meta ( $quiz_id, 'quiz-retakes', dttheme_wp_kses($number_of_retakes) );
					update_post_meta ( $quiz_id, 'quiz-postmsg', dttheme_wp_kses($post_quiz_message) );
					if(strtolower(trim($randomize_question)) == 'true') {
						update_post_meta ( $quiz_id, 'quiz-randomize-questions', 'true' );
					}
					if(strtolower(trim($enable_auto_evaluation)) == 'true') {
						update_post_meta ( $quiz_id, 'quiz-auto-evaluation', 'true' );
					}
					update_post_meta ( $quiz_id, 'quiz-question', array_filter($questions) );
					update_post_meta ( $quiz_id, 'quiz-question-grade', array_filter($grade) );
					update_post_meta ( $quiz_id, 'quiz-total-grade', dttheme_wp_kses($total_grade) );
					update_post_meta ( $quiz_id, 'quiz-pass-percentage', dttheme_wp_kses($pass_percentage) );
					if(strtolower(trim($show_questions_onebyone)) == 'true') {
						update_post_meta ( $quiz_id, 'quiz-questions-onebyone', 'true' );
					}
					if(strtolower(trim($show_correct_answer_explanation)) == 'true') {
						update_post_meta ( $quiz_id, 'quiz-correctanswer-and-answerexplanation', 'true' );
					}
					if(strtolower(trim($show_question_counter)) == 'true') {
						update_post_meta ( $quiz_id, 'quiz-questions-counter', 'true' );
					}
					if(strtolower(trim($show_question_navigator)) == 'true') {
						update_post_meta ( $quiz_id, 'quiz-question-navigator', 'true' );
					}
					if(strtolower(trim($public_quiz)) == 'true') {
						update_post_meta ( $quiz_id, 'quiz-public', 'true' );
					}
					if(strtolower(trim($disable_grading)) == 'true') {
						update_post_meta ( $quiz_id, 'quiz-disable-grading', 'true' );
					}

				}				
				
			}

			$i++;

		}

	}

	echo '<p class="note"><strong>'.esc_html__('Data imported successfully!', 'dt_themes').'</strong></p>';

	die();

}

?>