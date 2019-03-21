<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 19/03/19
 * Time: 11:21 PM
 */

namespace App\Entities;

use CodeIgniter\Core\Entitie;

class Hosts extends Entitie
{

	protected $id_hosts;
	protected $host;
	protected $id_cuenta;
	protected $namespace;
	protected $controller;
	protected $metodo;
	protected $id_template;

	public function getId()
	{
		return $this->id_hosts;
	}

	public function getIdString()
	{
		return 'id_hosts';
	}

}
