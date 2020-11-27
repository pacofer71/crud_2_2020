<?php
session_start();

if(!isset($_POST['marcaId'])){
    header("Location:index.php");
    die();
}

require "../vendor/autoload.php";
use Clases\Marcas;

$id=$_POST['marcaId'];

$estaMarca=new Marcas();

$estaMarca->setId_marca($id);

$imagen=$estaMarca->devolverImagen();

$estaMarca->delete();

if(basename($imagen)!="default.jpg"){
    unlink($imagen);
}


$estaMarca=null;

$_SESSION['mensaje']="Marca Borrada Correctamente";
header("Location:index.php");


