<?php
//agregar libreria tcpdf

require '../tcpdf_min/tcpdf.php';

include("../conexion.php");

//$id = '1';
$id = $_GET['var'];

$result = $conexion->query("select *  FROM censo WHERE id='".$id."'");

while($row = $result->fetch_array())
{
    

        
               $NIF=$row['NIF'] ;
               $nombre=$row['Nombre'] ;
               $apellidos=$row['Apellidos'] ;

               $fechaNacimiento=$row['FechaNacimiento'] ;
                    $originalDate = $fechaNacimiento;
                    $newFechaNacimiento = date("d/m/Y", strtotime($originalDate));

               $numeroOficina=$row['NumeroOficina'] ;
               $nombreOficina=$row['NombreOficina'] ;
               $categoriaProfesional=$row['CategoriaProfesional'] ;
               $puesto=$row['Puesto'] ;

               $primeraAlta=$row['PrimeraAlta'] ;
                    $originalDate = $primeraAlta;
                    $newPrimeraAlta = date("d/m/Y", strtotime($originalDate));

               $sociedad=$row['Sociedad'] ;

}



ob_start(); // esta linea sirve para evitar aquel erro que daba de "TCPDF ERROR: Some data has already been output, can't send PDF file". Solucion de StackOverflow




//clase para crear header y footer personalizado
class mipdf extends TCPDF{  
  
      //Header personalizado
      public function Header() {
        //imagen en header
        $logo = '../../img/logo.png';
      // $this->Image($logo, 25, 10, 25, '', 'PNG', '', '', false, 300, '', false, false, 0, false, false, false);
        $this->Image($logo, 110, 4, 80, '', 'PNG', '', '', false, 300, '', false, false, 0, false, false, false);

        $this->SetFont('Helvetica', 'B', 30);
        $this->SetTextColor(0, 51, 153); 
        $this->Cell(0, 0, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
      }
      
      //footer personalizado
      public function Footer() {
        // posicion
        $this->SetY(-15);
        // fuente
        $this->SetFont('helvetica', 'I', 8);
        // numero de pagina
      //$this->Cell(0, 10, 'Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
              
      }
}

//iniciando un nuevo pdf
$pdf = new mipdf(PDF_PAGE_ORIENTATION, 'mm', 'Letter', true, 'UTF-8', false);

//establecer margenes
//$pdf->SetMargins(25, 35, 25);
$pdf->SetMargins(12, 20, 11);
$pdf->SetHeaderMargin(5);

//informacion del pdf
$pdf->SetCreator('hug0');
$pdf->SetAuthor('hug0');
$pdf->SetTitle('Boletín de Afiliación CC.OO.');
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//tipo de fuente y tamanio
$pdf->SetFont('helvetica', '', 11);

//agregar pag 1
$pdf->AddPage();




$html = '

<style>
  .azul { color:rgb(0, 51, 153) }

  .recuadro_exterior { border-style:solid 4px 4px 4px 4px ; 
              border-color: #e60000;
              padding:0px; marging:0px;
            }
 
  .recuadro { border-style:solid 2px 2px 2px 2px ; 

                }

  .cuadradito{
        border: 1px solid Black;
        width:20px;
        height: 22px;
                 
      }
  
  .cuadradito_blanco{
        border: 1px solid white;
        width:20px;
                 
      }
  
  
 
  td {
    
    line-height: 21px;
    text-align:left;
    
  }

 


</style>

<h1 class="azul" style="text-align: center;  font-size: 30px; display: inline-block;"> BOLETÍN AFILIACIÓN </h1>

<div class="recuadro_exterior">


                    
                    
        <table CELLSPACING="2">
      
          <tr>
            <td style="width:140px;">APELLIDOS Y NOMBRE:</td> <td class="recuadro"  style="width:360px;"> '.$apellidos.',&nbsp; '.$nombre.' </td> 
          </tr>
        </table>
            
        <table CELLSPACING="2">
          <tr>
            <td style="width:68px;">DOMICILIO:</td> <td class="recuadro" style="width:431px;"> </td>
          </tr>
        </table>
        
      <table CELLSPACING="2">
        <tr>
          <td style="width:70px;">POBLACIÓN:</td> <td class="recuadro" style="width:150px;"> </td>
          <td style="width:70px;">PROVINCIA:</td> <td class="recuadro" style="width:120px;"> </td>
          <td style="width:25px;">C.P.</td> <td class="recuadro" style="width:55px;"> </td>
        </tr>
      </table>
         
      <table CELLSPACING="2">
        <tr>
          <td style="width:30px;">NIF:</td> <td class="recuadro" style="width:150px;"> '.$NIF.' </td>
          
          <td style="width:120px;">FECHA NACIMIENTO:</td> <td class="recuadro" style="width:195px;"> '.$newFechaNacimiento.' </td>
        </tr>
      </table>

      <table CELLSPACING="2">
      <tr>
          <td style="width:60px;">EMPRESA:</td> <td class="recuadro" style="width:200px;">'.$sociedad. '</td>
          <td style="width:25px;">CIF:</td> <td class="recuadro" style="width:100px;"> </td>
          <td style="width:50px;">CLAVE:</td> <td class="recuadro" style="width:55px;"> </td>
      </tr>
    </table>

      <table CELLSPACING="2">
      <tr>
          <td style="width:125px;">CENTRO DE TRABAJO:</td> <td class="recuadro" style="width:265px;">'.$numeroOficina.' - '.$nombreOficina.' </td>
          
          <td style="width:50px;">CLAVE:</td> <td class="recuadro" style="width:55px;"> </td>
      </tr>
    </table>

      <table CELLSPACING="2">
      <tr>
        <td style="width:170px;">CLASIFICACIÓN PROFESIONAL:</td> <td class="recuadro" style="width:330px;">'.$puesto.' ('.$categoriaProfesional.') </td>
      </tr>
    </table>

    <table CELLSPACING="2">
    <tr>
        <td style="width:120px;">FECHA ANTIGUEDAD:</td> <td class="recuadro" style="width:132px;"> '.$newPrimeraAlta.' </td>
              
        <td style="width:110px;">FECHA AFILIACIÓN:</td> <td class="recuadro" style="width:132px;">  </td>
    </tr>
    </table>


      

</div> 

<div class="recuadro_exterior">
                    

                    
                      
                      <table CELLSPACING="2">
                        <tr> <td><label style="color: #e60000;text-align:center">FORMA DE PAGO</label></td></tr>
                        <tr>
                          
                          <td style="width:155px;">DOMICILIACIÓN BANCARIA:</td>
                            <td class="cuadradito" ></td>
                            <td class="cuadradito_blanco" ></td>
                          <td style="width:125px;">DESCUENTO NÓMINA:</td>
                            <td class="cuadradito" ></td>
                         
                        </tr>
                        
                      </table> 
                      <br>
                      <br>

                      <table>
                        <tr>
                        
                         <td colspan="2"> TRIMESTRAL</td>
                          <td class="cuadradito" ></td>
                         <td class="cuadradito_blanco" ></td> 
                         <td colspan="2"> SEMESTRAL</td>
                          <td class="cuadradito" ></td>
                          <td class="cuadradito_blanco" ></td>  
                         <td colspan="1"> ANUAL</td>
                          <td class="cuadradito" ></td>
                         

                        </tr>

                        
                      </table>
                      <br>
                      <br>   
                    <table>
                      <label style="line-height: 21px;">IBAN</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <tr>
                        <td class="cuadradito" >&nbsp;&nbsp;E</td>
                        <td class="cuadradito" >&nbsp;&nbsp;S</td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                        <td class="cuadradito" ></td>
                      </tr>
                      
                    </table>
                   
                  
      
</div>  

<div class="recuadro_exterior">

      <table CELLSPACING="2">

      <tr> <td  style="height:2px;">  </td><td  style="height:2px;">  </td></tr>
      <tr>
          
          <td style="width:85px;">T.MOVIL PART.:</td> <td class="recuadro" style="width:152px;">  </td>
                  
          <td style="width:80px;"> E-MAIL PART:</td> <td class="recuadro" style="width:180px;">  </td>
      </tr>
      </table>

      <table CELLSPACING="2">
      <tr>
        <td  style="width:1px;">  </td><td  style="width:1px;">  </td>
        <td style="width:510px;font-size:10px;">¿DESEAS RECIBIR INFORMACIÓN EN TU CORREO ELECTRÓNICO PARTICULAR O EN TU MOVIL?</td> <td  style="width:1px;">  </td>
      </tr>
      </table>

      <table>
                        <tr>
                        
                        <td class="cuadradito_blanco" ></td> 
                        <td class="cuadradito_blanco" ></td> 
                         <td style="width:30px;"> SI</td>
                          <td class="cuadradito" ></td>
                         <td class="cuadradito_blanco" ></td> 
                         <td style="width:30px;"> NO</td>
                          <td class="cuadradito" ></td>
                          <td class="cuadradito_blanco" ></td>  
                         <td style="width:60px;"> CORREO</td>
                          <td class="cuadradito" ></td>
                          <td class="cuadradito_blanco" ></td>  
                          <td style="width:50px;"> MOVIL</td>
                          <td class="cuadradito" ></td>
                          <td class="cuadradito_blanco" ></td> 
                          <td style="width:50px;"> AMBOS</td>
                          <td class="cuadradito" ></td>

                        </tr>

                        
        </table>

</div>

<div>



<table CELLSPACING="2">
<tr>
    <td style="width:250px;"></td><td style="width:50px;">FIRMA</td><td class="recuadro" rowspan="3" style="width:190px;"> </td>
</tr>
<tr>
    <td  style="width:250px;"><h1 style="color:red; font-size:24px;">#SiemprecOOnTTigo</h1></td><td ></td> <td > </td>
</tr>
<tr>
    <td style="width:250px;"></td><td style="width:50px;"></td><td  > </td>
</tr>
</table>

<br>

<p style=" text-align: center;  font-size: 7px; display: inline-block;"> 
    De conformidad con la Ley Orgánica de Protección de Datos de carácter personal, se le informa que sus datos personales serán incorporados a un fichero titularidad de OO.TT. La finalidad del tratamiento de sus datos por parte de esta Organización la constituye el mantenimiento de su relación como afiliado. Puede ejercitar sus derechos de acceso, rectificación, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de fotocopia de DNI dirigida a: OO.TT. Fed. de Servicios, Domicilio , s/n, 28043 Madrid. 
</p>
</div>



 
      
'

;







 
//escribe el texto en la hoja
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

/*
//agregar pag 2
$pdf->AddPage();
//escrite el texto en la hoja
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
*/


//terminar el pdf
$pdf->Output('Boletin.pdf', 'I');


exit;

?>