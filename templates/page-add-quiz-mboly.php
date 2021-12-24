<?php 
   
/*
 * Template Name: page add_quiz
 */
get_header();

?>

<!-- courses table desktop version -->
<div class="my-courses-table-content-desktop quiz-area">
	<input class="quiz-title quiz-data" type="text" placeholder="Le titre du quiz" required>
	<textarea name="" class="quiz-data quiz-description" cols="30" rows="10" required>la description du quiz</textarea>
	<!-- <fieldset class="question-area">
        <legend>Ajouter votre question</legend>
		<input type="text" class="quiz-data question-title" placeholder="Le titre de la question">
		<input type="text" class="quiz-data question-text" placeholder="votre question">
		<input type="text" class="quiz-data question-correct" placeholder="Texte à afficher si la réponse est correct">
		<input type="text" class="quiz-data question-incorrect" placeholder="Texte à afficher si la réponse est incorrect">
		<input type="number" class="quiz-data question-point" placeholder="Le nombre de points de cette question">
		
		<label for="question-type">Le type de la question</label>
		<select name="question-type" class="quiz-data question-type">
			<option value="single">single</option>
			<option value="single">single</option>
			<option value="single">single</option>
		</select>
		
		<fieldset class="response-area">
        	<legend>Ajouter une réponse</legend>
			<input type="text" class="quiz-data response-text" placeholder="Le texte de la réponse">
		
			<label for="response-validity">Dire si cette réponse est correct ou non</label>
			<select name="response-validity" class="quiz-data response-validity">
				<option value="oui">Oui</option>
				<option value="non">Non</option>
			</select>
		
			<button class="delete-response-btn">Supprimer cette réponse</button>
    	</fieldset>
		<button class="add-response-btn">Ajouter une réponse</button>
		<button class="delete-question-btn">Supprimer cette question</button>
	
    </fieldset> -->
	
	<button id="add-question-btn">Ajouter une question</button>
	<button id="create-quiz">Créer le quiz</button>
	
	
</div>

<?php 
   
/*
 * Template Name: page add_quiz
 */
get_footer();

?>

<script>
	const createQuiz = document.querySelector('#create-quiz');
	const addQuestionBtn = document.querySelector('#add-question-btn');

	addQuestionBtn.addEventListener('click', e => {
		const newQuestion = createQuestion();
		addQuestionBtn.parentElement.insertBefore(newQuestion, addQuestionBtn) ;
		console.log(' question added !');

	});


	createQuiz.addEventListener('click', e => {
		
	
    let data = {};
    data.action = 'getCurrentUserId';
	let userId = 0;
	
    $.ajax({
			    url: '/wp-admin/admin-ajax.php',
				data: data,
				method: 'GET',
				success: function(response){
					console.log(response);
					userId = response.data.user_id;
					const quiz = {

                        status: "publish",
                        type: "sfwd-quiz",
                        title: document.querySelector('.quiz-title').value,
                        content:  document.querySelector('.quiz-description').value,
                        author: response.data.user_id,
                        featured_media: 0,
                        menu_order: 0,
                        template: "",
                        quiz_materials: "",
                        threshold: "0.7",
                        passingpercentage: "70",
                        certificate: "0"
    
                    };
					console.log('quiz a inséré !');
                    console.log(quiz);

					
					$.ajax({
				        url:  wpApiSettings.root + 'ldlms/v2/sfwd-quiz',
						data: quiz,
						method: 'POST',
                        beforeSend: function ( xhr ) {
        					xhr.setRequestHeader( 'X-WP-Nonce', wpApiSettings.nonce);
    					},
						success: function(response){
							console.log('quiz crée avec succes');
						    console.log(response);
							let dataquiz = {};
							dataquiz.action = 'getLastQuizId';


							$.ajax({
								url: '/wp-admin/admin-ajax.php',
								data: dataquiz,
								method: 'GET',
								success: function(response){
									console.log('ID du quiz crée avec succes');
									console.log(response);
									const quizId = response.data.quiz_id;
							// debubut 
							let questions = [];
							// let i = 0;
					questionsContainer = Array.from(document.querySelectorAll('.question-area'));
					console.log('questionsContainer');
					console.log(questionsContainer);
					questionsContainer.forEach(questionContainer => {
						const descendants = questionContainer.querySelectorAll('*');
						console.log('descendants');
						console.log(descendants);
						let question = {										
							status: "publish",
							quiz: response.data.quiz_id,
							author: userId,
							hints_message: false,
							hints_enabled: false,
							points_per_answer: false
						}
						let responses = [];
						descendants.forEach(descendant => {
							if(descendant.classList.contains('question-title')){
								question.title = descendant.value;
							}

							if(descendant.classList.contains('question-text')){
								question.content = descendant.value;
							}

							if(descendant.classList.contains('question-type')){
								question.question_type = descendant.value;
							}
							if(descendant.classList.contains('question-correct')){
								question.correct_message = descendant.value;
							}

							if(descendant.classList.contains('question-incorrect')){
								question.incorrect_message = descendant.value;
							}

							if(descendant.classList.contains('question-point')){
								question.points = descendant.value;
							}
							
							if(descendant.classList.contains('response-area')){
								let response = {
												_html: false,
												_correct: true
								};
								responseDescendants = Array.from(descendant.querySelectorAll('*'));
								console.log(responseDescendants);
								responseDescendants.forEach(responseDescendant => {
									if(responseDescendant.classList.contains('response-text')){
										response._answer = responseDescendant.value;
									}

									if(responseDescendant.classList.contains('response-validity')){
										if( responseDescendant.value == 'non'){
											response._correct = false;
										}else{
											response._correct = true;
										}
										
									}
								});

								responses.push(response);
								
							}
						});
						console.log('les responses');
						console.log(responses);

						question.answer_sets = responses;
						console.log('la  question');
						console.log(question);

						questions.push(question) ;
						
					});
				
					console.log('les  questions envoyées');
					console.log(questions);			
					const  dataQuestion = {
						action: 'insertQuestion',
						questions: questions
					};	
					

									// fin
									$.ajax({
										url:   '/wp-admin/admin-ajax.php',
										data: dataQuestion,
										method: 'POST',
										// beforeSend: function ( xhr ) {
										// 	xhr.setRequestHeader( 'X-WP-Nonce', wpApiSettings.nonce);
										// },
										success: function(response){
											console.log('questions crée avec succes');
											console.log(response);
										},
										error: function(xhr, errorText, errorThrown){
											console.log("error la question n'est pas crée");
											console.log(errorThrown);
											console.log(errorText);
											console.log(xhr);
										}
									});

										
								},
								error: function(xhr, errorText, errorThrown){
									console.log("L'id du dernier quiz n'est pas récupéré");
									console.log(errorThrown);
									console.log(errorText);
									console.log(xhr);
								}
							});
				            },
						error: function(xhr, errorText, errorThrown){
						    console.log("error le quiz n'est pas crée");
							console.log(errorThrown);
							console.log(errorText);
							console.log(xhr);
						}
					});
				
				},
				error: function(xhr, errorText, errorThrown){
					console.log("error :  L'identifiant du user n'est pas retourné.");
					console.log(errorThrown);
					console.log(errorText);
					console.log(xhr);
				}
			});
		});


		function createQuestion(){
		let questionArea = document.createElement('fieldset');
		questionArea.classList.add('question-area');
		let questionLegend = document.createElement('legend');
		questionLegend.innerHTML = 'Ajouter votre question';
		questionArea.appendChild(questionLegend);

		let questionTitle = document.createElement('input');
		questionTitle.type = 'text';
		questionTitle.classList.add('quiz-data', 'question-title');
		questionTitle.placeholder = 'Le titre de la question';
		questionArea.appendChild(questionTitle);

		let questionText = document.createElement('input');
		questionText.type = 'text';
		questionText.classList.add('quiz-data', 'question-text');
		questionText.placeholder = 'Votre question';
		questionArea.appendChild(questionText);

		let questionCorrect = document.createElement('input');
		questionCorrect.type = 'text';
		questionCorrect.classList.add('quiz-data', 'question-correct');
		questionCorrect.placeholder = 'Texte à afficher si la réponse est correct';
		questionArea.appendChild(questionCorrect);

		let questionIncorrect = document.createElement('input');
		questionIncorrect.type = 'text';
		questionIncorrect.classList.add('quiz-data', 'question-incorrect');
		questionIncorrect.placeholder = 'Texte à afficher si la réponse est incorrect';
		questionArea.appendChild(questionIncorrect);

		let questionPoint = document.createElement('input');
		questionPoint.type = 'number';
		questionPoint.classList.add('quiz-data', 'question-point');
		questionPoint.placeholder = 'Le nombre de points de cette question';
		questionArea.appendChild(questionPoint);

		let questionTypeLabel = document.createElement('label');
		questionTypeLabel.innerHTML = 'Le type de la question';
		questionArea.appendChild(questionTypeLabel);

		let questionTypeSelect = document.createElement('select');
		questionTypeSelect.name = 'question-type';
		questionTypeSelect.classList.add('quiz-data', 'question-type');

		let optionType1 = document.createElement('option');
		optionType1.value = 'single';
		optionType1.innerHTML = 'single';
		questionTypeSelect.appendChild(optionType1);

		let optionType2 = document.createElement('option');
		optionType2.value = 'single';
		optionType2.innerHTML = 'single';
		questionTypeSelect.appendChild(optionType2);

		let optionType3 = document.createElement('option');
		optionType3.value = 'single';
		optionType3.innerHTML = 'single';
		questionTypeSelect.appendChild(optionType3);

		questionArea.appendChild(questionTypeSelect);

		let addResponse = document.createElement('button');
		addResponse.innerHTML = 'Ajouter une réponse';
		addResponse.classList.add('add-response-btn');

		addResponse.addEventListener('click', e => {
			questionArea.insertBefore(createResponse(), addResponse);
			console.log('réponse ajoutée');
		});

		questionArea.appendChild(addResponse);

		let questionBtnDel = document.createElement('button');
		questionBtnDel.innerHTML = 'Supprimer cette question';
		questionBtnDel.classList.add('delete-question-btn');

		questionBtnDel.addEventListener('click', e => {
			
			if(Array.from(document.querySelectorAll('.question-area')).length == 1){
				alert('Un quiz doit avoir au moins une question');
				return;
			}
			
			questionBtnDel.parentElement.parentElement.removeChild(questionBtnDel.parentElement);
			console.log('question supprimé');
		});
		questionArea.appendChild(questionBtnDel);

		
		return questionArea;

	}

	function createResponse() {
		let responseArea = document.createElement('fieldset');
		responseArea.classList.add('response-area');
		let responseLegend = document.createElement('legend');
		responseLegend.innerHTML = 'Ajouter votre réponse';
		responseArea.appendChild(responseLegend);

		let responseText = document.createElement('input');
		responseText.type = 'text';
		responseText.classList.add('quiz-data', 'response-text');
		responseText.placeholder = 'Le texte de la réponse';
		responseArea.appendChild(responseText);

		let responseTypeLabel = document.createElement('label');
		responseTypeLabel.innerHTML = 'Dire si cette réponse est correct ou non';
		responseArea.appendChild(responseTypeLabel);

		let responseTypeSelect = document.createElement('select');
		responseTypeSelect.name = 'response-validity';
		responseTypeSelect.classList.add('quiz-data', 'response-validity');

		let optionType1 = document.createElement('option');
		optionType1.value = 'oui';
		optionType1.innerHTML = 'Oui';
		responseTypeSelect.appendChild(optionType1);

		let optionType2 = document.createElement('option');
		optionType2.value = 'non';
		optionType2.innerHTML = 'Non';
		responseTypeSelect.appendChild(optionType2);

		responseArea.appendChild(responseTypeSelect);

		let responseBtnDel = document.createElement('button');
		responseBtnDel.innerHTML = 'Supprimer cette réponse';
		responseBtnDel.classList.add('delete-response-btn');

		responseBtnDel.addEventListener('click', e => {
			const parent = responseBtnDel.parentElement;
			if(parent.nextElementSibling.classList.contains('response-area') == false && parent.previousElementSibling.classList.contains('response-area') == false){
				alert('Une question doit avoir au moins une réponse');
				return;
			}
			
			parent.parentElement.removeChild(parent);
			console.log('Réponse supprimée !');

		});

		responseArea.appendChild(responseBtnDel);

		return responseArea;


	}


</script> 