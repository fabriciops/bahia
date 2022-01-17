<?php

use function PHPSTORM_META\type;

session_start();

require_once("php/class/personCotation.php");
require_once("php/class/veiculoCotacao.php");
require_once("php/class/beneficiosAdicionais.php");

$beneficio = new BeneficioAdicionais();
$assistenciaCem = $beneficio->getAssistenciaCem();
$assistenciaTrezentos = $beneficio->getAssistenciaTrezentos();
$assistenciaOitocentos = $beneficio->getAssistenciaOitocentos();


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

  $year = (date("Y") - $ano);
  $rastreio = "59.90";

  if ($car->getTipoVeiculo() == 3 || ($year) >= 20) {

    header('Location: rastreador.php');
  }


  if ($_SESSION['valorCotacaoFipe'] && $_SESSION['pessoa']) {

    $valorCotacaoFipe = explode(" ", $_SESSION['valorCotacaoFipe']);
    // var_dump($valorCotacaoFipe);
    $valorCotacaoFipe = ($valorCotacaoFipe[1]);

    $typeUse = $person->getTipoUso();
    intval($valorCotacaoFipe);

    if ($_SESSION['categoria'] == true) {

      if ($valorCotacaoFipe <= '20.000') {
        $valorAdsao = "109.90";
        $valorAdsaoMaster = "159.00";
      }
      if ($valorCotacaoFipe > '20000' && $valorCotacaoFipe <= '25000') {
        $valorAdsao = "115.90";
        $valorAdsaoMaster = "179.00";
      }
      if ($valorCotacaoFipe > '25000' && $valorCotacaoFipe <= '30000') {
        $valorAdsao = "119.90";
        $valorAdsaoMaster = "189.00";
      }
      if ($valorCotacaoFipe > '30000' && $valorCotacaoFipe <= '40000') {
        $valorAdsao = "129.90";
        $valorAdsaoMaster = "209.00";
      }
      if ($valorCotacaoFipe > '40000' && $valorCotacaoFipe <= '50000') {
        $valorAdsao = "139.90";
        $valorAdsaoMaster = "219.00";
      }
      if ($valorCotacaoFipe > '50000' && $valorCotacaoFipe <= '60000') {
        $valorAdsao = "149.90";
        $valorAdsaoMaster = "249.00";
      }
      if ($valorCotacaoFipe > '60000' && $valorCotacaoFipe <= '70000') {
        $valorAdsao = "159.90";
        $valorAdsaoMaster = "279.00";
      }
      if ($valorCotacaoFipe > '70000' && $valorCotacaoFipe <= '80000') {
        $valorAdsao = "169.90";
        $valorAdsaoMaster = "299.00";
      }
      if ($valorCotacaoFipe > '80000' && $valorCotacaoFipe <= '90000') {
        $valorAdsao = "179.90";
        $valorAdsaoMaster = "329.00";
      }
      if ($valorCotacaoFipe > '90000' && $valorCotacaoFipe <= '100.000') {
        $valorAdsao = "189.90";
        $valorAdsaoMaster = "369.00";
      }
    } else {

      // Plano Plus || master
      // Carro particular
      if ($car->getTipoVeiculo() == 1 && $typeUse == "particular") {

        if ($valorCotacaoFipe <= '20.000') {
          $valorAdsao = "69.90";
          $valorAdsaoMaster = "89.00";
        }
        if ($valorCotacaoFipe > '20000' && $valorCotacaoFipe <= '25000') {
          $valorAdsao = "75.90";
          $valorAdsaoMaster = "109.00";
        }
        if ($valorCotacaoFipe > '25000' && $valorCotacaoFipe <= '30000') {
          $valorAdsao = "79.90";
          $valorAdsaoMaster = "119.00";
        }
        if ($valorCotacaoFipe > '30000' && $valorCotacaoFipe <= '40000') {
          $valorAdsao = "89.90";
          $valorAdsaoMaster = "139.00";
        }
        if ($valorCotacaoFipe > '40000' && $valorCotacaoFipe <= '50000') {
          $valorAdsao = "99.90";
          $valorAdsaoMaster = "149.90";
        }
        if ($valorCotacaoFipe > '50000' && $valorCotacaoFipe <= '60000') {
          $valorAdsao = "109.90";
          $valorAdsaoMaster = "179.00";
        }
        if ($valorCotacaoFipe > '60000' && $valorCotacaoFipe <= '70000') {
          $valorAdsao = "119.90";
          $valorAdsaoMaster = "209.90";
        }
        if ($valorCotacaoFipe > '70000' && $valorCotacaoFipe <= '80000') {
          $valorAdsao = "139.90";
          $valorAdsaoMaster = "229.90";
        }
        if ($valorCotacaoFipe > '80000' && $valorCotacaoFipe <= '90000') {
          $valorAdsao = "129.90";
          $valorAdsaoMaster = "259.90";
        }
        if ($valorCotacaoFipe > '90000' && $valorCotacaoFipe <= '100.000') {
          $valorAdsao = "149.90";
          $valorAdsaoMaster = "289.90";
        }
      }

      // Plano Plus || master
      // Carro aluguel
      if ($car->getTipoVeiculo() == 1 && $typeUse == "aluguel") {
        if ($valorCotacaoFipe <= '20.000') {
          $valorAdsao = "89.90";
          $valorAdsaoMaster = "119.00";
        }
        if ($valorCotacaoFipe > '20000' && $valorCotacaoFipe <= '25000') {
          $valorAdsao = "95.90";
          $valorAdsaoMaster = "1399.00";
        }
        if ($valorCotacaoFipe > '25000' && $valorCotacaoFipe <= '30000') {
          $valorAdsao = "99.90";
          $valorAdsaoMaster = "149.00";
        }
        if ($valorCotacaoFipe > '30000' && $valorCotacaoFipe <= '40000') {
          $valorAdsao = "109.90";
          $valorAdsaoMaster = "169.00";
        }
        if ($valorCotacaoFipe > '40000' && $valorCotacaoFipe <= '50000') {
          $valorAdsao = "119.90";
          $valorAdsaoMaster = "179.00";
        }
        if ($valorCotacaoFipe > '50000' && $valorCotacaoFipe <= '60000') {
          $valorAdsao = "129.90";
          $valorAdsaoMaster = "209.00";
        }
        if ($valorCotacaoFipe > '60000' && $valorCotacaoFipe <= '70000') {
          $valorAdsao = "139.90";
          $valorAdsaoMaster = "239.00";
        }
        if ($valorCotacaoFipe > '70000' && $valorCotacaoFipe <= '80000') {
          $valorAdsao = "149.90";
          $valorAdsaoMaster = "259.00";
        }
        if ($valorCotacaoFipe > '80000' && $valorCotacaoFipe <= '90000') {
          $valorAdsao = "159.90";
          $valorAdsaoMaster = "289.00";
        }
        if ($valorCotacaoFipe > '90000' && $valorCotacaoFipe <= '100.000') {
          $valorAdsao = "169.90";
          $valorAdsaoMaster = "319.00";
        }
      }

      // Plano Plus
      // Carro / importados 
      if ($car->getTipoVeiculo() == 1 && $car->getnacional() == "importado") {
        if ($valorCotacaoFipe <= '20.000') {
          $valorAdsao = "109.90";
          $valorAdsaoMaster = "139.00";
        }
        if ($valorCotacaoFipe > '20000' && $valorCotacaoFipe <= '25000') {
          $valorAdsao = "115.90";
          $valorAdsaoMaster = "159.00";
        }
        if ($valorCotacaoFipe > '25000' && $valorCotacaoFipe <= '30000') {
          $valorAdsao = "119.90";
          $valorAdsaoMaster = "169.00";
        }
        if ($valorCotacaoFipe > '30000' && $valorCotacaoFipe <= '40000') {
          $valorAdsao = "129.90";
          $valorAdsaoMaster = "189.00";
        }
        if ($valorCotacaoFipe > '40000' && $valorCotacaoFipe <= '50000') {
          $valorAdsao = "139.90";
          $valorAdsaoMaster = "199.00";
        }
        if ($valorCotacaoFipe > '50000' && $valorCotacaoFipe <= '60000') {
          $valorAdsao = "149.90";
          $valorAdsaoMaster = "229.00";
        }
        if ($valorCotacaoFipe > '60000' && $valorCotacaoFipe <= '70000') {
          $valorAdsao = "159.90";
          $valorAdsaoMaster = "259.00";
        }
        if ($valorCotacaoFipe > '70000' && $valorCotacaoFipe <= '80000') {
          $valorAdsao = "169.90";
          $valorAdsaoMaster = "279.00";
        }
        if ($valorCotacaoFipe > '80000' && $valorCotacaoFipe <= '90000') {
          $valorAdsao = "179.90";
          $valorAdsaoMaster = "309.00";
        }
        if ($valorCotacaoFipe > '90000' && $valorCotacaoFipe <= '100.000') {
          $valorAdsao = "189.90";
          $valorAdsaoMaster = "339.00";
        }
      }

      // Plano Plus
      // MOTO particular
      if ($car->getTipoVeiculo() == 2) {
        if ($valorCotacaoFipe <= '5000') {
          $valorAdsao = "79.90";
        }
        if ($valorCotacaoFipe > '5000' && $valorCotacaoFipe <= '10000') {
          $valorAdsao = "89.90";
        }
        if ($valorCotacaoFipe > '10000' && $valorCotacaoFipe <= '15000') {
          $valorAdsao = "99.90";
        }
        if ($valorCotacaoFipe > '15000' && $valorCotacaoFipe <= '20000') {
          $valorAdsao = "119.90";
        }
      }
    }
  }
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
  <!--    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>-->
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


  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================

    Theme Name: Tottal Bahia
    Theme URL: https://www.psdesigneweb.com.br/
    Author: Fabrício Pinheiro dos Santos
    
  ======================================================= -->
</head>

<body>

  <!--==========================
Header
============================-->
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

  <main id="main">

    <!--==========================
      slide
    ============================-->

    
  <!--==========================
      slide
    ============================-->

    <?php require_once('carousel.php'); ?>


    <!--==========================
      Services Section
    ============================-->
    <section id="form-intro" class="clearfix">
      <form action="">
        <div class="container">
          <div class="row">
            <div class="col-md-9">

              <?php

              //  $parabrisaNacionaUmAno = $beneficio->getparabrisaNacionaUmAno();
              //  $parabrisaNacionaDoisAnos = $beneficio->getparabrisaNacionaDoisAnos();
              //  $parabrisaNacionaTresAnos = $beneficio->getparabrisaNacionaTresAnos();

              // echo("$valorAdsao\n $valorAdsaoMaster");


              echo ("<h1>Olá $nameId! tudo bem?</h1>
                    <h5>Preparamos uma proposta especial para você.</h5>
                    <p>Seu veículo $modelo está avaliado em $valorCotacaoFipe </p>
                    <p>* De acordo com a Tabela FIPE (código fipe $codigoFipe) do mês de $mesReferencia.</p>") ?>

              <div class="row">
                <h3><small>Escolha seu Plano</small></h3>
              </div>

              <section>
                <div class="container">
                  <div class="row">


                    <div class="card-group">
                      <div class="card text-center" style="width: 18rem;">
                        <img src="img/plano/plus.jpg" class="card-img-top" alt="...">
                        <div class="card-header">Plano Plus</div>
                        <div class="card-body">
                        <button type="button" class="btn btn-primary" id="plus" value="<?php echo ("$valorAdsao") ?> " title="Roubo, Furto e Rastreador com bloqueador!"><?php echo ("R$ $valorAdsao") ?></button>
                          <h5 class="card-title">Roubo, Furto e <br>Rastreador com bloqueador</h5>
                          <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                          
                        </div>
                      </div>
                      <div class="card text-center" style="width: 18rem;">
                        <img src="img/plano/master.jpg" class="card-img-top" alt="...">
                        <div class="card-header">Plano Master</div>
                        <div class="card-body">
                        <button type="button" class="btn btn-primary" id="master" value="<?php echo ("$valorAdsaoMaster") ?>"><?php echo ("R$ $valorAdsaoMaster") ?></button>  
                        <h5 class="card-title">Roubo, Furto ,Colisão e <br>Rastreador com bloqueador </h5>
                          <!-- <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p> -->
                          
                        </div>
                      </div>
                      <div class="card text-center" style="width: 18rem;">
                        <img src="img/plano/carro-rastreador.png" class="card-img-top" alt="...">
                        <div class="card-header">Plano Rastreador / Bloqueador</div>
                        <div class="card-body">
                        <button type="button" class="btn btn-primary" id="rastreio" value="<?php echo ("$rastreio") ?>"><?php echo ("R$ $rastreio") ?></button>  
                        <h5 class="card-title">Rastreador</h5>
                          <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p> -->
                          

                        </div>
                      </div>
                    </div>
                    <input type="hidden" id="planselectd" name="planselectd" value="master">

                  </div>


              </section>

              <div class="row">

                <h1>Benefícios adicionais</h1>

                <!-- Guardando o valor da nacionalidade do veiculo -->
                <input hidden name="tipo" id="tipo" value="<?php echo ($car->tipoVeiculo) ?>" />
                <input hidden name="nacionalidade" id="nacionalidade" value="<?php echo ($car->nacional) ?>" />
                <table class="table table-light" id="tableResult">

                </table>
                <!-- <input id="valuebutton" checked data-toggle="toggle" type="checkbox" data-on="Sim" data-off="Não" value=""> -->
              </div><!-- fecha a linha -->

            </div> <!-- fecha a coluna -->
            <div class="col-md-3 mobile-hide">
              <div class="card text-center border-info mb-3 card-resultvalue .d-none .d-md-block .d-lg-none" id="card-resultvalue">
                <div class="card-header">Valor mensal dos serviços:</div>
                <div class="card-body text-info">
                  <div class="card-title">

                    <input type="hidden" id="valorProtesao" value="<?php echo $valorAdsao ?>">
                    <input type="hidden" id="valorProtesaoMaster" value="<?php echo $valorAdsaoMaster ?>">
                    <input type="hidden" id="valorProtesaoRastreio" value="<?php echo $rastreio ?>">
                    <div class="value" id="value">
                      <div>
                        <h2 id="resultado_soma"></h2>
                      </div>
                    </div>
                  </div>
                  <input hidden name="tipo" id="adsao" value="<?php $adsao; ?>" />
                  <p>+ adesão única de <?php echo ("R$ " . $adsao); ?></p>

                  <p class="card-text">O melhor Rastreio e segurança é aqui.</p>
                  
                  <a href="#resultado_soma_fim">
                    <button type="button" class="btn btn-primary">
                      Realizar Proteção
                    </button>
                  </a>

                  <div class="nova-cotacao valor_mensal">
                    <a href="#" data-toggle="modal" data-target="#site" class="btn btn-primary">Realizar nova cotação</a>
                  </div>


                </div>

              </div>
            </div>


          </div> <!-- row -->

        </div>
        <!--container -->

      </form>
    </section>
  </main>

  <div class="container">
    <div class="row">
      <div class="col-sm">

      </div>
      <div class="col-sm">
        <div class="card text-center">
          <div class="card-header">
            Seu valor mensal
          </div>
          <div class="card-body">
            <h5 class="card-title" id="resultado_soma_fim"></h5>
            <!-- <p class="card-text" id="lista-beneficios">With supporting text below as a natural lead-in to additional content.</p> -->
            <button href="#" class="btn btn-primary" id="criarRelatorio">Finalizar</button>
          </div>
          <!-- <div class="card-footer text-muted">
            2 days ago
          </div> -->
        </div>
        <div>
          <h2></h2>
        </div>
      </div>
      <div class="col-sm">

      </div>
    </div>
  </div>
  <footer id="footer" name="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <!-- <h3>Tottal Bahia</h3> -->
            <div class="intro-img">
              <img src="img/logo.png" alt="" class="img-fluid">
            </div>
          </div>


          <div class="col-lg-3 col-md-6 footer-newsletter">

          </div>

          <div class="col-lg-3 col-md-12 footer-contact footer-mobile">
            <h4>Contato</h4>
            <p>
              AV. ANTONIO CARLOS MAGALHÃES Nº 2953 <br>
              PARQUE BELA VISTA<br>
              SALVADOR
              Bahia, CEP 40280-000 <br>
              <strong>Whatsapp:</strong> <a style="color: white;" href="https://api.whatsapp.com/send?phone=7198551100" target="_blank">(71) 9 9855 - 1100</a><br>
              <strong>Email:</strong>tottalbahiaatendimento@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Tottal Bahia</strong>. Todos os direitos reservados
      </div>

      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
        -->
        Inteligência desenvolvida por: <a href="https://psdesigneweb.com.br/" target="_blank">Ps Design E Web</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <!-- #footer -->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <input type="hidden" name="name" id="name" value="<?php echo ($name); ?>" />
  <input type="hidden" name="modelo" id="modelo" value="<?php echo ($modelo); ?>" />
  <input type="hidden" name="valorCotacaoFipe" id="valorCotacaoFipe" value="<?php echo ($valorCotacaoFipe); ?>" />
  <input type="hidden" name="codigoFipe" id="codigoFipe" value="<?php echo ($codigoFipe); ?>" />
  <input type="hidden" name="plano" id="plano" value="null" />
  <input type="hidden" name="email" id="email" value="<?php echo ($email); ?>" />
  <input type="hidden" name="anoVeiculo" id="anoVeiculo" value="<?php echo ($ano); ?>" />
  <input type="hidden" name="telefone" id="telefone" value="<?php echo ($telefone); ?>" />
  <input type="hidden" name="telefone" id="total" value="<?php echo ($total); ?>" />

</body>
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
<script src="contactform/fun.js"></script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>
<!-- MODAL -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php require_once('modal.php'); ?>

<script type="text/javascript" DEFER="DEFER">
  addDiv()

  function addDiv() {
    var players = ['player1', 'player2', 'player3', 'player4', 'player5', 'player6', 'player7', 'player8'];

    window.addEventListener("load", function(event) {
      var teste = document.getElementById('total');
      teste.innerHTML = players;
    });

  }

  function AdicionarLista() {

    var listaBeneficios = document.getElementById('lista-beneficios');



  }

  const alturaCta = $(".card-resultvalue").height(); //capturar a altura do div fixo

  $(window).scroll(function() {
    if ($(document).scrollTop() > 210) { //ponto de mudança - 210 pixeis
      let novoTop = '100px'; //começa com 100px que é o normal

      if ($(document).scrollTop() > 2000) { //ponto de mudança do fim
        novoTop = (1500 + 100 - (alturaCta + $(document).scrollTop())) + "px";
        //                  ^----------- altura top que tem normalmente

      }

      $('.card-resultvalue').css({
        'position': 'fixed', //fixo a partir deste ponto
        'top': novoTop, //agora novoTop
        'right': '28px'
      });

    } else {
      $('.card-resultvalue').css({
        'position': 'static'
      }); //se voltou a cima põe estatico
    }
  });

  $(function() {
    $('#toggletwo').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })

  // $('#toggle-one').bootstrapToggle();

  $(document).ready(function() {
    var table = document.getElementById('tableResult')
    var tipo = document.getElementById('tipo').value
    var nacionalidade = document.getElementById('nacionalidade').value
    var tableResult = ""

    if (nacionalidade == "importado") {
      if (tipo == 2) {
        tableResult += Assistencia24h()
        tableResult += Danos()
        tableResult += CarroRes()
        tableResult += Assistencia()
        tableResult += Franquia()
      } else {
        tableResult += Assistencia24h()
        tableResult += Danos()
        tableResult += ParabrisaInternacional()
        tableResult += CarroRes()
        tableResult += VidrosI()
        tableResult += FaroisInter()
        tableResult += kitgas()
        tableResult += Franquia()
        tableResult += Assistencia()

      }
    } else {
      if (tipo == 2) {
        tableResult += Assistencia24h()
        tableResult += Danos()
        tableResult += CarroRes()
        tableResult += Assistencia()
        tableResult += Franquia()
      } else {
        tableResult += Assistencia24h()
        tableResult += Danos()
        tableResult += ParabrisaNacional()
        tableResult += CarroRes()
        tableResult += Vidros()
        tableResult += Farois()
        tableResult += kitgas()
        tableResult += Franquia()
        tableResult += Assistencia()

      }
    }

    table.innerHTML = tableResult
    CarregarValorCarro();

    var valuePlus = $("#plus").val();
    var valueMaster = $("#master").val();
    var rastreio = $("rastreio").val();

    $("#plus").click(function() {
      $("#master").removeClass("flash");
      $("#rastreio").removeClass("flash");
      $("#plus").addClass("flash");
      $("#plano").val("Plano-Plus " + valuePlus);

      var plan = document.getElementById('planselectd');
      plan.value = "plus";
      
      CarregarValorCarro();
    });

    $("#master").click(function() {
      $("#plus").removeClass("flash").addClass("btn-primary");
      $("#rastreio").removeClass("flash");
      $("#master").addClass("flash");
      $("#plano").val("Plano-master " + valueMaster);
      

      var plan = document.getElementById('planselectd'),
      beneficioterceiros = document.querySelectorAll('#danostb > tr > td'),
      assistencia24h = document.querySelectorAll('#tableResult tr > td');

      plan.value = "master";
      beneficioterceiros[5].querySelector("input").checked = true;
      assistencia24h[5].querySelector("input").checked = true;
      
      CarregarValorCarro();
      getValues();

    });

    $("#rastreio").click(function() {
      $("#plus").removeClass("flash").addClass("btn-primary");
      $("#master").removeClass("flash");
      $("#rastreio").addClass("flash");
      $("#plano").val("Plano-rastreio " + rastreio);

      var plan = document.getElementById('planselectd');
      plan.value = "rastreio";
      CarregarValorCarro();

    });

  });

  function getValuePacote(item) {

    
    total = 0;

    if (item) {

      for (var i = 0; i < item.length; i++) {
        // utilize o valor aqui, adicionei ao array para exemplo
        values.push(item[i].value);

      }

      // for (var i = 0; i < values.length; i++) {

      //   total = parseFloat(total) + parseFloat(values[i]);
      // }

    }

    console.log(values.length);

  }

  function getValues() {

    var parabrisa = document.querySelectorAll('[name=parabrisa]:checked').value;
    console.log("parabrisa " + parabrisa);
    var assistenciaFuneraria = document.querySelectorAll('[name=assistenciaf]:checked');
    var carroReserva = document.querySelectorAll('[name=carro]:checked');
    var vidros = document.querySelectorAll('[name=vidros]:checked');
    var farol = document.querySelectorAll('[name=farol]:checked');
    var franquia = document.querySelectorAll('[name=franquia]:checked');
    var assistencia = document.querySelectorAll('[name=assistencia]:checked');
    var assistencia = document.querySelectorAll('[name=kitgas]:checked');

    var pacote = [
      parabrisa,
      assistencia,
      carroReserva,
      vidros,
      farol,
      franquia,
      assistencia,
      assistencia,
    ];

    console.log(pacote);

    pacote.forEach(getValuePacote);

  }

  var resultadoFim = document.getElementById('resultado_soma_fim');

  function CarregarValorCarro(){
        var plan = document.getElementById('planselectd').value;
        var beneficioterceiros = document.querySelectorAll('#danostb > tr > td');
        var assistencia24h = document.querySelectorAll('#tableResult tr > td');
        beneficioterceiros[1].innerHTML = "R$ 3,00";
        beneficioterceiros[4].querySelector("input").disabled = false;
        beneficioterceiros[5].querySelector("input").value = 3;

        assistencia24h[1].innerHTML = "R$ 2,00";
        assistencia24h[4].querySelector("input").disabled = false;
        assistencia24h[5].querySelector("input").value = 2;

        if (plan == "master") {
          var valorAdsao = document.getElementById('resultado_soma_fim').value;
          var valorAdsao = document.getElementById('valorProtesaoMaster').value;

          beneficioterceiros[1].innerHTML = "Incluso";
          beneficioterceiros[4].querySelector("input").disabled = true;
          beneficioterceiros[5].querySelector("input").value = 0;

          assistencia24h[1].innerHTML = "Incluso";
          assistencia24h[4].querySelector("input").disabled = true;
          assistencia24h[5].querySelector("input").value = 0;

        } else if (plan == "plus"){
          var valorAdsao = document.getElementById('resultado_soma_fim').value;
          var valorAdsao = document.getElementById('valorProtesao').value;
        } else if (plan == "rastreio"){
          var valorAdsao = document.getElementById('resultado_soma_fim').value;
          var valorAdsao = document.getElementById('valorProtesaoRastreio').value;
        }
        
        var resultado = document.getElementById('resultado_soma');
        var resultadoFinal = document.getElementById('resultado_soma_fim');
        var total = valorAdsao
        
        var n = $( "input:checked:not(.inative)" );
        for (var i = 0; i < n.length; i++) {
            var valor = n[i].value
            if (!isNaN(valor)) {
                total = parseFloat(total) + parseFloat(valor);
            }
        }
        resultado.innerHTML = 'R$ '+total.toFixed(2);
        resultadoFinal.innerHTML = 'R$ '+total.toFixed(2);
    }

  function time(temp) {
    setTimeout(function() {
      $this.attr('disabled', false);
      $this.val('Submit');
    }, temp);
  }

  $(document).ready(function() {
    $(".teste").click(function(e) {
      var checados = [];
      $.each($("input[name='teste[]']:checked"), function() {
        checados.push($(this).val());
      });
      console.log(checados.join(", "));
    });
  });

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
    var total = $('#resultado_soma').val();

    var result = $('#tableResult');
    var parabrisa = $('input[name=parabrisa]:checked').val();
    var danos = $('input[name=danos]:checked').val();
    var assistenciaf = $('input[name=assistenciaf]:checked').val();
    var carro = $('input[name=carro]:checked').val();
    var vidros = $('input[name=vidros]:checked').val();
    var farol = $('input[name=farol]:checked').val();
    var franquia = $('input[name=franquia]:checked').val();
    var assistencia = $('input[name=assistencia]:checked').val();
    var kitgas = $('input[name=kitgas]:checked').val();

    var beneficios = {
      'Parabrisa' : parabrisa,
      'Danos' : danos,
      'Assistenciaf' : assistenciaf,
      'Carro' : carro,
      'Vidros' : vidros,
      'Farol' : farol,
      'Franquia' : franquia,
      'Assistencia' : assistencia,
      'Kitgas' : kitgas
    }

    console.log(typeof(beneficios));


    console.log(email, modelo, valorCotacaoFipe, codigoFipe, plano, anoVeiculo, telefone, total);
    // return;

    if (plano != "null") {

      $.ajax({
        type: "POST",
        url: "php/services/email/contactform-process.php",
        data: "name=" + name + "&email=" + email + "&modelo=" + modelo + "&valorCotacaoFipe=" + valorCotacaoFipe + "&codigoFipe=" + codigoFipe + "&plano=" + plano + "&anoVeiculo=" + anoVeiculo + "&telefone=" + telefone + "&total=" + total + "&beneficios=" + JSON.stringify(beneficios),

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

        }
      });

    } else {

      swal({
        title: "Ops!! Escolha um de nossos planos",
        text: "Talvez você tenha esquecido de escolher o plano, tente novamente. ",
        icon: "success",
        buttons: true,
        dangerMode: true,
      });
    }
  });

  function obterMarcados() {
    var listaMarcados = document.getElementsByTagName("INPUT");
    for (loop = 0; loop < listaMarcados.length; loop++) {
      var item = listaMarcados[loop];
      if (item.type == "checkbox" && item.checked) {
        alert(item.id);
      }
    }
  }

  obterMarcados();
</script>

</html>