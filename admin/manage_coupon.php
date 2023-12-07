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
    <title> manage coupon || bookshop_admin panel</title>
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
                    <h2 class="text-white">Manage Coupons</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Insert Coupon Details</h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="coupon_code">Coupon Code</label>
                                    <input type="text" placeholder="enter coupon_code" id="coupon_code" name="coupon_code" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="coupon_amount">Coupon Amount</label>
                                    <input type="text" placeholder="enter coupon_amount" id="coupon_amount" name="coupon_amount" class="form-control">
                                </div>
                                <div class="mb-3">
                                    
                                    <input type="submit"  name="create_coupon" value="Insert coupon" class="btn btn-dark">
                                </div>
                            </form>
                            <?php if(isset($_POST['create_coupon'])){
                                
                                    $coupon_code = $_POST['coupon_code'];
                                    $coupon_amount = $_POST['coupon_amount'];
                                    $query = mysqli_query($connect,"insert into coupon (coupon_code,coupon_amount) value           ('$coupon_code','$coupon_amount')  ");

                                if($query){
                                    echo "<script>window.open('manage_coupon.php','_self')</script>";
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
                                <th>coupon_id</th>
                                <th>coupon_code</th>
                                <th>coupon_amount</th>
                                
                                <th>action</th>
                                
                            </tr>


                        </thead>

                        <?php $callingCoupon = mysqli_query($connect,"select * from coupon");
                        while($data = mysqli_fetch_array($callingCoupon)):
                            ?>
                        <tr>
                            <td><?= $data['coupon_id'];?></td>
                            <td><?= $data['coupon_code'];?></td>
                            <td><?= $data['coupon_amount'];?></td>
                            
                                <td><div class="btn-group">
                                    <a href="manage_coupon.php?coupon_id=<?= $data['coupon_id'];?>" class="btn btn-danger">X</a>
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
<?php

if(isset($_GET['coupon_id'])){
    $coupon_id = $_GET['coupon_id'];
    $query = mysqli_query($connect, "delete from coupon where coupon_id='$coupon_id'");

    if($query){
        echo "<script>window.open('manage_coupon.php','_self')</script>";
    }
    else{
        echo "<script>alert('failed')</script>";
    }
}
?>