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

	<?php include("connection.php"); ?>
	<?php
	
	if(isset($_SESSION["session_username"])){
	header("Location: intropage.php");
	}

	if(isset($_POST["login"])){

	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$query =mysqli_query($connection,"SELECT * FROM usertbl WHERE username='$username' AND password='$password'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
 {
while($row=mysqli_fetch_assoc($query))
 {
	$dbusername=$row['username'];
  $dbpassword=$row['password'];
 }
  if($username == $dbusername && $password == $dbpassword)
 {

	 $_SESSION['session_username']=$username;	 

   header("Location: intropage.php");
	}
	} 
	else {
		$query =mysqli_query($connection,"SELECT * FROM adm WHERE username='$username' AND password='$password'");
		$numrows=mysqli_num_rows($query);
	if($numrows!=0)
 {
while($row=mysqli_fetch_assoc($query))
 {
	$dbusername=$row['username'];
  $dbpassword=$row['password'];
 }
  if($username == $dbusername && $password == $dbpassword)
 {
	 $_SESSION['session_username']=$username;	 
   header("Location: intropage.php");
	}
 }
	}
	}
	else {
    $message = "All fields are required!";
	}
	}
	?>
	<header>
	<div class="otzivi">
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
						
					</ul>
				</nav>
			</div>
			</div>
			<div class="diff"></div>
<div class="form">
<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>
Авторизация или <a href="register.php">Регистрация</a>
<ul class="menu">
			<form action="" method="post"> 
<li>
<input type="username" name="username" placeholder="Имя пользователя" ></br> 
</li>
<li>
<input type="password" name="password" placeholder="Пароль" ></br> 
</li>
<li>
<input class="button" name="login" type="submit" id="submit" value="Вход"> 
</li>

</form>
</ul>
</div>
<div class="diff"></div>
<div class="info">
         <div class="text_info">
		 by PedFox Design
         </div>
</div>
</body>
</html>
