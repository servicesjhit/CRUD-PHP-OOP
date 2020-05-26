<?php

require_once"Autoload.php";

 $env = new Classes\Environment;
 $env = $env->env;


 $config = new Classes\Config($env);


$user = new Classes\User($config);

if (isset($_GET['id'])) {
    $row = $user->getUser($_GET['id']);
} else {
    echo "record not selected";
}
if (isset($_POST['submit'])) {
    $result = $user->updateUser(file_get_contents("php://input"));
}
?>
<?php
echo
'<form action="#" method="POST" accept-charset="utf-8">
<input type="hidden" name="id" value="'.$_GET['id'].'">
	First Name : <input type="text" name="firstname" value="'.$row->firstname.'" placeholder="Your FirstName"><br><br>
	Last Name : <input type="text" name="lastname" value="'.$row->lastname.'" placeholder="Your LastName"><br><br>
	<input type="submit" name="submit" value="Submit">
</form>';
