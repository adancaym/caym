<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 19/03/19
 * Time: 11:30 PM
 */

namespace App\Models;

use CodeIgniter\Model;

class CuentaModel extends Model
{
	protected $table      = 'cuenta';
	protected $primaryKey = 'id_cuenta';

	protected $returnType     = '\App\Entities\Cuenta';
	protected $useSoftDeletes = false;

	protected $allowedFields = [
		'cuenta',
		'id_cuenta',
		'id_cuenta_padre',
	];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = false;
}
