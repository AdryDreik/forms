<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formularios</title>
  <link rel="stylesheet" href="<?php echo base_url('public/css/leaflet.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css/formio.full.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css/font-awesome.min.css')?>">
  <style type="text/css">
    #map {
      height: 400px;
      width: 100%;
    }
    body {
      padding: 20px;
      margin: 0
    }
  </style>
</head>
<body>
  <a class="btn btn-primary" href="<?=site_url('formulario/crear')?>">Crear nuevo formulario</a>
  <table border="1">
    <th>
      <tr>NRO</tr>
      <tr>Nombre</tr>
      <tr>Descripcion</tr>
      <tr>Acciones</tr>
    </th>
    <tbody>
  <?php 
    $i = 0;
  foreach ($formularios as $formulario) {
    $i++;
    echo '<tr>
      <td>'.$i.'</td>
      <td>'.$formulario->nombre.'</td>
      <td>'.$formulario->descripcion.'</td>
      <td><a class="btn btn-primary" href="'.site_url('formulario/mostrar/').'/'.$formulario->id.'">Editar</a></td>
    </tr>';
    }
   ?>
       </tbody>
  </table>
  <script type="text/javascript" src="<?php echo base_url('public/js/formio.full.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('public/js/leaflet.js')?>"></script>
  <script src="https://code.jquery.com/jquery-1.10.0.min.js" integrity="sha256-2+LznWeWgL7AJ1ciaIG5rFP7GKemzzl+K75tRyTByOE=" crossorigin="anonymous"></script>

</body>
</html>