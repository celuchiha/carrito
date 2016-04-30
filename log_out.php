<?php

require'class_sesiones/sessions.php';
$objses = new Sessions();
$objses->init();

$objses->destroy();

	header("Location:index.php");

?>