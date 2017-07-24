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

}