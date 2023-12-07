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
    <title> manage categories || bookshop_admin panel</title>
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
                <div class="col-12 mb-2">
                    <h2 class="text-white">Mange categories</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Insert Categories Details</h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="cat_title">categories title</label>
                                    <input type="text" placeholder="enter category title" id="cat-title" name="cat_title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    
                                    <input type="submit"  name="create_category" value="insert category" class="btn btn-info">
                                </div>
                            </form>
                            <?php if(isset($_POST['create_category'])){
                                
                                    $cat_title = $_POST['cat_title'];
                                    $query = mysqli_query($connect,"insert into categories (cat_title) value           ('$cat_title')  ");

                                if($query){
                                    echo "<script>window.open('insert_book.php','_self')</script>";
                                }
                                else{
                                    echo "<script>alert('failed')</script>";

                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <table class=" table table-bordered bg-light table-hover table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>cat_title</th>
                                
                                <th>action</th>
                                
                            </tr>


                        </thead>

                        <?php $callingCategories = mysqli_query($connect,"select * from categories");
                        while($data = mysqli_fetch_array($callingCategories)):
                            ?>
                        <tr>
                            <td><?= $data['cat_id'];?></td>
                            <td><?= $data['cat_title'];?></td>
                            
                                <td><div class="btn-group">
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
    </div>
  </div>


</body>
</html>