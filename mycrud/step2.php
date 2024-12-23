<?php
include 'db_connect.php';  

session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['uname'] = $_POST['uname'];
    $_SESSION['pass'] = $_POST['pass'];
    $_SESSION['cpass'] = $_POST['cpass'];
} else {
    header('location:index.php');
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
                <form class="form" method="POST" action="step3.php">
                    <div class="form-group">
                        <label for="">Your Skills</label><br>
                        <input type="checkbox" name="skills[]" value="HTML"> HTML <br>
                        <input type="checkbox" name="skills[]" value="CSS"> CSS <br>
                        <input type="checkbox" name="skills[]" value="JavaScript"> JavaScript <br>
                        <input type="checkbox" name="skills[]" value="Bootstrap"> Bootstrap <br>
                        <input type="checkbox" name="skills[]" value="JQuery/AJAX"> JQuery/AJAX
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label><br>
                        <input type="radio" name="gender" value="Male"> Male <br>
                        <input type="radio" name="gender" value="Female"> Female
                    </div>
                    <button type="submit" name="btn" class="form-control my-3 btn btn-dark">Next</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>
