<?php
include 'db_connect.php';

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Save country to session
    $_SESSION['country'] = isset($_POST['country']) ? $_POST['country'] : ''; // Save country from POST
    
    // Retrieve data from session
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
    $uname = isset($_SESSION['uname']) ? $_SESSION['uname'] : '';
    $pass = isset($_SESSION['pass']) ? $_SESSION['pass'] : '';
    $skillsarray = isset($_SESSION['skills']) ? (array)$_SESSION['skills'] : [];
    $skills = implode(',', $skillsarray);
    $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
    $country = isset($_SESSION['country']) ? $_SESSION['country'] : '';

    // Handle file upload
    if (isset($_FILES['UserImage']) && $_FILES['UserImage']['error'] == 0) {
        $image = $_FILES['UserImage']['name'];
        $tmp_image = $_FILES['UserImage']['tmp_name'];

        // Generate a unique name for the image
        $random = rand(1111, 9999);
        $unique_image = $random . '_' . $image;
        $image_path = 'upload/' . $unique_image;

        if (move_uploaded_file($tmp_image, $image_path)) {
            // Insert data into the database
            $insertquery = "INSERT INTO `user` (`name`, `user_name`, `pass`, `skills`, `gender`, `country`, `image`)
                            VALUES ('$name', '$uname', '$pass', '$skills', '$gender', '$country', '$unique_image')";
            
            $result = mysqli_query($conn, $insertquery);

            if ($result) {
                echo "<script>alert('Data Inserted Successfully');</script>";
                session_unset();
                session_destroy();
                header('location:read.php');
                exit;
            } else {
                echo "<script>alert('Data Not Inserted! Database Error: " . mysqli_error($conn) . "');</script>";
                echo "Query: " . $insertquery; // Debug query
            }
        } else {
            echo "<script>alert('Failed to move uploaded file');</script>";
        }
    } else {
        echo "<script>alert('Image Upload Error');</script>";
    }
}
?>
