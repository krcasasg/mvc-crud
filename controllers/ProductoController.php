<?php
/**
 * Created by PhpStorm.
 * User: krcasasg
 * Date: 21/11/2018
 * Time: 10:29 AM
 */
require __DIR__ . '/../models/Producto.php';
class ProductoController
{
    private $product;
    //private $db;


    public function __construct()
    {
        $this->product = new Producto();
        //$this->db = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");


    }

    private function render($template, $data = [])
    {
        $data_val = $data;
        include_once __DIR__ . '/../templates/header.php';
        include_once __DIR__ . '/../views/producto/'. $template. '.html.php';
        include_once __DIR__ . '/../templates/footer.php';
    }

    private function validateData($value)
    {
        $value = trim($value, ' ');
        $value = rtrim($value, ' ');
        $value = html_entity_decode($value, ENT_QUOTES);
        return $value;
    }
    
    
    public function index()
    {
        $data = $this->product->getAll();
        $title = 'Listado de productos';
        $array_data = ['data' => $data, 'title' => $title];
        $this->render('index', $array_data);
    }

    public function create()
    {
        $product_create = new Producto();
        $output = '';
        $data = ['output' => $output];
        if(isset($_POST['crear'])){
            $product_create->__SET('nombre', $this->validateData($_POST['nombre']));
            $product_create->__SET('descripcion', $this->validateData($_POST['descripcion']));
            $product_create->__SET('precio', $this->validateData($_POST['precio']));
            $this->product->insert($product_create);
            $output = "Producto Insertado Correctamente";
            header('location: ?c=producto');

        }else{

            $this->render('create', $data);
        }



    }

    public function find()
    {
        if(isset($_GET['id'])){
            $product_find = $this->product->getOne($_GET['id']);
            if($product_find){
                $data = [
                    'id' => $product_find->id,
                    'nombre' => $product_find->nombre,
                    'descripcion' => $product_find->descripcion,
                    'precio' => $product_find->precio
                    ];
                $this->render('show',$data);
            }
        }
    }

    public function edit(){
        $product_find = $this->product->getOne($_GET['id']);
        if(isset($_POST['edit'])){
            $data = [
                'id' => $_POST['id'],
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
                'precio' => $_POST['precio'],
            ];
            $this->product->update($data);
            header('Location: ?c=producto&a=index');
        }elseif($product_find){
                $data = [
                    'id' => $product_find->id,
                    'nombre' => $product_find->nombre,
                    'descripcion' => $product_find->descripcion,
                    'precio' => $product_find->precio
                ];
                $this->render('edit',$data);


            }

    }

    public function delete(){
        $product_find = $this->product->getOne($_GET['id']);
        $this->render('delete');
        $this->product->delete($_GET['id']);
        header('location: ?c=producto&a=index');
    }
}