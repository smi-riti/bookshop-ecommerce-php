<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <div class="navbar navbar-expand-lg navbar-dark bg-success mb-3">
    <div class="container">
        <a href="index.php" class="navbar-brand">Bookshop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true">
            <span class="navbar-toogle-icon"></span>
        </button>

        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                

                <?php
                    if(isset($_SESSION['account'])):
                        $email = $_SESSION['account'];
                    $getUser = mysqli_query($connect,"select * from accounts where email= '$email'");
                    $getUser = mysqli_fetch_array($getUser);
                ?>
                 <li class="nav-item active">
                    <a href="index.php" class="nav-link text-capitalize text-white"><?= $getUser['name'];?></a>
                </li>
                <li class="nav-item ">
                    <a href="cart.php" class="nav-link">Cart</a>
                </li>
               
                <li class="nav-item ">
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </li>
                <?php else: ?>

                <li class="nav-item ">
                    <a href="login.php" class="nav-link">Log in</a>
                </li> <li class="nav-item ">
                    <a href="register.php" class="nav-link">Create an account</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <form action="index.php" class="d-flex ms-2">
            <input type="search" name="search" placeholder="Enter any book title">
            <input type="submit" name="find"class=" btn btn-danger ms-2" value="search">
        </form>
    </div>
  </div>  
</body>
</html>