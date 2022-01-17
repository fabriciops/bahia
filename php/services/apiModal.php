<?php

session_start();

require_once("../../config/db.class.php");
// require_once("../class/personCotation.php");
// require_once("../class/veiculoCotacao.php");

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$drive = $_POST["veiculo"];
$address = $_POST["endereco"];
$tipoUso = $_POST["tipo_uso"];
$tipo_veiculo = $_POST["tipo_veiculo"];
$categoria = $_POST["categoria"];

$driveArray = json_decode($drive, true);
$addressArray = json_decode($address, true);

$personArray = Array('Name'=>$name, 'Phone'=> $phone, 'Email'=> $email, 'TipoUso'=> $tipoUso);

// $drivePerson = array_push($driveArray, $personArray);

// var_dump($driveArray);
$_SESSION['tipoVeiculo'] = $tipo_veiculo;
$_SESSION['veiculo'] = $driveArray;
// var_dump($_SESSION['veiculo']);
$_SESSION['pessoa'] = $personArray;
// $_SESSION['veiculoPessoa'] = $drivePerson;

if($categoria){
    $_SESSION['categoria'] = true;
}else{
    $_SESSION['categoria'] = false;
}


?>

