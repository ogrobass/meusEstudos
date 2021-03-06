    <div class="panel panel-primary"> 
        <div class="panel-heading"> 
            <h3 class="panel-title"><?=$produto['nome'];?></h3> 
        </div> 
        <div class="panel-body"> 
            <p><?=numeroEmReais($produto['preco']);?></p>
            <p><?=auto_typography(html_escape($produto['descricao']));?></p>            
        </div> 
    </div>
    
    <h2>Compre agora mesmo!</h2>

    <?php

        echo form_open("vendas/nova");

        echo form_hidden("produto_id", $produto['id']);
        
        echo form_label("Data de entrega", "data_de_entrega");
        echo form_input(
            array(
                "name"      => "data_de_entrega",
                "id"        => "data_de_entrega",
                "class"     => "form-control",
                "maxlength" => "255",
                "value"     => set_value("data_de_entrega", "")
            )
        );

        echo '<hr>';
        
        echo form_button(
            array(
                "class"   => "btn btn-primary",
                "content" => "Comprar",
                "type"    => "submit"
            )
        );  

        echo form_close();
    ?>
