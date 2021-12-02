<?php 
namespace App\Models;

use CodeIgniter\Model;

class Empleado extends Model{
    protected $table = 'empleados';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields=['fecha_ing','nombres','salario'];
}