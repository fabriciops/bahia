<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tottal Bahia - Cotação On line e rastreio</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================

    Theme Name: Tottal Bahia
    Theme URL: https://www.psdesigneweb.com.br/
    Author: Fabrício Pinheiro dos Santos
    
  ======================================================= -->
</head>

<body>

 <!-- modal de indicação -->
 <div class="modal fade" id="myModal" style="z-index: 10000">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">PROMOÇÃO IMPERDÍVEL</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="img/modal/modal.jpg" width="100%" height="100%">
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Salvar mudanças</button>
        </div> -->
      </div>
    </div>
  </div>


  <?php require_once('header-menu.php'); ?>

  <!--==========================
    Intro Section
  ============================-->
  <?php require_once('header.php'); ?>
  

  <main id="main">

  <!--==========================
      slide
    ============================-->

  <?php require_once('carousel.php'); ?>

     <!--==========================
      Services Section
    ============================-->

    <?php require_once('service.php'); ?>

    <!--==========================
      cotation
    ============================-->

    <?php require_once('sectionCotation.php'); ?>

    <!--==========================
      provasocial
    ============================-->


    <!--==========================
      Portfolio Section
    ============================-->

    <!-- ÁREA DA GALERIA -->

    <!--==========================
      Clients Section
    ============================-->

    <?php require_once('clients.php'); ?>
    
    <!-- #SLIDE CLIENTES -->

    <!--==========================
      Team Section
    ============================-->
    
    
    <!-- #team.php-->

    <!--==========================
      Clients Section
    ============================-->
    <?php require_once('parceiros.php'); ?>

    <!--==========================
      Contact Section
    ============================-->
    <?php require_once('contact.php'); ?>
    <!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->

  <?php require_once("footer.php"); ?>
  <!-- #footer -->

  
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  
  

  
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <a href="https://api.whatsapp.com/send?l=pt&amp;phone=550719855110" target="_blank"><img 
  src="https://i.imgur.com/ryESuZ5.png" style="height:64px; position:fixed; bottom: 25px; left: 
  25px; z-index:99999;" data-selector="img"></a>

   

  <script>
    $('#myModal').modal("show");


  </script>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  

  <!-- Modal cotação -->
  <?php require_once('modal.php'); ?>




</body>
</html>
