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
    <a class="btn btn-primary" id="nuevoForm">Crear nuevo Formulario</a>
    <form id="formCreacion" action="<?=site_url('formulario/crear')?>" method="POST">
      <div class="input-group input-group-lg">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-lg">Nombre</span>
        </div>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
      </div><div class="input-group input-group-lg">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-lg">Descripcion</span>
      </div>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
    </div>
    <a class="btn btn-primary" type="submit">Crear nuevo formulario</a>
  </form>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Publicado</th>
      </tr>
    </thead>
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
  <script type="text/javascript">
    $('#formCreacion').hide();
    $('#nuevoForm').click(function () {
      if ($('#formCreacion').is(':hidden')) {
        $('#formCreacion').show(500);
      } else {
        $('#formCreacion').hide(500);
      }
      console.log(`====================_MENSAJE_A_MOSTRARSE_====================`);
      console.log('holas');
      console.log(`====================_MENSAJE_A_MOSTRARSE_====================`);
    })
  </script>
</body>
</html>