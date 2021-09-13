<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Global Logistics</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php
session_start();
?>
	<header>
	<div class="disv">
			<div class="heading clearfix">
				<p><a href="index.php"><img src="img/logo.png" alt="Lada" class="logo"></a></p>
				<nav>
					<ul class="menu">
						<li>
							<a href="index.php">Главная</a>
						</li>
						<li>
							<a href="onas.html">О нас</a>
						</li>
						<li>
							<a href="login.php">Личный кабинет</a>
						</li>
						<?php if (!empty($_SESSION['session_username']))
						echo '<li><a href="#">Добро пожаловать,'.$_SESSION['session_username'].'</a></li>';
						?>
					</ul>
				</nav>
			</div>
			
			<div class="titles__first">
					Мы 10 лет на рынке грузоперевозок
				</div>
				</div>		
	</header>

			
		<div class="disk">
			<div class="titles__s">
					Почему мы?				
				</div>
				<div class="text_why">
				Собственный парк, более 20 единиц грузовой и спецтехники.</br></br>		
Большой опыт в сфере грузоперевозок, на рынке более 10 лет.</br></br>	
Большой штат профессионалов, готовых минимизировать ваши затраты.</br></br>	
Личный менеджер, который всегда сможет ответить на все вопросы.</br></br>		
Мы даем гарантии сохранности груза и заботимся о нем от момента получения до момента сдачи.</br></br>		
Вам не нужно будет долго дозваниваться и ждать получения ответов на вопросы.</br></br>		
</div>
					
		</div>
<div class="info">
         <div class="text_info">
		 by PedFox Design
         </div>
</div>
</body>
</html>
