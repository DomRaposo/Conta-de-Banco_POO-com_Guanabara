<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<pre>
<?php
    require_once 'Contabanco.php';

    $p1 = new Contabanco();
    $p2 = new Contabanco();
    $p1->abrirConta("CC");
    $p1->setDono("Dom Raposo");
    $p1->setNumconta(1111);
    $p2->abrirConta("CP");
    $p2->setDono("Dona Raposa");
    $p2->setNumconta(2222);

    $p1->depositar(300);
    $p2->depositar(500);

    $p1->sacar(338);

    $p1->pagarMensal();
    $p2->pagarMensal();
    $p1->fecharConta();

    print_r($p1);
    print_r($p2);
?>
</pre>
</body>
</html>