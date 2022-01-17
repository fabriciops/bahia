<?php

use function PHPSTORM_META\type;

session_start();

require_once("../class/personCotation.php");
require_once("../class/veiculoCotacao.php");
require_once("../class/beneficiosAdicionais.php");

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

//  $parabrisaNacionaUmAno = $beneficio->getparabrisaNacionaUmAno();
//  $parabrisaNacionaDoisAnos = $beneficio->getparabrisaNacionaDoisAnos();
//  $parabrisaNacionaTresAnos = $beneficio->getparabrisaNacionaTresAnos();

// echo("$valorAdsao\n $valorAdsaoMaster");


echo ("<h1>Olá $nameId! tudo bem?</h1>
    <h5>Preparamos uma proposta especial para você.</h5>
    <p>Seu veículo $modelo está avaliado em $valorCotacaoFipe </p>
    <p>* De acordo com a Tabela FIPE (código fipe $codigoFipe) do mês de $mesReferencia.</p>");
