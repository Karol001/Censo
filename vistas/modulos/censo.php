
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        Censo de personas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Censo de personas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCenso"><i class="fa fa-list" aria-hidden="true"></i>
          Agregar censo
        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>DNI</th>
           <th>Nombre</th>
           <th>Fecha Nacimiento</th>
           <th>Dirección</th>
           <th>Teléfono</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php


          $item = null;
          $valor = null;

          $censo = ControladorCenso::ctrMostrarCenso($item, $valor);

          foreach ($censo as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["DNI"].'</td>
                    <td class="text-uppercase">'.$value["NOMBRE"].'</td>
                    <td class="text-uppercase">'.$value["FECHA_NACIMIENTO"].'</td>
                    <td class="text-uppercase">'.$value["DIRECCION"].'</td>
                    <td class="text-uppercase">'.$value["TELEFONO"].'</td>
                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCenso" DNI="'.$value["DNI"].'" data-toggle="modal" data-target="#modalEditarCenso"><i class="fa fa-pencil"></i></button>';


                          echo '<button class="btn btn-danger btnEliminarCenso" DNI="'.$value["DNI"].'"><i class="fa fa-times"></i></button>';

 
                      echo '</div>  

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>


<!--=====================================
MODAL AGREGAR CENSO
======================================-->

<div id="modalAgregarCenso" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#45AE40; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar censo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoDNI" placeholder="Ingresar DNI" required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" min="0" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="date" min="0" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha de nacimiento" required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" min="0" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="phone" min="0" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar censo</button>

        </div>

        <?php

          $crearCenso = new ControladorCenso();
          $crearCenso -> ctrCrearCenso();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CENSO
======================================-->

<div id="modalEditarCenso" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#45AE40; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar censo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" required>
                
                 <input type="hidden"  name="DNI" id="DNI" required>
                 </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento" required>
                </div>
              </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>
                </div>
              

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" required>

              </div>

            </div>

            
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>
 
      <?php

          $editarCenso = new ControladorCenso();
          $editarCenso -> ctrEditarCenso();

        ?> 

      </form>

    </div>

  </div>

</div>


<div class="content-wrapper" style="height: 226px !important;">

  <section class="content-header">
    
    <h1>
      
        Datos censistas
    
    </h1>


  </section>

  <section class="content">

    <div class="box">

      

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Nombre Censista</th>
           <th>Número de contacto</th>
         </tr> 

        </thead>

        <tbody>
              <tr>
               <td class="text-uppercase">ALEJANDRO ARAQUE ARAQUE</td>
               <td class="text-uppercase">3122282995</td>
               </tr>
               <tr>
               <td class="text-uppercase">CARLOS ANDRES CAMEJO MONTIEL</td>
               <td class="text-uppercase">3220987875</td>
               </tr>
               <tr>
               <td class="text-uppercase">CLAUDIA PATRICIA SILVA CASALLAS</td>
               <td class="text-uppercase">3144778627</td>
               </tr>
        </tbody>

       </table>

      </div>

    </div>

    <h1>
      
  

  </section>

</div>


<div class="content-wrapper" style="min-height: 0px !important;">

  <section class="content-header">
    
    <h1>
      
        Horarios
    
    </h1>


  </section>
<section class="content">

    <div class="box">

      

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Días</th>
           <th>Horario</th>
         </tr> 

        </thead>

        <tbody>
              <tr>
               <td class="text-uppercase">Lunes a viernes</td>
               <td class="text-uppercase">8:00 A 17:00</td>
               </tr>
               <tr>
               <td class="text-uppercase">Sabados</td>
               <td class="text-uppercase">8:00 A 14:00</td>
               </tr>
               
        </tbody>

       </table>

      </div>

    </div>

  </section>
  

</div>





<?php

  $borrarCenso = new ControladorCenso();
  $borrarCenso -> ctrBorrarCenso();

?>

