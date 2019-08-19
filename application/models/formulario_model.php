<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Formulario_model extends CI_Model {
  public function __construct() {
    parent::__construct();
    // $this->load->database();
  }

  public function selFormulario() {
    $query = $this->db->query("SELECT * FROM form");
    return $query->result();
  }

  function guardar($builder) {
    $data = array();
    $data['title'] = 'Formulario demo';
    $data['formio'] = json_encode($builder['formio']);
    $data['formatted'] = json_encode($builder['formatted']);
    $data['builder'] = json_encode($builder['builder']);
    print_r($data);
    $this->db->insert('form', $data);
  }
}