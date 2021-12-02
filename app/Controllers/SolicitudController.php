<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Solicitud;
use App\Models\Empleado;

class SolicitudController extends Controller{
 
    public function index(){

        $solicitud = new Solicitud();
        $datos['solicitudes'] = $solicitud->orderBy('id','ASC')->findAll();

        $empleado = new Empleado();
        $datos['empleados'] = $empleado->orderBy('nombres','ASC')->findAll();
        
        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('solicitudes/listar', $datos);

    }

    public function crear(){

        $empleado = new Empleado();
        $datos['empleados'] = $empleado->orderBy('nombres','ASC')->findAll();

        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('solicitudes/crear', $datos);
    }

    public function guardar(){

        $solicitud = new Solicitud();

        //comprobacion si se envian los datos
        /*
        $nombre = $this->request->getVar('nombres'); 
        print_r($nombre);
        */

        //Validacion de campos
        $validacion = $this->validate([
            'codigo' => 'required|max_length[45]',
            'descripcion' => 'required|max_length[45]',
            'resumen' => 'required|max_length[45]',
            'id_empleado' => 'required'
        ]);

        if(!$validacion){
            $session = session();
            $session->setFlashdata('msj', 'Informacion Incompleta, Revisar por favor.');
            return redirect()->back()->withInput();
            //return $this->response->redirect(site_url('/listar'));
        }

        $datos=[
            'codigo' => $this->request->getVar('codigo'),
            'descripcion' => $this->request->getVar('descripcion'),
            'resumen' => $this->request->getVar('resumen'),
            'id_empleado' => $this->request->getVar('id_empleado')
        ];
        
        $solicitud->insert($datos);


        #echo "Se ha registrado el Empleado".$id_empleado;

        return $this->response->redirect(site_url('/listarSol'));
        
    }

    public function eliminar($id=null){

        $solicitud = new Solicitud();
        $solicitud -> where ('id', $id)->delete($id);

        //echo "Se ha eliminado el registro";

        return $this->response->redirect(site_url('/listarSol'));

    }

    public function editar($id=null){
        
        $empleado = new Empleado();
        $datos['empleados'] = $empleado->orderBy('nombres','ASC')->findAll();

        $solicitud = new Solicitud();
        $datos['solicitud'] = $solicitud->where('id',$id)->first();

        $datos['header'] = view('templates/header');
        $datos['footer'] = view('templates/footer');

        return view('solicitudes/editar', $datos);

    }

    public function actualizarSol(){

        $solicitud = new Solicitud();
        $id = $this->request->getVar('id');
        $datos=[
            'codigo' => $this->request->getVar('codigo'),
            'descripcion' => $this->request->getVar('descripcion'),
            'resumen' => $this->request->getVar('resumen'),
            'id_empleado' => $this->request->getVar('id_empleado')
        ];

        $validacion = $this->validate([
            'codigo' => 'required|max_length[45]',
            'descripcion' => 'required|max_length[45]',
            'resumen' => 'required|max_length[45]',
            'id_empleado' => 'required'
        ]);

        if(!$validacion){
            $session = session();
            $session->setFlashdata('msj', 'Informacion Incompleta, Revisar por favor.');
            return redirect()->back()->withInput();
        }
        
        $solicitud->update($id, $datos);

        //echo "Se ha modificado el registro";

        return $this->response->redirect(site_url('/listarSol'));

    }
}