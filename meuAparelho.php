<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
     <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body{
            
            background-color:#a8dadc ;

        }

        /* header{
             background-color:#1d3557 ;
              height:90px;
              color:white;

        } */

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
    <title>Document</title>
   
</head>
<body>
    <?php
        require_once("./config.php");
        session_start();
            $email =$_GET['email'];
            // $dados = $cmd -> fetchAll(PDO::FETCH_ASSOC);
            //testar se email = email nome
            $nome = $pdo -> prepare("select nome from cliente where email ='$email';");
            $nome -> execute();
            while($user_data = $nome->fetch(PDO::FETCH_ASSOC)){
                $name= $user_data['nome'];
            }
            $cmd =$pdo ->prepare("select id,nomep , data, Tipo_avaria from produto where nome_propretario='$name';");
            $cmd->execute();
            //sommervile -> 
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
                        <!-- edx.com -->
                        <img src="./img/phone.svg" alt="">
                        <a href='meuAparelho.php?email=<?php echo $id?>'>visualizar meu aparelho</a></div>
                    <br>
                    <div><a href="sair.php"><img src="./img/box-arrow-right.svg" alt="" ">sair</a></div>
                </nav>
            </article>
    </section>
    <header >
        <div>
            <h1>Meu aparelho</h1>
            
            <p><?php echo $email ?></p>
            <button id="button" onclick="teste()"></button>
        </div>
         <button style="width:80px; height:40px; align-items:center; text-align:center; border:none; background:transparent;">
            <div style="margin-left:40px; !important">
                <img style="width:35px;" src="./img/sliders2.svg" alt="" onclick="sidebar()">
            </div>

        </button>
    </header>

        <table class="table  table-bg">
            <thead>
                <tr>
                     <th scope="col">id</th>
                    <th scope="col">nome</th>
                    <th scope="col">data</th>
                    <th scope="col">avaria</th>
                    <th scope="col">estado</th>
                </tr>
            </thead>
               <tbody>
                    <?php
                        while($user_data = $cmd->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nomep']."</td>";
                        echo "<td>".$user_data['data']."</td>";
                        echo "<td>".$user_data['Tipo_avaria']."</td>";
                        echo "<td>pronto</td>";
                    }
                ?>
                
            </tbody>
        </table>
 <script src="./side.js"></script>
    <script >
        let img = document.createElement("img")
         let img1= document.createElement("img")
        img.src = "./img/lightbulb.svg"
        img1.src="./img/lightbulb-off.svg"
        let container =document.querySelector("button")
        let body = document.querySelector("body")
        let header= document.querySelector("header")
        let table = document.querySelector("table")
        
        // container.appendChild(img)
        var estado= true;
         container.appendChild(img);
        function teste(){
            b= document.getElementById('button');
            b.style
            estado = !estado
            console.log(estado)
            if(estado === true){
                localStorage.setItem("dark", false);
                img1.remove()
                header.style.backgroundColor="#1d3557 "
                body.style.backgroundColor="#a8dadc"
                header.style.color="white"
                 table.style.color="black"
                container.appendChild(img);
            
            }else{
                img.remove()
                localStorage.setItem("dark", true);
                header.style.backgroundColor="#09030F"
                body.style.backgroundColor="#070823"
                table.style.color="white"
                header.style.color="#1EA3E6"
                 container.appendChild(img1);
            }
        }

    </script>
</body>
</html>