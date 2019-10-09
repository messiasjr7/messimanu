<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
   <?php
   try {
   include_once 'conexao.php';
   $consulta = $pdo->prepare("SELECT * FROM instrumentos");
   $consulta->execute();

   $instrumento = $consulta->fetchAll();
   }catch(Exception $e) {
       die("Erro.". $e->getMessage());
   }

   ?>

    <nav id="logo" align="center">
        <h1>Processo de matrícula</h1>
    <img src="img/bannerPrincipal.jpg">
    </nav>
      <form method="post" action="tratar.php" >
      <div class="form-group"align="center">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome"  placeholder="" name="nome" maxlength="30" required>
      <div class="form-group"align="center">
      <label for="sobrenome">Sobrenome</label>
      <input type="text" class="form-control" id="sobrenome"  placeholder="" name="sobrenome" maxlength="30" required>       
    
        <div class="form-group"align="center">
            <label for="instrumento">Meu instrumento será:</label>
            <select class="form-control" id="instrumento" name="instrumento" required>
                <?php
                foreach($instrumento as $instrumentos) 
                {
                    echo "<option>{$instrumentos["nome"]}</option>";
                }
                ?>

            </select>
        </div>      
        <div class="form-group"align="center">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email"  placeholder="" name="email" maxlength="40" required>
        </div>
        <div class="form-group"align="center">
            <label for="email">Senha</label>
            <input type="password" class="form-control" id="senha"  placeholder="" name="senha" maxlength="32" required>
        </div>
        <a href="sucessoCadastro.php"><button type="submit" class="btn btn-success">Tudo ok!</button></a>
    </form>
   
          
</body>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>