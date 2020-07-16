<?php
include('templates/config/db-connect.php');

$sql = 'SELECT * FROM users ';

// make query & get result
$result = mysqli_query($conn, $sql);

 

//fetch the result row as an array
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connections
mysqli_close($conn);
?>

 

<!DOCTYPE html>
<html lang="en" dir="ltr">

 

  <?php include('templates/header.php'); ?>
  </div>
  <div class="container">
    <div class="row">

 

      <?php foreach ($users as $user){ ?>
        <div class="col s4 md3 ">
          <div class="center card z-depth-0">
             <div class="center card-content center">
              <h4 class="brand-text"><?php echo htmlspecialchars($user['name']); ?></h4>
              <h6 ><?php echo htmlspecialchars($user['email']); ?></h6>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>  <?php include('templates/footer.php'); ?>
</html>
 