<?php
include('templates/config/db-connect.php');

 

 $name = $email = $password = $passwordConf = '';
  $errors = array('name' => '', 'email'=>'', 'password'=>'', 'passwordConf'=>'' );
  if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
      $errors['name'] = "An name is required! <br/>";
    }else {
      $name = $_POST['name'];  
    }
    if(empty($_POST['email'])){
      $errors['email'] = "An email is required! <br/>";
    }else {
      $email = $_POST['email'];
       if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Email must be valid <br/>";
      }
    }
    if(empty($_POST['password'])){
      $errors['password'] = "A password is required! <br/>";
    }else if(empty($_POST['passwordConf'])) {
      $errors['passwordConf'] = "An passwordConf is required! <br/>";
    }else if($_POST['passwordConf'] == $_POST['password']){
      $password = $_POST['password'];
    }else{
      $errors['passwordConf'] = "A password not match! <br/>";

 

    }
    
      
    
    if(array_filter($errors)){
    }else {
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

 

      $sql = "INSERT INTO users(name,email,password) VALUES('$name', '$email', '$password' ) ";

 

      if(mysqli_query($conn, $sql)){
         header('location:home.php');
      }else{
        echo 'query error:' . mysqli_error($conn);
      }
    }

 

  } 

 

 ?>

 

<!DOCTYPE html>
<html lang="en" dir="ltr">

 

  <?php include('templates/header.php'); ?>
  <section class="container gray-text">
    <form class="" action="" method="POST">
      <label for="">User Name:</label>
      <input type="text" name="name" class="brand-text" >
      <div class="red-text">
        <?php echo $errors['name']; ?>
      </div>
      <label for="">Email:</label>
      <input type="text" name="email" class="brand-text" >
      <div class="red-text">
        <?php echo $errors['email']; ?>
      </div>
      <label for="">password:</label>    
      <input type="text" name="password" class="brand-text">
      <div class="red-text">
        <?php echo $errors['password']; ?>
      </div>
       <label for="">password Conf:</label>    
      <input type="text" name="passwordConf" class="brand-text" >
      <div class="red-text">
        <?php echo $errors['passwordConf']; ?>
      </div>
      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0 ">
      </div>
    </form>
  </section
  <?php include('templates/footer.php'); ?>
</html>