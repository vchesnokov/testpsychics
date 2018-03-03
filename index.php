<?php
	//ini_set('display_errors',1); // DEBUG!
	//error_reporting(E_ALL); // DEBUG!

	spl_autoload_register(function ($class_name) {
	    include $class_name . '.php';
	});

	// // test
	// $u = new User();
	// // add new user number
	// User::addNumber("123", 17);	
	// $arr = User::getHistoryNumbers("123");
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <meta name="description" content="Экстрасенсы" />
    <meta name="author" content="Экстрасенсы" />
    <style>
    	.panel, .button {
    		padding-top: 0.8em;
    		padding-bottom: : 0.8em;
    	}
	</style>
  </head>
  
  <body>
		<div id="app" class="container">

			<h2>Экстрасенсы</h2>

		    <div class="alert alert-success">
		      <div>Число экстрасенсов: {{list_ps.length}}</div>
		    </div>

			<div class="form-group">
				<label for="usr">Введите Ваше 2-хзначное целое число (10-99):</label>
				<input type="number" class="form-control" id="user_number" name="user_number" min="10" max="99" step="1" v-model="user_number">

				<div class="panel">
					<button type="button" class="btn btn-primary" v-on:click="onMakeStep">Запросить догадки экстрасенсов</button>
				</div>
			</div>

		    <div class="alert alert-danger" v-show="errortext">
		      <div><strong>Ошибка</strong>: {{errortext}}</div>
		    </div>

		    <div class="alert alert-success">
		      <h4>Догадки экстрасенсов: {{user_numbers.length}} шт.</h4>
				<ul>
					<li v-for="(item, index) in user_numbers" :key="index">Ваше число: <strong>{{ item.number }}</strong>. Догадки:
							<ul>
								<li v-for="(item2, index2) in item.forecast" :key="index2">Экстрасенс: <strong>{{ item2.name }}</strong>, число: <strong>{{ item2.number }}</strong>
							</ul>
					</li>
				</ul>
		    </div>

		    <div class="alert alert-info">
		      <h4>Ваши введённые числа: {{user_numbers.length}} шт.</h4>
				<ul>
					<li v-for="(item, index) in user_numbers" :key="index">{{ item.number }}</li>
				</ul>
		    </div>

		    <div class="alert alert-success">
				<h4>Достоверность экстрасенсов: {{list_ps.length}} шт.</h4>
				<ul>
					<li v-for="(item, index) in list_ps" :key="index">Экстрасенс: <strong>{{ item.p_name }}</strong>, достоверность: <strong>{{ item.p_raiting }}</strong></li>
				</ul>
			</div>

		    <div class="alert alert-info">
				<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#userkeyblock">&darr; Ключ Вашей сессии</button>
				<div id="userkeyblock" class="collapse">
					{{user_key}}
				</div>		      
		    </div>

			<!-- footer -->
	      	<div>&nbsp;</div>
		    <div class="alert alert-success">
		      <span>&copy; 2018, <a target="_blank" href="http://chesnokov.fl34.ru/">Valery V. Chesnokov</a></span>
		    </div>

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

			<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>    
			<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
			<script src="testpsychics.js"></script>

		</div>

  </body>
</html>
