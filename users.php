<?php

require_once"Autoload.php";

 $env = new Classes\Environment;
 $env = $env->env;


 $config = new Classes\Config($env);


$user = new Classes\User($config);
$results = $user->getUsers();
if (isset($_GET['id'])) {
    $user->deleteUser($_GET['id']);
}
echo'<link rel="stylesheet" href="style.css">';
echo "<table>";
echo '<tr>
<th>ID</th><th>First Name</th><th>Last Name</th><th>Update</th><th>Delete</th>
		</tr>';

foreach ($results as $row) {
        echo '<tr>';
         
        echo '<td>'    . $row->id .    '</td>';
   
        echo '<td>'     . $row->firstname.        '</td>';
            
        echo '<td>'     . $row->lastname.          '</td>';
        
        echo '<td><a href="update.php?id='.$row->id.'"><button type="submit" name="update" value="'.$row->id.'">Update</button></a></td>';

        echo '<td><a href="users.php?id='.$row->id.'"><button type="submit" name="delete" value="'.$row->id.'">Delete</button></a></td>';
     
        echo '</tr>'.'</br>';
}
echo "</table>";
