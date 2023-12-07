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
    <title> manage user || bookshop_admin panel</title>
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
            <table class=" table table-striped table-bordered bg-light table-hover ">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>isADMIN</th>
                       
                        <th>action</th>
                        
                    </tr>


                </thead>

                <?php $callingUser = mysqli_query($connect,"select * from accounts");
                while($data = mysqli_fetch_array($callingUser)):
                    ?>
                    <tr>
                        <td><?= $data['user_id'];?></td>
                        <td><?= $data['name'];?></td>
                        <td><?= $data['email'];?></td>
                        <td><?= ($data['isAdmin'])? "True" : "False";?></td>
                        
                        <td>
                            <div class="btn-group">
                                <a href="" class="btn btn-danger">X</a>
                                <a href="" class="btn btn-success">edit</a>
                                <a href="" class="btn btn-info">view</a>
                            </div>
                        </td>
                        
                    </tr>
                    <?php endwhile;?>

            </table>
        </div>
    </div>
  </div>


</body>
</html>