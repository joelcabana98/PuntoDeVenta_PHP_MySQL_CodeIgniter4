<?php

//ruta donde esta este archivo
namespace App\Models;
use CodeIgniter\Model;

//clases
class ConfiguracionModel extends Model{
    
    //variables protegidas para saber tabla y columna
    protected $table      = 'configuracion';
    protected $primaryKey = 'id';

    //como regresar la informacion cuando se haga la consulta
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $useSoftUpdates = false;
    protected $useSoftCreates = false;

    //ingresar nombre de las columnas
    protected $allowedFields = ['nombre', 'nvalor'];

    protected $useTimestamps = true;
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = 'deleted_at';

    //validaciones
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>