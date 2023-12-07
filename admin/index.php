<?php include_once "../connect.php";
//checking admin or not
if(!isset($_SESSION['admin'])){
    echo "<script>window.open('../login.php','_self')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookshop_admin panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body class="bg-secondary">
  <?php include_once "./admin_header.php"; ?>

  <div class="container">
    <div class="row">
        <div class="col-3">
        <?php include_once "sidebar.php";?>

        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-4">
                    <div class="card   bg-warning">
                        <div class="card-body">
                            <h1 ><?php 
                           echo $countBooks = mysqli_num_rows(mysqli_query($connect,"select * from books"));
                            
                            ?>
                            </h1>
                            <h1>total books</h1>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card  text-white bg-danger">
                        <div class="card-body">
                            <h1><?php 
                           echo $countcategories = mysqli_num_rows(mysqli_query($connect,"select * from categories"));
                            
                            ?></h1>
                            <h1>total books</h1>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card  text-white bg-success">
                        <div class="card-body">
                            <h1><?php 
                           echo $countUsers = mysqli_num_rows(mysqli_query($connect,"select * from accounts"));
                            
                            ?></h1>
                            <h1>total books</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>


</body>
</html>