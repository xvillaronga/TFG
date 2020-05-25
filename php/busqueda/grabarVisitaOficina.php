<?php

include("../conexion.php");
    
$numeroOficina= $_POST['numeroOficinaVisita'];
$fecha= $_POST['fecha'];
$gestor1Of= $_POST['gestor1Of'];
$gestor2Of= $_POST['gestor2Of'];

$puertaAcceso= $_POST['puertaAcceso'];
$extintores = $_POST['extintores'];
$estanteriasArchivo = $_POST['estanteriasArchivo'];

$fluorescentes= $_POST['fluorescentes'];
$aireAcondicionado = $_POST['aireAcondicionado'];
$barraAntideslizante = $_POST['barraAntideslizante'];


$armarioLimpieza = $_POST['armarioLimpieza'];
$otros = $_POST['otros'];

$comentarios = $_POST['comentarios'];



	$conexion->query("insert into visitasoficinas (numeroOficina, fechaVisita, gestor1, gestor2, comentarios, puertaAcceso, extintores, estanteriasArchivo, fluorescentes, aireAcondicionado, barraAntideslizante, armarioLimpieza, nota8) values ('$numeroOficina', '$fecha','$gestor1Of', '$gestor2Of', '$comentarios','$puertaAcceso', '$extintores', '$estanteriasArchivo', '$fluorescentes', '$aireAcondicionado', '$barraAntideslizante', '$armarioLimpieza', '$otros' )");

	

	

echo "VISITA GRABADA CORRECTAMENTE";



?>