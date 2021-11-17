<?php 
   
/*
 * Template Name: page test
 */
get_header();

?>

<!-- Start My Courses Area -->
<div class="my-courses-area">
			<!-- courses header -->
			<div class="my-courses-header">
				<div class="my-courses-left-header">
					<h1>My Quiz</h1>
				</div>
				<div class="my-courses-right-header">
					<ul>
						<li><a href="#">Raira School</a></li>
						<li><a href="#">Log out</a></li>
					</ul>
				</div>
			</div>
			<!-- courses header -->

			<!-- courses tab button -->
			<div class="my-courses-tab-button">
				<ul>
					<li><a class="active" href="#">All</a></li>
					<li><a href="#">Published</a></li>
					<li><a href="#">Drafts</a></li>
					<li><a href="#"><i class="fal fa-plus"></i>Add New</a></li>
				</ul>
			</div>
			<!-- courses tab button -->

			<!-- courses tab button -->
			<div class="my-courses-search-option">
				<div class="courses-search-content">
					<form action="">
						<input class="desktop" type="search" placeholder="Search Member...">
						<input class="mobile" type="search" placeholder="Search here">
						<i class="fal fa-search"></i>
					</form>
				</div>
				<div class="courses-search-filter">
					<button><i class="fal fa-filter"></i><span>Filter</span></button>
				</div>
			</div>
			<!-- courses tab button -->

			<!-- courses catagory area -->
			<form class="my-courses-catagory-area" method="post" id="filter-form-two">
				<div class="my-courses-catagory-content">
					<!-- single catagory -->
					<div class="single-courses-catagory">
						<select name="order" class="order-filter">
							<option value="--">By Date</option>
							<option value="ASC">Asc</option>
							<option value="DESC">Desc</option>
							<!-- <option>Catagories two</option>
							<option>Catagories three</option> -->
						</select>
					</div>
					<!-- single catagory -->

					<!-- single catagory -->
					<div class="single-courses-catagory">
						<select name="title"  class="title-filter">
							<option value="--">By Title</option>
							<option value="ASC">Asc</option>
							<option value="DESC">Desc</option>
							<!-- <option>Tags two</option>
							<option>Tags three</option> -->
						</select>
					</div>
					<!-- single catagory -->

					<!-- single catagory -->
					<div class="single-courses-catagory">
						<select name="category">
							<option value="all">All Course Catagories</option>
							<option>All Course one</option>
							<option>All Course two</option>
							<option>All Course three</option>
						</select>
					</div>
					<!-- single catagory -->

					<!-- single catagory -->
					<div class="single-courses-catagory">
						<select>
							<option>All CourseTags</option>
							<option>CourseTags one</option>
							<option>CourseTags two</option>
							<option>CourseTags three</option>
						</select>
					</div>
					<!-- single catagory -->

					<!-- single catagory -->
					<div class="single-courses-catagory">
						<select>
							<option>All Cartificates</option>
							<option>Cartificates one</option>
							<option>Cartificates two</option>
							<option>Cartificates three</option>
						</select>
					</div>
					<!-- single catagory -->
				</div>

				<div class="my-courses-reset-button">
					<button>Reset</button>
				</div>
				<div class="my-courses-reset-button">
					<button type="submit" id="submit-filter-form-two">Submit</button>
				</div>
				
			</form>
			<!-- courses catagory area -->

			<!-- courses table desktop version -->
			<div class="my-courses-table-content-desktop">
            <?php 
                $quizs = getQuiz();
                // var_dump($quizs);
               
                if ( $quizs->have_posts() ) {
            ?>
				<table style="width:100%;">
					<tbody class="tbody-desktop">
						<tr>
							<th>Title</th>
							<th>Course</th>
							<th>Lesson</th>
							<th>Date</th>
						</tr>
                        <?php 
                        while ( $quizs->have_posts() ) {
                            $quizs->the_post();
                            
                            
                        ?>
						<tr>
							<td><i class="fal fa-angle-right"></i><?php the_title() ;?></td>
							<td><?php echo getPostTitle(getPostId(get_the_ID())) ;?></td>
							<td><?php echo getLessonTitle(getLessonId(get_the_ID()))  ;?></td>
							<td><?php the_date() ;?></td>
						</tr>
                        <?php 
                        }
                        ?>
						<!-- <tr>
							<td><i class="fal fa-angle-right"></i>Geopolitics - Draft</td>
							<td>Closed</td>
							<td>Teacher Demo</td>
							<td>Last Modified 2021/11/20 at 12: 29 pm</td>
						</tr>
						<tr>
							<td><i class="fal fa-angle-right"></i>Les hydrocarbures - Draft</td>
							<td></td>
							<td>Teacher Demo</td>
							<td>Last Modified 2020/11/20 at 1:56 am</td>
						</tr>
						<tr>
							<td><i class="fal fa-angle-right"></i>Les hydrocarbures - Draft</td>
							<td></td>
							<td>Teacher Demo</td>
							<td>Last Modified 2020/11/20 at 1:52 am</td>
						</tr>
						<tr>
							<td><i class="fal fa-angle-right"></i>DEMO: Francais CE1 Lecture</td>
							<td>Closed</td>
							<td>Teacher Demo</td>
							<td>Published 2021/07/27 at 5:14 am</td>
						</tr>
						<tr>
							<td><i class="fal fa-angle-right"></i>The United States and the world since 1945</td>
							<td>Open</td>
							<td>Teacher Demo</td>
							<td>Published 2021/06/29 at 10:45 am</td>
						</tr> -->
					</tbody>
				</table>
                <?php 
                    }
                ?>
			</div>
			<!-- courses table desktop version -->

			<!-- courses table mobile version -->
			<div class="my-courses-table-content-mobile">
				<table>
					<tr>
						<th>Title</th>
						<th>Course Test</th>
					</tr>
					<tr>
						<td>Price Type</td>
						<td>Open</td>
					</tr>
					<tr>
						<td>Author</td>
						<td>Teacher Demo</td>
					</tr>
					<tr>
						<td>Date</td>
						<td>Published 2021/08/24 at 10:35 am</td>
					</tr>
				</table>
			</div>
			<!-- courses table mobile version -->

			<!-- courses bulk action -->
			<div class="my-courses-bulk-all-action">
				<div class="my-courses-bulk-action">
					<div class="my-courses-bulk-option">
						<select>
							<option>Bulk actions 1</option>
							<option>Bulk actions one</option>
							<option>Bulk actions two</option>
							<option>Bulk actions three</option>
						</select>
					</div>
					
					<div class="my-courses-bulk-apply">
						<a href="#">Apply</a>
					</div>
				</div>
				<div class="my-courses-reset-button mobile">
					<button>Reset</button>
				</div>
			</div>
			<!-- courses bulk action -->




		</div>
		<!-- End My Courses Area -->


        
   <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
   <script type="text/javascript">
	   jQuery(document).ready(function($){
			const submitTwo = document.getElementById('submit-filter-form-two');
       		submitTwo.addEventListener('click', e => {
				e.preventDefault();
				submitTwo.innerHTML = 'En cours ...';
		 		console.log('okbxcjsdg');
		 		let data = {
					action: 'getQuiz',
		   			title: document.querySelector('.title-filter').value,
		   			order: document.querySelector('.order-filter').value,
					type: 'ajax'
		   
		 		}

				$.ajax({
					url: '/wp-admin/admin-ajax.php',
					data: data,
					method: 'POST',
					success: function(response){
						console.log('tersggv');
						console.log(response);
						let tbody = document.querySelector('.tbody-desktop');
						tbody.innerHTML = "";
						const ths = `<tr>
										<th>Title</th>
										<th>Course</th>
										<th>Lesson</th>
										<th>Date</th>
									</tr>`;
						tbody.innerHTML += ths;
						

						
						response.data.forEach(quiz => {
							let post = quiz.post == null ? '' : quiz.post;
							let lesson = quiz.lesson == null ? '' : quiz.lesson;
							// let post = quiz.post;
							// let lesson = quiz.lesson;
							let trQuiz = `<tr>
											<td><i class="fal fa-angle-right"></i>${quiz.quiz}</td>
											<td>${post}</td>
											<td>${lesson}</td>
											<td>${quiz.date}</td>
										</tr>`;
							tbody.innerHTML += trQuiz;
						});
						submitTwo.innerHTML = 'Submit';
              
					},
					error: function(xhr, errorText, errorThrown){
						console.log(errorThrown);
					}
				})
	   		});
	   });
   </script>

   <?php 
   get_footer();

   
   ?>