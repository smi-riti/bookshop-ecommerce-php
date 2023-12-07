
<?php include_once "connect.php";

if(!isset($_SESSION['account'])){
    echo "<script>window.open('login.php','_self')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
<?php include_once "header.php"; 

//calling orders and order items here
$user_id = $getUser['user_id'];
$order = mysqli_query($connect, "select * from orders JOIN coupon ON orders.coupon_id= coupon.coupon_id  where user_id='$user_id' and is_ordered ='0'");

 $myOrder = mysqli_fetch_array($order);
 $count_myorder = mysqli_num_rows($order);
 
  

?>



<div class="container p-5">
    <div class="row">
       <div class="col-6 mx-auto ">
           <div class="card bg-success text-white">
            <div class="card-body text-center">
            <h1>Wow! Order Placed SuccessFully</h1>
            <p>Click Here To See <a href="" class="text-white">My Order</a> Page to Know More Details<p>
                <div class="d-flex justify-content-end">
                    <a href="" class="btn btn-light">My Orders</a>
                </div>
            </div>
           </div>
        </div>
    </div>
</div>
