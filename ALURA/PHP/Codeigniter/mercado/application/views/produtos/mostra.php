<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos</title>
    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.css")?>">
</head>
<body>

<div class="container">
    <div class="panel panel-primary"> 
        <div class="panel-heading"> 
            <h3 class="panel-title"><?=$produto['nome'];?></h3> 
        </div> 
        <div class="panel-body"> 
            <p><?=numeroEmReais($produto['preco']);?></p>
            <p><?=auto_typography(html_escape($produto['descricao']));?></p>            
        </div> 
    </div>
    

</div>

</body>
</html>