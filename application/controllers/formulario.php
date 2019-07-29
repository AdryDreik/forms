<?php
class Formulario extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('formulario_model');
  }
  public function index() {
    // Enviar a template la vista index de formulario
    $data['content'] = "formulario/index";
    $data['selFormulario'] = $this->formulario_model->selFormulario();
    $this->load->view("template", $data);
  }
}