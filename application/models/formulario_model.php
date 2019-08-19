<?php
error_reporting(0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Formulario_model extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function selFormulario() {
    $query = $this->db->query("SELECT * FROM form");
    return $query->result();
  }

  function guardar($builder) {
    $data = array(
      'title' => "Formulario demo",
      'builder' => "Hola"
    );
    // $data['builder'] = $builder['builder'];
    print("data in model BEFORE INSERT:" . json_encode($data));
    $query = $this->db->insert('form', $data);
    echo $this->db->_error_message();
    echo $this->db->last_query();

    print($query);
  }
}