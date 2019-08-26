<script type="text/javascript">

    $('#divDetalle').dataTable({
        "searching": true,
        "iDisplayLength": <?php echo PAGINADO_TABLA; ?>,
        "bAutoWidth": false,
        "bLengthChange": false,
        "aaSorting": [[0, "asc"]], // Sort by first column descending,
        "oLanguage": idioma_table
    });

function Ajax_CargarAccion_Editar(codigo) {
  var strParametros = "&codigo=" + codigo + "&tipo_accion=1";
  Ajax_CargadoGeneralPagina('Tarea/Registro', 'divVistaMenuPantalla', "divErrorBusqueda", '', strParametros);
}

function Ajax_CargarAccion_EditarFormulario(idFormulario) {
  var strParametros = `&idFormulario=${idFormulario}`;
  Ajax_CargadoGeneralPagina('Formularios/mostrar', 'divVistaMenuPantalla', "divErrorBusqueda", '', strParametros);
}

function Ajax_CargarAccion_EliminarFormulario(idFormulario) {
  var strParametros = `&idFormulario=${idFormulario}`;
  Ajax_CargadoGeneralPagina('Formularios/eliminar', 'divVistaMenuPantalla', "divErrorBusqueda", '', strParametros);
}
</script>
<style>
.red {
  background-color: #b71c1c;
}
.orange {
  background-color: #FF9800;
}
.green {
  background-color: #8BC34A;
}
.btn {
  border: none;
  color: white;
  padding: 8px 12px;
  font-size: 12px;
  cursor: pointer;
}
</style>
<?php $cantidad_columnas = 1;?>
<div id="divVistaMenuPantalla" align="center">
    <div id="divCargarFormulario" class="TamanoContenidoGeneral">
        <br /><br />
        <div class="FormularioSubtituloImagenNormal" style="background: url(html_public/imagenes/logo_senaf.png) no-repeat; background-size: contain; background-position: center;"> </div>
        
        <div class="FormularioSubtitulo"> <?php echo $this->lang->line('FormularioDinamicoTitulo'); ?></div>
        <div class="FormularioSubtituloComentarioNormal "><?php echo $this->lang->line('FormularioDinamicoSubtitulo'); ?></div>
        
        <div style="clear: both"></div>
        <div align="left" class="BotonesVariasOpciones">
            <span class="BotonMinimalista" onclick="Ajax_CargarOpcionMenu('Formulario/configurarFormulario')">
                <?php echo $this->lang->line('FormularioDinamicoNuevo'); ?>
            </span>
        </div>
        <div align="center" class="BotonesVariasOpciones">
            <span class="BotonMinimalista" onclick="Ajax_CargarOpcionMenu('Formulario/configurarFormulario')">
                <?php echo $this->lang->line('FormularioDinamicoEdicion'); ?>
            </span>
        </div>
        <div id="divErrorBusqueda" class="mensajeBD">
        </div>
        <?php
        $i = 0;
        $strClase = "FilaBlanca";
        echo '<table id="divDetalle" class="tblListas Centrado " cellspacing="0" border="1" style="width: 95%;">
            <thead>
                <tr class="FilaCabecera">
                    <th style="width:5%;">Nº </th>
                    <th style="width:10%;">'.$this->lang->line('FormularioDinamicoNombre').'</th>
                    <th style="width:15%;">'.$this->lang->line('FormularioDinamicoDescripcion').'</th>
                    <th style="width:15%;">'.$this->lang->line('FormularioDinamicoPublicado').'</th>
                    <th style="width:30%;">'.$this->lang->line('TablaOpciones').'</th>
                </tr>
            </thead>
            <tbody>';
                foreach ($formularios as $formulario)
                {
                $i++;
                echo '
                <tr class="'.$strClase.'">
                    <td style="text-align: center;">'.$i.'</td>
                    <td style="text-align: center;">'.$formulario->nombre.'</td>
                    <td style="text-align: center;">'.$formulario->descripcion.'</td>
                    <td style="text-align: center;">'.$formulario->publicado.'</td>
                    <td style="text-align: center;">
                        <button class="btn green"><i class="fa fa-eye"></i></button>
                        <button class="btn orange" onclick="Ajax_CargarAccion_EditarFormulario('.$formulario->id.')"><i class="fa fa-pencil"></i></button>
                        <button class="btn orange" onclick="Ajax_CargarAccion_PublicarFormulario('.$formulario->id.')"><i class="fas fa-check-double"></i></button>
                        <button class="btn red" onclick="Ajax_CargarAccion_EliminarFormulario('.$formulario->id.')"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>';
                }
                
                echo '
            </tbody>
        </table>';
        ?>
    </div>
</div>