<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    function soma($a, $b, $c){
        return $a+ $b+$c;
    }

    function media($soma){
        return $soma/3;
    }

    echo "A soma de 3 + 4+6 e ".soma(3,4,6);
    echo "<br> media ".media(soma(5,5,5));

    //  function soma($a, $b, $c){
    //     return $a+ $b+$c;
    // }

    // function media(soma($a, $b, $c)){
    //     return soma($a,$b,$c)/3;
    // }

    // echo "A soma de 3 + 4+6 e ".soma(3,4,6);
    // echo "<br> media ".media(soma(5,5,5));

    
?>
<body>
    <header>
        
    </header>
</body>
</html>