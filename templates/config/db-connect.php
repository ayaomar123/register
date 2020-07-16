<?php
//connect to // Db
$conn = mysqli_connect('localhost', 'root', '', 'my_login');

//check connections
if(!$conn){
  echo 'connections error' . mysqli_connect_error();
}


 ?>
