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
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 border rounded my-5">
            <h2 class="text-primary my-3 text-center mt-3" ><span class="text-dark" >CRUD</span> Operation</h2>
                <form class="form" method="POST" action="step2.php" id="form" >
                    <div class="form-group" >
                    <label for="" class="form-label" >Enter Name</label>
                   <input type="text" name="name" placeholder="Name" class="form-control" required id="">
                   </div>
                   <div class="form-group" >
                    <label for="" class="form-label" >Username</label>
                   <input type="text" name="uname" placeholder="Username" class="form-control" required id="">
                   </div>
                   <div class="form-group" >
                    <label for="" class="form-label" >Password</label>
                   <input type="password" name="pass" placeholder="Password" class="form-control" required id="pass">
                   </div>
                   <div class="form-group" >
                    <label for="" class="form-label" >Confirmed Password</label>
                   <input type="password" id="cpass" name="cpass" placeholder="Confirmed Password" required class="form-control">
                   <span class="text-danger" id="errormsg" ></span>
                   </div>
                   <button type="submit" name="btn" class="form-control my-3 btn btn-dark" >Next</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <script>
        const form =document.getElementById('form');
        const pass =document.getElementById('pass');
        const cpass =document.getElementById('cpass');
        const error =document.getElementById('errormsg');

        form.addEventListener('submit', function(e){

            // Clear any previous error message
            error.textContent = '';

            // Compare password and confirm password
            if(pass.value !== cpass.value) {
                // Prevent form submission
                e.preventDefault();
                // Show error message
                error.textContent = 'Password Does Not Match';
            }
        });
    </script>
</body>
</html>
