<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formularios</title>
  <link rel="stylesheet" href="<?php echo base_url('public/css/vendor.min.css')?>">
  <style type="text/css">
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
</head>
<body>
  <div id="template"></div>
  <div class="rendered-form"></div>
  <button id="edit-form">Edit Form</button>
  <script type="text/javascript" src="<?php echo base_url('public/js/jquery-1.10.2.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('public/js/jquery-ui.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('public/js/form-builder.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('public/js/form-render.min.js')?>"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
  <script>
    function toggleEdit(editing) {
      document.body.classList.toggle('rendered-form', !editing);
    }
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
    let fields = [{
      label: 'Map',
      attrs: {
        type: 'map',
        subType: 'component-map'
      },
      icon: '🌟'
    }];
    let templates = {
      map: (fieldData) => {
        return {
          field: '<span id="' + fieldData.name + '">',
          onRender: function() {
            $(document.getElementById(fieldData.name)).append('<div id="map"></div>');
            initMap(true);
          }
        };
      }
    };

    $(document).ready(() => {
      var templateForm = document.getElementById('template');
      var options = {
        scrollToFieldOnAdd: false,
        showActionButtons: true,
        onSave: function(evt, formData) {
          toggleEdit(false);
          $('.rendered-form').formRender({formData});
        },
        fields,
        templates
      };
      $(templateForm).formBuilder(options);
    });

      document.getElementById('edit-form').onclick = function() {
        toggleEdit(true);
      };
  	</script>
</body>
</html>