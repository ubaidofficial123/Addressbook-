<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <!-- Bootstrap CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJr8BQ5f6hA2SgL3r7pykXwP9EmL8fuBvbuPLuD9tiBceqqfAMNJj5wEnHo8" crossorigin="anonymous">
   
   <!-- FontAwesome for icons -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
   
   <style>
      /* Custom Styles */
      body {
         background-color: #1e1e1e;
         color: #ffffff;
      }

      .header {
         background-color: black;
         padding: 10px 0;
         position: sticky;
         top: 0;
         z-index: 999;
      }

      .logo {
         color: gold;
         font-size: 2rem;
         font-weight: bold;
         text-decoration: none;
         padding-left: 15px;
      }

      /* Remove underline from navbar links */
      .navbar a {
         color: gold !important;
         text-decoration: none;
         padding: 10px 15px;
         display: inline-block;
         font-size: 1.1rem;
         transition: all 0.3s ease;
      }

      /* Hover effect for navbar links */
      .navbar a:hover {
         color: #ffd700; /* Light Gold when hovered */
         text-decoration: none;
         border-bottom: none;
      }

      .cart {
         color: gold;
         font-size: 1.3rem;
         text-decoration: none;
         position: relative;
         padding: 10px 15px;
      }

      .cart:hover {
         color: #ffd700;
         transition: all 0.3s ease;
      }

      .cart span {
         background-color: #ff6600;
         color: white;
         border-radius: 50%;
         padding: 5px 10px;
         font-size: 1rem;
         position: absolute;
         top: -5px;
         right: -10px;
      }

      /* Card button styles */
      .card-btn {
         background-color: gold;
         color: black;
         border: none;
         padding: 10px 20px;
         font-size: 1rem;
         border-radius: 5px;
         cursor: pointer;
         transition: background-color 0.3s ease;
      }

      .card-btn:hover {
         background-color: #ffd700;
         color: black;
      }

      /* Border & Animation */
      .navbar a {
         border: 2px solid transparent;
         border-radius: 5px;
      }

      .navbar a:hover {
         border-color: #ffd700;
         box-shadow: 0 0 10px rgba(255, 215, 0, 0.7);
         transform: scale(1.05);
      }

      #menu-btn {
         display: none;
      }

      /* Responsive design for mobile */
      @media (max-width: 768px) {
         .navbar {
            display: none;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
         }
         
         .navbar a {
            padding: 10px;
            font-size: 1.2rem;
         }

         #menu-btn {
            display: block;
            color: gold;
            font-size: 1.8rem;
            cursor: pointer;
         }

         .navbar.active {
            display: flex;
         }
      }
   </style>
</head>
<body>
   
<header class="header">
   <div class="container d-flex justify-content-between align-items-center">
      <!-- Logo -->
      <a href="products.php" class="logo">cosmetic</a>

      <!-- Navbar Links -->
      <nav class="navbar d-flex">
         <a href="../addressbook/jewellery/index.php">Home</a>
         <a href="admin.php">Add Products</a>
         <a href="products.php">View Products</a>
      </nav>

      <?php
         $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
         $row_count = mysqli_num_rows($select_rows);
      ?>

      <!-- Cart Icon -->
      <a href="cart.php" class="cart">
         <i class="fas fa-shopping-cart"></i>
         Cart <span><?php echo $row_count; ?></span>
      </a>

      <!-- Menu Button (for mobile) -->
      <div id="menu-btn" class="fas fa-bars"></div>
   </div>
</header>



<!-- Bootstrap JS & FontAwesome for icon toggling -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<!-- Custom JS for Navbar Toggle on mobile -->
<script>
   const menuBtn = document.getElementById('menu-btn');
   const navbar = document.querySelector('.navbar');

   menuBtn.addEventListener('click', () => {
      navbar.classList.toggle('active');
   });
</script>

</body>
</html>

