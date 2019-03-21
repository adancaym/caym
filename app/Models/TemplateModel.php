<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 19/03/19
 * Time: 11:05 PM
 */

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class TemplateModel extends Model
{

	protected $table      = 'hosts';
	protected $primaryKey = 'id_template';

	protected $returnType     = '\App\Entities\Template';
	protected $useSoftDeletes = false;

	protected $allowedFields = [
		'id_template',
		'id_cuenta',
		'nombre',
		'path',
		'pathjs',
	];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = false;

}
