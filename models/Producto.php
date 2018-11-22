<?php
/**
 * Created by PhpStorm.
 * User: krcasasg
 * Date: 21/11/2018
 * Time: 10:17 AM
 */
require __DIR__ . '/../helpers/Database.php';
class Producto
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $db;

    public function __construct()
    {
        try{
            $this->db = Database::StartUp();
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }


    public function getAll()
    {
        try{
            $sql = "SELECT `id`, `nombre`, `descripcion`, `precio` FROM `producto`";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_CLASS, 'Producto');

        }catch(Exception $e){
            die("ERROR: " . $e.getMessage());
        }

        return $products;
    }

    public function getOne($id){
        try{
            $sql = 'SELECT `id`, `nombre`, `descripcion`, `precio` FROM `producto` WHERE :id';
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $product = $stmt->fetchObject('Producto');
            return $product;
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }

    public function insert(Producto $product)
    {
        try{
            $sql = "insert into producto ( `nombre`, `descripcion`, `precio`) VALUES (:nombre, :descripcion , :precio)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nombre', $product->__GET('nombre'));
            $stmt->bindParam(':descripcion', $product->__GET('descripcion'));
            $stmt->bindParam(':precio', $product->__GET('precio'));
            $stmt->execute();
        }catch(PDOException $e){
            die('ERROR: ' . $e->getMessage());
        }

    }

    public function update($data)
    {
        try{
            $sql = "update producto set nombre = :nombre, descripcion = :descripcion, precio = :precio where id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $data['id']);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':descripcion', $data['descripcion']);
            $stmt->bindParam(':precio', $data['precio']);
            $stmt->execute();
        }catch(PDOException $e){
            die('ERROR: ' . $e->getMessage());
        }

    }

    public function delete($id)
    {
        $sql = "delete from producto where id = $id";
        $this->db->exec($sql);
    }

}