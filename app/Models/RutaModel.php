<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 19/03/19
 * Time: 11:30 PM
 */

namespace App\Models;

use CodeIgniter\Model;

class RutaModel extends Model
{
	protected $table      = 'ruta';
	protected $primaryKey = 'id_ruta';

	protected $returnType     = '\App\Entities\Ruta';
	protected $useSoftDeletes = false;

	protected $allowedFields = [
		'controller',
		'id_cuenta',
		'method',
		'id_ruta',
		'ruta',
	];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = false;
}
