<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 19/03/19
 * Time: 11:21 PM
 */

namespace App\Entities;

use CodeIgniter\Core\Entitie;

class Template extends Entitie
{

	protected $id_template;
	protected $nombre;
	protected $id_cuenta;
	protected $path;
	protected $pathjs;

	public function getId()
	{
		return $this->id_template;
	}
	public function getIdString()
	{
		return 'id_template';
	}
}
