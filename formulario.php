<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color:#a8dadc !important;
        }

        form{
            align-items:center;
            width:500px;
            height:500px;
            padding:40px;
        }

        form input{
            marign:20px !important;
        }

    </style>
    <!-- /* <link rel="stylesheet" href="style.css"> */ -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> 
</head>
<?php
    require_once('./config.php');
    if(isset($_POST['submit'])){
        $xml = simplexml_load_file("dados.xml");
        $content = $xml -> addChild("usuario");
        $content -> addChild("nome", $_POST["nome"]);
        $content -> addChild("nomeCompleto", $_POST["nomeCompleto"]);
        $content -> addChild("email", $_POST["email"]);
        $content -> addChild("senha", $_POST["senha"]);
        $content -> addChild("contacto", $_POST["contacto"]);

        $xml -> asXML("dados.xml");
        // $nome = $_POST['nome'];
        // $nomeCompleto = $_POST['nomeCompleto'];
        // $email = $_POST['email'];
        // $senha = $_POST['senha'];
        // $contacto = $_POST['contacto'];
      

        foreach($xml ->usuario as $user ){
            echo "nome -> $nome nomeC -> $nomeCompleto email -> $email senha -> $senha contacto->$contacto  😋";
            $insert =$pdo -> prepare("insert into cliente(nome,      nome_completo, email, senha, contacto) values(:nome, :nome_completo, :email, :senha, :contacto)");
            $insert -> bindValue(":nome", $user->nome);
            $insert -> bindValue(":nome_completo", $user-> nomeCompleto);
            $insert -> bindValue(":email", $user -> email);
            $insert -> bindValue(":senha",$user ->senha);
            $insert -> bindVAlue(":contacto", $user->contacto);
            $insert -> execute();
        }
         header('location: sistema.php');
    }
?>
<body>
     <form action="formulario.php" method="post" id="container" style="background-color:#1d3557; color:white;  border-radius:10px; align-items:center; text-align:center; margin:auto; margin-top:10%;">
     <img src="./img/people.svg" alt="" style="width:40px; height:40px; margin-bottom:20px;">
         <div class="mb-3 row">
            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="nome">
            </div>
            </div>
            <div class="mb-3 row">
                <label for="nome" class="col-sm-2 col-form-label">Nome Completo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nomeCompleto" placeholder="nome completo">
                </div>
            </div>
             <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="nome" name="email" placeholder="email">
                </div>
            </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" name="senha">
                </div>
            </div>
             <div class="mb-3 row">
            <label for="nome" class="col-sm-2 col-form-label">contacto</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="contacto" placeholder="contacto">
            </div>
             </div>
        <button type="submit" class="btn btn-success" style="marign:auto;" name="submit">Cadastrar</button>
        <button class="btn btn-success" style="marign:auto;" onclick="limpar()">limpar</button>

     </form>
</body>
<script>
    function limpar(){
     var   nome = document.getElementById("nome").value="";
     var   nomeC= document.getElementById("nomeCompleto").value="";
     var   email= document.getElementById("email").value="";
     var   senha= document.getElementById("senha").value="";
     var   contacto= document.getElementById("contacto").value="";

    }
</script>
</html>