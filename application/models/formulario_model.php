<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Formulario_model extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function selFormulario() {
    $query = $this->db->query("SELECT * from form");
    return $query->result();
  }
}