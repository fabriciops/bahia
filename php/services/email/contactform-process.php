<?php

$success_tottal = "";
$email_remetente = "";
$email_conteudo = "";

if (isset($_POST["name"]) && isset($_POST["modelo"]) && isset($_POST["codigoFipe"]) && isset($_POST["email"]) && isset($_POST["valorCotacaoFipe"]) && isset($_POST["plano"]) && isset($_POST["anoVeiculo"]) && isset($_POST["telefone"])) {

    $name = $_POST["name"];
    $modelo = $_POST["modelo"];
    $codigoFipe = $_POST["codigoFipe"];
    $email = $_POST["email"];
    $valorCotacaoFipe = $_POST["valorCotacaoFipe"];
    $plano = $_POST["plano"];
    $anoVeiculo = $_POST["anoVeiculo"];
    $telefone = $_POST["telefone"];
    $total = $_POST["total"];
    $beneficios = $_POST["beneficios"];

}

if ($plano) {


    //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
    //==================================================== 
    $email_remetente_Tottal = "fabriciopps19@gmail.com"; // deve ser uma conta de email do seu dominio 
    //====================================================

    //Configurações do email, ajustar conforme necessidade
    //==================================================== 
    $email_destinatario_Tottal = "fabriciopps19@gmail.com"; // pode ser qualquer email que receberá as mensagens
    $email_reply_Tottal = "$email";
    $email_assunto_Tottal = "Cliente $name"; // Este será o assunto da mensagem
    //====================================================

    //Monta o Corpo da Mensagem
    //====================================================

    $email_conteudo_Tottal .= "Nome = $name \n";
    $email_conteudo_Tottal .= "Telefone = $telefone \n";
    $email_conteudo_Tottal .= "email = $email \n";
    $email_conteudo_Tottal .= "Modelo = $modelo \n";
    $email_conteudo_Tottal .= "Valor Cotacao Fipe = $valorCotacaoFipe \n";
    $email_conteudo_Tottal .= "Plano adiquirido = $plano \n";
    $email_conteudo_Tottal .= "Ano do Veiculo = $anoVeiculo \n";
    // $email_conteudo_Tottal .= "total = $total \n";
    $email_conteudo_Tottal .= "beneficios = $beneficios \n";



    //Seta os Headers (Alterar somente caso necessario) 
    //==================================================== 
    $email_headers = implode("\n", array("From: $email_remetente_Tottal", "Reply-To: $email_reply_Tottal", "Subject: $email_assunto_Tottal", "Return-Path: $email_remetente_Tottal", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));

    //Enviando o email 
    $success_tottal = mail($email_destinatario_Tottal, $email_assunto_Tottal, nl2br($email_conteudo_Tottal), $email_headers);
    //==================================================== 




    //Configurações do email, ajustar conforme necessidade - CLIENTE
    //==================================================== 
    $email_destinatario_cliente = "$email"; // pode ser qualquer email que receberá as mensagens
    $email_reply_cliente = "$email";
    $email_assunto_cliente = "Boas vindas."; // Este será o assunto da mensagem
    //====================================================

    //Monta o Corpo da Mensagem Cliente
    //====================================================

    $email_conteudo_cliente .= "Nome = $name \n";
    $email_conteudo_cliente .= "Mensagem = Estamos muito felizes em tê-lo conosco. Dentro de 24 um de nossos atendentes irá entrar em contato. \n";
    $email_conteudo_cliente .= "Plano adiquirido = $plano \n";

    //Seta os Headers (Alterar somente caso necessario) 
    //==================================================== 
    $email_headers_cliente = implode("\n", array("From: $email_remetente", "Reply-To: $email_reply_cliente", "Subject: $email_assunto_cliente", "Return-Path: $email_remetente", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));

    //Enviando o email 
    $success_tottal_cliente = mail($email_destinatario_cliente, $email_assunto_cliente, nl2br($email_conteudo_cliente), $email_headers_cliente);
    //==================================================== 

    // $data = "success";
    // echo ($data);

}
else {
    return 'falha';
}


// dev 
if ($success_tottal) {

    $data = "success";
    echo ($data);
    return $data;

} else {
    return 'falha';
}
