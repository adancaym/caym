<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 19/03/19
 * Time: 11:21 PM
 */

namespace App\Entities;

use CodeIgniter\Core\Entitie;

class Ruta extends Entitie
{

	protected $id_ruta;
	protected $ruta;
	protected $controller;
	protected $method;
	protected $id_cuenta;

	public function getId()
	{
		return $this->id_ruta;
	}
	public function getIdString()
	{
		return 'id_ruta';
	}

}
