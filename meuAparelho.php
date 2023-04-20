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
        <h1>Meu aparelho</h1>
        
        <p><?php echo $email ?></p>
        <button id="header" onclick="teste()"></button>
    </header>

        <table class="table text-black table-bg">
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
        <button onclick="teste()" id="button">test</button>
    <script>
        let img = document.createElement("img")
         let img1= document.createElement("img")
        img.src = "./img/lightbulb.svg"
        img1.src="./img/lightbulb-off.svg"
        let container =document.querySelector("button")
        let body = document.querySelector("body")
        let header= document.querySelector("header")
        
        // container.appendChild(img)
        var estado= true;
         container.appendChild(img);
        function teste(){
            b= document.getElementById('button');
            b.style
            estado = !estado
            console.log(estado)
            if(estado === true){
                img1.remove()
                   header.style.backgroundColor="blue"
                body.style.backgroundColor="blue"
                container.appendChild(img);
                body.style.backgroundColor="white" ;
            }else{
                img.remove()

                header.style.backgroundColor="#09030F"
                body.style.backgroundColor="#070823"
                body.style.color="white"
                 container.appendChild(img1);
            }
        }

    </script>
</body>
</html>