<?php
include 'db_connect.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>
    <?php
    include 'links.php'; 
    ?>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="card my-5" style="width: 100%;">
            <?php
            $id = $_GET['user_id'];
            $sql = "SELECT * FROM user WHERE user_id='$id'";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            ?>
  <center>
  <img src="upload/<?php echo $row['image']; ?>" width="100px" height="100px" class="rounded-circle my-4" alt="<?php $row['name']; ?>">
  </center>
  <div class="card-body">
    <h5 class="card-title text-center"><?php echo $row['name']; ?></h5>
    <p class="card-text"><?php echo "@".$row['user_name'].""; ?></p>
    <p class="card-text"><?php echo $row['gender']; ?></p>
    <a href="delete.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-danger form-control">Delete</a>
    <a href="read.php" class="btn btn-outline-dark form-control my-2">Back</a>
  </div>
</div>
        </div>
        <div class="col-md-4"></div>
    </div>
    </div>
</body>
</html>