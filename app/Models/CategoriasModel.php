<?php

//ruta donde esta este archivo
namespace App\Models;
use CodeIgniter\Model;

//clases
class CategoriasModel extends Model{
    
    //variables protegidas para saber tabla y columna
    protected $table      = 'categorias';
    protected $primaryKey = 'id';

    //como regresar la informacion cuando se haga la consulta
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    //ingresar nombre de las columnas
    protected $allowedFields = ['nombre','activo'];

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