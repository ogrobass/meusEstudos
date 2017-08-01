    <h1>Novo Produto</h2>

    <?php //echo validation_errors("<p class='alert alert-danger'>", "</p>"); ?>
    <?php
        echo form_open("produtos/novo");

        echo form_label("Nome", "nome");
        echo form_input(
            array(
                "name"      => "nome",
                "id"        => "nome",
                "class"     => "form-control",
                "maxlength" => "255",
                "value"     => set_value("nome", "")
            )
        );
        echo form_error("nome");

        echo form_label("Preco", "preco");
        echo form_input(
            array(
                "type"      => "number",
                "name"      => "preco",
                "id"        => "preco",
                "class"     => "form-control",
                "maxlength" => "255",
                "value"     => set_value("preco", "")
            )
        );        
        echo form_error("preco");

        echo form_label("Descricção", "descricao");
        echo form_textarea(
            array(
                "name"      => "descricao",
                "id"        => "descricao",
                "class"     => "form-control",
                "value"     => set_value("descricao", "")
            )
        );
        echo form_error("descricao");

        echo '<hr>';
        
        echo form_button(
            array(
                "class"   => "btn btn-primary",
                "content" => "Cadastrar",
                "type"    => "submit"
            )
        );        

        echo form_close();
    ?>