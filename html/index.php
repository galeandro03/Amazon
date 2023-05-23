<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>E-commerce</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- owl stylesheets -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="logo" href="#"><img src="images/nuovologo.png"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="product.php">Product</a>
                     </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                     <div class="login_menu">
                        <ul>
                           <li><a href="login.php"><img src="images/user-icon.png"></a></li>
                           <li><a href="cart.php"><img src="images/trolly-icon.png"></a></li>
                        </ul>
                     </div>
                  </form>
               </div>
            </nav>
         </div>
      </div>
      <!-- header section end -->
      <!-- banner section start -->
      <div class="banner_section banner_bg">
         <div class="container-fluid">
            <div>
               <div>
                  <div>
                     <div class="taital_main">
                        <div class="taital_left">
                           <h1 class="banner_taital">Deni Product For Skin</h1>
                           <div class="read_bt"><a href="product.php">Read More</a></div>
                        </div>
                        <div class="taital_right">
                           <div class="product_img"><img src="images/productimg.png"></div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      <!-- banner section end -->
      
      <!-- product section start -->
      <div class="product_section layout_padding">
         <form action="index.php" method="GET">
            <div style="margin-left: 40%; margin-right: 40%;">
                <div class="input-group rounded">
                    <?php
                    if (isset($_GET['filtroSearch'])) {
                        echo '<input value="' . $_GET["filtroSearch"] . '" name="filtroSearch" type="search" class="form-control rounded" placeholder="Cerca" aria-label="Search" aria-describedby="search-addon" />';
                    } else {
                        echo '<input name="filtroSearch" type="search" class="form-control rounded" placeholder="Cerca" aria-label="Search" aria-describedby="search-addon" />';
                    } ?>
                    <button type="submit" class="input-group-text border-0" id="search-addon">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </form>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="product_taital">Products</h1>
                  <p class="product_text">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim</p>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="owl-carousel owl-theme">
                     <?php
                     include("conndb.php");
                $q = "SELECT * FROM articles";
                if (isset($_GET['filtroSearch'])) {
                    $q .= " WHERE name LIKE '%$_GET[filtroSearch]%'";
                }
                $result = $conn->query($q);
                $conn->close();
                while ($row = $result->fetch_assoc()) {
                    echo '<a href="dettagli.php?id='.$row["id_article"].'"><div class="item">
                        <div class="image_main"><img  src="'.$row["image"].'" alt="image" /></div>
                        <h6 class="price_text">Price <br><span style="color: #f75261;">'.$row["price"].' €</span></h6>
                     </div></a>';
                  //   echo "<div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>";
                  //   echo "<div class='text-center'><a class='btn btn-outline-dark mt-auto' href='../cart/chkAddCart.php?id_article=$row[id_article]'>Aggiungi al carrello</a></div>";
                  // //   if (isset($_SESSION['admin'])) {
                  // //       if ($_SESSION['admin'] == 1) {
                  // //           echo "<br>";
                  // //           echo "<div class='text-center'><button class='btn btn-outline-dark mt-auto' onclick='deleteProdotto($row[id_article])'>Rimuovi dal database</button></div>";
                  // //       }
                  // //   }
                  //   echo "</div>";
                  //   echo "</div>";
                }
                ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- product section start -->
      <!-- client section start -->
      <div class="client_section layout_padding banner_bg">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <h1 class="client_taital">Customers Says</h1>
               </div>
               <div class="col-md-9">
                  <div class="client_box">
                     <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                           <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <p class="client_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laborisLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                              <div class="client_main">
                                 <div class="client_left">
                                    <div class="client_img"><img src="images/client-img.png"></div>
                                 </div>
                                 <div class="client_right">
                                    <div class="quick_icon"><img src="images/quick-icon.png"></div>
                                    <h6 class="client_name">Uliya Hindd</h6>
                                    <p class="aliqua_text">Aliqua. Ut enim</p>
                                 </div>
                              </div>
                           </div>
                           <div class="carousel-item">
                              <p class="client_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laborisLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                              <div class="client_main">
                                 <div class="client_left">
                                    <div class="client_img"><img src="images/client-img.png"></div>
                                 </div>
                                 <div class="client_right">
                                    <div class="quick_icon"><img src="images/quick-icon.png"></div>
                                    <h6 class="client_name">Uliya Hindd</h6>
                                    <p class="aliqua_text">Aliqua. Ut enim</p>
                                 </div>
                              </div>
                           </div>
                           <div class="carousel-item">
                              <p class="client_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laborisLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                              <div class="client_main">
                                 <div class="client_left">
                                    <div class="client_img"><img src="images/client-img.png"></div>
                                 </div>
                                 <div class="client_right">
                                    <div class="quick_icon"><img src="images/quick-icon.png"></div>
                                    <h6 class="client_name">Uliya Hindd</h6>
                                    <p class="aliqua_text">Aliqua. Ut enim</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- client section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6">
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="social_icon">
                     <ul>
                        <li><a><img src="images/fb-icon.png"></a></li>
                        <li><a><img src="images/twitter-icon.png"></a></li>
                        <li><a><img src="images/linkedin-icon.png"></a></li>
                        <li><a><img src="images/instagram-icon.png"></a></li>
                        <li><a><img src="images/youtub-icon.png"></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="footer_section_2">
               <div class="row">
                  <div class="col-lg-3 col-md-6">
                     <h3 class="company_text">Product</h3>
                     <p class="dolor_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.Lorem ipsum dolor sit amet, </p>
                  </div>
                  <div class="col-lg-3 col-md-6">
                     <h3 class="company_text">Shop</h3>
                     <p class="dolor_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.Lorem ipsum dolor sit amet, </p>
                  </div>
                  <div class="col-lg-3 col-md-6">
                     <h3 class="company_text">Company</h3>
                     <p class="dolor_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.Lorem ipsum dolor sit amet, </p>
                  </div>
                  <div class="col-lg-3 col-md-6">
                     <h3 class="company_text">MY ACCOUNT</h3>
                     <p class="dolor_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.Lorem ipsum dolor sit amet, </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <!-- owl carousel -->
      <script>
         $('.owl-carousel').owlCarousel({
         loop:true,
         margin:30,
         nav:true,
         responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:4
          }
         }
         })
      </script>
   </body>
</html>

 <!-- if (isset($_session['admin'])) {
                        if ($_session['admin'] == 1) {
                            echo "<input id='txtnewq$row[id_article]' onchange='changev()' value='$row[amount]' type='number'/><button onclick='changeamount($row[id_article])'>aggiorna</button><br>";
                        }
                    } -->