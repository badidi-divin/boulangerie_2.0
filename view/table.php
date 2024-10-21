<?php 
   require_once('../bdd/connexion.php');
   require_once('../model/ajout-table.php');
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
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <form method="post" action="">
                        <div class="input-group">
                            <label class="control-label" style="color:white;font-size:20px">Table:</label>
                                    <select name="mot1" class="form-control" autocomplete="off" required="required">
                                        <option value="Bill-Gates">
                                            Bill-Gates
                                        </option>
                                        <option value="Galilé">
                                            Galilé
                                        </option>
                                    </select>
                              <div class="input-group-append">
                                 <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522 " name="search">
                                 <i class="fa fa-search"></i>
                                    Envoyer
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
                              <h1 class="banner_taital">Faites le choix<br>de la table</h1>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Specifiez votre table pour vous servir</h1>
                           </div>
                        </div>
                     </div>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      
      <!-- footer section end -->
      <!-- copyright section start -->
   
      <!-- copyright section end -->
      <!-- Javascript files-->
     <?php require_once('footer.php'); ?>
   </body>
</html>