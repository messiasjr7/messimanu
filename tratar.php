<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<?php

    
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha =$_POST['senha'];
    $instrumento = $_POST['instrumento'];

    
    try {
        include_once('conexao.php');
    
        $consulta = $pdo->prepare("INSERT INTO aluno
        (nome, sobrenome, email, senha, instrumento)
        VALUES
        (:nome, :sobrenome,  :email, :senha ,  :instrumento)");
        
        $consulta->bindValue(":nome", $nome);
        $consulta->bindValue(":sobrenome", $sobrenome);
        $consulta->bindValue(":email", $email);
        $consulta->bindValue(":senha", md5($senha)); //md5 é criptografia da senha.
        $consulta->bindValue(":instrumento", $instrumento);


        $consulta->execute();

    } catch(Exception $e) {
        die("Erro de banco de dados: " . $e->getMessage());
    }
    

    header('location: sucessoCadastro.php');
  
   
    
?>