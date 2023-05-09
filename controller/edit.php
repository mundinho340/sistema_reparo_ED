 <?php
       include_once('../config.php');
        $id = $_POST['id'];
        session_start();
        include_once('./config.php');
        if(isset($_POST['update'])){
        $nome = $_POST["nome"];
        $nomeCompleto = $_POST["nomeCompleto"];
        $email =$_POST["email"];
        $senha= $_POST["senha"];
        $contacto = $_POST['contacto'];
        $sqlUpdate = "UPDATE cliente SET nome='$nome',nome_completo='$nomeCompleto',email='$email',contacto='$contacto', senha='$senha' WHERE id='$id'";
        $result = $pdo->query($sqlUpdate);
        
    }

    header('location: ../sistema.php');
