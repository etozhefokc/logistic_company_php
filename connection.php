<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connection = mysqli_connect('localhost','root','','userlistdb') or die ('Ошибка соединения с MySQL-сурвером');
mysqli_set_charset($connection,'utf8');
$selectdb = mysqli_select_db($connection,'userlistdb');
?>