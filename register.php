<?php
require_once'Autoload.php';

 $env = new Classes\Environment;
 $env = $env->env;


 $config = new Classes\Config($env);


$user = new Classes\User($config);
$user->craeteUser(file_get_contents("php://input"));
echo'<form action="#" method="post" accept-charset="utf-8">
	First Name : <input type="text" name="firstname" value="" placeholder="Your FirstName"><br><br>
	Last Name : <input type="text" name="lastname" value="" placeholder="Your LastName"><br><br>
	<input type="submit" name="submit" value="Submit">
</form>';
