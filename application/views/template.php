<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Generador de Formularios</title>
</head>
<body>
  <header>Header</header>
  <section id="main">
    <?php $this->load->view($content);?>
  </section>
  <footer>Footer</footer>
  <script type="text/javascript" src="<?php echo base_url('public/js/jquery-1.10.2.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('public/js/jquery-ui.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('public/js/form-builder.min.js')?>"></script>
  <link rel="stylesheet" href="<?php echo base_url('public/css/vendor.min.css')?>">
</body>
</html>