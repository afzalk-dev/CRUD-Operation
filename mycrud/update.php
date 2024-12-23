<?php
ob_start();
include 'db_connect.php';  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
    <?php include 'links.php'; ?>
</head>
<body>
    <?php
    $id = $_GET['user_id'];
    $sql = "SELECT * FROM user WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        // Convert skills (comma-separated) into an array
        $skills = explode(',', $row['skills']);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 border rounded my-5">
                <h2 class="text-primary my-3 text-center mt-3">
                    <span class="text-dark">Update</span> Data
                </h2>
                <form class="form" method="POST" action="" id="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Enter Name</label>
                            <input type="text" value="<?php echo $row['name']; ?>" name="name" placeholder="Name" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="uname" value="<?php echo $row['user_name']; ?>" placeholder="Username" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Your Skills</label><br>
                            <input type="checkbox" name="skills[]" value="HTML" <?php if (in_array('HTML', $skills)) echo 'checked'; ?>> HTML <br>
                            <input type="checkbox" name="skills[]" value="CSS" <?php if (in_array('CSS', $skills)) echo 'checked'; ?>> CSS <br>
                            <input type="checkbox" name="skills[]" value="JavaScript" <?php if (in_array('JavaScript', $skills)) echo 'checked'; ?>> JavaScript <br>
                            <input type="checkbox" name="skills[]" value="Bootstrap" <?php if (in_array('Bootstrap', $skills)) echo 'checked'; ?>> Bootstrap <br>
                            <input type="checkbox" name="skills[]" value="JQuery/AJAX" <?php if (in_array('JQuery/AJAX', $skills)) echo 'checked'; ?>> JQuery/AJAX
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Gender</label><br>
                            <input type="radio" name="gender" value="Male" <?php if ($row['gender'] == 'Male') echo 'checked'; ?>> Male <br>
                            <input type="radio" name="gender" value="Female" <?php if ($row['gender'] == 'Female') echo 'checked'; ?>> Female
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Choose Country</label>
                            <select name="country" class="form-control">
                                <option value="">Choose Country</option>
                                <option value="Pakistan" <?php if ($row['country'] == 'Pakistan') echo 'selected'; ?>>Pakistan</option>
                                <option value="India" <?php if ($row['country'] == 'India') echo 'selected'; ?>>India</option>
                                <option value="USA" <?php if ($row['country'] == 'USA') echo 'selected'; ?>>USA</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="UserImage">Choose Image</label>
                            <input type="file" name="UserImage" accept=".jpg, .png, .jpeg, .jfif" class="form-control">
                            <p>Current Image: <?php echo $row['image']; ?></p>
                        </div>
                    </div>
                    <button type="submit" name="updbtn" class="form-control my-3 btn btn-dark">Update</button>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <?php } ?>
</body>
</html>


<?php
include 'db_connect.php';

if (isset($_POST['updbtn'])) {
    $id = $_GET['user_id']; // Assuming `user_id` is passed in the URL
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $skills = implode(',', $_POST['skills']); // Convert array to comma-separated string
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $image = $_FILES['UserImage']['name'];

    // Handle file upload
    if (!empty($image)) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($image);
        move_uploaded_file($_FILES['UserImage']['tmp_name'], $targetFile);
    } else {
        // If no new image is uploaded, retain the old image
        $query = "SELECT image FROM user WHERE user_id = '$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $image = $row['image'];
    }

    // Update the record
    $updateQuery = "UPDATE user SET 
                    name = '$name', 
                    user_name = '$uname', 
                    skills = '$skills', 
                    gender = '$gender', 
                    country = '$country', 
                    image = '$image'
                    WHERE user_id = '$id'";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Record Updated Successfully');</script>";
        header('Location:read.php'); // Redirect to the main page
    } else {
        echo "<script>alert('Error: Unable to update record');</script>";
    }
}
ob_end_flush();
?>
