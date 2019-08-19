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

 public function listadoFormularios($idformulario = null)
  {
      try {
        if (isset($idformulario)) {
          $sql = "
          SELECT * 
          FROM formulario
          WHERE id = $idformulario";
          
        } else {
          $sql = "
          SELECT *
          FROM formulario";
        }
      
        $consulta = $this->db->query($sql);
        $listaResultados = $consulta->result();
        return $listaResultados;
      } catch (Exception $e) {
        js_error_div_javascript($e . "<span style='font-size:3.5mm;'>
                Ocurrio un evento inesperado, intentelo mas tarde.</span>");
        exit();
      }
    
      return $listaResultados;
  }

  public function listadoComponentesFormulario ($idformulario) {
      try {
        $sql = "
          SELECT c.*
          FROM formulario f
          INNER JOIN componente c ON c.form_id = f.id
          WHERE form_id = $idformulario";          
        $consulta = $this->db->query($sql)->result();
        return $consulta;
      } catch (Exception $e) {
        js_error_div_javascript($e . "<span style='font-size:3.5mm;'>Ocurrio un evento inesperado, intentelo mas tarde.</span>");
        exit();
      }
      return $listaResultados;
  }

  public function crearFormulario ($formulario) {
    try {
      $this->db->query("insert into formulario (nombre, descripcion, publicado) values ('".$formulario['nombre']."', '".$formulario['descripcion']."', ".$formulario['publicado'].");");
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    } catch (Exception $e) {
    } 
  }

  public function guardar ($idFormulario, $builder) {
    try {
      var_dump($idFormulario, $builder);  
      $this->db->where('form_id', $idFormulario);
      $this->db->delete('componente');
      $this->db->query("insert into componente (form_id, builder) values ($idFormulario, '$builder');");
      echo $this->db->_error_message();
      echo $this->db->last_query();
    } catch (Exception $e) {
      var_dump($e);
    } 
  }

  public function borrarFormulario ($idFormulario) {
    try {
      $this->db->where('fid_formulario', $idFormulario);
      $this->db->delete('componente');
      $this->db->where('id', $idFormulario);
      $this->db->delete('formulario');
    } catch (Exception $e) {
      js_error_div_javascript($e . "<span style='font-size:3.5mm;'>Error al eliminar el formulario.</span>");
      exit();
    }
  }
}