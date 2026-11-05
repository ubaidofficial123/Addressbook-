<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_image = $_POST['product_image'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_description = $_POST['product_description'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(image,name, price,description,quantity) VALUES('$product_image', '$product_name', '$product_price', '$product_description','$product_quantity')");
      $message[] = 'product added to cart successfully';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
 <?php

if(isset($message)){
   foreach($message as $message){
      echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
               <strong>'.$message.'</strong>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container mt-5">

<section class="products">

   <h1 class="text-center mb-4">Latest Products</h1>

   <div class="row">
      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="col-md-4 mb-4">
         <div class="card h-100">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" class="card-img-top" alt="<?php echo $fetch_product['name']; ?>">
            <div class="card-body text-center">
               <h5 class="card-title"><?php echo $fetch_product['name']; ?></h5>
               <p class="card-text text-primary">$<?php echo $fetch_product['price']; ?>/-</p>
               <form action="" method="post">
                   <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                  <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                  <input type="hidden" name="product_description" value="<?php echo $fetch_product['description']; ?>">
                  <button type="submit" class="btn btn-primary" name="add_to_cart" >Add to Cart</button>
               </form>
            </div>
         </div>
      </div>
      <?php
         };
      };
      ?>
   </div>

</section>

</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script src="js/script.js"></script>

</body>
</html>
