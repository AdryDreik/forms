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
    $data = array();
    $builder = $this->input->post('builder');
    $formio = $this->input->post('formio');
    $formatted = $this->input->post('formatted');
    $builder = $this->input->post('builder');
    $data['builder'] = $builder;
    $data['formio'] = $formio;
    $data['formatted'] = $formatted;
    $this->formulario_model->guardar($data);
    // $this->output->enable_profile(); 
  }
}
