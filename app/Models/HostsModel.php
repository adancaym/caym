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

class HostsModel extends Model
{

	protected $table      = 'hosts';
	protected $primaryKey = 'id_hosts';

	protected $returnType     = '\App\Entities\Hosts';
	protected $useSoftDeletes = false;

	protected $allowedFields = [
		'hosts',
		'id_cuenta',
		'namespace',
		'controller',
		'metodo',
		'id_template',
	];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = false;

	public function getHostByHost($host)
	{
		return $this->where('host', $host)->first();
	}

}
