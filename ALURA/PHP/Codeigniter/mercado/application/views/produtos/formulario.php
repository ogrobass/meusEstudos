
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
    <h1>Novo Produto</h2>
    <?php
        echo form_open("produtos/novo");

        echo form_label("Nome", "nome");
        echo form_input(
            array(
                "name"      => "nome",
                "id"        => "nome",
                "class"     => "form-control",
                "maxlength" => "255"
            )
        );

        echo form_label("Preco", "preco");
        echo form_input(
            array(
                "type"      => "number",
                "name"      => "preco",
                "id"        => "preco",
                "class"     => "form-control",
                "maxlength" => "255"
            )
        );        

        echo form_label("Descricção", "descricao");
        echo form_textare(
            array(
                "name"      => "descricao",
                "id"        => "descricao",
                "class"     => "form-control"
            )
        );

        echo form_button(
            array(
                "class"   => "btn btn-primary",
                "content" => "Cadastrar",
                "type"    => "submit"
            )
        );        

        echo form_close();
    ?>
</div>

</body>
</html>