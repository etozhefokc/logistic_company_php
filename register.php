<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Global Logistics</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php include("connection.php"); ?>
<?php
	
	if(isset($_POST["register"])){
	
	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  $full_name= htmlspecialchars($_POST['full_name']);
	$email=htmlspecialchars($_POST['email']);
 $username=htmlspecialchars($_POST['username']);
 $password=htmlspecialchars($_POST['password']);
 $query1=mysqli_query($connection,"SELECT * FROM usertbl WHERE username='".$username."'");
  $numrows1=mysqli_num_rows($query1);
  $query2=mysqli_query($connection,"SELECT * FROM adm WHERE username='".$username."'");
  $numrows2=mysqli_num_rows($query2);
if(($numrows1==0)&&($numrows2==0))
   {
	$sql="INSERT INTO usertbl
  (full_name, email, username,password)
	VALUES('$full_name','$email', '$username', '$password')";
  $result=mysqli_query($connection,$sql);
 if($result){
	$message = "Account Successfully Created";
} else {
 $message = "Failed to insert data information!";
  }
	} else {
	$message = "That username already exists! Please try another one!";
   }
	} else {
	$message = "All fields are required!";
	}
	}
	?>
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
						<li>
							<a href="login.php">Личный кабинет</a>
						</li>
						
					</ul>
				</nav>
			</div>
			</div>
			<div class="diff"></div>
			<div class="form">
			
<form action="register.php" id="registerform" method="post"name="registerform">
<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>
 <p><label for="user_login">Полное имя<br>
 <input class="input" id="full_name" name="full_name"size="32"  type="text" value=""></label></p>
<p><label for="user_pass">E-mail<br>
<input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
<p><label for="user_pass">Имя пользователя<br>
<input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
<p><label for="user_pass">Пароль<br>
<input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
<input class="button" name="register" type="submit" id="register" value="Регистрация" > 
</form>
</div>

<div class="diff"></div>
		<div class="info">
         <div class="text_info">
		 by PedFox Design
         </div>
</body>
</html>
