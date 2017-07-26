
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
		<?php if($this->session->flashdata("success")) : ?>
			<p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
		<?php endif ?>
		
		<?php if($this->session->flashdata("danger")) : ?>
			<p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
		<?php endif ?>

   <h1>Produtos</h1> 
    <table class="table">
    <?php foreach($produtos as $produto): ?>
        <tr>
            <td><?= $produto['nome']; ?></td>
            <td><?= character_limiter(html_escape($produto['descricao'], 20)); ?></td>
            <td><?= numeroEmReais($produto['preco']); ?></td>
            <td><?=anchor("produtos/{$produto['id']}", "<span class='glyphicon glyphicon-eye-open
'></span> Visualizar", array("class" => "btn btn-info btn-sm"))?></td>
        </tr>    
    <?php endforeach; ?>
    </table>

<hr>
<?php if($this->session->userdata("usuario_logado")) : ?>
    <?php
      echo anchor('produtos/formulario', 'Novo Produto', array("class" => "btn btn-default"));
      echo "&nbsp;";
      echo anchor('login/logout', 'Logout', array("class" => "btn btn-primary"));
    ?>
<?php else: ?>
    <h2>Login</h2>
    <?php
        echo form_open("login/autenticar");

        echo form_label("Email", "email");
        echo form_input(
            array(
                "type"      => "email",
                "name"      => "email",
                "id"        => "email",
                "class"     => "form-control",
                "maxlength" => "255"
            )
        );        

        echo form_label("Senha", "senha");
        echo form_password(
            array(
                "name"      => "senha",
                "id"        => "senha",
                "class"     => "form-control",
                "maxlength" => "255"
            )
        );

        echo form_button(
            array(
                "class"   => "btn btn-primary",
                "content" => "Login",
                "type"    => "submit"
            )
        );        

        echo form_close();
    ?>
<?php endif; ?>
<hr>

    <h2>Cadastro de usuário</h2>
    <?php
        echo form_open("usuarios/novo");

        echo form_label("Nome", "nome");
        echo form_input(
            array(
                "name"      => "nome",
                "id"        => "nome",
                "class"     => "form-control",
                "maxlength" => "255"
            )
        );

        echo form_label("Email", "email");
        echo form_input(
            array(
                "type"      => "email",
                "name"      => "email",
                "id"        => "email",
                "class"     => "form-control",
                "maxlength" => "255"
            )
        );        

        echo form_label("Senha", "senha");
        echo form_password(
            array(
                "name"      => "senha",
                "id"        => "senha",
                "class"     => "form-control",
                "maxlength" => "255"
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