<?php

session_start();

require_once("php/class/personCotation.php");
require_once("php/class/veiculoCotacao.php");
require_once("php/class/beneficiosAdicionais.php");

if ($_SESSION['veiculo']) {

    $car = new VeiculoCotacao();
    $car->map($_SESSION['veiculo']);
    $car->setNacional($_SESSION['tipoVeiculo']);

    $person = new PersonCotation();
    $person->map($_SESSION['pessoa']);

    $name = $person->nome;
    $email = $person->email;
    $telefone = $person->telefone;
    $nameArray = explode(" ", $name);
    // var_dump($car);
    $nameId = $nameArray[0];
    $_SESSION['pessoa-primeiro-nome']  = $nameId;
    $adsao = 250;

    $modelo = $car->modelo;
    $valorCotacaoFipe = $car->valorCotacaoFipe;
    $codigoFipe = $car->codigoFipe;
    $mesReferencia = $car->mesReferencia;
    $ano = $car->anoModelo;

    $valorRastreador = 59.90;
}


?>


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

    <header id="header" class="fixed-top">
        <div class="container">

            <div class="logo float-left">
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
                <a href="index.php" class="scrollto"><img src="img/logo-header.png" alt="" class="img-fluid"></a>
            </div>

            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    <li class="active"><a href="index.php">Início</a></li>

                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                </ul>
            </nav><!-- .main-nav -->

        </div>
    </header><!-- #header -->

    <!--==========================
    Intro Section
  ============================-->

    <!--==========================
      slide
    ============================-->

    <?php require_once('carousel.php'); ?>



    <main id="main">

        <!--==========================
  Services Section
============================-->
        <section id="form-intro" class="clearfix">
            <form action="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">

                            <?php

                            echo ("<h1>Olá $nameId! tudo bem?</h1>
            <h5>Preparamos uma proposta especial para o seu rastreador.</h5>
            <p>Seu veículo $modelo está avaliado em $valorCotacaoFipe </p>
            <p>* De acordo com a Tabela FIPE (código fipe $codigoFipe) do mês de $mesReferencia.</p>");

                            ?>

                        </div>


                        <div class="col-md-3">


                            <!-- 
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                <img src="img/tracker.png" class="card-img-top">
                                <div class="card-header">Valor mensal</div>
                                <div class="card-body text-primary">
                                    <h5 class="card-title"><?php echo ("R$ " . $valorRastreador . "0"); ?></h5>

                                </div>
                            </div> -->

                            <div class="card text-center" style="width: 18rem;">
                                <img src="img/tracker.png" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo ("R$ " . $valorRastreador . "0"); ?></h5>
                                    <p class="card-text">Estamos muito felizes em tê-lo conosco.</p>
                                    <a class="btn btn-primary" id="criarRelatorio">Adquirir agora</a>
                                    <div class="nova-cotacao">
                                        <a href="#" data-toggle="modal" data-target="#site" class="btn btn-primary">Realizar nova cotação</a>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>






                </div>

            </form>
        </section>


        <input type="hidden" name="name" id="name" value="<?php echo ($name); ?>" />
        <input type="hidden" name="modelo" id="modelo" value="<?php echo ($modelo); ?>" />
        <input type="hidden" name="valorCotacaoFipe" id="valorCotacaoFipe" value="<?php echo ($valorCotacaoFipe); ?>" />
        <input type="hidden" name="codigoFipe" id="codigoFipe" value="<?php echo ($codigoFipe); ?>" />
        <input type="hidden" name="plano" id="plano" value="Rastreador" />
        <input type="hidden" name="email" id="email" value="<?php echo ($email); ?>" />
        <input type="hidden" name="anoVeiculo" id="anoVeiculo" value="<?php echo ($ano); ?>" />
        <input type="hidden" name="telefone" id="telefone" value="<?php echo ($telefone); ?>" />
        <input type="hidden" name="total" id="total" value="<?php echo ($valorRastreador); ?>" />


        <!--==========================
    Footer
  ============================-->

        <?php require_once("footer.php"); ?>
        <!-- #footer -->





        <!-- Uncomment below i you want to use a preloader -->
        <!-- <div id="preloader"></div> -->

        <a href="https://api.whatsapp.com/send?l=pt&amp;phone=550719855110" target="_blank"><img src="https://i.imgur.com/ryESuZ5.png" style="height:64px; position:fixed; bottom: 25px; left: 
  25px; z-index:99999;" data-selector="img"></a>

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

        <script type="text/javascript">
            /* Contact Form */
            $("#criarRelatorio").on("click", function() {

                var name = $("#name").val();
                var email = $("#email").val();
                var modelo = $("#modelo").val();
                var valorCotacaoFipe = $("#valorCotacaoFipe").val();
                var codigoFipe = $("#codigoFipe").val();
                var plano = $("#plano").val();
                var anoVeiculo = $("#anoVeiculo").val();
                var telefone = $("#telefone").val();
                var total = $('#total').val();;

                console.log(email, modelo, valorCotacaoFipe, codigoFipe, plano, anoVeiculo, telefone, total);


                $.ajax({
                    type: "POST",
                    url: "php/services/email/contactform-process.php",
                    data: "name=" + name + "&email=" + email + "&modelo=" + modelo + "&valorCotacaoFipe=" + valorCotacaoFipe + "&codigoFipe=" + codigoFipe + "&plano=" + plano + "&anoVeiculo=" + anoVeiculo + "&telefone=" + telefone + "&total=" + total,

                    success: function() {
                        if (data = "success") {
                            swal({

                                title: "Estamos muitos felizes em tê-lo aqui. Dentro de 24 horas um de nossos atendentes irá entrar em contato!",
                                icon: "success",

                            });
                        }

                        $(".swal-button--confirm").click(function() {
                            window.location.replace("https://www.tottalbahiabr.com.br/");
                        });

                    },

                    erro: function() {

                        swal({
                            title: "Ops!! Ocorreu algum erro",


                            buttons: true,
                            dangerMode: true,
                        });

                    }

                });


            });
        </script>


</body>

</html>