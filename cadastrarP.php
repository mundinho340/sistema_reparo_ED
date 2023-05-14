<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
    <style>
        header div{
              display:flex;
            justify-content:space-between !important;
            width:1400px;
        }
        body{
            background-color:#a8dadc !important;
        }

        img{
            margin-bottom:20px !important;
        }
        header{
            color:#f1faee;
            display:flex;
            justify-content: space-between !important;
            width:100%;
            background-color:#1d3557 !important;
            height:90px;
            align-items:center;
        }
        a{
            text-decoration:none !important;
        }
    </style>
</head>
<body>
    <?php
        require_once('./config.php');
        session_start();
        if(isset($_POST['submit'])){
            $nome = $_POST['nome'];
            $data = $_POST['data'];
            $tipoA = $_POST['tipo_avaria'];
            $nomeP = $_POST['nome_proprietario'];
            echo "nome -> $nome data -> $data tipoA -> $tipoA nomeP -> $nomeP 😋";
            $insert =$pdo -> prepare("insert into produto(nomep, data, Tipo_avaria, nome_propretario) values(:nome, :data, :tipoA, :nomeP)");
            $insert -> bindValue(":nomep", $nome);
            $insert -> bindValue(":data", $data);
            $insert -> bindValue(":tipoA", $tipoA);
            $insert -> bindValue(":nomeP",$nomeP);
            $insert -> execute();
            header("location: signin.php");
        }
          $email=$_GET["email"];

    ?>
     <section class="sidebar" id="sidebar">
            <article id="header" style="align-items:center;">
                <div type="hidden" class="user-side" style="align-items:center;"> 
                 <img src="./img/person-circle.svg" alt="" style="width:40px; height:40px;">
                    <?php echo $email;?>
                </div>
            </article>
            <article id="body">
                 <nav>
                     <div>
                        <img src="./img/card-checklist.svg" alt="">
                        <a href="listar.php" >listar</a></div>
                    <br>
                    <div>
                        <img src="./img/phone-flip.svg" alt="">
                        <a href="cadastrarP.php">cadastrar aparelho</a></div>
                    <br>
                    <div>
                        <img src="./img/phone.svg" alt="">
                        <a href='meuAparelho.php?email=<?php echo $id?>'>visualizar meu aparelho</a></div>
                    <br>
                    <div><a href="sair.php"><img src="./img/box-arrow-right.svg" alt="" ">sair</a></div>
                </nav>
            </article>
    </section>
    <header >
        <div>
            <p><?php echo $email ?></p>
            <button id="button" onclick="teste()"></button>
        </div>
         <button style="width:80px; height:40px; align-items:center; text-align:center; border:none; background:transparent;">
            <div style="margin-left:40px; !important">
                <img style="width:35px;" src="./img/sliders2.svg" alt="" onclick="sidebar()">
            </div>

        </button>
    </header>

    <h1>Cadastre o teu equipamento</h1>
     <form action="cadastrarE.php" method="post" id="container" style="width:500px; height:600px; margin:auto; margin-top:10%;">
        <legend>Formulario</legend>
        <fieldset border=1;>
         <div class="mb-3 row">
            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="nome">
            </div>
             </div>
             <div class="mb-3 row">
            <label for="data" class="col-sm-2 col-form-label">data</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="data" name="data">
            </div>
             </div>
             <div class="mb-3 row">
            <label for="avaria" class="col-sm-2 col-form-label">Avaria</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="avaria" name="tipo_avaria" placeholder="avaria">
            </div>
        </div>
                <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">nome propretario</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="propretario" name="nome_proprietario">
                </div>
            </div>
            
        <button type="submit" class="btn btn-success" style="marign:auto;" name="submit">Cadastrar</button>
        <button type="submit" class="btn btn-success" style="marign:auto;">limpar</button>

     </fieldset>

     </form>
     <script src="./side.js"></script>
</body>
</html>