<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">
	</style>
</head>
<body>
	<!-- CREATE TABLE form ( id smallint unsigned not null auto_increment, name varchar(20) not null, jdoc JSON, constraint pk_example primary key (id) ); -->
	<div id="fb-editor"></div>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
		<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
		<link rel="stylesheet" href="https://formbuilder.online/assets/css/vendor.min.css">
    <script>
      const init = () => {
        const fb = $(document.getElementById('fb-editor')).formBuilder();
        setTimeout(() => {
          fb.actions.setLang('es-ES');
        }, 400);
      }
      $(document).ready(init());
  	</script>
</body>
</html>