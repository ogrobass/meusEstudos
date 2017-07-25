<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller {

    public function index() {

        //$this->output->enable_profiler(TRUE);
        $this->load->model("produtos_model");

        $produtos = $this->produtos_model->buscatodos();

        $dados = array("produtos" => $produtos);
        
        $this->load->helper("currency");
        $this->load->view("produtos/index", $dados);
    }



    public function mostra() {
    	$id = $this->input->get("id");
    	$this->load->model("produtos_model");
    	$produto = $this->produtos_model->busca($id);
    	$dados = array("produto" => $produto);
    	$this->load->helper("typography");
    	$this->load->view("produtos/mostra", $dados);
    }


    public function formulario() {
    	$this->load->view('produtos/formulario');
    }

    public function novo() {
    	$usuarioLogado = $this->session->userdata("usuario_logado");
    	$produto = array(
    		"nome"       => $this->input->post("nome"),		
    		"descricao"  => $this->input->post("descricao"),		
    		"preco"      => $this->input->post("preco"),	
    		"usuario_id" => $usuarioLogado['id']	
    	);

    	$this->load->model("produtos_model");
    	$this->produtos_model->salva($produto);

    	$this->session->set_flashdata("success", "Produto inserido com sucesso!");
    	redirect("/");
    }

}