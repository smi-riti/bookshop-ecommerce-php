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
                    <h2 class="text-white">Insert New Books</h2>
                    <a href="manage_book.php" class="btn btn-light"> Go Back</a>
                </div>
            </div>
            <div class="card">
                    <div class="card-header">
                        <h5>Insert Book Details</h5>

                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="row">
                            <div class="mb-3 col">
                                <label for="author">author</label>
                                <input type="text" name="author" id="author" class="form-control">
                            </div>
                            <div class="mb-3 col">
                                <label for="no_of_pages">no_of_pages</label>
                                <input type="text" name="no_of_pages" id="no_of_pages" class="form-control">
                            </div>
                            </div>
                            <div class="row">
                            <div class="mb-3 col">
                                <label for="price">price</label>
                                <input type="text" name="price" id="price" class="form-control">
                            </div>
                            <div class="mb-3 col">
                                <label for="discount_price">discount_price</label>
                                <input type="text" name="discount_price" id="discount_price" class="form-control">
                            </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="category">category</label>
                                    <select  name="category" id="category" class="form-select">
                                    <option value="">Select categories here</option>
                                    <?php
                                        $query = mysqli_query($connect,"select *from categories");
                                        while($row = mysqli_fetch_array($query)){
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            echo "<option value='$cat_id'>$cat_title</option>";
                                        }
                                    ?>
                                
                                </select>
                                </div>
                                <div class="mb-3 col">
                                    <label for="cover_image">cover_image</label>
                                    <input type="file" name="cover_image" id="cover_image" class="form-control">
                                    
                                </div>
                                <div class="mb-3 col">
                                    <label for="nos">nos</label>
                                    <input type="text" name="nos" id="nos" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description">description</label>
                                <textarea rows="3" type="text" name="description" id="description" class="form-control"></textarea>
                            </div>
                            <div class="mb-3 ">
                                <label for="isbn">isbn</label>
                                <input type="text" name="isbn" id="isbn" class="form-control">
                            </div>
                                <div class="mb-3 ">
                                    
                                    <input type="submit" name="create_book" value = "insert book"class="btn btn-success">
                                </div>
                        </form>
                        <?php if(isset($_POST['create_book'])){
                            $title = $_POST['title'];
                            $author = $_POST['author'];
                            $isbn = $_POST['isbn'];
                            $description = $_POST['description'];
                            $price = $_POST['price'];
                            $discount_price = $_POST['discount_price'];
                            $category = $_POST['category'];
                            $no_of_pages = $_POST['no_of_pages'];
                            $nos = $_POST['nos'];

                            //image work

                            $cover_image = $_FILES['cover_image']['name'];
                            $tmp_cover_image = $_FILES['cover_image']['tmp_name'];
                            move_uploaded_file($tmp_cover_image,"../images/$cover_image");
                            $query = mysqli_query($connect,"insert into books (title, author,isbn,description,price,discount_price,category,nos,no_of_pages,cover_image) value('$title','$author','$isbn','$description','$price','$discount_price','$category','$nos','$no_of_pages','$cover_image')");

                            if($query){
                                echo "<script>window.open('manage_book.php','_self')</script>";
                            }
                            else{
                                echo "<script>alert('failed')</script>";

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