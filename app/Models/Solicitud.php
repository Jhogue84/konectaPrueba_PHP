<?php 
namespace App\Models;

use CodeIgniter\Model;

class Solicitud extends Model{
    protected $table      = 'solicitudes';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields=['codigo','descripcion','resumen', 'id_empleado'];
}