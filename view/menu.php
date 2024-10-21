<?php 
   require_once('../model/plat-select.php');
 ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <?php require_once('header.php'); ?>
   </head>
   <body>
      <!-- banner bg main start -->
      <div style="width: 100%;
    float: left;
    background-image: url(./images/banner-b.png);
    height: auto;
    background-size: 100%;
    background-repeat: no-repeat;">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="index.php">Accueil</a></li>
                           <li><a href="login.php">Se Connecter</a></li>
                            <li><a href="inscription.php">S'inscrire?</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><h1>GELETO</h1></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.php">Accueil</a>
                     <a href="login.php">Se Connecter</a>
                     <a href="inscription.php">S'inscrire?</a>
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <form method="get" action="">
                        <div class="input-group">
                              <input type="text" class="form-control" placeholder="Rechercher un Plat" name="mot1" value="<?php echo ($mot1) ?>">
                              <div class="input-group-append">
                                 <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522 " name="search">
                                 <i class="fa fa-search"></i>
                                    rechercher
                                 </button>
                              </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Faites vos commandes <br>en un clic</h1>
                              <div class="buynow_bt"><a href="inscription.php">S'inscrire</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Geleto <br>est votre meilleur choix</h1>
                              <div class="buynow_bt"><a href="inscription.php">S'inscrire</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Nos plats <br>sont les meilleurs</h1>
                              <div class="buynow_bt"><a href="inscription.php">S'inscrire</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- fashion section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">Faites votre Commande</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <?php
                              foreach ($data as $data):
                           ?>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text"><?php echo $data->designation; ?></h4>
                                 <p class="price_text"><?php echo $data->description; ?></p>
                                 <div class="tshirt_img"><img src="../img/<?php echo $data->image; ?>"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><?php if($data->qte_stock!=0){?><a href="pannier.php?action=ajout&amp;l=<?= $data->designation; ?>&amp;q=1&amp;p=<?= $data->prix; ?>" class="btn btn-success">Ajouter Au Panier</a><?php }else{echo "<h3 style='color:red;'>Stock épuisé!</h3>" ;} ?></div>
                                    <div class="seemore_bt" style="font-size: 20px; color: black">$<?php echo $data->prix; ?><span style="color: #262626;"></span></div>
                                 </div>
                              </div>
                           </div>
                           <?php
                              endforeach; 
                             ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </a>
         </div>
      </div>
      
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><h1>GELETO</h1></div>
            <div class="location_main">Call us Now : <a href="#">+243 810000144</a></div>
            <div class="location_main">FACEBOOK : <a href="#">Restaurant Geleto</a></div>
            <div class="location_main">Adresse : <a href="#">N°16 Avenue de la Libération(Ex.24 Nov.) Commune de la Gombe-Kin/RDC</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Fimbo</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
     <?php require_once('footer.php'); ?>
   </body>
</html>