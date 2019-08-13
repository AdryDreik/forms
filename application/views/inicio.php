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
  <style type="text/css">
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
</head>
<body>
  <div id="builder"></div>
  <div id="formio"></div>
  <script type="text/javascript" src="<?php echo base_url('public/js/formio.full.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('public/js/leaflet.js')?>"></script>
  <script>
    function initMap (init=false) {
      if (init) {
        const map = L.map('map').setView([-16.5106572, -68.1288186], 13);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
          maxZoom: 14,
          attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
          id: 'mapbox.streets'
        }).addTo(map);
      }
    }
    window.onload = () => {
      Formio.builder(document.getElementById('builder'), {}, {
        language: 'sp',
        i18n: {
          sp: {
            'Title': 'Titulo',
            'Submit': 'Enviar',
            'Please correct all errors before submitting.': 'Por favor, corrija todos los errores antes de enviar.',
            'My custom error message' : 'Mi mensaje de error personalizado',
            required : '{{field}} es requerido.',
            invalid_email: '{{field}} debe ser un correo electrónico válido.',
            error : 'Por favor, corrija los siguientes errores antes de enviar.',
          }
        },
        builder: {
          basic: false,
          advanced: false,
          layout: false,
          data: false,
          customBasic: {
            title: 'Components',
            default: true,
            weight: 0,
            components: {
              textfield: true,
              textarea: true,
              email: true,
              phoneNumber: true
            }
          }
        }
      }).then(function(builder) {
      builder.on('saveComponent', function() {
        console.log(builder.schema);
      });
    });
      // Formio.createForm(document.getElementById('formio'), 'https://examples.form.io/example');
    };
  	</script>
</body>
</html>