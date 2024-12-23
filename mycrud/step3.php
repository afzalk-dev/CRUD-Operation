<?php
include 'db_connect.php';  

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Saving selected skills and gender to session
    $_SESSION['skills'] = isset($_POST['skills']) ? implode(',', $_POST['skills']) : null;
    $_SESSION['gender'] = isset($_POST['gender']) ? $_POST['gender'] : null;
}
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
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 border rounded my-5">
            <h2 class="text-primary my-3 text-center mt-3"><span class="text-dark">CRUD</span> Operation</h2>
                <form class="form" method="POST" action="insert.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Choose Country</label>
                        <select name="country" class="form-control">
                            <option value="" selected>Choose Country</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="UserImage">Choose Image</label>
                        <input type="file" name="UserImage" accept=".jpg, .png, .jpeg, .jfif" class="form-control" required>
                    </div>
                    <button type="submit" name="btn" class="form-control my-3 btn btn-dark">Submit</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>
