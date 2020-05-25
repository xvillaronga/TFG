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

    <script>

        $(document).ready(function(){

            $("#infsi").click(function(){ 
                    
                        $( "#infno" ).prop( "checked", false );
                        $( "#corcaj" ).prop( "disabled", false );
                        $( "#corext" ).prop( "disabled", false );
                        $( "#mov" ).prop( "disabled", false );
                        
            });

            $("#infno").click(function(){ 
                    
                    $( "#infsi" ).prop( "checked", false );

                    $( "#corcaj" ).prop( "disabled", true );
                    $( "#corcaj" ).prop( "checked", false );

                    $( "#corext" ).prop( "disabled", true );
                    $( "#corext" ).prop( "checked", false );

                    $( "#mov" ).prop( "disabled", true );
                    $( "#mov" ).prop( "checked", false );
                    
            });
        });
    </script>

    <style>
        
        .row > div {
            
            background: white;
            margin:10px 0;
        }

        .form-check-input{

            width:20px;
            height:20px;

        }

        .form-check-input{

            width:20px;
            height:20px;
        }
        
    </style>

    <?php

        

    include("../conexion.php");


    $nifAlta = $_GET['usuario'];   

    $result = $conexion->query("SELECT * FROM censo WHERE NIF = '$nifAlta'");

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

    ?>

   

    
    <title>Alta Afiliación</title>
        
        
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
            <h1> ALTA AFILIACION </h1>
        </div>

        <div class="row justify-content-center">
            <p style="font-size:12px; color: #00004d">Los campos con * son obligatorios</p>
        </div>

        <div class="row mt-3">
            <div class="col">
                
                    <div class="row">
                        <div class="col">
                            <label>Nombre*</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" value=<?php echo json_encode($nombre);?> readonly="readonly">
                        </div>
                        <div class="col">
                            <label>Apellidos*</label>
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" id="apellidos" value=<?php echo json_encode($apellidos);?> readonly="readonly">
                        </div>
                        <div class="col">
                            <label>Sexo* </label>
                            <input type="text" class="form-control" placeholder="SExo" name="sexo" id="sexo" value=<?php echo json_encode($sexo);?> readonly="readonly">
                           
                        </div>
                        <div class="col">
                                <label>NIF*</label>
                                <input type="text" class="form-control" placeholder="NIF" name="NIF" id="NIF" value=<?php echo json_encode($nifAlta);?> readonly="readonly">
                        </div>
                        <div class="col">
                                <label>NºEmpleado*</label>
                                <input type="text" class="form-control" placeholder="Nº Empleado" name="numeroEmpleado" id="numeroEmpleado" value=<?php echo json_encode($numeroempleado);?> readonly="readonly">
                        </div>

                        <div class="col">
                                <label>Fecha Nacim.*</label>
                                <input type="date" class="form-control" placeholder="Fecha Nacimiento" name="fechaNacimiento" id="fechaNacimiento" value=<?php echo json_encode($fechanacimiento);?> readonly="readonly">
                        </div>
                        
                        
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Direccion</label>
                            <input type="text" class="form-control" placeholder="Direccion" name="direccion" id="direccion">
                        </div>
                         <div class="col">
                            <label>Población</label>
                            <input type="text" class="form-control" placeholder="Población" name="poblacion" id="poblacion">
                        </div>
                        
                        <div class="col">
                            
                            <label>Provincia*</label>
                            <input type="text" class="form-control" placeholder="Provincia" name="provincia" id="provincia" value=<?php echo json_encode($provincia);?> readonly="readonly">
                           <!--
                            <select name="provincia" id="provincia" class="form-control">
                                 
                                    <option value='selecciona' disabled selected>Selecciona</option>                                               
                                    <option value='A Coruña' >A Coruña</option>
                                    <option value='Álava'>Álava</option>
                                    <option value='Albacete' >Albacete</option>
                                    <option value='Alicante'>Alicante</option>
                                    <option value='Almería' >Almería</option>
                                    <option value='Asturias' >Asturias</option>
                                    <option value='ávila' >Ávila</option>
                                    <option value='Badajoz' >Badajoz</option>
                                    <option value='Barcelona'>Barcelona</option>
                                    <option value='Burgos' >Burgos</option>
                                    <option value='Cáceres' >Cáceres</option>
                                    <option value='Cádiz' >Cádiz</option>
                                    <option value='Cantabria' >Cantabria</option>
                                    <option value='Castellón' >Castellón</option>
                                    <option value='Ceuta' >Ceuta</option>
                                    <option value='Ciudad Real' >Ciudad Real</option>
                                    <option value='Córdoba' >Córdoba</option>
                                    <option value='Cuenca' >Cuenca</option>
                                    <option value='Gerona' >Gerona</option>
                                    <option value='Las Palmas' >Las Palmas</option>
                                    <option value='Granada' >Granada</option>
                                    <option value='Guadalajara' >Guadalajara</option>
                                    <option value='Guipúzcoa' >Guipúzcoa</option>
                                    <option value='Huelva' >Huelva</option>
                                    <option value='Huesca' >Huesca</option>
                                    <option value='Jaén' >Jaén</option>
                                    <option value='La Rioja' >La Rioja</option>
                                    <option value='León' >León</option>
                                    <option value='Lleida' >Lerida</option>
                                    <option value='Lugo' >Lugo</option>
                                    <option value='Madrid' >Madrid</option>
                                    <option value='Malaga' >Málaga</option>
                                    <option value='Mallorca' >Mallorca</option>
                                    <option value='Melilla' >Melilla</option>
                                    <option value='Murcia' >Murcia</option>
                                    <option value='Navarra' >Navarra</option>
                                    <option value='Orense' >Orense</option>
                                    <option value='Palencia' >Palencia</option>
                                    <option value='Pontevedra'>Pontevedra</option>
                                    <option value='Salamanca'>Salamanca</option>
                                    <option value='Segovia' >Segovia</option>
                                    <option value='Sevilla' >Sevilla</option>
                                    <option value='Soria' >Soria</option>
                                    <option value='Tarragona' >Tarragona</option>
                                    <option value='Tenerife' >Tenerife</option>
                                    <option value='Teruel' >Teruel</option>
                                    <option value='Toledo' >Toledo</option>
                                    <option value='Valencia' >Valencia</option>
                                    <option value='Valladolid' >Valladolid</option>
                                    <option value='Vizcaya' >Vizcaya</option>
                                    <option value='Zamora' >Zamora</option>
                                    <option value='Zaragoza'>Zaragoza</option>
                                
                            </select>
                        -->
                        </div>

                        <div class="col">
                                <label>C.P.</label>
                                <input type="text" class="form-control" placeholder="C.P." name="codigoPostal" id="codigoPostal">
                        </div>

                        
                    </div>

                     <div class="form-group row">
                        <div class="col">
                            <label>Entidad*</label>
                            <input type="text" class="form-control" placeholder="entidad" name="entidad" id="entidad" value=<?php echo json_encode($sociedad);?> readonly="readonly">
                            
                        </div>
                        <div class="col">
                            <label>Numero Oficina*</label>
                            <input type="text" class="form-control" placeholder="NUmero Oficina" name="numeroOficina" id="numeroOficina" value=<?php echo json_encode($numerooficina);?> readonly="readonly">
                        </div>
                        <div class="col">
                            
                            <label>Categoria Profesional*</label>
                            <input type="text" class="form-control" placeholder="clasificacionProfesional" name="clasificacionProfesional" id="clasificacionProfesional" value=<?php echo json_encode($categoriaprofesional);?> readonly="readonly">
                           
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
                            <input type="date"  class="form-control" placeholder="Fecha Afiliacion" name="fechaAfiliacion" id="fechaAfiliacion" ">
                        </div>
                        <!-- <div class="col">
                            <label>Fecha Baja</label>
                            <input type="date" class="form-control" placeholder="Fecha Baja" name="fechaBaja" id="fechaBaja">
                        </div> -->
                        
                        
                        <div class="col">
                            <label>Gest. Afiliac.* ( campo numérico )</label>
                            <input type="number" class="form-control" placeholder="" name="gestorAfiliacion" id="gestorAfiliacion" value="">
                        </div>
                        <div class="col">
                            <label>Gest. Afiliac. 2 ( campo numérico )</label>
                            <input type="number" class="form-control" placeholder="" name="gestorParAfiliacion" id="gestorParAfiliacion" value="">
                        </div>
                       <div class="col">
                            <label>Forma pago* </label>
                            <select name="formaDePago" id="formaDePago" class="form-control" >
                                <option value="1">RECIBO</option>
                                <option value="2">NOMINA</option>
                            </select>
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

                            <input id ="situacion" list="situaciones" name="situacion" placeholder="" class="form-control">

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
                                <input type="text" class="form-control" placeholder="CC Afiliacion" name="CCAfiliacion" id="CCAfiliacion">
                        </div>

                                                                      
                    </div>

                    <div class="form-group row">

                        

                        
                            <div class="col-3">
                                <label>¿DESEA RECIBIR INFORMACION?</label>
                            </div>
                            <div class="col-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" id="infno" checked>NO
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" id="infsi" >SI
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="" id="corcaj" disabled>CORREO CAJAMAR
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="" id="corext" disabled>CORREO PARTICULAR
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="" id="mov" disabled>TELÉFONO MOVIL
                                    </label>
                                </div>
                            </div>
                        

                       
                        
                        
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label>Teléfono/Móvil</label>
                            <input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono">
                        </div>
                        <div class="col">
                            <label>Mail Externo Cajamar</label>
                            <input type="text" class="form-control" placeholder="Correo Externo Cajamar" name="correoExternoCajamar" id="correoExternoCajamar">
                        </div>
                        <div class="col">
                            <label>Mail Externo Propio</label>
                            <input type="text" class="form-control" placeholder="Correo Externo Propio" name="correoExternoPropio" id="correoExternoPropio">
                        </div>
                        
                        
                        
                    </div>

                    
                    <div class="form-group row">
                       
                      
                        <!--
                        <div class="col">
                            <label>Observaciones</label>
                            <input type="text" class="form-control" placeholder="" name="observaciones" id="observaciones">
                        </div>
                        -->
                        
                        <div class="col">
                            <label>Observaciones</label>
                             <textarea class="form-control" rows="4" placeholder="Inserta las observaciones aqui..." name="observaciones" id="observaciones"></textarea>
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
                //var _fechaBaja= $("#fechaBaja").val();
                var _gestorAfiliacion= $("#gestorAfiliacion").val();

                if ($("#gestorParAfiliacion").val()==''){

                    var _gestorParAfiliacion= $("#gestorAfiliacion").val();

                }
                else{
                    
                    var _gestorParAfiliacion= $("#gestorParAfiliacion").val();

                }

                
                
                var _formaDePago= $("#formaDePago").val();

                var _CCAfiliacion= $("#CCAfiliacion").val();

                

                if ($('#infno').is(":checked"))
                {
                    var _info= "NO";
                };
                if ($('#infsi').is(":checked"))
                {
                    var _info= "SI";
                };

                alert(_info);

                if ($('#corcaj').is(":checked"))
                {
                    var _corcaj= "SI";
                }
                else{
                    var _corcaj= "NO";
                }

                if ($('#corext').is(":checked"))
                {
                    var _corext= "SI";
                }
                else{
                    var _corext= "NO";
                }

                if ($('#mov').is(":checked"))
                {
                    var _mov= "SI";
                }
                else{
                    var _mov= "NO";
                }
                
                alert(_corcaj);
                alert(_corext);
                alert(_mov);



                var _telefono= $("#telefono").val();
                var _correoExternoCajamar= $("#correoExternoCajamar").val();
                var _correoExternoPropio= $("#correoExternoPropio").val();

                var _situacion= $("#situacion").val();
                
                var _observaciones= $("#observaciones").val();
                
                
                if( _provincia == "" || _fechaAfiliacion == "" || _gestorAfiliacion == "" || _formaDePago == "" ){

                   alert("FALTAN CAMPOS OBLIGATORIOS POR RELLENAR");

                }
                else{

                    alert("TODO PARECE CORRECTO. PROCEDO A SU GRABACION.");
                    
                    
                     $.post("grabarAfiliacion.php",{nombre: _nombre, apellidos: _apellidos, sexo: _sexo, NIF: _NIF, numeroEmpleado: _numeroEmpleado, fechaNacimiento: _fechaNacimiento, direccion: _direccion, poblacion: _poblacion, provincia: _provincia, codigoPostal: _codigoPostal, entidad: _entidad, numeroOficina: _numeroOficina, clasificacionProfesional: _clasificacionProfesional, afi: _afi, fechaAfiliacion: _fechaAfiliacion, gestorAfiliacion: _gestorAfiliacion, gestorParAfiliacion: _gestorParAfiliacion, formaDePago: _formaDePago, CCAfiliacion: _CCAfiliacion, telefono: _telefono, correoExternoCajamar: _correoExternoCajamar, correoExternoPropio: _correoExternoPropio , situacion: _situacion, observaciones: _observaciones},function(res){   
                    
                  
                        alert(res);

                        window.close();
                               
                    });

                    
                }
                    
                
                
                
         
            });
                
             
            
        });
    </script>

</html>
