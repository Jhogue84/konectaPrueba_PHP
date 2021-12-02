<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Empleado;

class EmpleadoController extends Controller{

    public function index(){

        $empleado = new Empleado();
        $datos['empleados'] = $empleado->orderBy('id','ASC')->findAll();
        
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('empleados/listar', $datos);

    }

    public function crear(){

        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('empleados/crear', $datos);
    }

    public function guardar(){

        $empleado = new Empleado();

        //comprobacion si se envian los datos
        /*
        $nombre = $this->request->getVar('nombres'); 
        print_r($nombre);
        */

        //Validacion de campos
        $validacion = $this->validate([
            'fecha_ing' => 'required',
            'nombres' => 'required|min_length[3]',
            'salario' => 'required'
        ]);

        if(!$validacion){
            $session = session();
            $session->setFlashdata('msj', 'Informacion Incompleta, Revisar por favor.');
            return redirect()->back()->withInput();
            //return $this->response->redirect(site_url('/listar'));
        }

        $datos=[
            'fecha_ing' => $this->request->getVar('fecha_ing'),
            'nombres' => $this->request->getVar('nombres'),
            'salario' => $this->request->getVar('salario')
        ];
        
        $empleado->insert($datos);

        //echo "Se ha registrado el Empleado";

        return $this->response->redirect(site_url('/listar'));
        
    }

    public function eliminar($id=null){

        $empleado = new Empleado();
        $empleado -> where ('id', $id)->delete($id);

        //echo "Se ha eliminado el registro";

        return $this->response->redirect(site_url('/listar'));

    }

    public function editar($id=null){

        //print_r($id);
        //return view('empleados/editar');
        $empleado = new Empleado();
        $datos['empleado'] = $empleado->where('id',$id)->first();

        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('empleados/editar', $datos);

    }

    public function actualizar(){

        $empleado = new Empleado();
        $id = $this->request->getVar('id');
        $datos=[
            'fecha_ing' => $this->request->getVar('fecha_ing'),
            'nombres' => $this->request->getVar('nombres'),
            'salario' => $this->request->getVar('salario')
        ];

        //Validacion de campos
        $validacion = $this->validate([
            'fecha_ing' => 'required',
            'nombres' => 'required|min_length[3]',
            'salario' => 'required'
        ]);

        if(!$validacion){
            $session = session();
            $session->setFlashdata('msj', 'Informacion Incompleta, Revisar por favor.');
            return redirect()->back()->withInput();
            //return $this->response->redirect(site_url('/listar'));
        }
        
        $empleado->update($id, $datos);

        //echo "Se ha modificado el registro";

        return $this->response->redirect(site_url('/listar'));

    }
}