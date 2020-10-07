<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientesModel;

class Clientes extends BaseController{

    protected $clientes;
    protected $reglas;

    public function __construct(){
        $this->clientes = new ClientesModel();

        helper(['form']);
        $this->reglas = [
            'nombre'=>[
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'El campo {field} es obligatorio.'
                            ]
                        ]
               
            ];

    }

    public function index($activo =1){
         $clientes = $this->clientes->where('activo',$activo)->findAll();
         $data = ['titulo'=>'Clientes','datos'=> $clientes];   

        //visualizar vista
        echo view('header');
		echo view('clientes/clientes',$data);
		echo view('footer');
    }

    //metodo visualizar formulario nuevo
    public function nuevo(){

        $data = ['titulo'=>'Agregar Cliente'];  

        //visualizar vista
        echo view('header');
		echo view('clientes/nuevo',$data);
		echo view('footer');
    }


    public function insertar(){

        if($this->request->getMethod() == "post" && $this->validate($this->reglas)){  
   
            $this->clientes->save([
            'nombre'=>$this->request->getPost('nombre'),
            'direccion'=>$this->request->getPost('direccion'),
            'telefono'=>$this->request->getPost('telefono'),
            'correo'=>$this->request->getPost('correo')]);

            return redirect()->to(base_url().'/clientes');
        }else {
            
            $data = ['titulo'=>'Agregar Cliente','validation'=> $this->validator];  

            //visualizar vista
            echo view('header');
            echo view('clientes/nuevo',$data);
            echo view('footer');
        }
       
    }


//metodo visualizar formulario nuevo
public function editar($id){

    $cliente = $this->clientes->where('id', $id)->first();

    $data = ['titulo'=>'Editar Cliente','cliente'=>$cliente];  
    //visualizar vista
    echo view('header');
    echo view('clientes/editar',$data);
    echo view('footer');
}


public function actualizar(){
  
    $this->clientes->update($this->request->getPost('id'), [
        'nombre'=>$this->request->getPost('nombre'),
            'direccion'=>$this->request->getPost('direccion'),
            'telefono'=>$this->request->getPost('telefono'),
            'correo'=>$this->request->getPost('correo')]);

    
    return redirect()->to(base_url().'/clientes');
}

public function eliminar($id){
    $this->clientes->update($id,['activo'=> 0]);
    return redirect()->to(base_url().'/clientes');
}

public function eliminados($activo = 0){
    $clientes = $this->clientes->where('activo',$activo)->findAll();
    $data = ['titulo'=>'Clientes Eliminadas','datos'=> $clientes];   

   //visualizar vista
   echo view('header');
   echo view('clientes/eliminados',$data);
   echo view('footer');
}

public function reingresar($id){
    $this->clientes->update($id,['activo'=> 1]);
    return redirect()->to(base_url().'/clientes');
}

}


?>