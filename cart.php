
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php include_once "header.php"; 

//calling orders and order items here
$user_id = $getUser['user_id'];
$order = mysqli_query($connect, "select * from orders LEFT JOIN coupon ON orders.coupon_id= coupon.coupon_id  where user_id='$user_id' and is_ordered ='0'");

 $myOrder = mysqli_fetch_array($order);
 $count_myorder = mysqli_num_rows($order);
  

?>



<div class="container">
    <div class="row">
        <?php
        if($count_myorder > 0):
            $myOrderid = $myOrder['order_id'];
        //getting my order item
            $myOrderItems = (mysqli_query($connect,"select * from order_item JOIN books On order_item.book_id =books.id  where order_id = '$myOrderid' and is_ordered = '0'"));
        $count_order_items = mysqli_num_rows($myOrderItems);
           
              
            if($count_order_items):
           ?>
  
                <div class="col-9">
                    <h1>My Cart (<?= $count_order_items; ?>)</h1>
                    
                    <div class="row">
                        <?php
                        $total_amount = $total_discounted_amount = 0;
                            while($order_item = mysqli_fetch_array($myOrderItems)):
                            
                            $price = $order_item['qty'] * $order_item['price'];
                            $discount_price = $order_item['qty'] * $order_item['discount_price'];
                            ?>
                            <div class="col-12 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="images/<?= $order_item['cover_image'];?> "class="w-100" alt="">
                                        </div>
                                        <div class="col-10">
                                            <h2 class="text-truncate"><?= $order_item['title'];?></h2>
                                            <h6> ₹<?= $order_item['discount_price'];?>
                                            <del class="text-muted small"> ₹<?= $order_item['price'];?></del></h6>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex ">
                                                <a href="cart.php?book_id=<?= $order_item['id'];?>&dfc=true" class="btn btn-danger">-</a>
                                                <span class="btn btn-lg"><?= $order_item['qty'];?></span>
                                                <a href="cart.php?book_id=<?= $order_item['id'];?>&atc=true" class="btn btn-success">+</a>
                                            </div>

                                            <a href="cart.php?delete_item=<?= $order_item['oi_id'];?>" class="btn btn-dark text-white">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            $total_amount += $price;
                            $total_discounted_amount += $discount_price;

                        endwhile; ?>
                    </div>
                </div>

                <div class="col-3">
                    <h2>Price Break</h2>
                    <div class="list-group border border-3">
                        <span class="list-group-item list-group-item-action d-flex justify-content-between">
                            <span class=" h5">Total Amount</span>
                            <span><?= $total_amount;?>/-</span>
                        </span>
                        <span class="list-group-item list-group-item-action d-flex justify-content-between  text-dark">
                            <span class=" h5">Total Discount</span>
                            <span><?= $amount_before_tax =  $total_amount - $total_discounted_amount;?>/-</span>
                        </span>
                        <span class="list-group-item list-group-item-action d-flex justify-content-between  text-dark">
                            <span class=" h5">Total Tax(GST)</span>
                            <span><?= $amount_after_tax =  $total_discounted_amount * 0.18;?>/-</span>
                        </span>
                        <?php
                            if($myOrder['coupon_id']):
                                
                        ?>
                        <span class="list-group-item list-group-item-action   text-dark">
                            <div class="d-flex justify-content-between">
                                <span class=" h5">Coupon Discount</span>
                                <span><?=  $coupon_amount = $myOrder['coupon_amount'];?>/-</span>
                            </div>
                            <div class= "text-center" >
                                <small class="fw-semibold">Coupon applied <?=   $myOrder['coupon_code'];?>
                                <a href="cart.php?remove_coupon=<?=$myOrder['order_id'];?> " class="text-decoration-none text-danger">X</a></small>
                            </div>
                        </span>
                        <?php endif;?>
                        <span class="list-group-item list-group-item-action d-flex justify-content-between bg-danger text-white">
                            <span>Payable Amount</span>
                            <span><?php $payable_amount = $total_discounted_amount + $amount_after_tax ;
                             if($myOrder['coupon_id']){
                                echo $payable_amount - $coupon_amount;
                             }
                             else{
                                echo $payable_amount;
                             }
                            
                            ?>/-</span>
                        </span>
                    </div>

                    <div class="d-flex justify-content-between mt-2">
                        <a href="" class="btn btn-dark">Go back</a>
                        <a href="checkout.php" class="btn btn-primary">Checkout</a>
                    </div>
                    <?php
                            if(!$myOrder['coupon_id']):
                        ?>
                    <div class="mt-3">
                        <form action="" method="post" class="d-flex mt-5" >
                            <input type="text" placeholder="enter coupon code" name="code" class="form-control">
                            <input type="submit" class="btn btn-dark" value="Apply" name="Apply">

                        </form>
                    </div>
                    <?php endif;?>
                </div>
                            
            
            <?php endif; else:?> 
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2> Sorry Your cart is empty .....shop now</h2>
                        <a href='index.php' class='btn btn-dark'>Homepage</a>
                    </div>
                </div>
                <?php endif;?>
        
        
            </div>
      
        
       
        
    </div>
</div>

<?php

if(isset($_GET['book_id']) && isset($_GET['atc'])){

    //check user login or not

    if(!isset($_SESSION['account'])){
        echo "<script>window.open('login.php','_self')</script>";
    }

    
    $book_id = $_GET['book_id'];
    $user_id = $getUser['user_id'];
    // checking order already exists or not
    $check_order = mysqli_query( $connect,"select * from orders where user_id='$user_id' and is_ordered ='0'");
    $count_check_order = mysqli_num_rows($check_order);

    if($count_check_order < 1){
        //not exist prev that why we need to create new order in order table
        $create_order = mysqli_query($connect,"insert into orders (user_id) value ('$user_id')");
        $created_order_id = mysqli_insert_id($connect);
    
        $qty = 1 ;
            //inserting new order_item
            $create_order_item = mysqli_query($connect,"insert into order_item (order_id , book_id, qty) value('$created_order_id','$book_id' ,'$qty')");
            
            
    }
    else{
        //already exist order work
        $current_order = mysqli_fetch_array($check_order);
        $current_order_id = $current_order['order_id'];

        
        $check_order_item = mysqli_query($connect, "select * from order_item where (order_id='$current_order_id'and book_id='$book_id') and is_ordered='0'");
        $current_order_item = mysqli_fetch_array($check_order_item);
        $count_current_order_item = mysqli_num_rows($check_order_item);
        

        
        if($count_current_order_item > 0){
            $current_order_item_id = $current_order_item['oi_id'];
            
            $query_for_qty_update = mysqli_query($connect,"update order_item set qty=qty+1 where oi_id='$current_order_item_id'");

        }

        else{
            $create_order_item = mysqli_query($connect,"insert into order_item (order_id , book_id,qty) value('$current_order_id','$book_id','1')");
        }

    }
   echo"<script>window.open('cart.php','_self')</script>";
   
}

//delete from cart

if(isset($_GET['book_id']) && isset($_GET['dfc'])){

    //check user login or not

    if(!isset($_SESSION['account'])){
        echo "<script>window.open('login.php','_self')</script>";
    }

    
    $book_id = $_GET['book_id'];
    $user_id = $getUser['user_id'];
    // checking order already exists or not
    $check_order = mysqli_query( $connect,"select * from orders where user_id='$user_id' and is_ordered ='0'"); 
    $count_check_order = mysqli_num_rows($check_order);

    
        //already exist order work
        $current_order = mysqli_fetch_array($check_order);
        $current_order_id = $current_order['order_id'];

        
        $check_order_item = mysqli_query($connect, "select * from order_item where (order_id='$current_order_id'and book_id='$book_id') and is_ordered='0'");
        
        $current_order_item = mysqli_fetch_array($check_order_item);

        $count_current_order_item = mysqli_num_rows($check_order_item);
        

        
        if($count_current_order_item > 0){
            $current_order_item_id = $current_order_item['oi_id'];

             $qty=$current_order_item['qty'];

            if($qty == 1){
                $delete_query_for_order_item = mysqli_query($connect,"delete from order_item where oi_id='$current_order_item_id'");
            }
            else{
                $query_for_qty_update = mysqli_query($connect,"update order_item set qty=qty-1 where oi_id='$current_order_item_id'");
            }
        }

//refresh
echo"<script>window.open('cart.php','_self')</script>";

    }
if(isset($_POST['Apply'])){
    $code = $_POST['code'];

    $callingcoupon = mysqli_query($connect,"select * from coupon where coupon_code = '$code'");
    $getcoupon = mysqli_fetch_array($callingcoupon);
    $countcoupon = mysqli_num_rows($callingcoupon);

    if($countcoupon > 0){
        // updating coupon id in order record

        $coupon_id = $getcoupon['coupon_id'];
        $updateOrder = mysqli_query($connect, "update orders SET coupon_id='$coupon_id' where  order_id='$myOrderid'");

        echo "<script>window.open('cart.php','_self')</script>";
    }
    else{
        echo "<script>alert('invalid coupon code')</script>";
    }

    $amount = $getcoupon['coupon_amount'];

}

//delete item directly


if(isset($_GET['delete_item'])){
    $item_id = $_GET['delete_item'];

    $query_for_delete_item = mysqli_query($connect,"delete from order_item where oi_id = '$item_id'");
    if($query_for_delete_item){
        echo "<script>window.open('cart.php','_self')</script>";
    }
    else{
        echo "<script>alert('failed')</script>";
    } 
    
}
// remove coupon
if(isset($_GET['remove_coupon'])){
    $id = $_GET['remove_coupon'];

    $query_for_remove_coupon = mysqli_query($connect,"update orders SET coupon_id = 'NULL' where order_id = '$id'");
    if($query_for_remove_coupon){
        echo "<script>window.open('cart.php','_self')</script>";
    }
    else{
        echo "<script>alert('failed')</script>";
    } 
    
}


?>