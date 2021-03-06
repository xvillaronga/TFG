<!DOCTYPE html>
<!--

-->
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../js/bootstrap/popper.min.js"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/styles.css">
    <!---<script src="http://code.jquery.com/jquery-3.1.1.js"></script> -->
    <script type="text/javascript" src="../../js/panelControl.js"></script>
    <script type="text/javascript" src="../../js/busqueda.js"></script>
    <script type="text/javascript" src="../../js/cmTerritorio.js"></script>

    <script src="../../js/polyfill/datalist-polyfill.min.js"></script>



    <style>
        
        .row > div {
            
            background: white;
            margin:10px 0;
        }

        
        
    </style>

    <?php

        

    include("../conexion.php");


    $nifModifica = $_GET['usuario'];   

    $result = $conexion->query("SELECT * FROM censo WHERE NIF = '$nifModifica'");

    while($row = $result->fetch_array())
								{
									
                                $nombre= $row['Nombre'];
                                $apellidos=$row['Apellidos'];
                                $sexo=$row['Sexo'];
                                
                                $numeroempleado=$row['NumeroEmpleado'];
                                $fechanacimiento=$row['FechaNacimiento'];

                                $sociedad= $row['Sociedad'];
                                $numerooficina=$row['NumeroOficina'];
                                $categoriaprofesional=$row['CategoriaProfesional'];

                                $provincia=$row['Provincia'];
                                }
                                
    $result2 = $conexion->query("SELECT * FROM afiliacion WHERE NIF = '$nifModifica'");

    while($row2 = $result2->fetch_array())
								{
									
                                $direccion= $row2['direccion'];
                                $poblacion=$row2['poblacion'];
                                $codigoPostal=$row2['codigoPostal'];
                                
                                
                                $fechaAfiliacion=$row2['fechaAfiliacion'];
                                $fechaBaja=$row2['fechaBaja'];
                                $gestorAfiliacion=$row2['gestorAfiliacion'];
                                $gestorParAfiliacion=$row2['gestorParAfiliacion'];
                                $formaDePago=$row2['formaDePago'];

                                $situacion=$row2['situacion'];
                                $CCAfiliacion=$row2['CCAfiliacion'];

                                $telefono= $row2['telefono'];
                                $correoExternoCajamar=$row2['correoExternoCajamar'];
                                $correoExternoPropio=$row2['correoExternoPropio'];

                                $observaciones=$row2['observaciones'];
                                
                                }

    ?>

   

    
    <title>Consulta/Modificación Afiliado/a</title>
        
        
    </head>
    <body>
      <div class="container">

        <div class="row justify-content-between">

                    
                    <div class="col-12 col-sm-12 col-md-8 col-lg-4" id="logo">
                        
                                 <img class="img-fluid" src="../../img/logo.png" alt="logo">   
                            

                    </div>

                    
                    <div class="col-12 col-sm-12 col-md-8 col-lg-4" id="cierre">

                            <div class="row justify-content-end">   
                                 <button type="button" id='cerrando' class="btn btn-danger btn-xs" onclick="window.close();">
                                     X
                                 </button>  
                            </div>
                            
                    </div>
                    

                    
            </div>

        <div class="row justify-content-center">
            <h1> CONSULTA/MODIFICACION AFILIACION </h1>
        </div>

        <div class="row justify-content-center">
            <p style="font-size:12px; color: #00004d">Los campos con * son obligatorios</p>
        </div>

        <div class="row mt-3">
            <div class="col">
                
                    <div class="row">
                        <div class="col">
                            <label>Nombre*</label>
                            <input type="text" class="form-control"  name="nombre" id="nombre" value=<?php echo json_encode($nombre);?> readonly="readonly">
                        </div>
                        <div class="col">
                            <label>Apellidos*</label>
                            <input type="text" class="form-control"  name="apellidos" id="apellidos" value=<?php echo json_encode($apellidos);?> readonly="readonly">
                        </div>
                        <div class="col">
                            <label>Sexo* </label>
                            <input type="text" class="form-control"  name="sexo" id="sexo" value=<?php echo json_encode($sexo);?> readonly="readonly">
                           
                        </div>
                        <div class="col">
                                <label>NIF*</label>
                                <input type="text" class="form-control"  name="NIF" id="NIF" value=<?php echo json_encode($nifModifica);?> readonly="readonly">
                        </div>
                        <div class="col">
                                <label>NºEmpleado*</label>
                                <input type="text" class="form-control"  name="numeroEmpleado" id="numeroEmpleado" value=<?php echo json_encode($numeroempleado);?> readonly="readonly">
                        </div>

                        <div class="col">
                                <label>Fecha Nacim.*</label>
                                <input type="date" class="form-control"  name="fechaNacimiento" id="fechaNacimiento" value=<?php echo json_encode($fechanacimiento);?> readonly="readonly">
                        </div>
                        
                        
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Direccion</label>
                            <input type="text" class="form-control"  name="direccion" id="direccion" value=<?php echo json_encode($direccion);?>>
                        </div>
                         <div class="col">
                            <label>Población</label>
                            <input type="text" class="form-control"  name="poblacion" id="poblacion" value=<?php echo json_encode($poblacion);?>>
                        </div>
                        
                        <div class="col">
                            
                            <label>Provincia*</label>
                            <input type="text" class="form-control"  name="provincia" id="provincia" value=<?php echo json_encode($provincia);?> readonly="readonly">
                          
                        </div>

                        <div class="col">
                                <label>C.P.</label>
                                <input type="text" class="form-control"  name="codigoPostal" id="codigoPostal" value=<?php echo json_encode($codigoPostal);?>>
                        </div>

                        
                    </div>

                     <div class="form-group row">
                        <div class="col">
                            <label>Entidad*</label>
                            <input type="text" class="form-control"  name="entidad" id="entidad" value=<?php echo json_encode($sociedad);?> readonly="readonly">
                            
                        </div>
                        <div class="col">
                            <label>Numero Oficina*</label>
                            <input type="text" class="form-control"  name="numeroOficina" id="numeroOficina" value=<?php echo json_encode($numerooficina);?> readonly="readonly">
                        </div>
                        <div class="col">
                            
                            <label>Categoria Profesional*</label>
                            <input type="text" class="form-control"  name="clasificacionProfesional" id="clasificacionProfesional" value=<?php echo json_encode($categoriaprofesional);?> readonly="readonly">
                           
                        </div>
                        
                    </div>

                    <div class="form-group row">

                        <!-- <div class="col">
                            <label>AFI </label>
                            <select name="fafi" id="afi" class="form-control" >
                                <option value="COMFIA">COMFIA</option>
                                <option value="BAJA COMFIA">BAJA COMFIA</option>
                            </select>
                        </div> -->
                         <div class="col">
                            <label>Fecha Afiliacion*</label>
                            <input type="date"  class="form-control"  name="fechaAfiliacion" id="fechaAfiliacion" value=<?php echo json_encode($fechaAfiliacion);?>>
                        </div>
                        <div class="col">
                            <label>Fecha Baja</label>
                            <input type="date" class="form-control"  name="fechaBaja" id="fechaBaja" value=<?php echo json_encode($fechaBaja);?> >
                        </div> 
                        
                        
                        <div class="col">
                            <label>Gest. Afil.* (camp. num.)</label>
                            <input type="number" class="form-control" placeholder="" name="gestorAfiliacion" id="gestorAfiliacion" value=<?php echo json_encode($gestorAfiliacion);?>>
                        </div>
                        <div class="col">
                            <label>Gest. Afil. 2 (camp. num.)</label>
                            <input type="number" class="form-control" placeholder="" name="gestorParAfiliacion" id="gestorParAfiliacion" value=<?php echo json_encode($gestorParAfiliacion);?>>
                        </div>
                     

                        <div class="col">
                            <label>Forma pago* </label>

                            <?php 
                            
                                if($formaDePago==1){
                                    echo "
                                    <select name='formaDePago' id='formaDePago' class='form-control' >
                                        <option value='1' selected='true'>RECIBO</option>
                                        <option value='2' >NOMINA</option>
                                    </select>";
                                }
                                else{
                                    echo "
                                    <select name='formaDePago' id='formaDePago' class='form-control' >
                                        <option value='1' >RECIBO</option>
                                        <option value='2' selected='true'>NOMINA</option>
                                    </select>";


                                }
                                
                                ;
                                                        
                            ?>

                            
                        </div>


                    </div>
                    <div class="form-group row">

                        <!--
                        <div class="col">
                            <label>Situación</label>
                            <input type="text" class="form-control" placeholder="Situación" name="situacion" id="situacion">
                        </div>
                        -->

                        <div class="col">

                            <label>Situación</label>

                            <input id ="situacion" list="situaciones" name="situacion" placeholder="" class="form-control" value=<?php echo json_encode($situacion);?>>

                            <datalist id="situaciones" title="Escoge sugerencia...">

                                  <option value="ERE 2012">
                                  <option value="ERE 2015">
                                  <option value="Excedencia Voluntaria Anual Compensada">
                                  <option value="Agente Financiero">
                                  <option value="Otro tipo de Excedencias">
                                  <option value="Otros">
                                  <option value="Otros" disabled>

                            </datalist>
                        </div>

                        <div class="col-6">
                                <label>CC Afiliacion</label>
                                <input type="text" class="form-control"  name="CCAfiliacion" id="CCAfiliacion" value=<?php echo json_encode($CCAfiliacion);?>>
                        </div>

                                                                      
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label>Telefono</label>
                            <input type="text" class="form-control"  name="telefono" id="telefono" value=<?php echo json_encode($telefono);?>>
                        </div>
                        <div class="col">
                            <label>Correo Externo Cajamar</label>
                            <input type="text" class="form-control"  name="correoExternoCajamar" id="correoExternoCajamar" value=<?php echo $correoExternoCajamar;?>>
                        </div>
                        <div class="col">
                            <label>Correo Externo Propio</label>
                            <input type="text" class="form-control"  name="correoExternoPropio" id="correoExternoPropio" value=<?php echo $correoExternoPropio;?>>
                        </div>
                        
                        
                        
                    </div>

                    
                    <div class="form-group row">
                       
                      
                        
                        <div class="col">
                            <label>Observaciones</label>
                            <input type="text" class="form-control" placeholder="" name="observaciones" id="observaciones" value=<?php echo json_encode($observaciones);?>>
                        </div>
                        
                        
                    </div>


                    

                    
                        <div class="col-12 text-center">
                            
                            <div class="row justify-content-center">
                                <div class="col-12 col-sm-9 col-md-4">
                                    <button class="btn btn-primary btn-block" id="grabarAfiliacion" >Guardar</button>

                                </div>
                            </div>
                        </div>
                    

                                       


                
            </div>
        </div>
    </div>

       
    </body>

    <script src="../../js/polyfill/datalist-polyfill.min.js"></script>

     <script type="text/javascript">
        $(document).ready(function(){

           
        
            $("#grabarAfiliacion").click(function(){

                var _nombre= $("#nombre").val();
                var _apellidos= $("#apellidos").val();
                var _sexo= $("#sexo").val();
                var _NIF= $("#NIF").val();
                var _numeroEmpleado= $("#numeroEmpleado").val();
                var _fechaNacimiento= $("#fechaNacimiento").val();


                var _direccion= $("#direccion").val();
                var _poblacion= $("#poblacion").val();
                var _provincia= $("#provincia").val();
                var _codigoPostal= $("#codigoPostal").val();

                var _entidad= $("#entidad").val();
                var _numeroOficina= $("#numeroOficina").val();
                var _clasificacionProfesional= $("#clasificacionProfesional").val();

                var _afi= "COMFIA";

                var _fechaAfiliacion= $("#fechaAfiliacion").val();
                var _fechaBaja= $("#fechaBaja").val();
                var _gestorAfiliacion= $("#gestorAfiliacion").val();

                if ($("#gestorParAfiliacion").val()==''){

                    var _gestorParAfiliacion= $("#gestorAfiliacion").val();

                }
                else{
                    
                    var _gestorParAfiliacion= $("#gestorParAfiliacion").val();

                }

                
                
                var _formaDePago= $("#formaDePago").val();

               
                var _situacion= $("#situacion").val();
                var _CCAfiliacion= $("#CCAfiliacion").val();

                
                var _telefono= $("#telefono").val();
                var _correoExternoCajamar= $("#correoExternoCajamar").val();
                var _correoExternoPropio= $("#correoExternoPropio").val();

                
                
                var _observaciones= $("#observaciones").val();
                
                
                if( _provincia == "" || _fechaAfiliacion == "" || _gestorAfiliacion == "" || _formaDePago == "" ){

                   alert("FALTAN CAMPOS OBLIGATORIOS POR RELLENAR");

                }
                else{

                    alert("TODO PARECE CORRECTO. PROCEDO A SU GRABACION.");
                    
                    
                    $.post("grabarModificarAfiliacion.php",{nombre: _nombre, apellidos: _apellidos, sexo: _sexo, NIF: _NIF, numeroEmpleado: _numeroEmpleado, fechaNacimiento: _fechaNacimiento, direccion: _direccion, poblacion: _poblacion, provincia: _provincia, codigoPostal: _codigoPostal, entidad: _entidad, numeroOficina: _numeroOficina, clasificacionProfesional: _clasificacionProfesional, afi: _afi, fechaAfiliacion: _fechaAfiliacion, fechaBaja: _fechaBaja, gestorAfiliacion: _gestorAfiliacion, gestorParAfiliacion: _gestorParAfiliacion, formaDePago: _formaDePago, CCAfiliacion: _CCAfiliacion, telefono: _telefono, correoExternoCajamar: _correoExternoCajamar, correoExternoPropio: _correoExternoPropio , situacion: _situacion, observaciones: _observaciones},function(res){   
                    
                  
                        alert(res);

                        window.close();
                               
                    });

                    
                }
                    
                
                
                
         
            });
                
             
            
        });
    </script>

</html>
