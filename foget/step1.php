<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        session_start();
        require_once("../config.php");
        if(isset($_POST['pp']) && !empty($_POST['contacto'])){
            include_once('./config.php');
            $contacto= $_POST["contacto"];

            $sql = "SELECT * FROM cliente WHERE contacto='$contacto'";
            $result=$pdo -> query($sql);
            if($result ->rowCount()< 1){
                unset($_SESSION['contacto']);
                echo "Erro usuario nao encontrado";
            header("location: step1.php");
            }else{
                $sql = "SELECT * FROM cliente WHERE contacto='$contacto'";
                $result = $pdo -> query($sql);
                $_SESSION['contacto'] = $contacto;
                header('location: ../step2.php');
            }
    }
    ?>
    <h1>Recupere sua palavra chave</h1>
    <p>Digite o teu numero de celular para poder recuperar a tua senha</p>
    <form action="step1.php" method="post">
        <label for="">Numero</label>
        <input type="text" name="contacto" placeholder="Digite o teu contacto">
        <input type="button" name="pp" value="recuperar">
    </form>
    <hr>
    <form action="">
        
    </form>
</body>
</html>