<?php
namespace Clases;

use PDOException;
use PDO;

class Marcas extends Conexion{
    private $id_marca;
    private $nombre;
    private $provincia;
    private $imagen;

    public function __construct(){
        parent::__construct();
    }
    // ----------------Metodos para el CRUD ------------------
    public function create(){
        $crear="insert into marcas(nombre, provincia, imagen) values(:n, :p, :i)";
        $stmt=parent::$conexion->prepare($crear);
        try{
            $stmt->execute([
                ':n'=>$this->nombre,
                ':p'=>$this->provincia, // 
                ':i'=>$this->imagen
            ]);
        }catch(PDOException $ex){
            die("Error creando la marca: ".$ex->getMessage());
        }

    }
    //----------------
    public function read(){
        $c="select * from marcas where id_marca=:i";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute([
                ':i'=>$this->id_marca
            ]);
        }catch(PDOException $ex){
            die("Error al recuperar UNA marca: ".$ex->getMessage());
        }
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    //------------------------------------------------------------------------
    public function update(){
        $u="update marcas set nombre=:n, provincia=:p, imagen=:im where id_marca=:id";
        $stmt=parent::$conexion->prepare($u);
        try{
            $stmt->execute([
                ':n'=>$this->nombre,
                ':p'=>$this->provincia,
                ':im'=>$this->imagen,
                ':id'=>$this->id_marca
            ]);
        }catch(PDOException $ex){
            die("Error al actualizar la marca: ".$ex->getMessage());
        }
    }
    //-------------------------------------------------------------------------

    public function delete(){
        $de="delete from marcas where id_marca=:i";
        $stmt=parent::$conexion->prepare($de);
        try{
            $stmt->execute([
                ':i'=>$this->id_marca
            ]);
        }catch(PDOException $ex){
            die("Error al borrar la marca!!! ".$ex->getMessage());
        }

    }
    //-----------------------------------------------------------------
    public function recuperarTodas(){
        $c="select * from marcas order by nombre, provincia";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute();
        }catch(PDOException $ex){
            die("Error al recuperar las marcas: ".$ex->getMessage());

        }
        return $stmt;
    }
    


    

    /**
     * Set the value of id_marca
     *
     * @return  self
     */ 
    public function setId_marca($id_marca)
    {
        $this->id_marca = $id_marca;

        return $this;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Set the value of provincia
     *
     * @return  self
     */ 
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }
    //---------------------------------------------------------------------------------
    public function devolverImagen(){
        $c="select imagen from marcas where id_marca=:i";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute([':i'=>$this->id_marca]);
        }catch(PDOException $ex){
            die("Error al recuperar la imagen: ".$ex->getMessage());
        }
        return $stmt->fetch(PDO::FETCH_OBJ)->imagen;
    }
    //_---------------------------------------------------
}