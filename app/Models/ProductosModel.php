<?php

//ruta donde esta este archivo
namespace App\Models;
use CodeIgniter\Model;

//clases
class ProductosModel extends Model{
    
    //variables protegidas para saber tabla y columna
    protected $table      = 'productos';
    protected $primaryKey = 'id';

    //como regresar la informacion cuando se haga la consulta
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    //ingresar nombre de las columnas
    protected $allowedFields = ['codigo', 'nombre','precio_venta' , 'precio_compra', 'existencias','stock_minimo','inventariable','id_unidad','id_categoria','activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    //validaciones
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>