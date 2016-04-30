<?php

//llamado a la clase que hace la conexcion a la base de datos
require'class_sesiones/config.php';
//LLamado a la clase Usuarios para realizar el inicio de sesion
require'class_sesiones/users.php';
//llamado a la clase que ejecutarÃ¡ los queries de Consulta, AdiciÃ³n y EliminaciÃ³n
require'class_sesiones/dbactions.php';
//llamado a la clase encargada de las sesiones
require'class_sesiones/sessions.php';

//creaciÃ³n o instanciamiento de un objeto de la Clase Connection
$objConn = new Connection();
//objeto de la clase users
$objUser = new Users();

//llamamos la funcion que nos conecta a la base de datos
$objConn->get_connected();
//function que realiza la verificaciÃ³n de usuarios e inicio de sesion
$objUser->login_in();



?>