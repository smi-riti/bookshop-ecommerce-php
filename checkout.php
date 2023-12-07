
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
</head>
<body>
<?php include_once "header.php"; 

//calling orders and order items here
$user_id = $getUser['user_id'];
$order = mysqli_query($connect, "select * from orders JOIN coupon ON orders.coupon_id= coupon.coupon_id  where user_id='$user_id' and is_ordered ='0'");

 $myOrder = mysqli_fetch_array($order);
 $count_myorder = mysqli_num_rows($order);
 
  

?>



<div class="container">
    <div class="row">
        
        
  
                <div class="col-8">
                    <h1>Checkout </h1>
                    <div class="card">
                        <div class="card-header">
                            Add Adress
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="">Alternative Name</label>
                                        <input type="text" name="alt_name" class="form-control" value="<?= $getUser['name']; ?>">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="">Primary Contact</label>
                                        <input type="text" name="alt_contact" placeholder="eg.0000000000" class="form-control" value="">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="">Type</label>
                                        <select type="text" name="type" class="form-select" >
                                            <option value="">Select Adress Type</option>
                                            <option value="0">Office</option>
                                            <option value="1">Home</option>
                                            <option value="2">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="">Street</label>
                                        <input type="text" placeholder="e.g MG road" name="street" class="form-control" value="">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="">Area/Village</label>
                                        <input type="text" name="area" placeholder = "e.g Shiv nagar"class="form-control" value="">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="">House Holding No</label>
                                        <input type="text" name="house_no" placeholder="112200B" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="">Landmark</label>
                                        <input type="text" name="landmark" placeholder="e.g near shiv mandir" class="form-control" value="">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="">City</label>
                                        <input type="text" name="city" placeholder="e.g Patna" class="form-control" value="">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="">State</label>
                                        <input type="text" name="state" placeholder="Bihar" class="form-control" value="">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="">Pincode</label>
                                        <input type="text" name="pincode" placeholder="000000" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="submit" class="btn btn-primary w-100" name="save_Adress" Value="Save Adress">
                                </div>
                            </form>


                        </div>
                    </div>
                   
                </div>

                <div class="col-4">
                    <h2>Saved Adress</h2>
                    <form action="" method="post">
                        <div class="grid">
                            <?php
                            $callingSavedAdress = mysqli_query($connect,"select * from adress where user_id = '$user_id'");
                            while($add=mysqli_fetch_array($callingSavedAdress)):
                            
                            ?>
                        <label class="card">
                                <input name="address_id" class="radio" type="radio" value="<?= $add['address_id'];?>" checked>
                                
                                <span class="plan-details">
                                    <span class="plan-type"><?= ($add['type'] == 0)? "Office" : (($add['type'] == 1)? "Home" : "Others");?></span>
                                    <span class="plan-cost"><?= $add['alt_name'];?></span>
                                    <span class=""><?= $add['alt_contact'];?></span>
                                    <span><?= $add['house_no'] . " | " .  $add['street'] . "-" . $add['area'] .  " <br>Landmark: " . $add['landmark'] . "<br>" . $add['city'] . " (" . $add['state'] . ") - ".$add['pincode'];?></span>
                                    <a href="checkout.php?address_id=<?= $add['address_id'];?>" class="badge bg-danger text-white text-decoration-none ms-auto">Delete</a>
                                </span>
                                

                                
                            </label>
                            <?php endwhile;?>
            
                        </div>
                    

                    <div class="d-flex justify-content-between mt-2">
                        <a href="" class="btn btn-dark">Go back</a>
                        <input type="submit" class="btn btn-primary btn-lg" name="make_payment" value="Make Payment">
                    </div>
                    </form>
                    
                </div>
       
    </div>
</div>
<?php 
if(isset($_POST['save_Adress'])){
    $alt_name = $_POST['alt_name'];
    $alt_contact = $_POST['alt_contact'];
    $street = $_POST['street'];
    $area = $_POST['area'];
    $landmark = $_POST['landmark'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $house_no = $_POST['house_no'];
    $type = $_POST['type'];

    $user_id = $getUser['user_id'];

    $queryForInsertAdress = mysqli_query($connect,"insert into adress (alt_name,alt_contact,street,area,landmark,city,state,pincode,house_no,user_id,type) value ('$alt_name','$alt_contact','$street','$area','$landmark','$city','$state','$pincode','$house_no','$user_id','$type')");

    if($queryForInsertAdress){
        echo "<script>window.open('checkout.php','_self')</script>";
    }
    else{
        echo "<script>alert('failed to create save adress')</script>";
    } 
    
}

if(isset($_GET['address_id'])){
    $id = $_GET['address_id'];
    $user_id =$getUser['user_id'];
    $query_for_delete_address = mysqli_query($connect,"delete from adress where address_id = '$id' and user_id =' $user_id'");
    if($query_for_delete_address){
        echo "<script>window.open('checkout.php','_self')</script>";
    }
    else{
        echo "<script>alert('failed to delete address')</script>";
    } 
    
}

if(isset($_POST['make_payment'])){
    $address_id = $_POST['address_id'];
    $order_id = $myOrder['order_id'];
     //update this address in order record
     $query_for_address_update = mysqli_query($connect,"update orders SET address_id='$address_id' where user_id='$user_id' and order_id = '$order_id'");
     if($query_for_address_update){
        echo "<script>window.open('make_payment.php','_self')</script>";
    }
    else{
        echo "<script>alert('failed to proceed')</script>";
    } 
    
}