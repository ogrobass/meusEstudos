<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once 'Caneta.php';
            
            $c1 = new Caneta("Bic", "Azul", 0.5, true);
            $c1->setModelo("Bic");
            $c1->setponta(0.5);
            
            echo '<pre>';
            print_r($c1);
            echo '</pre';
        ?>
    </body>
</html>
