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
  <a href="<?php echo(base_url())?>formulario/guardar">Guardar</a>
  <script type="text/javascript" src="<?php echo base_url('public/js/formio.full.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('public/js/leaflet.js')?>"></script>
  <script>
    const espaniol = {
      Submit: 'Enviar',
      Language: 'Idioma',
      Translations: 'Traducciones',
      'First Name': 'Tu nombre',
      'Last Name': 'Apellido',
      'Text Field': 'Campo de texto',
      'Text Area': 'Parrafo',
      Email: 'Correo electrónico',
      'Phone Number': 'Número telefónico',
      Save: 'Guardar',
      Remove: 'Borrar',
      Cancel: 'Cancelar',
      Preview: 'Vista previa',
      Help: 'Ayuda',
      Display: 'Vista',
      Data: 'Datos',
      Validation: 'Validaciones',
      API: 'API',
      Conditional: 'Condicionales',
      Logic: 'Logica',
      Layout: 'Marco',
      Date: 'Fecha',
      Time: 'Hora',
      minLength: 'Faltan caracteres para {{field}}',
      maxLength: '{{field}} excede la cantidad permitida de caracteres',
      'Enter your email address': 'Ingrese su dirección de correo electrónico',
      'Enter your first name': 'Ponga su primer nombre',
      'Drag and Drop a form component': 'Arrastra y suelta en esta sección un campo de formulario',
      'Enter your last name': 'Ingresa tu apellido',
      'Valid Email Address': 'dirección de email válida',
      'Please correct all errors before submitting.': 'Por favor, corrija todos los errores antes de enviar.',
      required: '{{field}} es requerido.',
      invalid_email: '{{field}} debe ser un correo electrónico válido.',
      error: 'Por favor, corrija los siguientes errores antes de enviar.'
    };
    const initMap = (init=false) => {
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
        reandOnly: false,
        language: 'es',
        i18n: {
          'es': espaniol
        },
        builder: {
          basic: false,
          advanced: false,
          data: false,
          layout: false,
          custom: {
            title: 'Campos de formulario',
            weight: 0,
            components: {
              header: {
                title: 'Título',
                key: 'titulo',
                icon: 'fa fa-terminal',
                schema: {
                  label: 'Título',
                  type: 'htmlelement',
                  key: 'titulo',
                  content: '<h1>Título</h1>'
                }
              },
              textField: {
                title: 'Campo de texto',
                key: 'campo-texto',
                icon: 'fa fa-terminal',
                schema: {
                  label: 'Campo de texto',
                  type: 'textfield',
                  key: 'campo-texto',
                  placeholder: 'Ingrese texto',
                  attributes: {
                    id: 'uno'
                  }
                }
              },
              textArea: {
                title: 'Parrafo',
                key: 'parrafo',
                icon: 'fa fa-terminal',
                schema: {
                  label: 'Parrafo',
                  type: 'textarea',
                  key: 'parrafo',
                  placeholder: 'Ingrese algun parrafo'
                }
              },
              number: {
                title: 'Numérico',
                key: 'numerico',
                icon: 'fa fa-terminal',
                schema: {
                  label: 'Campo numérico',
                  type: 'number',
                  key: 'numerico',
                  placeholder: 'Valor numérico'
                }
              },
              dateField: {
                title: 'Fecha',
                key: 'fecha',
                icon: 'fa fa-terminal',
                schema: {
                  label: 'Fecha y hora',
                  type: 'datetime',
                  key: 'fecha',
                  placeholder: 'Ingrese una fecha'
                }
              },
              select: {
                title: 'Lista desplegable',
                key: 'select',
                icon: 'fa fa-terminal',
                schema: {
                  label: 'Lista opciones',
                  type: 'select',
                  key: 'select',
                  placeholder: 'Seleccione una opción'
                }
              },
              radio: {
                title: 'Opciones',
                key: 'radio',
                icon: 'fa fa-terminal',
                schema: {
                  label: 'Opciones excluyentes',
                  type: 'radio',
                  key: 'radio'
                }
              },
              selectboxes: {
                title: 'Selección multiple',
                key: 'seleccion-multiple',
                icon: 'fa fa-terminal',
                schema: {
                  label: 'Selección multiple',
                  type: 'selectboxes',
                  key: 'seleccion-multiple'
                }
              }
            }
          }
        },
        editForm: {
          textfield: [
            {
              key: 'api',
              ignore: true
            },
            {
              key: 'data',
              ignore: true
            },
            {
              key: 'conditional',
              ignore: true
            },
            {
              key: 'logic',
              ignore: true
            }
          ],
          textarea: [
            {
              key: 'api',
              ignore: true
            },
            {
              key: 'data',
              ignore: true
            },
            {
              key: 'conditional',
              ignore: true
            },
            {
              key: 'logic',
              ignore: true
            }
          ],
          email: [
            {
              key: 'api',
              ignore: true
            },
            {
              key: 'data',
              ignore: true
            },
            {
              key: 'conditional',
              ignore: true
            },
            {
              key: 'logic',
              ignore: true
            }
          ],
          htmlelement: [
            {
              key: 'api',
              ignore: true
            },
            {
              key: 'data',
              ignore: true
            },
            {
              key: 'conditional',
              ignore: true
            },
            {
              key: 'logic',
              ignore: true
            }
          ],
          number: [
            {
              key: 'api',
              ignore: true
            },
            {
              key: 'data',
              ignore: true
            },
            {
              key: 'conditional',
              ignore: true
            },
            {
              key: 'logic',
              ignore: true
            }
          ],
          datetime: [
            {
              key: 'api',
              ignore: true
            },
            {
              key: 'data',
              ignore: true
            },
            {
              key: 'conditional',
              ignore: true
            },
            {
              key: 'logic',
              ignore: true
            }
          ],
          radio: [
            {
              key: 'api',
              ignore: true
            },
            {
              key: 'data',
              ignore: true
            },
            {
              key: 'conditional',
              ignore: true
            },
            {
              key: 'logic',
              ignore: true
            }
          ],
          selectboxes: [
            {
              key: 'api',
              ignore: true
            },
            {
              key: 'data',
              ignore: true
            },
            {
              key: 'conditional',
              ignore: true
            },
            {
              key: 'logic',
              ignore: true
            }
          ],
          button: [
            {
              key: 'api',
              ignore: true
            },
            {
              key: 'data',
              ignore: true
            },
            {
              key: 'conditional',
              ignore: true
            },
            {
              key: 'logic',
              ignore: true
            },
            {
              key: 'layout',
              ignore: true
            }
          ],
          select: [
            {
              key: 'api',
              ignore: true
            },
            {
              key: 'conditional',
              ignore: true
            },
            {
              key: 'logic',
              ignore: true
            }
          ]
        }
      }).then(function(builder) {
        // Evita que el envío vaya al servidor
        builder.nosubmit = true;
        builder.on('saveComponent', function() {
          console.log(builder.schema);
        });
        builder.on('submit', function(submission) {
          console.log('-----------EEEEEEEe-------------------------');
          console.log(submission);
          console.log('------------------------------------');
          const data = {
            adrian: 'example'
          };
          return fetch("<?= base_url() ?>index.php/formulario/guardar", {
            body: JSON.stringify(data),
            headers: {
              'content-type': 'application/json'
            },
            method: 'POST',
            mode: 'cors',
          })
          .then(response => {
            builder.emit('submitDone', submission)
            response.json()
          })
        });
      });
      // Formio.createForm(document.getElementById('formio'), 'https://examples.form.io/example');
    };
  	</script>
</body>
</html>