<?php include_once "connect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <?php include_once "header.php";?>

    <div class="container">
        <div class="row">
            <div class="col-5 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>Create an Account</h2>

                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="enter your name here">
                            </div>
                            <div class="mb-3">
                                <label for="email">email</label>
                                <input type="email" name="email" class="form-control" placeholder="enter your email here">
                            </div>
                            <div class="mb-3">
                                <label for="password">password</label>
                                <input type="password" name="password" class="form-control" placeholder="enter your password here">
                            </div>
                            <div class="mb-3">

                                <input type="submit" name="create" class="btn btn-info w-100"value="Sign Up">
                            </div>
                        </form>
                        <?php

                            if(isset($_POST['create'])){
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $password = md5($_POST['password']);

                                $query= mysqli_query($connect,"insert into accounts (name, email, password) value ('$name','$email','$password')");

                                if($query){
                                    echo "<script>window.open('login.php','_self')</script>";
                                }
                                else{
                                    echo"<script>alert('failed')</script>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>