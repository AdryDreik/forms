<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formularios</title>
  <link rel="stylesheet" href="<?php echo base_url('public/css/vendor.min.css')?>">
</head>
<body>
  <div id="build-wrap"></div>
  <div class="render-wrap"></div>
  <button id="edit-form">Edit Form</button>
  <script type="text/javascript" src="<?php echo base_url('public/js/jquery-1.10.2.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('public/js/jquery-ui.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('public/js/form-builder.min.js')?>"></script>
  <script>
      jQuery(function($) {
        var fbTemplate = document.getElementById('build-wrap');
        var options = {
          scrollToFieldOnAdd: false,
          showActionButtons: true,
          onSave: function(evt, formData) {
            toggleEdit(false);
            $('.render-wrap').formRender({formData});
          }
        };
        $(fbTemplate).formBuilder(options);
      });

      /**
      * Toggles the edit mode for the demo
      * @return {Boolean} editMode
      */
      function toggleEdit(editing) {
        document.body.classList.toggle('form-rendered', !editing);
      }

      document.getElementById('edit-form').onclick = function() {
        toggleEdit(true);
      };
  	</script>
</body>
</html>