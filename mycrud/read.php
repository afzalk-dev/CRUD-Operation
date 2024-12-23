<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
    <?php
    include 'links.php'; 
    ?>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-5">View <span class="text-primary" >Record</span></h2>
<table class="table table-hover my-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Skills</th>
      <th scope="col">Gender</th>
      <th scope="col">Country</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM user";
    $res = mysqli_query($conn, $sql);
    $i = 1;
    $num_row = mysqli_num_rows($res);
    if($num_row > 0)
    {
        while($row = mysqli_fetch_assoc($res))
        {
            echo "<tr>";
            echo "<td scope='col' >".$i."</td>";
            $image = $row['image'];
            echo "<td scope='col' >
            <img src='upload/".$image."' width='60' height='60' class='rounded' >
            </td>";
            echo "<td scope='col' >".$row['name']."</td>";
            echo "<td scope='col' >".$row['skills']."</td>";
            echo "<td scope='col' >".$row['gender']."</td>";
            echo "<td scope='col' >".$row['country']."</td>";
            echo "<td scope='col' >
            <a href='update.php?user_id=".$row['user_id']."' class='btn btn-primary'>Edit</a> 
            <a href='delete.php?user_id=".$row['user_id']."' class='btn btn-danger' onclick='return confirm(\"Are You Sure!\")'>Delete</a>
            <a href='details.php?user_id=".$row['user_id']."' class='btn btn-success'>View</a>
            </td>";

            $i++;
        }
    } 
    ?>
  </tbody>
</table>
</div>
</body>
</html>