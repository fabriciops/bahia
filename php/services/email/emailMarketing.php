<?php

$name = $_POST["name"];
$email = $_POST["email"];
$telefone = $_POST["phone"];

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


//Seta os Headers (Alterar somente caso necessario) 
//==================================================== 
$email_headers = implode("\n", array("From: $email_remetente_Tottal", "Reply-To: $email_reply_Tottal", "Subject: $email_assunto_Tottal", "Return-Path: $email_remetente_Tottal", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));

//Enviando o email 
$success_tottal = mail($email_destinatario_Tottal, $email_assunto_Tottal, nl2br($email_conteudo_Tottal), $email_headers);
//==================================================== 

// dev 
if ($success_tottal) {

    $data = "success";
    echo ($data);
}
