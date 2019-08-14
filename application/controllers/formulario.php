<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formulario extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('formulario_model');
  }

	public function index()
	{
    $this->load->view('inicio');
  }
  
  function guardar () {
    echo 'holaaaaaa';
    print_r($this->input->post('adrian', TRUE));
  }
}
