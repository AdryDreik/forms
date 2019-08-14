<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formulario_controller extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('formulario_model');
  }

  public function guardarFormulario ($data) {
    print_r($data);
  }
	public function index()
	{
		$this->load->view('inicio');
	}
}
