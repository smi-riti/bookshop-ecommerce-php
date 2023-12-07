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
    <title> manage book || bookshop_admin panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body class="bg-secondary">
  <?php include_once "./admin_header.php"; ?>

  <div class="container-fluid">
    <div class="row">
        <div class="col-3">
           <?php include_once "sidebar.php";?>
        </div>
        <div class="col-9">
        <div class="row">
                <div class="col-12 mb-2 d-flex justify-content-between">
                    <h2 class="text-white">Mange Books</h2>
                    <a href="insert_book.php" class="btn btn-light">Insert Book</a>
                </div>
        </div>
            <table class=" table table-bordered bg-light table-hover table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>author</th>
                        <th>ISBn</th>
                        <th>price</th>
                        <th>image</th>
                        <th>action</th>
                        
                    </tr>


                </thead>

                <?php $callingBooks = mysqli_query($connect,"select * from books");
                while($data = mysqli_fetch_array($callingBooks)):
                    ?>
                    <tr>
                        <td><?= $data['id'];?></td>
                        <td><?= $data['title'];?></td>
                        <td><?= $data['author'];?></td>
                        <td><?= $data['isbn'];?></td>
                        <td><?= $data['discount_price'];?><del><?= $data['price'];?></del></td>
                        <td>
                            <img   src="../images/<?= $data['cover_image'];?>" width = "40px" alt="">
                            </td>
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