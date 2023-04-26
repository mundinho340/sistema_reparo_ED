<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body{
            
            background-color:#a8dadc ;

        }

        header{
             background-color:#1d3557 ;
              height:90px;
              color:white;

        }

        header div{
              display:flex;
            justify-content:space-between !important;
            width:1400px;
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
    ?>
    <header >
        <div>
            <h1>Meu aparelho</h1>
            
            <p><?php echo $email ?></p>
            <button id="button" onclick="teste()"></button>
        </div>
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
    <script>
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