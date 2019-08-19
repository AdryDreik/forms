<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formulario extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('formulario_model');
  }

  public function index()
  {
    $data['formularios'] = $this->formulario_model->listadoFormularios();
    $this->load->view('inicio', $data);
  }

	public function crear()
	{
    $formulario = array(
      'nombre' => $this->input->post('nombre'),
      'descripcion' => $this->input->post('descripcion'),
      'publicado' => 0
    );
    $data['idFormulario'] = $this->formulario_model->crearFormulario($formulario);
    $data['formularios'] = $this->formulario_model->listadoFormularios();
    $data['componentes'] = json_encode(array());
    $this->load->view('formularios', $data);
  }

  public function mostrar($id)
  {
    $data['formularios'] = $this->formulario_model->listadoFormularios();
    $data['idFormulario'] = $id;
    $builder = $this->formulario_model->listadoComponentesFormulario($id);
    if (isset($builder[0]->builder)) {
      $data['componentes'] = $builder[0]->builder;
    } else {
      $data['componentes'] = json_encode(array());
    }
    $this->load->view('formularios', $data);
  }


  function guardar () {
    $data = array();
    $builder = $this->input->post('builder');
    $formio = $this->input->post('data');
    $formatted = $this->input->post('formatted');
    $builder = $this->input->post('builder');
    $data['builder'] = $builder;
    $data['data'] = $formio;
    $data['formatted'] = $formatted;
    $dataModificada = json_decode($data['formatted']);
    $idForm = $dataModificada->form_id;
    var_dump($idForm);
    $this->formulario_model->guardar($dataModificada->form_id, $builder);
    // $this->output->enable_profile(); 
  }
}
