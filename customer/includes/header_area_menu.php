 <header>
     <div class="main_header">
         <!--header top start-->
         <div class="header_top">
             <div class="container">
                 <div class="row align-items-center">
                     <div class="col-lg-4 col-md-5">
                     </div>
                     <div class="col-lg-8 col-md-7">
                         <div class="header_top_links text-right">
                             <ul>
                                 <?php if (!isset($_SESSION['name'])) {
                                    ?>
                                 <li><a href="./customer_login.php">Login</a></li>
                                 <li><a href="../register.php">Register</a></li>';
                                 <?php } ?>
                                 <?php if (isset($_SESSION['name'])) {
                                    ?>

                                 <li><a href="Customer_profile.php"><?php echo $_SESSION['name']; ?></a></li>
                                 <li><a href="logout.php">Logout</a></li>';
                                 <?php } ?>
                                 ?>

                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!--header top start-->

         <!--header middel start-->
         <div class="header_middle">
             <div class="container">
                 <div class="row align-items-center">
                     <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                         <div class="logo">
                             <a href="index.php" style="color: white; font-size: 3em; font-weight: bold;">LARRY
                                 <br>ENERGIES </a>
                         </div>
                     </div>
                     <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                         <div class="header_right_box">
                             <div class="search_container">
                                 <form action="products.php" method="post" onsubmit="return false">

                                     <div class="search_box">
                                         <input placeholder="Search product..." type="text" name="search" id="search">
                                         <button type="submit" id="search_btn">Search</button>
                                     </div>


                                 </form>
                             </div>

                             <div class="header_configure_area">
                                 <div class="header_wishlist">
                                     <a href="./wishlist_profile.php"><i class="icon-heart"></i>


                                     </a>
                                 </div>
                                 <div class="mini_cart_wrapper">
                                     <a href="javascript:void(0)">
                                         <i class="icon-shopping-bag2"></i>


                                     </a>
                                     <!--mini cart-->
                                     <div class="mini_cart">
                                         <div class="mini_cart_inner">
                                             <div class="cart_close">
                                                 <div class="cart_text">
                                                     <h3>cart</h3>
                                                 </div>
                                                 <div class="mini_cart_close">
                                                     <a href="javascript:void(0)"><i class="icon-x"></i></a>
                                                 </div>
                                             </div>
                                             <div class="cart_item">
                                             </div>
                                             <div class="cart_item">


                                             </div>

                                             <div class="mini_cart_table">


                                             </div>
                                         </div>
                                         <div class="mini_cart_footer">


                                         </div>
                                     </div>
                                     <!--mini cart end-->
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!--header middel end-->

         <!--header bottom satrt-->
         <div class="header_bottom sticky-header">
             <div class="container">
                 <div class="row align-items-center">
                     <div class=" col-lg-3">
                         <div class="categories_menu">
                             <div class="categories_title">
                                 <h2 class="categori_toggle">ALL CATEGORIES</h2>
                             </div>
                             <div class="categories_menu_toggle">
                                 <ul>


                                     <?PHP
                                        include "./db/db.php";
                                        //$selecte_id = $_SESSION["uid"];
                                        $data = "SELECT * FROM categories ";
                                        $view = mysqli_query($con, $data);
                                        while ($_view = mysqli_fetch_assoc($view)) {

                                            $cat_title = $_view['cat_title'];
                                            $cat_id = $_view['cat_id'];

                                        ?>




                                     <li><a href="products.php?id=<?php echo $cat_id; ?>">
                                             <?php echo $cat_title; ?> </a></li>

                                     <?php
                                        }
                                        ?>


                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="main_menu menu_position text-left">
                             <nav>
                                 <ul>
                                     <li><a class="active" href="index.php">home</a>
                                     <li><a class="active" href="products.php">Products</a>
                                     </li>
                                     <li><a href="./about.php">About Us</a></li>
                                     <li><a href="./contact.php"> Contact Us</a></li>
                                 </ul>
                             </nav>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
         <!--header bottom end-->
     </div>
 </header>