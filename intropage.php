<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Global Logistics</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:index.php");
else:
?>
<?php include("connection.php"); ?>
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
			<?php $adm=False;
			$username = $_SESSION["session_username"];
				$query =mysqli_query($connection,"SELECT * FROM adm WHERE username='$username'");
		$numrows=mysqli_num_rows($query);
	if($numrows!=0)
	{
		echo'Admin Console';
		$adm=True;
	}
	?>
			<?php 

	if(!($adm))
	{
	if(isset($_POST["zakaz"])){
	
	if(!empty($_POST['vehicle']) && !empty($_POST['volume']) && !empty($_POST['weight']) && !empty($_POST['city']) && 
	!empty($_POST['street']) && !empty($_POST['house']) && !empty($_POST['flat']) && !empty($_POST['cityn'])&& 
	!empty($_POST['streetn']) && !empty($_POST['housen']) && !empty($_POST['flatn']) ) {
  $vehicle= htmlspecialchars($_POST['vehicle']);
	$volume=htmlspecialchars($_POST['volume']);
 $weight=htmlspecialchars($_POST['weight']);
 $city=htmlspecialchars($_POST['city']);
  $street= htmlspecialchars($_POST['street']);
	$streetn=htmlspecialchars($_POST['streetn']);
 $flatn=htmlspecialchars($_POST['flatn']);
 $flat=htmlspecialchars($_POST['flat']);
  $house= htmlspecialchars($_POST['house']);
	$housen=htmlspecialchars($_POST['housen']);
 $cityn=htmlspecialchars($_POST['cityn']);
 $username=$_SESSION['session_username'];

 $query=mysqli_query($connection,"SELECT * FROM zakazi WHERE weight='$weight' and 
 vehicle='$vehicle' and 
 volume='$volume' and 
 city='$city' and
 cityn='$cityn' and 
 username='$username' and
 street='$street' and
 streetn='$streetn' and 
 flat='$flat' and
 flatn='$flatn' and 
 house='$house' and
 housen='$housen' and 
 state='В оброботке'
 ");
  $numrows=mysqli_num_rows($query);
if(($numrows==0))
  {
	$sql="INSERT INTO zakazi
  (username,vehicle, volume, weight,city,street,streetn,flat,flatn,house,housen,cityn)
	VALUES('$username','$vehicle','$volume', '$weight', '$city','$street','$streetn', '$flat', '$flatn','$house','$housen', '$cityn')";
  $result=mysqli_query($connection,$sql);
 if($result){
	$message = "Order Successfully Created";
} else {
 $message = "Failed to insert data information!";
  }
  } 
  else {
$message = "That ordrer already exists! Please try again later!";
   }
	} else {
	$message = "All fields are required!";
	}
	}
	}
	else
	{
		
		if(isset($_POST["zakaz"])){
	if(!empty($_POST['username'])&&!empty($_POST['vehicle']) && !empty($_POST['volume']) && !empty($_POST['weight']) && !empty($_POST['city']) && 
	!empty($_POST['street']) && !empty($_POST['house']) && !empty($_POST['flat']) && !empty($_POST['cityn'])&& 
	!empty($_POST['streetn']) && !empty($_POST['housen']) && !empty($_POST['flatn']) ) {
  $vehicle= htmlspecialchars($_POST['vehicle']);
	$volume=htmlspecialchars($_POST['volume']);
 $weight=htmlspecialchars($_POST['weight']);
 $city=htmlspecialchars($_POST['city']);
  $street= htmlspecialchars($_POST['street']);
	$streetn=htmlspecialchars($_POST['streetn']);
 $flatn=htmlspecialchars($_POST['flatn']);
 $flat=htmlspecialchars($_POST['flat']);
  $house= htmlspecialchars($_POST['house']);
	$housen=htmlspecialchars($_POST['housen']);
 $cityn=htmlspecialchars($_POST['cityn']);
$username=htmlspecialchars($_POST['username']);
 $query=mysqli_query($connection,"SELECT * FROM zakazi WHERE weight='$weight' and 
 vehicle='$vehicle' and 
 volume='$volume' and 
 city='$city' and
 cityn='$cityn' and 
 username='$username' and
 street='$street' and
 streetn='$streetn' and 
 flat='$flat' and
 flatn='$flatn' and 
 house='$house' and
 housen='$housen' and 
 username='$username' and 
 state='В оброботке'
 ");
  $numrows=mysqli_num_rows($query);
if(($numrows==0))
  {
	$sql="INSERT INTO zakazi
  (username,vehicle, volume, weight,city,street,streetn,flat,flatn,house,housen,cityn)
	VALUES('$username','$vehicle','$volume', '$weight', '$city','$street','$streetn', '$flat', '$flatn','$house','$housen', '$cityn')";
  $result=mysqli_query($connection,$sql);
 if($result){
	$message = "Order Successfully Created";
} else {
 $message = "Failed to insert data information!";
  }
  } 
  else {
$message = "That ordrer already exists! Please try again later!";
   }
	} else {
	$message = "All fields are required!";
	}
	}
	}
	
  ?>
<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
<p><a href="logout.php">Выйти</a> из системы</p>
<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>

<table><tr><td>
<form action="" id="zform1" method="post"name="zform1">
<input class="button" name="zakaz1" type="submit" id="zakaz1" value="Создать запрос" >
</form></td><td>
<form action="" id="zform2" method="post"name="zform2">
<input class="button" name="zakaz2" type="submit" id="zakaz2" value="Показать запрос" >
</form></td>
<?php if(($adm))
	{
		echo'
		<td>
<form action="" id="zform3" method="post"name="zform3">
<input class="button" name="zakaz3" type="submit" id="zakaz3" value="Изминить запрос" >
</form></td>';
	}
		?>
		</tr></table>
<?php 
	if(!($adm))
	{
if(isset($_POST["zakaz1"])){
echo ' <div class="form">
<form action="" id="zform" method="post"name="zform">
 <p><label for="user_login">Автомобиль<br>
 <input  id="vehicle" name="vehicle"size="25"  type="text" value=""></label></p>
<p><label for="user_pass">Обьем<br>
<input  id="volume" name="volume" size="25"type="text" value=""></label></p>
<p><label for="user_pass">Вес<br>
<input  id="weight" name="weight"size="25" type="text" value=""></label></p>
<table><tr><td><p><label for="user_pass">Город отправления<br>
<input  id="city" name="city"size="25"   type="text" value=""></label></p></td>
<td><p><label for="user_pass">Город назначения<br>
<input  id="cityn" name="cityn"size="25"   type="text" value=""></label></p></td></tr>
</table>
<table><tr><td><p><label for="user_pass">Улица<br>
<input  id="street" name="street"size="25"   type="text" value=""></label></p></td>
<td><p><label for="user_pass">Улица<br>
<input  id="streetn" name="streetn"size="25"   type="text" value=""></label></p></td></tr></table>
<table><tr><td><p><label for="user_pass">Дом<br>
<input  id="house" name="house"size="25"   type="text" value=""></label></p></td>
<td><p><label for="user_pass">Дом<br>
<input  id="housen" name="housen"size="25"   type="text" value=""></label></p></td></tr></table>
<table><tr><td><p><label for="user_pass">Квартира<br>
<input  id="flat" name="flat"size="25"   type="text" value=""></label></p></td>
<td><p><label for="user_pass">Квартира<br>
<input  id="flatn" name="flatn"size="25"   type="text" value=""></label></p></td></tr></table>

<input class="button" name="zakaz" type="submit" id="zakaz" value="Отправить" > 
 
</form>
</div>
';
}
	}
	else
	{
		if(isset($_POST["zakaz1"])){
echo '  <div class="form">
<form action="" id="zform" method="post"name="zform">
 <table><tr><td><p><label for="user_login">Автомобиль<br>
 <input  id="vehicle" name="vehicle"size="25"  type="text" value=""></label></p></td>
<td><p><label for="user_pass">Обьем<br>
<input  id="volume" name="volume" size="25"type="text" value=""></label></p></td></tr></table>
<table><tr><td><p><label for="user_pass">Вес<br>
<input  id="weight" name="weight"size="25" type="text" value=""></label></p></td>
<td><p><label for="user_login">Username<br>
 <input  id="username" name="username"size="25"  type="text" value=""></label></p></td></tr></table>
<table><tr><td><p><label for="user_pass">Город отправления<br>
<input  id="city" name="city"size="25"   type="text" value=""></label></p></td>
<td><p><label for="user_pass">Город назначения<br>
<input  id="cityn" name="cityn"size="25"   type="text" value=""></label></p></td></tr>
</table>
<table><tr><td><p><label for="user_pass">Улица<br>
<input  id="street" name="street"size="25"   type="text" value=""></label></p></td>
<td><p><label for="user_pass">Улица<br>
<input  id="streetn" name="streetn"size="25"   type="text" value=""></label></p></td></tr></table>
<table><tr><td><p><label for="user_pass">Дом<br>
<input  id="house" name="house"size="25"   type="text" value=""></label></p></td>
<td><p><label for="user_pass">Дом<br>
<input  id="housen" name="housen"size="25"   type="text" value=""></label></p></td></tr></table>
<table><tr><td><p><label for="user_pass">Квартира<br>
<input  id="flat" name="flat"size="25"   type="text" value=""></label></p></td>
<td><p><label for="user_pass">Квартира<br>
<input  id="flatn" name="flatn"size="25"   type="text" value=""></label></p></td></tr></table>
<input class="button" name="zakaz4" type="submit" id="zakaz4" value="Изминить" > 
</form>
</div>
';
}
	}
?>
<?php 
		if(isset($_POST["zakaz3"])){
echo ' <div class="form">
<form action="" id="zform" method="post"name="zform">
<table><tr><td><p><label for="user_login">id<br>
 <input  id="id" name="id"size="25"  type="text" value=""></label></p></td>
<td><p><label for="user_login">State<br>
 <input  id="state" name="state"size="25"  type="text" value=""></label></p></td></tr></table>
 <table><tr><td><p><label for="user_login">Автомобиль<br>
 <input  id="vehicle" name="vehicle"size="25"  type="text" value=""></label></p></td>
<td><p><label for="user_pass">Обьем<br>
<input  id="volume" name="volume" size="25"type="text" value=""></label></p></td></tr></table>
<table><tr><td><p><label for="user_pass">Вес<br>
<input  id="weight" name="weight"size="25" type="text" value=""></label></p></td>
<td><p><label for="user_login">Username<br>
 <input  id="username" name="username"size="25"  type="text" value=""></label></p></td></tr></table>
<table><tr><td><p><label for="user_pass">Город отправления<br>
<input  id="city" name="city"size="25"   type="text" value=""></label></p></td>
<td><p><label for="user_pass">Город назначения<br>
<input  id="cityn" name="cityn"size="25"   type="text" value=""></label></p></td></tr>
</table>
<table><tr><td><p><label for="user_pass">Улица<br>
<input  id="street" name="street"size="25"   type="text" value=""></label></p></td>
<td><p><label for="user_pass">Улица<br>
<input  id="streetn" name="streetn"size="25"   type="text" value=""></label></p></td></tr></table>
<table><tr><td><p><label for="user_pass">Дом<br>
<input  id="house" name="house"size="25"   type="text" value=""></label></p></td>
<td><p><label for="user_pass">Дом<br>
<input  id="housen" name="housen"size="25"   type="text" value=""></label></p></td></tr></table>
<table><tr><td><p><label for="user_pass">Квартира<br>
<input  id="flat" name="flat"size="25"   type="text" value=""></label></p></td>
<td><p><label for="user_pass">Квартира<br>
<input  id="flatn" name="flatn"size="25"   type="text" value=""></label></p></td></tr></table>
<input class="button" name="zakaz4" type="submit" id="zakaz4" value="Изминить" > 
</form>
</div>
';
}
?>

<?php 

	if(isset($_POST["zakaz4"])){
	
  $vehicle= htmlspecialchars($_POST['vehicle']);
	$volume=htmlspecialchars($_POST['volume']);
 $weight=htmlspecialchars($_POST['weight']);
 $city=htmlspecialchars($_POST['city']);
  $street= htmlspecialchars($_POST['street']);
	$streetn=htmlspecialchars($_POST['streetn']);
 $flatn=htmlspecialchars($_POST['flatn']);
 $flat=htmlspecialchars($_POST['flat']);
  $house= htmlspecialchars($_POST['house']);
	$housen=htmlspecialchars($_POST['housen']);
 $cityn=htmlspecialchars($_POST['cityn']);
$username=htmlspecialchars($_POST['username']);
$id=htmlspecialchars($_POST['id']);
$state=htmlspecialchars($_POST['state']);
if(!empty($_POST['username'])) 
{
 $result=mysqli_query($connection,"UPDATE `zakazi` SET `username`='$username' WHERE `id`='$id'");
}
if( !empty($_POST['vehicle'])) 
{
 $result=mysqli_query($connection,"UPDATE `zakazi` SET `vehicle`='$vehicle' WHERE `id`='$id'");
}
if( !empty($_POST['volume']))
{
 $result=mysqli_query($connection,"UPDATE `zakazi` SET `volume`='$volume' WHERE `id`='$id'");
} 
if( !empty($_POST['weight']))
{
 $result=mysqli_query($connection,"UPDATE `zakazi` SET `weight`='$weight' WHERE `id`='$id'");
} 
if( !empty($_POST['city']))
{
 $result=mysqli_query($connection,"UPDATE `zakazi` SET `city`='$city' WHERE `id`='$id'");
} 
if( !empty($_POST['street'])) 
{
 $result=mysqli_query($connection,"UPDATE `zakazi` SET `street`='$street' WHERE `id`='$id'");
} 
if( !empty($_POST['house'])) 
{
 $result=mysqli_query($connection,"UPDATE `zakazi` SET `house`='$house' WHERE `id`='$id'");
} 
if( !empty($_POST['flat']))
{
 $result=mysqli_query($connection,"UPDATE `zakazi` SET `flat`='$flat' WHERE `id`='$id'");
} 
if( !empty($_POST['cityn']))
{
 $result=mysqli_query($connection,"UPDATE `zakazi` SET `cityn`='$cityn' WHERE `id`='$id'");
} 
if( !empty($_POST['streetn'])) 
{
 $result=mysqli_query($connection,"UPDATE `zakazi` SET `streetn`='$streetn' WHERE `id`='$id'");
} 
if( !empty($_POST['housen']))
{
 $result=mysqli_query($connection,"UPDATE `zakazi` SET `housen`='$housen' WHERE `id`='$id'");
}  
if( !empty($_POST['flatn']))
{
 $result=mysqli_query($connection,"UPDATE `zakazi` SET `flatn`='$flatn' WHERE `id`='$id'");
} 
 if(!empty($_POST['state']))
{
 $result=mysqli_query($connection,"UPDATE `zakazi` SET `state`='$state' WHERE `id`='$id'");
} 
 if($result){
	$message = "Order Upadated Created";
} else {
 $message = "Failed to insert data information!";
  }
	}
	?>

<?php 
if(!($adm))
	{
if(isset($_POST["zakaz2"])){
$username=$_SESSION['session_username'];
$query= mysqli_query($connection,"SELECT * FROM zakazi WHERE username='$username'");
echo'Ваши запросы: '.mysqli_num_rows($query);
if (mysqli_num_rows($query)<>0)
{
echo'</br>';echo'</br>';
echo "<table width=100% border=1 cellpadding=10> <tr> <td>Автомобиль </td> <td>Обьем  </td> <td>Вес  </td> <td>Город назначения  </td><td>Город отправления  </td> <td>Улица назначения  </td><td>Улица отправления 
</td> <td>Дом назначения </td><td>Дом отправления </td> <td>Квартира назначения  </td><td>Квартира отправления  </td><td>Статус</td></tr>";
while($row = mysqli_fetch_assoc($query))
{
echo '<tr><td>'.$row['vehicle'].' </td><td>'.$row['volume']
.' </td> <td>'.$row['weight'].' </td> <td>'.$row['cityn'].' </td> <td>'.$row['city']
.' </td> <td>'.$row['streetn'].' </td> <td>'.$row['street']
.' </td>  <td>'.$row['housen'].' </td> <td>'.$row['house']
.' </td> <td>'.$row['flatn'].' </td><td>'.$row['flat'].' </td> <td>'.$row['state'].' </td> </tr> ';
}
echo '</table>';
}
}
	}
	else
	{
		if(isset($_POST["zakaz2"])){
$query= mysqli_query($connection,"SELECT * FROM zakazi WHERE 1");
echo'Всего запросов: '.mysqli_num_rows($query);
if (mysqli_num_rows($query)<>0)
{
echo'</br>';echo'</br>';
echo "<table width=100% border=1 cellpadding=10> <tr> <td>id</td> <td>Username</td> <td>Автомобиль </td> <td>Обьем  </td> <td>Вес  </td> <td>Город назначения  </td><td>Город отправления  </td> <td>Улица назначения  </td><td>Улица отправления 
</td> <td>Дом назначения </td><td>Дом отправления </td> <td>Квартира назначения  </td><td>Квартира отправления  </td><td>Статус</td></tr>";
while($row = mysqli_fetch_assoc($query))
{
echo '<tr><td>'.$row['id'].' </td><td>'.$row['username'].' </td><td>'.$row['vehicle'].' </td><td>'.$row['volume']
.' </td> <td>'.$row['weight'].' </td> <td>'.$row['cityn'].' </td> <td>'.$row['city']
.' </td> <td>'.$row['streetn'].' </td> <td>'.$row['street']
.' </td>  <td>'.$row['housen'].' </td> <td>'.$row['house']
.' </td> <td>'.$row['flatn'].' </td><td>'.$row['flat'].' </td><td>'.$row['state'].' </td></tr> ';
}
echo '</table>';
}
}
	}
?>
<? endwhile; ?>
</div>
<div class="diff"></div>

		<div class="info">
         <div class="text_info">
		 by PedFox Design
         </div>  </div>
</body>
</html>

<?php endif; ?>