<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 19/03/19
 * Time: 11:21 PM
 */

namespace App\Entities;

use CodeIgniter\Core\Entitie;

class Cuenta extends Entitie
{

	protected $cuenta;
	protected $id_cuenta;
	protected $id_cuenta_padre;

	public function getId()
	{
		return $this->id_cuenta;
	}

	public function getIdString()
	{
		return 'id_cuenta';
	}

}
