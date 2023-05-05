
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
    include_once('../controller/config.php');

    if(isset($_POST['update'])){
        $id=$_POST["id"];
        $nome = $_POST["nome"];
        $nomeCompleto = $_POST["nome_completo"]
        $email =$_POST["email"];
        $senha= $_POST["senha"];
        $contacto = $_POST['contacto'];
        $sqlUpdate = "UPDATE utilizadorr SET nome='$nome',nome_completo='$nomeCompleto,email='$email',telefone='$telefone', senha='$senha' WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }

    header('location: sistema.php');
?>
    <?php
        include_once('./config.php');
        if(isset($_POST['update'])){
            if(!empty($_GET['id'])){
                $id = $_GET['id'];
                $selectSQL= "SELECT * FROM cliente WHERE id='$id'";
                $result = $pdo->query($selectSQL);
                
                if($result->rowCount()>=0){
                    while($user_data =$result->fetch(PDO::FETCH_ASSOC)){
                        $nome = $user_data['nome'];
                        $nomeCompleto = $user_data['nome_completo'];
                        $email = $user_data['email'];
                        $senha =$user_data['senha'];
                        $contacto = $user_data['contacto'];
                    }
                    print_r("nome : $nome");
    
                    }else{
                        header('location: sistema.php');
                    }
            }else {
                header('location: sistema.php');
            }

        }
    ?>
     <section class="sidebar" id="sidebar">
            <article id="header" style="align-items:center;">
                <div type="hidden" class="user-side" style="align-items:center;"> 
                 <img src="./img/person-circle.svg" alt="" style="width:40px; height:40px;">
                    <!-- <?php echo $email;?> -->
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
            
            <button id="button" onclick="teste()"></button>
        </div>
         <button style="width:80px; height:40px; align-items:center; text-align:center; border:none; background:transparent;">
            <div style="margin-left:40px; !important">
                <img style="width:35px;" src="./img/sliders2.svg" alt="" onclick="sidebar()">
            </div>

        </button>
    </header>

     <form action="editar.php" method="post" id="container" style="width:500px; height:600px; margin:auto; margin-top:15%;">
         <div class="mb-3 row">
            <label for="nome" class="col-sm-2 col-form-label" >Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="nome"  value=<?php echo $nome; ?> required>
            </div>
             </div>
             <div class="mb-3 row">
            <label for="nome" class="col-sm-2 col-form-label"  required>Nome Completo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="nome completo" value=<?php echo $nomeCompleto?> required>
            </div>
             </div>
             <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="email" value=<?php echo $email?> required>
            </div>
        </div>
                <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" id="senha" name="senha" value=<?php echo $senha?> required>
                </div>
            </div>
             <div class="mb-3 row">
            <label for="nome" class="col-sm-2 col-form-label">contacto</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="contacto" name="contacto" placeholder="contacto" value=<?php echo $contacto?> required>
            </div>
             </div>
        <button type="submit" class="btn btn-success" style="marign:auto;" name="update">Actualizar</button>
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